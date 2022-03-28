<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AgeGroup;

class AgeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['age_group'] = AgeGroup::paginate(10);

        return view('age_group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('age_group.create');
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
            'range' => 'required|max:100',
        ]);

        //dd($validatedData);

        $age_group = new AgeGroup();

        if ($age_group->create($validatedData))
        {
            return redirect()->back()->with('success', 'Age Group successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Age Group was not successfully added to the System');
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
        $data['age_group']  = AgeGroup::find($id);

        if ($data['age_group'])
        {
            return view('age_group.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! AgeGroup not found');
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
        $data['age_group']  = AgeGroup::find($id);

        if ($data['age_group'])
        {
            //dd($data);
            return view('age_group.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Age Group no longer exists in the system');
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
            'name' => 'required|max:100'
        ]);

        $age_group = AgeGroup::find($id);

        if ($age_group)
        {
            $age_group->update($validatedData);

            return redirect()->back()->with('success', 'Age Group successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Age Group was not successfully updated');
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
        if (AgeGroup::destroy($id))
        {
            return redirect()->back()->with('success', 'Age Group successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Age Group was not successfully removed from the system');
        }
    }
}
