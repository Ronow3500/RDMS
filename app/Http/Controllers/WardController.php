<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ward;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ward'] = Ward::paginate(10);

        return view('ward.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ward.create');
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

        $ward = new Ward();

        if ($ward->create($validatedData))
        {
            return redirect()->back()->with('success', 'Ward successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Ward was not successfully added to the System');
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
        $data['ward']  = Ward::find($id);

        if ($data['ward'])
        {
            return view('ward.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Ward not found');
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
        $data['ward']  = Ward::find($id);

        if ($data['ward'])
        {
            //dd($data);
            return view('ward.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Ward no longer exists in the system');
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

        $ward = Ward::find($id);

        if ($ward)
        {
            $ward->update($validatedData);

            return redirect()->back()->with('success', 'Ward successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Ward was not successfully updated');
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
        if (Ward::destroy($id))
        {
            return redirect()->back()->with('success', 'Ward successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Ward was not successfully removed from the system');
        }
    }
}
