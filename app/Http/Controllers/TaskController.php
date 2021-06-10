<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $tasks = Task::all();
        return view('task.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $pid)
    {
        // dd($pid->project_id);
        $project_id = $pid->project_id;
        return view('task.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required|max:255',
            'project_id' => 'required|integer',

        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->project_id = $request->project_id;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect(route('projects.show', $request->project_id))->with('status', 'Your new task has been created succesfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $project_id = $task->project_id;
        return view('task.single-task', compact('task', 'project_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task, Request $req)
    {

        return view('task.edit', compact('task'));
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
        ]);

        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->save();

        return redirect(route('projects.show', $task->project_id))->with('status', 'Your new task has been updated succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $pid = $task->project_id;
        $task->delete();

        return redirect(route('projects.show', $pid))->with('status', 'Task deleted successfully!');
    }
}
