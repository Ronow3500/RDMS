<?php

namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['files'] = File::paginate(10);
        //dd($data);

        return view('ftp.files.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['folder'] = Folder::orderByDesc('created_at')->get();

        return view('ftp.files.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input('folder'));
        //dd($request->file('ftp'));
        if ($request->hasFile('ftp'))
        {
            $request->validate([
                'file_title' => 'required',
                'file_description' => 'required',
                'ftp' => 'required',
            ]);

            $name = Str::of($request->input('file_title'))->slug('-');
            //dd($name);
            $ext = $request->file('ftp')->extension();

            $filename = $name . '.' . $ext;
            //dd($filename);

            $path = $request->file('ftp')->storeAs('public', $filename);

            $ftp = new File();

            if ($ftp->create([
                'file_title' => $request->input('file_title'),
                'folder_id' => $request->input('folder'),
                'file_description' => $request->input('file_description'),
                'file_name' => $filename,
                'file_type' => $request->file('ftp')->getClientMimeType(),
                'file_size' => $request->file('ftp')->getSize()
            ]))
            {
                return redirect()->back()->with('success', 'File successfully Uploaded');
            }
            else
            {
                return redirect()->back()->with('danger', 'Failed to upload file');
            }            
        }
        else
        {
            return redirect()->back()->with('warning', 'That was an empty file selection');
        }               
    }

    public function show($id)
    {
        $data['file']   = File::find($id);
        $data['folder'] = File::find($id)->folder->folder_name;

        if ($data['file'])
        {
            //dd($data);
            return view('ftp.files.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! File no longer exists in the database');
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
        $data['file']  = File::find($id);

        if ($data['file'])
        {
            //dd($data);
            return view('ftp.files.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! File no longer exists in the database');
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
        //dd($request->hasFile('ftp'));
        if ($request->hasFile('ftp'))
        {
            $request->validate([
                'file_title' => 'required',
                'file_description' => 'required',
                'ftp' => 'required|mimes:csv,doc,docx,xls,xlsx,spss,pdf,zip',
            ]);

            $name = Str::of($request->input('file_title'))->slug('-');
            //dd($name);
            $ext = $request->file('ftp')->extension();

            $filename = $name . '.' . $ext;
            //dd($filename);

            $path = $request->file('ftp')->storeAs('public', $filename);

            $ftp = new File();

            if ($ftp->update([
                'file_title' => $request->input('file_title'),
                'file_description' => $request->input('file_description'),
                'file_name' => $filename,
                'file_type' => $request->file('ftp')->getClientMimeType(),
                'file_size' => $request->file('ftp')->getSize(),
                'updated_by' => auth()->user()->name
            ]))
            {
                return redirect()->back()->with('success', 'File successfully Uploaded');
            }
            else
            {
                return redirect()->back()->with('danger', 'Failed to upload file');
            }            
        }
        else
        {
            return redirect()->back()->with('warning', 'That was an empty file selection');
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
        $file = File::find($id);

        if ($file->destroy($id))
        {
            $file->update([
                'deleted_by' => auth()->user()->name
            ]);

            return redirect()->back()->with('success', 'File successfully removed from the server');
        }
        else
        {
            return redirect()->back()->with('warning', 'File was not successfully removed from the server');
        }
    }

    public function download($id)
    {
        $file = File::find($id);

        if ($file)
        {
            $filename = $file->file_name;
            $path = public_path('storage/'.$filename);
            
            return response()->download($path);
        }

        return redirect()->back()->with('warning', 'File was deleted');
    }
}
