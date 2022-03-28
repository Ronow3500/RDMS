<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmploymentStatus;

class EmploymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employment_status'] = EmploymentStatus::paginate(10);

        return view('employment_status.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employment_status.create');
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

        $employment_status = new EmploymentStatus();

        if ($employment_status->create($validatedData))
        {
            return redirect()->back()->with('success', 'Employment Status Option successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Employment Status option was not successfully added to the System');
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
        $data['employment_status']  = EmploymentStatus::find($id);

        if ($data['employment_status'])
        {
            return view('employment_status.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Employment Status not found');
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
        $data['employment_status']  = EmploymentStatus::find($id);

        if ($data['employment_status'])
        {
            //dd($data);
            return view('employment_status.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Employment Status no longer exists in the database');
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

        $employment_status = EmploymentStatus::find($id);

        if ($employment_status)
        {
            $employment_status->update($validatedData);

            return redirect()->back()->with('success', 'Employment Status details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Employment Status details was not successfully updated');
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
        if (EmploymentStatus::destroy($id))
        {
            return redirect()->back()->with('success', 'Employment Status successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Employment Status was not successfully removed from the system');
        }
    }
}
