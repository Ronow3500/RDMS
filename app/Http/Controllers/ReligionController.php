<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Religion;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['religion'] = Religion::paginate(10);

        return view('religion.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('religion.create');
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

        $religion = new Religion();

        if ($religion->create($validatedData))
        {
            return redirect()->back()->with('success', 'Religion Option successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Religion name was not successfully added to the System');
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
        $data['religion']  = Religion::find($id);

        if ($data['religion'])
        {
            return view('religion.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Religion not found');
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
        $data['religion']  = Religion::find($id);

        if ($data['religion'])
        {
            //dd($data);
            return view('religion.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Religion no longer exists in the database');
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

        $religion = Religion::find($id);

        if ($religion)
        {
            $religion->update($validatedData);

            return redirect()->back()->with('success', 'Religion details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Religion details was not successfully updated');
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
        if (Religion::destroy($id))
        {
            return redirect()->back()->with('success', 'Religion successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Religion was not successfully removed from the system');
        }
    }
}
