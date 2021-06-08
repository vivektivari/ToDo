<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $projects = Project::paginate('5');
         return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            'image'=>'required|image|mimes:png,jpg|max:2048',


        ]);


        $title = $request->title;
        $detail = $request->detail;
        $imgName =  $request->file('image');
        $new_img_name = rand() . '.' . $imgName->getClientOriginalExtension();
        $imgName->storeAs('public/images', $new_img_name);



        $project=new Project();
        $project->title=$title;
        $project->detail= $detail;
        $project->image= $new_img_name;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect(route('projects.index'))->with('status','Your new project has been created succesfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = Project::find(1)->task;
       // dd($tasks);
      return view('project.single-project', compact('project' ,'tasks'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required|max:255',
            'image'=>'required|image|mimes:png,jpg|max:2048',


        ]);


        $title = $request->title;
        $detail = $request->detail;
        $imgName =  $request->file('image');
        $new_img_name = rand() . '.' . $imgName->getClientOriginalExtension();
        $imgName->storeAs('public/images', $new_img_name);


        Storage::delete('public/images/'.$project->image);


        $project->title=$title;
        $project->detail= $detail;
        $project->image= $new_img_name;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect(route('projects.index'))->with('status','Your new project has been updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       $img= $project->image;


        $project->delete();
        Storage::delete('public/images/'.$img);
        return redirect(route('projects.index'))->with('status','Post deleted successfully!');
    }
}
