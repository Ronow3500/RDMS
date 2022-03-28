<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['setting'] = Setting::paginate(10);

        return view('setting.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create');
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

        $setting = new Setting();

        if ($setting->create($validatedData))
        {
            return redirect()->back()->with('success', 'Setting successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Setting was not successfully added to the System');
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
        $data['setting']  = Setting::find($id);

        if ($data['setting'])
        {
            return view('setting.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Setting not found');
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
        $data['setting']  = Setting::find($id);

        if ($data['setting'])
        {
            //dd($data);
            return view('setting.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Setting no longer exists in the system');
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

        $setting = Setting::find($id);

        if ($setting)
        {
            $setting->update($validatedData);

            return redirect()->back()->with('success', 'Setting successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Setting was not successfully updated');
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
        if (Setting::destroy($id))
        {
            return redirect()->back()->with('success', 'Setting successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Setting was not successfully removed from the system');
        }
    }
}
