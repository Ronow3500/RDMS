<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EducationLevel;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['education_level'] = EducationLevel::paginate(10);

        return view('education_level.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education_level.create');
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

        $education_level = new EducationLevel();

        if ($education_level->create($validatedData))
        {
            return redirect()->back()->with('success', 'Education Level successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Education Level was not successfully added to the System');
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
        $data['education_level']  = EducationLevel::find($id);

        if ($data['education_level'])
        {
            return view('education_level.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! EducationLevel not found');
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
        $data['education_level']  = EducationLevel::find($id);

        if ($data['education_level'])
        {
            //dd($data);
            return view('education_level.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Education Level no longer exists in the system');
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

        $education_level = EducationLevel::find($id);

        if ($education_level)
        {
            $education_level->update($validatedData);

            return redirect()->back()->with('success', 'Education Level successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Education Level was not successfully updated');
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
        if (EducationLevel::destroy($id))
        {
            return redirect()->back()->with('success', 'Education Level successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Education Level was not successfully removed from the system');
        }
    }
}
