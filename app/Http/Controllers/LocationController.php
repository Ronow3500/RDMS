<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['location'] = Location::paginate(10);

        return view('location.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
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

        $location = new Location();

        if ($location->create($validatedData))
        {
            return redirect()->back()->with('success', 'Location successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Location was not successfully added to the System');
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
        $data['location']  = Location::find($id);

        if ($data['location'])
        {
            return view('location.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Location not found');
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
        $data['location']  = Location::find($id);

        if ($data['location'])
        {
            //dd($data);
            return view('location.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Location no longer exists in the database');
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

        $location = Location::find($id);

        if ($location)
        {
            $location->update($validatedData);

            return redirect()->back()->with('success', 'Location successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Location was not successfully updated');
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
        if (Location::destroy($id))
        {
            return redirect()->back()->with('success', 'Location successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Location was not successfully removed from the system');
        }
    }
}
