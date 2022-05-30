<?php

namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'folder_name' => 'required|max:100',
        ]);

        //dd($validatedData);

        $folder = new Folder();

        if ($folder->create($validatedData))
        {
            return redirect()->back()->with('success', 'Folder successfully created');
        }
        else
        {
            return redirect()->back()->with('error', 'Folder was not successfully created');
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
        $data['folder'] = Folder::find($id);
        // List files that belongs to this folder
        $data['files']  = File::where('folder_id', $id)->paginate(10);

        return view('ftp.folders.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['folder']  = Folder::find($id);

        if ($data['folder'])
        {
            //dd($data);
            return view('ftp.folders.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Folder no longer exists in the database');
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
            'folder_name' => 'required|max:200'
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd(auth()->user()->name);
        $folder = Folder::find($id);
        //dd($files->count());

        // List files that belongs to this folder
        $files  = File::where('folder_id', $id)->paginate(10);

        if ($files->count() > 0)
        {
            // Do not delete folder it contains files.
            return redirect()->back()->with('warning', 'Cannot delete folder if it contains files');
        }
        else
        {
            if ($folder->destroy($id))
            {
                $folder->update([
                    'deleted_by' => auth()->user()->name
                ]);

                return redirect()->back()->with('info', 'Folder successfully removed from the server');
            }
            else
            {
                return redirect()->back()->with('warning', 'Folder was not successfully removed from the server');
            }
        }
    }
}
