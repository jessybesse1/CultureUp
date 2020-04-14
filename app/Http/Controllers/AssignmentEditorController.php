<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentEditorController extends Controller
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
        return view('BookEngine.Editor.Assignment.CreateAssignment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $assignment = new assignment();
        $this->saveInfoToDB($request, $assignment);

        dd($assignment);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\assignment $current
     * @return \Illuminate\Http\Response
     */
    public function show(assignment $current)
    {
        $assignment = $current;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\assignment $current
     * @return \Illuminate\Http\Response
     */
    public function edit(assignment $current)
    {
        $assignment = $current;



        return view('BookEngine.Editor.Assignment.EditAssignment', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\assignment $current
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assignment $current)
    {
        dd($request);
        $assignment = $current;
        $this->saveInfoToDB($request, $assignment);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\assignment $current
     * @return \Illuminate\Http\Response
     */
    public function destroy(assignment $current)
    {
        $assignment = $current;

    }

    /**
     * Save The new info to the DataBase
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\assignment $assignment
     */
    private function saveInfoToDB($request, $assignment){
        dd($request);
        $request->validate([
            'title' => 'required|string',
            'subject' => 'required|string',
            'isHidden'=> 'in:on',
            'isLocked'=> 'in:on',

        ]);

        $assignment->name = request('title');
        $assignment->subject = request('subject');
        $assignment->course_id  = 1;
        $assignment->teacher_id = 1;
        $assignment->createdBy = 1;
        $assignment->isHidden = ((request('isHidden')== 'on') ? true : false);
        $assignment->isLocked = ((request('isLocked')== 'on') ? true : false);

        $assignment->save();
        dd($request);
    }

    public function refreshToken(Request $request)
    {
        session()->regenerate();
        return response()->json([
            "token"=>csrf_token()],
            200);

    }
}



