<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
use DB;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Note;
use App\Models\CalendarInformation;
use App\User;
use App\Models\Group;
use App\Models\EmployeeGroup;
use App\Notifications\Draft;
use App\Notifications\SendMessage;
use App\Notifications\SendEmpMessage;

use App\Models\MostSearchedKeyword;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $group_id = $request->input('group-id');
        $emp_id = $request->input('emp-id');

        $group = $request->input('group');     
        $s = $request->input('keyword');    
        $keyword = $request->input('keyword');    
                
        $searched_data =  MostSearchedKeyword::select('id',DB::raw('count(keyword) as keyword_count'), 'keyword')->groupBy('keyword')
        ->having(DB::raw('count(keyword)'), '>', 3)
        ->orderBy(DB::raw('count(keyword)'), 'desc')
        ->paginate(25); 

        $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');

        $employees2 = Employee::latest('MetaTimeCreated');
        $notes = Note::latest()->paginate(15);

        $filter_name = $request->input('filter_name');
        $filter_email = $request->input('filter_email');
        $filter_mobile = $request->input('filter_mobile');     
        $filter_group = $request->input('filter_group');     
        $filter_id = $request->input('filter_id');     
        $empl_id = $request->input('empl_id');  

        $employee_data = array();

        if (isset($empl_id) && !empty($empl_id)) {
            $employee_data = Employee::select('employees.*',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->where('ID',$empl_id)->first();

            $employee_data->groups = DB::table('employee_groups')->join('groups','employee_groups.group_id','groups.id')->where('employee_groups.employee_id',$empl_id)->pluck('name');


            $employee_data->drafts = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('employees.ID',$empl_id)->latest('messages.created_at')->get()->take('10');
        }   

        if ($request->has('filter_name')) {
            $employees2->where('employees.name','LIKE', '%'.$request->input('filter_name').'%');
        }

        if($request->has('filter_email')) {  
            $employees2->where('employees.email','LIKE', '%'.$request->input('filter_email').'%');
        }

        if($request->has('filter_mobile')) {
            $employees2->where('employees.mobile', $request->input('filter_mobile'));
        }

        $employees = $employees2->get()->take(10);

        foreach ($employees as $key => $value) {
            $employees[$key]->groups = DB::table('employee_groups')->join('groups','employee_groups.group_id','groups.id')->where('employee_groups.employee_id',$value->ID)->pluck('name');
        }


        if($request->has('filter_group')) {
            if($request->has('filter_group') != 'all') {
                foreach ($employees as $key => $value) {
                    if (!in_array($request->input('filter_group'), $value['groups']->toArray())) {
                        unset($employees[$key]);
                        continue;
                    }
                }
            }
        }

        // $messages2 = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('is_sent',0)->latest('messages.created_at');

        $messages2 = Message::where('is_sent',0)->latest('messages.created_at');

        $draft_name = $request->input('draft-name');
        $draft_email = $request->input('draft-email');
        $draft_mobile = $request->input('draft-mobile');     
        $draft_subject = $request->input('draft-subject');     
        $draft_employee_id = $request->input('draft-employee-id');     

        if ($request->has('draft-name')) {
            $messages2->where('messages.name','LIKE', '%'.$request->input('draft-name').'%');
        }

        if ($request->has('draft-subject')) {
            $messages2->where('messages.subject','LIKE', '%'.$request->input('draft-subject').'%');
        }

        if ($request->has('draft-employee-id')) {
            $messages2->where('messages.reciver_id',$request->input('draft-employee-id'));
        }

        if($request->has('draft-email')) {  
            $messages2->where('messages.email','LIKE', '%'.$request->input('draft-email').'%');
        }

        if($request->has('draft-mobile')) {
            $messages2->where('messages.mobile','LIKE', '%'.$request->input('draft-mobile').'%');
        }

        $messages = $messages2->paginate(10);

        // echo "<pre>";print_r($messages->toArray());"</pre>";exit;

        // echo "<pre>";print_r(compact('searched_data','employees','messages','employee_list','employee_data','filter_name','filter_mobile','filter_email','filter_group','draft_name','draft_mobile','draft_email','draft_subject','draft_employee_id','emp_id'));"</pre>";exit;


        if (isset($emp_id) && !empty($emp_id)) {
            $employee_data = Employee::select('employees.*',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->where('ID',$emp_id)->first();

            $employee_data->groups = DB::table('employee_groups')->join('groups','employee_groups.group_id','groups.id')->where('employee_groups.employee_id',$emp_id)->pluck('name');

            $employee_data->drafts = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('employees.ID',$emp_id)->latest('messages.created_at')->get()->take('10');
        }   
    
        $group_employees = Employee::distinct('Department')->oldest('Department')->get(['Department']);

        foreach ($group_employees as $key => $department) {
            $group_employees[$key]->employees = Employee::where('Department',$department->Department)->get()->take(12);
        }

        $all_employees = Employee::paginate(12);
         $data = '';
        if ($request->ajax()) {
            if (isset($request->department) && ($request->department != 'All') && (!isset($request->keyword))) {
                $all_employees = Employee::where('Department',$request->department)->paginate(12);
            }

            if (isset($request->keyword)) {
                if ($request->department == 'All') {
                    $all_employees = Employee::Where(function($query) use ($s)
                    {
                        $query->where('NameFirst', 'like', '%'.$s.'%')
                        ->orwhere('NamesMiddle', 'like', '%'.$s.'%')
                        ->orwhere('NameLast', 'like', '%'.$s.'%')
                        ->orwhere('Searchword', 'like', '%'.$s.'%')
                        ->orwhere('Phonenumber', 'like', '%'.$s.'%')
                        ->orwhere('Mobilephone', 'like', '%'.$s.'%')
                        ->orwhere('PersonalEmail', 'like', '%'.$s.'%')
                        ->orWhere(DB::raw("CONCAT('NameFirst', ' ', 'NamesMiddle', ' ', 'NameLast')"), 'like', '%'.$s.'%');
                    })->paginate(12);
                }else{
                    $all_employees = Employee::where('Department',$request->department)->Where(function($query) use ($s)
                    {
                        $query->where('NameFirst', 'like', '%'.$s.'%')
                        ->orwhere('NamesMiddle', 'like', '%'.$s.'%')
                        ->orwhere('NameLast', 'like', '%'.$s.'%')
                        ->orwhere('Searchword', 'like', '%'.$s.'%')
                        ->orwhere('Phonenumber', 'like', '%'.$s.'%')
                        ->orwhere('Mobilephone', 'like', '%'.$s.'%')
                        ->orwhere('PersonalEmail', 'like', '%'.$s.'%')
                        ->orWhere(DB::raw("CONCAT('NameFirst', ' ', 'NamesMiddle', ' ', 'NameLast')"), 'like', '%'.$s.'%');
                    })->paginate(12);
                }

                if (count($all_employees) > 0) {
                    if (!isset($request->page)) {
                        if (strlen($keyword) > 3) {
                            MostSearchedKeyword::insert(['keyword' => $keyword]);
                        }
                    }
                }
            }

            $count = 1;
            foreach ($all_employees as $key => $all_employee) {

                $data.='<div class="col-sm-4">
                                <div class="profile-grid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="profileimg">
                                                <img src="'.asset('img/proimage.png').'" alt="Profile" class="img-fluid">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="profiledisc">
                                                <div class="protitle"><a class="click-profile" data-id="'.$all_employee->ID.'">'.$all_employee->NameFirst.' '.$all_employee->NamesMiddle.' '.$all_employee->NameLast.'</a></div>
                                                <div class="propost">'.$all_employee->Department.'</div>
                                                <div class="posttag">Sales, Management</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="contactno">
                                                <span>'.$all_employee->Mobilephone.'</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 calendarpadding">
                                            <div class="calendarinfo">
                                                Calendar Info
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            if((count($all_employees) == $count ) || ($count % 3 == 0)) {
                            $data.='<div class="profile-info" style="display:none;">My Profile</div>';
                            }
                            $count++;
            }
            return $data;
        }

        // echo "<pre>";print_r($group_employees->toArray());"</pre>";exit;
        
        return view('home', compact('searched_data','employees','messages','employee_list','employee_data','filter_name','filter_mobile','filter_email','filter_group','draft_name','draft_mobile','draft_email','draft_subject','draft_employee_id','emp_id','group_employees','all_employees','keyword','group_id','group_id','emp_id','notes'));
    }


    public function sendMessageWoc(Request $request)
    {
        $data = Message::where('id',$request->id)->first();

        if (isset($data->reciver_id) && !empty($data->reciver_id)) {
            $employee = Employee::select('PersonalEmail','NameFirst','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$data->reciver_id)->first();

            $email = $employee->PersonalEmail;
            $mob_num = $employee->Mobilephone;
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);


            $details = [
                'greeting' => $employee->name,
                'subject' => $data->subject,
                'body' => $data->body,
                'name' => $data->name,
                'email' => $data->email,
                'mobile' => $data->mobile,
            ];

            \Notification::send($user, new Draft($details));

            Message::where('id',$request->id)->update(['is_sent' => 1]);

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile";

            if ($employee->SendMessage == 1) {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.sms.to/sms/send?api_key=QMOszp1DsHtNdMJhcQAy5fGvMD1u38Zn&bypass_optout=true&to=+919026574061&message=This is test and %0A this is a new line&sender_id=smsto",  
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // $response;
            }


        }

        $arr = array('success'=>true,'message' => 'Message sended successfully!');
        return Response()->json($arr);
    }


    public function saveSendDraft(Request $request)
    {
        $check = Message::create($request->except('_token'));

        if (isset($request->reciver_id) && !empty($request->reciver_id)) {
            $employee = Employee::select('PersonalEmail','NameFirst','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$request->reciver_id)->first();

            $email = $employee->PersonalEmail;
            // $email = 'er.krishna.mishra@gmail.com';
            $mob_num = $employee->Mobilephone;
            // $mob_num = '9026574061';
            $c = '2244';
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);


            $details = [
                'greeting' => $name,
                'subject' => $request->subject,
                'body' => $request->body,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ];

            \Notification::send($user, new Draft($details));

            Message::where('id',$request->id)->update(['is_sent' => 1]);

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile";

            if ($employee->SendMessage == 1) {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.sms.to/sms/send?api_key=QMOszp1DsHtNdMJhcQAy5fGvMD1u38Zn&bypass_optout=true&to=+919026574061&message=This is test and %0A this is a new line&sender_id=smsto",  
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // $response;
            }

        }

        $arr = array('success'=>true,'message' => 'Message sended successfully!');
        return Response()->json($arr);
    }


    public function updateDraftForm(Request $request)
    {
        $check = Message::where('id',$request->id)->update($request->except('_token'));

        $arr = [];
        if($check){ 

            $arr = array('success'=>true,'message' => 'Draft updated successfully!');
        }

        if (isset($request->reciver_id) && !empty($request->reciver_id)) {
            $employee = Employee::select('PersonalEmail','NameFirst','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$request->reciver_id)->first();

            $email = $employee->PersonalEmail;
            $mob_num = $employee->Mobilephone;
            $c = '2244';
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);

            $details = [
                'greeting' => $name,
                'subject' => $request->subject,
                'body' => $request->body,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ];

            \Notification::send($user, new Draft($details));

            Message::where('id',$request->id)->update(['is_sent' => 1]);

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            if ($employee->SendMessage == 1) {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.sms.to/sms/send?api_key=QMOszp1DsHtNdMJhcQAy5fGvMD1u38Zn&bypass_optout=true&to=+919026574061&message=This is test and %0A this is a new line&sender_id=smsto",  
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // $response;
            }
        }

        $arr = array('success'=>true,'message' => 'Message Sended successfully!');
        return Response()->json($arr);
    }

  public function sendMessageToEmployee(Request $request)
    {
            $employee = Employee::select('Department','PersonalEmail','NameFirst','GroupPhone','GroupEmail','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$request->id)->first();
  
            $email = $employee->PersonalEmail;
            $mob_num = $employee->Mobilephone;
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);

            $List = implode(' | ', @$request->message_type);

            $user_name = $request->name;
            $user_email = $request->email;
            $user_mobile = $request->mobile;


            $details = [
                'greeting' => 'Hi '.$name,
                'body' => $List,
                'text' => "We have today at 14.13 talked with $user_name($user_mobile)",
                'message' => $request->body,
                'mobile' => 'Phone number: '.$request->mobile,
            ];

            \Notification::send($user, new SendEmpMessage($details));

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            if ($employee->SendMessage == 1) {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.sms.to/sms/send?api_key=QMOszp1DsHtNdMJhcQAy5fGvMD1u38Zn&bypass_optout=true&to=+919026574061&message=This is test and %0A this is a new line&sender_id=smsto",  
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // $response;
            }

        $arr = array('success'=>true,'message' => 'Message sended successfully!');
        return Response()->json($arr);
    }

    public function sendMessage(Request $request)
    {
        if ($request->department == 'all') {
            $employees = Employee::select('Department','PersonalEmail','NameFirst','GroupPhone','GroupEmail','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->get();
        }else{
            $employees = Employee::select('Department','PersonalEmail','NameFirst','GroupPhone','GroupEmail','SendMessage',DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('Department',$request->department)->get();
        }

        foreach ($employees as $key => $employee) {
  
            $email = $employee->PersonalEmail;
            $mob_num = $employee->Mobilephone;
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);

            $List = implode(' | ', $request->message_type);


            $details = [
                'greeting' => 'Hi '.$name,
                'body' => $List,
                'text' => "We have today at 14.13 talked with $name"
            ];

            \Notification::send($user, new SendMessage($details));

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            if ($employee->SendMessage == 1) {

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.sms.to/sms/send?api_key=QMOszp1DsHtNdMJhcQAy5fGvMD1u38Zn&bypass_optout=true&to=+919026574061&message=This is test and %0A this is a new line&sender_id=smsto",  
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // $response;

            }
            break;
        }
        $arr = array('success'=>true,'message' => 'Message sended to all!');
        return Response()->json($arr);
    }


    public function saveEvent(Request $request)
    {

         $input = $request->all();
    $date_from = $input['from_date'];
    $date_to = $input['to_date'];
    $time_from = $input['from_time'];
    $time_to = $input['to_time'];
    $start = date('Y-m-d H:i:s', strtotime("$date_from $time_from"));
    $end = date('Y-m-d H:i:s', strtotime("$date_to $time_to"));
    $input['start'] = $start;
    $input['end'] = $end;
    if ($request->message_status == 'on') {
        $input['message_status'] = 1;
    }

        $check = CalendarInformation::create($input);

        $arr = [];
        if($check){ 

            $arr = array('success'=>true,'message' => 'Event saved successfully!');

        }

       
        return Response()->json($arr);
    }

    public function saveDraft(Request $request)
    {
        $check = Message::create($request->all());

        $arr = [];
        if($check){ 

            $arr = array('success'=>true,'message' => 'Draft saved successfully!');

        }

        return Response()->json($arr);
    }

    public function empInfo(Request $request)
    {
        $id = $request->id;

        $employee = Employee::where('ID',$id)->first();

        $employee_drafts = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('employees.ID',$id)->latest('messages.created_at')->paginate(10);

        $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');

        // echo "<pre>";print_r(compact('id','employee','employee_list','employee_drafts'));"</pre>";exit;

        return view('emp_profile', compact('id','employee','employee_list','employee_drafts'));
    }


    public function updateDraft(Request $request)
    {
        $id = $request->id;
        $message = Message::where('id',$id)->first();
        if ($message->reciver_id) {
            $message->reciver_name = Employee::select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$message->reciver_id)->first()->name;
        }else{
            $message->reciver_name = '';
        }

        $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');
        
        return view('update_draft', compact('id','message','employee_list'));    
    }

    public function editDraft(Request $request)
    {
        $id = $request->id;
        $message = Message::where('id',$id)->first();
        if ($message->reciver_id) {
            $message->reciver_name = Employee::select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$message->reciver_id)->first()->name;
        }else{
            $message->reciver_name = '';
        }

       $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');

        return view('edit_draft', compact('id','message','employee_list'));    
    }

    public function getDraftEmp(Request $request)
    {
        $messages2 = Message::latest('messages.created_at');

        $draft_name = $request->input('draft-name');
        $draft_email = $request->input('draft-email');
        $draft_mobile = $request->input('draft-mobile');     
        $draft_subject = $request->input('draft-subject');     
        $draft_employee_id = $request->input('draft-reciver_id'); 


        if ($request->has('draft-name') && !empty($request->input('draft-name'))) {
            $messages2->where('name','LIKE', '%'.$request->input('draft-name').'%');
        }

        if ($request->has('draft-subject') && !empty($request->input('draft-subject'))) {
            $messages2->where('subject','LIKE', '%'.$request->input('draft-subject').'%');
        }

        if ($request->has('draft-reciver_id') && !empty($request->input('draft-reciver_id'))) {
            $messages2->where('reciver_id', $request->input('draft-reciver_id'));
        }

        if($request->has('draft-email') && !empty($request->input('draft-email'))) {  
            $messages2->where('email','LIKE', '%'.$request->input('draft-email').'%');
        }

        if($request->has('draft-mobile') && !empty($request->input('draft-mobile'))) {
            $messages2->where('mobile','LIKE', '%'.$request->input('draft-mobile').'%');
        }

        $posts = $messages2->paginate(10);

        if ($request->ajax()) {
            $html = '';

            foreach ($posts as $post) {
                $html.='<tr class="editshowhide" data-id="'.$post->id.'">
                <td class="title">'. $post->name .'</td>
                <td class="comment">'. $post->body .'</td>
                <td class="time">'. date('h:i A',strtotime($post->created_at)) .'</td>
                </tr>';
            }

            return $html;
        }

        return view('post');
    }

    public function getDraft(Request $request)
    {
        $messages2 = Message::where('is_sent',0)->latest('messages.created_at');

        $draft_name = $request->input('draft-name');
        $draft_email = $request->input('draft-email');
        $draft_mobile = $request->input('draft-mobile');     
        $draft_subject = $request->input('draft-subject');     
        $draft_employee_id = $request->input('draft-reciver_id'); 


        if ($request->has('draft-name') && !empty($request->input('draft-name'))) {
            $messages2->where('name','LIKE', '%'.$request->input('draft-name').'%');
        }

        if ($request->has('draft-subject') && !empty($request->input('draft-subject'))) {
            $messages2->where('subject','LIKE', '%'.$request->input('draft-subject').'%');
        }

        if ($request->has('draft-reciver_id') && !empty($request->input('draft-reciver_id'))) {
            $messages2->where('reciver_id', $request->input('draft-reciver_id'));
        }

        if($request->has('draft-email') && !empty($request->input('draft-email'))) {  
            $messages2->where('email','LIKE', '%'.$request->input('draft-email').'%');
        }

        if($request->has('draft-mobile') && !empty($request->input('draft-mobile'))) {
            $messages2->where('mobile','LIKE', '%'.$request->input('draft-mobile').'%');
        }

        $posts = $messages2->paginate(10);

        if ($request->ajax()) {
            $html = '';

            foreach ($posts as $post) {
                $html.='<tr class="editshowhide" data-id="'.$post->id.'">
                <td class="title">'. $post->name .'</td>
                <td class="comment">'. $post->body .'</td>
                <td class="time">'. date('h:i A',strtotime($post->created_at)) .'</td>
                </tr>';
            }

            return $html;
        }

        return view('post');
    }

    public function draftFilter(Request $request)
    {
        $messages2 = Message::where('is_sent',0)->latest('created_at');

        if ($request->has('draft-name') && !empty($request->input('draft-name'))) {
            $messages2->where('name','LIKE', '%'.$request->input('draft-name').'%');
        }

        if ($request->has('draft-subject') && !empty($request->input('draft-subject'))) {
            $messages2->where('subject','LIKE', '%'.$request->input('draft-subject').'%');
        }

        if ($request->has('draft-reciver_id') && !empty($request->input('draft-reciver_id'))) {
            $messages2->where('reciver_id', $request->input('draft-reciver_id'));
        }

        if($request->has('draft-email') && !empty($request->input('draft-email'))) {  
            $messages2->where('email','LIKE', '%'.$request->input('draft-email').'%');
        }

        if($request->has('draft-mobile') && !empty($request->input('draft-mobile'))) {
            $messages2->where('mobile','LIKE', '%'.$request->input('draft-mobile').'%');
        }
        $posts = $messages2->paginate(10);

        $html = '';

        /*if ($posts->total() == 0) {
          return $html.='<tr>
            <td colspan="3" style="color:red;"><center>Search results not found</center></td>
            </tr>';
        }*/

        foreach ($posts as $post) {

            $html.='<tr class="editshowhide" data-id="'.$post->id.'">
            <td class="title">'. $post->name .'</td>
            <td class="comment">'. $post->body .'</td>
            <td class="time">'. date('h:i A',strtotime($post->created_at)) .'</td>
            </tr>';
        }

        return $html;
    }

    public function calendarInfo(Request $request)
    {
        if(request()->ajax())
        {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');

            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $mc = CalendarInformation::select('calendar_informations.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','calendar_informations.employee_id')->where('employee_id',$request->emp_id)->whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get();      

            foreach ($mc as $key => $data) {
                $mc[$key]->title = $data->event_activity;
                $mc[$key]->from_date = date('d-m-Y',strtotime($data->from_date));
                $mc[$key]->to_date = date('d-m-Y',strtotime($data->to_date));
                $mc[$key]->from_time = date('h:i A',strtotime($data->from_time));
                $mc[$key]->to_time = date('h:i A',strtotime($data->to_time));
                $mc[$key]->message_status = ($data->message_status) ? 'On' : 'Off';
            }

            return Response::json($mc);

        }
    }

    public function editProfile(Request $request)
    {
        $id = $request->id;

        $employee = Employee::select('employees.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as name"))->where('ID',$id)->first();

        $employee_drafts = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('employees.ID',$id)->latest('messages.created_at')->paginate(10);

        $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');

        $departments = Employee::distinct()->get('Department')->pluck('Department');

        return view('edit_profile', compact('id','employee','employee_list','employee_drafts','departments'));
    }

    public function updateProfile(Request $request)
    {
        $updated = Employee::where('ID',$request->id)->update($request->except(['_token','id']));

        if ($updated) {
            $arr = array('success'=>true,'message' => 'Profile updated successfully!');
        }else{
            $arr = array('success'=>false,'message' => 'Profile updated successfully!');
        }

        return Response()->json($arr);
    }
    
    public function destroy($id)
    {
      $task=Note::find($id);
      $task->delete();
      return back()->with('success','Task deleted successfully');
  }    

  public function getMoreKeywords(Request $request)
  {
    $searched_data =  MostSearchedKeyword::select('id',DB::raw('count(keyword) as keyword_count'), 'keyword')->groupBy('keyword')
    ->having(DB::raw('count(keyword)'), '>', 3)
    ->orderBy(DB::raw('count(keyword)'), 'desc')
    ->paginate(25); 
    if ($request->ajax()) {
        $html = '';
        
        foreach ($searched_data as $post) {

            $html.='<li>
            <div class="radio">
            <label>
            <input type="radio" class="btn-check" name="btnradio" autocomplete="off">        
            <span class="forcustom">'. $post->keyword .'</span>
            <span class="counter">'. $post->keyword_count .'</span>
            </label>
            </div>
            </li>';
        }

        return $html;
    }

    return view('post');
}

}
