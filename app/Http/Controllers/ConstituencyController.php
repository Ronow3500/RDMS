<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Constituency;

class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['constituency'] = Constituency::paginate(10);

        return view('constituency.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('constituency.create');
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

        $constituency = new Constituency();

        if ($constituency->create($validatedData))
        {
            return redirect()->back()->with('success', 'Constituency successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Constituency was not successfully added to the System');
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
        $data['constituency']  = Constituency::find($id);

        if ($data['constituency'])
        {
            return view('constituency.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Constituency not found');
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
        $data['constituency']  = Constituency::find($id);

        if ($data['constituency'])
        {
            //dd($data);
            return view('constituency.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Constituency no longer exists in the system');
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

        $constituency = Constituency::find($id);

        if ($constituency)
        {
            $constituency->update($validatedData);

            return redirect()->back()->with('success', 'Constituency successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Constituency was not successfully updated');
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
        if (Constituency::destroy($id))
        {
            return redirect()->back()->with('success', 'Constituency successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Constituency was not successfully removed from the system');
        }
    }
}
