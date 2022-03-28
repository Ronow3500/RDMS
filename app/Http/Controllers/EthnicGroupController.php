<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EthnicGroup;

class EthnicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ethnic_group'] = EthnicGroup::paginate(10);

        return view('ethnic_group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ethnic_group.create');
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

        $ethnic_group = new EthnicGroup();

        if ($ethnic_group->create($validatedData))
        {
            return redirect()->back()->with('success', 'Ethnic Group successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Ethnic Group was not successfully added to the System');
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
        $data['ethnic_group']  = EthnicGroup::find($id);

        if ($data['ethnic_group'])
        {
            return view('ethnic_group.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Ethnic Group not found');
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
        $data['ethnic_group']  = EthnicGroup::find($id);

        if ($data['ethnic_group'])
        {
            //dd($data);
            return view('ethnic_group.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Ethnic Group no longer exists in the system');
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

        $ethnic_group = EthnicGroup::find($id);

        if ($ethnic_group)
        {
            $ethnic_group->update($validatedData);

            return redirect()->back()->with('success', 'Ethnic Group successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Ethnic Group was not successfully updated');
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
        if (EthnicGroup::destroy($id))
        {
            return redirect()->back()->with('success', 'Ethnic Group successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Ethnic Group was not successfully removed from the system');
        }
    }
}
