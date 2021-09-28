<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use DB;
use App\Models\Employee;
use App\Models\Message;
use App\User;
use App\Models\Group;
use App\Models\EmployeeGroup;
use App\Notifications\Draft;
use App\Notifications\SendMessage;

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
        ->having(DB::raw('count(keyword)'), '>', 0)
        ->orderBy(DB::raw('count(keyword)'), 'desc')
        ->get()->take('20'); 

        $employee_list = Employee::latest('MetaTimeCreated')->select(DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"),'ID')->get()->pluck('emp_name','ID');

        $employees2 = Employee::latest('MetaTimeCreated');

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

        // echo "<pre>";print_r($messages);"</pre>";exit;

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
                        MostSearchedKeyword::insert(['keyword' => $keyword]);
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
                            if(($count > 2) && ($count % 3 == 0)) {
                            $data.='<div class="profile-info" style="display:none;">My Profile</div>';
                            }else{
                                 $data.='<div class="profile-info" style="display:none;">My Profile</div>';
                            }
                            $count++;
            }
            return $data;
        }

        // echo "<pre>";print_r($group_employees->toArray());"</pre>";exit;
        
        return view('home', compact('searched_data','employees','messages','employee_list','employee_data','filter_name','filter_mobile','filter_email','filter_group','draft_name','draft_mobile','draft_email','draft_subject','draft_employee_id','emp_id','group_employees','all_employees','keyword','group_id','group_id','emp_id'));
    }


    public function updateDraftForm(Request $request)
    {
        /*$check = Message::where('id',$request->id)->update($request->except('_token'));

        $arr = [];
        if($check){ 

            $arr = array('success'=>true,'message' => 'Draft updated successfully!');

        }*/

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
                'greeting' => 'Hi'.$name,
                'subject' => $request->subject,
                'body' => $request->body,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ];

            \Notification::send($user, new Draft($details));

            Message::where('id',$request->id)->update(['is_sent' => 1]);

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            // $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text=Your%20one%20time%20password%20to%20activate%20your%20account%20is%20{$c}&route=2";

            /*if ($employee->SendMessage == 1) {

                $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text={$messages}&route=2";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch);   
                $output = json_decode($output);
                curl_close($ch);
            }*/
        }

        $arr = array('success'=>true,'message' => 'Draft updated successfully!');
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
            // $email = 'er.krishna.mishra@gmail.com';
            $mob_num = $employee->Mobilephone;
            // $mob_num = '9026574061';
            $c = '2244';
            $name = $employee->name;
            $name_emp = $employee->NameFirst;
            $user = User::make(['email' => $email, 'name' => $name]);

            $List = implode(' | ', $request->message_type);


            $details = [
                'greeting' => 'Hi'.$name,
                'body' => $List,
                'text' => "We have today at 14.13 talked with $name"
            ];

            \Notification::send($user, new SendMessage($details));

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            // $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text=Your%20one%20time%20password%20to%20activate%20your%20account%20is%20{$c}&route=2";

            if ($employee->SendMessage == 1) {

                // $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text={$messages}&route=2";

                /*$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch);   
                $output = json_decode($output);
                curl_close($ch);*/
            }
            break;
        }
        $arr = array('success'=>true,'message' => 'Message sended to all!');
        return Response()->json($arr);
    }

    public function saveDraft(Request $request)
    {
        $check = Message::create($request->all());

        $arr = [];
        if($check){ 

            $arr = array('success'=>true,'message' => 'Draft saved successfully!');

        }

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
                'greeting' => 'Hi'.$name,
                'subject' => $request->subject,
                'body' => $request->body,
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ];

            \Notification::send($user, new Draft($details));

            Message::where('id',$check->id)->update(['is_sent' => 1]);

            $messages = "Hi $name_emp URGENT We have today at 14.13 talked with $request->name $request->body Phone number: $request->mobile"; 

            // $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text=Your%20one%20time%20password%20to%20activate%20your%20account%20is%20{$c}&route=2";

            if ($employee->SendMessage == 1) {

                $url = "http://login.pacttown.com/api/mt/SendSMS?user=N2RTECHNOLOGIES&password=994843&senderid=NTRTEC&channel=Trans&DCS=0&flashsms=0&number={$mob_num}&text={$messages}&route=2";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch);   
                $output = json_decode($output);
                curl_close($ch);
            }
        }


        return Response()->json($arr);
        return redirect()->back()->with("message", "Draft saved successfully!");
    }

    public function empInfo(Request $request)
    {
        $id = $request->id;

        $employee = Employee::where('ID',$id)->first();

        $employee->drafts = Message::select('messages.*', DB::raw("CONCAT(NameFirst, ' ', NamesMiddle, ' ', NameLast) as emp_name"))->join('employees','employees.ID','messages.reciver_id')->where('employees.ID',$id)->latest('messages.created_at')->paginate(10);

        return view('emp_profile', compact('id','employee'));
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

        // echo "<pre>";print_r($message);"</pre>";exit;

        return view('edit_draft', compact('id','message'));    
    }

    public function getDraft(Request $request)
    {
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

        $posts = $messages2->paginate(10);

        // $posts = Message::where('is_sent',0)->latest('messages.created_at')->paginate(10);

        if ($request->ajax()) {
            $html = '';

            foreach ($posts as $post) {
                $html.='<tr class="editshowhide" data-id="'.$post->id.'">
                <td class="title">'. $post->subject .'</td>
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
        $messages2 = Message::where('is_sent',0)->latest('messages.created_at');

        $draft_name = $request->input('draft-name');
        $draft_email = $request->input('draft-email');
        $draft_mobile = $request->input('draft-mobile');     
        $draft_subject = $request->input('draft-subject');     
        $draft_employee_id = $request->input('draft-reciver_id');     

        if ($request->has('draft-name')) {
            $messages2->where('messages.name','LIKE', '%'.$request->input('draft-name').'%');
        }

        if ($request->has('draft-subject')) {
            $messages2->where('messages.subject','LIKE', '%'.$request->input('draft-subject').'%');
        }

        if ($request->has('[draft-reciver_id')) {
            $messages2->where('messages.reciver_id',$request->input('draft-reciver_id'));
        }

        if($request->has('draft-email')) {  
            $messages2->where('messages.email','LIKE', '%'.$request->input('draft-email').'%');
        }

        if($request->has('draft-mobile')) {
            $messages2->where('messages.mobile','LIKE', '%'.$request->input('draft-mobile').'%');
        }
        $posts = $messages2->paginate(10);

        $html = '';

        foreach ($posts as $post) {

            $html.='<tr class="editshowhide" data-id="'.$post->id.'">
            <td class="title">'. $post->subject .'</td>
            <td class="comment">'. $post->body .'</td>
            <td class="time">'. date('h:i A',strtotime($post->created_at)) .'</td>
            </tr>';
        }

        return $html;
    }

}
