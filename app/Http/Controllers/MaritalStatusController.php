<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MaritalStatus;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['marital_status'] = MaritalStatus::paginate(10);

        return view('marital_status.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marital_status.create');
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

        $marital_status = new MaritalStatus();

        if ($marital_status->create($validatedData))
        {
            return redirect()->back()->with('success', 'Marital Status successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Marital Status was not successfully added to the System');
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
        $data['marital_status']  = MaritalStatus::find($id);

        if ($data['marital_status'])
        {
            return view('marital_status.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Marital Status not found');
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
        $data['marital_status']  = MaritalStatus::find($id);

        if ($data['marital_status'])
        {
            //dd($data);
            return view('marital_status.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Marital Status no longer exists in the database');
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

        $marital_status = MaritalStatus::find($id);

        if ($marital_status)
        {
            $marital_status->update($validatedData);

            return redirect()->back()->with('success', 'Marital Status successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Marital Status was not successfully updated');
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
        if (MaritalStatus::destroy($id))
        {
            return redirect()->back()->with('success', 'Marital Status successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Marital Status was not successfully removed from the system');
        }
    }
}
