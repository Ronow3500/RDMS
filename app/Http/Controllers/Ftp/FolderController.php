<?php

namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Models\Folder;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['folders'] = Folder::paginate(10);
        //dd($data);

        return view('ftp.folders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ftp.folders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFolderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'folder_name' => 'required|max:100',
        ]);

        dd($validatedData);

        $folder = new Folder();

        if ($folder->create($validatedData))
        {
            return redirect()->back()->with('success', 'Folder successfully added to the System');
        }
        else
        {
            return redirect()->back()->with('error', 'Folder was not successfully added to the System');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        $data['folder']  = Folder::find($id);

        if ($data['folder'])
        {
            return view('ftp.folders.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Folder not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        $data['folder']  = Folder::find($id);

        if ($data['folder'])
        {
            //dd($data);
            return view('ftp.folders.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Folder no longer exists in the system');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFolderRequest  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFolderRequest $request, Folder $folder)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100'
        ]);

        $folder = Folder::find($id);

        if ($folder)
        {
            $folder->update($validatedData);

            return redirect()->back()->with('success', 'Folder successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Folder was not successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        if (Folder::destroy($id))
        {
            return redirect()->back()->with('success', 'Folder successfully removed from the system');
        }
        else
        {
            return redirect()->back()->with('error', 'Folder was not successfully removed from the system');
        }
    }
}
