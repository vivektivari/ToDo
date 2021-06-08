<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//  $tasks = Task::find(1)->project;
//         dd($tasks);
        $tasks = Task::paginate('5');
        return view('task.index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required|max:255',
            'user_id'=> 'required|integer',
            'project_id'=> 'required | integer',



        ]);


        $task=new Task();
        $task->title=$title;
        $task->detail= $detail;
        //$task->project_id = ;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect(route('tasks.index'))->with('status','Your new task has been created succesfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.single-task', compact('task'));

        // pass a variable to get project id


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required|max:255',
            'user_id'=> 'required|integer',
            'project_id'=> 'required | integer',


        ]);


        $task=new Task();
        $task->title=$title;
        $task->detail= $detail;
      //  $task->project_id = ;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect(route('tasks.index'))->with('status','Your new task has been created succesfully!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $project->delete();

        return redirect(route('tasks.index'))->with('status','task deleted successfully!');
    }
}
