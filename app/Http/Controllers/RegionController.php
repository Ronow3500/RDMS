<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['region'] = Region::paginate(10);

        return view('region.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.create');
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

        $region = new Region();

        if ($region->create($validatedData))
        {
            return redirect()->back()->with('success', 'Region Option successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Region name was not successfully added to the System');
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
        $data['region']  = Region::find($id);

        if ($data['region'])
        {
            return view('region.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Region not found');
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
        $data['region']  = Region::find($id);

        if ($data['region'])
        {
            //dd($data);
            return view('region.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Region no longer exists in the database');
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

        $region = Region::find($id);

        if ($region)
        {
            $region->update($validatedData);

            return redirect()->back()->with('success', 'Region details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Region details was not successfully updated');
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
        if (Region::destroy($id))
        {
            return redirect()->back()->with('success', 'Region successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Region was not successfully removed from the system');
        }
    }
}
