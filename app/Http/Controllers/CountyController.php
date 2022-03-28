<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\County;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['county'] = County::paginate(10);

        return view('county.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('county.create');
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

        $county = new County();

        if ($county->create($validatedData))
        {
            return redirect()->back()->with('success', 'County successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'County was not successfully added to the System');
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
        $data['county']  = County::find($id);

        if ($data['county'])
        {
            return view('county.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! County not found');
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
        $data['county']  = County::find($id);

        if ($data['county'])
        {
            //dd($data);
            return view('county.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! County no longer exists in the database');
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

        $county = County::find($id);

        if ($county)
        {
            $county->update($validatedData);

            return redirect()->back()->with('success', 'County successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'County was not successfully updated');
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
        if (County::destroy($id))
        {
            return redirect()->back()->with('success', 'County successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'County was not successfully removed from the system');
        }
    }
}
