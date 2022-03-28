<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['division'] = Division::paginate(10);

        return view('division.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division.create');
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

        $division = new Division();

        if ($division->create($validatedData))
        {
            return redirect()->back()->with('success', 'Division successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Division was not successfully added to the System');
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
        $data['division']  = Division::find($id);

        if ($data['division'])
        {
            return view('division.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Division not found');
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
        $data['division']  = Division::find($id);

        if ($data['division'])
        {
            //dd($data);
            return view('division.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Division no longer exists in the system');
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

        $division = Division::find($id);

        if ($division)
        {
            $division->update($validatedData);

            return redirect()->back()->with('success', 'Division successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Division was not successfully updated');
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
        if (Division::destroy($id))
        {
            return redirect()->back()->with('success', 'Division successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Division was not successfully removed from the system');
        }
    }
}
