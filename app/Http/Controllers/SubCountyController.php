<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCounty;

class SubCountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sub_county'] = SubCounty::paginate(10);

        return view('sub_county.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sub_county.create');
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

        $sub_county = new SubCounty();

        if ($sub_county->create($validatedData))
        {
            return redirect()->back()->with('success', 'Sub County successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub County was not successfully added to the System');
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
        $data['sub_county']  = SubCounty::find($id);

        if ($data['sub_county'])
        {
            return view('sub_county.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! SubCounty not found');
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
        $data['sub_county']  = SubCounty::find($id);

        if ($data['sub_county'])
        {
            //dd($data);
            return view('sub_county.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Sub County no longer exists in the system');
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

        $sub_county = SubCounty::find($id);

        if ($sub_county)
        {
            $sub_county->update($validatedData);

            return redirect()->back()->with('success', 'Sub County successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub County was not successfully updated');
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
        if (SubCounty::destroy($id))
        {
            return redirect()->back()->with('success', 'Sub County successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub County was not successfully removed from the system');
        }
    }
}
