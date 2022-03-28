<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gender;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gender'] = Gender::paginate(10);

        return view('gender.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gender.create');
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
            'option' => 'required|max:100',
        ]);

        //dd($validatedData);

        $gender = new Gender();

        if ($gender->create($validatedData))
        {
            return redirect()->back()->with('success', 'Gender Option successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Gender option was not successfully added to the System');
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
        $data['gender']  = Gender::find($id);

        if ($data['gender'])
        {
            return view('gender.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Gender not found');
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
        $data['gender']  = Gender::find($id);

        if ($data['gender'])
        {
            //dd($data);
            return view('gender.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Gender no longer exists in the database');
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
            'option' => 'required|max:100'
        ]);

        $gender = Gender::find($id);

        if ($gender)
        {
            $gender->update($validatedData);

            return redirect()->back()->with('success', 'Gender details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Gender details was not successfully updated');
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
        if (Gender::destroy($id))
        {
            return redirect()->back()->with('success', 'Gender successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Gender was not successfully removed from the system');
        }
    }
}
