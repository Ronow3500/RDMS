<?php

namespace App\Http\Controllers;

use App\Models\Ftp;
use Illuminate\Http\Request;

class FtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ftp'] = Ftp::paginate(10);

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
        if ($request->hasFile('ftp'))
        {
            $request->validate([
                'ftp' => 'required|mimes:csv,xlx,xlxs',
            ]);

            $name = $request->file('ftp')->getClientOriginalName();
            $path = $request->file('ftp')->store('FTP');

            //dd($name);
            
            $ftp = new Ftp();

            $ftp->name = $name;
            $ftp->path = $path;

            //$request->file->move(public_path('FTP'), $name);

            /*$file_name = $request->input('name') . '.' . $request->file('ftp')->extension();
                dd($file_name);*/

            //$request->file('ftp')->store('FTP');

            return redirect()->back()->with('success', 'File successfully Uploaded');
        }
        else
        {
            return redirect()->back()->with('danger', 'Please Select a File');
        }
        
        
    }
}
