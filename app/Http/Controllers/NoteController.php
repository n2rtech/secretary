<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if (isset($request->id) && !empty($request->id)) {
            Note::where('id',$request->id)->update($request->except(['_token','id']));
            $arr = array('success'=>true,'message' => 'Note updated successfully!');
            return Response()->json($arr);
        }
        Note::create($input);
        $arr = array('success'=>true,'message' => 'Note created successfully!');
        return Response()->json($arr);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function getData(Request $request)
    {
        $note = Note::find($request->id);
        $arr = array('success'=>true,'message' => 'Message sended successfully!');
        return Response()->json($note->note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "<pre>";print_r('sdd');"</pre>";exit;
      $task=Note::find($id);
      $task->delete();
      return back()->with('success','Task deleted successfully');
  }
}
