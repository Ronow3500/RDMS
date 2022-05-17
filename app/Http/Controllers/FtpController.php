<?php

namespace App\Http\Controllers;

use App\Models\Ftp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $files = Storage::files("public");
        //dd($files);
        $ftpFiles = array();

        foreach ($files as $key => $value)
        {
            $value = str_replace("public/","",$value);
            array_push($ftpFiles, $value);
        }

        return view('ftp.index', ['files' => $ftpFiles]);
    }*/
    public function index()
    {
        $data['files'] = Ftp::paginate(10);

        return view('ftp.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ftp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file('ftp'));
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

            $ftp = new Ftp();

            if ($ftp->create([
                'file_title' => $request->input('file_title'),
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
        $files = Storage::files("public");
        dd($files);
        $data = array();

        foreach ($files as $key => $value)
        {
            $value = str_replace("public/","",$val);
            array_push($data['ftpFiles'], $value);
        }

        return view('ftp.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['ftp']  = Ftp::find($id);

        if ($data['ftp'])
        {
            //dd($data);
            return view('ftp.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Ftp no longer exists in the database');
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
        dd($request->file('ftp'));
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

            $path = $request->file('ftp')->storeAs('public/FTP', $filename);

            $ftp = Ftp::find($id);
            //dd($ftp);

            if ($ftp->update([
                'file_title' => $request->input('file_title'),
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Ftp::destroy($id))
        {
            return redirect()->back()->with('info', 'File successfully removed from the server');
        }
        else
        {
            return redirect()->back()->with('warning', 'File was not successfully removed from the server');
        }
    }

    public function download($file_name)
    {
        $filename = Storage::disk('public')->get($file_name);

        $headers = header('Content-Type', 'text/csv');

        Storage::download('file.jpg', $filename, $headers);
    }
}
