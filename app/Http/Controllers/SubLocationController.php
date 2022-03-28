<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubLocation;

class SubLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sub_location'] = SubLocation::paginate(10);

        return view('sub_location.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sub_location.create');
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

        $sub_location = new SubLocation();

        if ($sub_location->create($validatedData))
        {
            return redirect()->back()->with('success', 'Sub Location successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub Location was not successfully added to the System');
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
        $data['sub_location']  = SubLocation::find($id);

        if ($data['sub_location'])
        {
            return view('sub_location.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Sub Location not found');
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
        $data['sub_location']  = SubLocation::find($id);

        if ($data['sub_location'])
        {
            //dd($data);
            return view('sub_location.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Sub Location no longer exists in the database');
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

        $sub_location = SubLocation::find($id);

        if ($sub_location)
        {
            $sub_location->update($validatedData);

            return redirect()->back()->with('success', 'Sub Location successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub Location was not successfully updated');
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
        if (SubLocation::destroy($id))
        {
            return redirect()->back()->with('success', 'Sub Location successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Sub Location was not successfully removed from the system');
        }
    }
}
