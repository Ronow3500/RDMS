<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['district'] = District::paginate(10);

        return view('district.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('district.create');
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

        $district = new District();

        if ($district->create($validatedData))
        {
            return redirect()->back()->with('success', 'District successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'District was not successfully added to the System');
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
        $data['district']  = District::find($id);

        if ($data['district'])
        {
            return view('district.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! District not found');
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
        $data['district']  = District::find($id);

        if ($data['district'])
        {
            //dd($data);
            return view('district.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! District no longer exists in the database');
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

        $district = District::find($id);

        if ($district)
        {
            $district->update($validatedData);

            return redirect()->back()->with('success', 'District successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'District was not successfully updated');
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
        if (District::destroy($id))
        {
            return redirect()->back()->with('success', 'District successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'District was not successfully removed from the system');
        }
    }
}
