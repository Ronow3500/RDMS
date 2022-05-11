<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['project'] = Project::paginate(10);

        return view('project.index', $data);
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);
        //dd($validatedData);

        if ($validatedData)
        {
            $project = new Project();

            $project->create([
                'name' => $request->name,
                'created_by' => auth()->user()->name,
            ]);

            return redirect()->back()->with('success', 'Project successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('warning', 'Project was not  added to the System');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['project']  = Project::find($id);

        if ($data['project'])
        {
            return view('project.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Project not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['project']  = Project::find($id);

        if ($data['project'])
        {
            //dd($data);
            return view('project.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Project no longer exists in the system');
        }
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
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'updated_by' => auth()->user()->name,
        ]);

        $project = Project::find($id);

        if ($project)
        {
            $project->update($validatedData);

            return redirect()->back()->with('success', 'Project successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Project was not successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Project::destroy($id))
        {
            return redirect()->back()->with('danger', 'Project successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Project was not successfully removed from the system');
        }
    }
}
