<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use App\Helpers\SelectFormData;

use App\Exports\RespondentExport;
use App\Exports\RespondentByCountyExport;
use App\Imports\RespondentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use Validator;

class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['respondents'] = Respondent::paginate(10);

        return view('respondent.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['age_group'] = SelectFormData::age_group();
        $data['constituency'] = SelectFormData::constituency();
        $data['county'] = SelectFormData::county();
        $data['sub_county'] = SelectFormData::sub_county();
        $data['district'] = SelectFormData::district();
        $data['division'] = SelectFormData::division();
        $data['education_level'] = SelectFormData::education_level();
        $data['employment_status'] = SelectFormData::employment_status();
        $data['gender'] = SelectFormData::gender();
        $data['location'] = SelectFormData::location();
        $data['marital_status'] = SelectFormData::marital_status();
        $data['region'] = SelectFormData::region();
        $data['religion'] = SelectFormData::religion();
        $data['ethnic_group'] = SelectFormData::ethnic_group();
        $data['setting'] = SelectFormData::setting();
        $data['sub_location'] = SelectFormData::sub_location();
        $data['ward'] = SelectFormData::ward();
        $data['sub_county'] = SelectFormData::sub_county();

        return view('respondent.create', $data);
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
            'name' => 'required',
            'phone_1' => 'required|min:9|max:14|unique:respondents',
            'phone_2' => 'max:20',
            'phone_3' => 'max:20',
            'phone_4' => 'max:20',
            'region' => 'required',
            'county' => 'required',
            'sub_county' => '',
            'district' => '',
            'division' => '',
            'location' => '',
            'sub_location' => '',
            'ward' => '',
            'constituency' => '',
            'gender' => 'required|alpha',
            'exact_age' => 'max:120|numeric',
            'age_group' => '',
            'setting' => '',
            'education_level' => '',
            'marital_status' => '',
            'religion' => '',
            'ethnic_group' => '',
            'employment_status' => ''
        ]);

        //dd($validatedData);

        $respondent = new Respondent();
        if ($respondent->create($validatedData))
        {
           return redirect()->back()->with('success', 'Respondent successfully added to the Database');
        }
        else
        {
            return redirect()->back()->with('error', 'Respondent not successfully added to the Database');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['respondent']  = Respondent::find($id);

        if ($data['respondent'])
        {
            return view('respondent.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Respondent not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['respondent']  = Respondent::find($id);

        if ($data['respondent'])
        {
            $data['age_group'] = SelectFormData::age_group();
            $data['constituency'] = SelectFormData::constituency();
            $data['county'] = SelectFormData::county();
            $data['sub_county'] = SelectFormData::sub_county();
            $data['district'] = SelectFormData::district();
            $data['division'] = SelectFormData::division();
            $data['education_level'] = SelectFormData::education_level();
            $data['employment_status'] = SelectFormData::employment_status();
            $data['gender'] = SelectFormData::gender();
            $data['location'] = SelectFormData::location();
            $data['marital_status'] = SelectFormData::marital_status();
            $data['region'] = SelectFormData::region();
            $data['religion'] = SelectFormData::religion();
            $data['ethnic_group'] = SelectFormData::ethnic_group();
            $data['setting'] = SelectFormData::setting();
            $data['sub_location'] = SelectFormData::sub_location();
            $data['ward'] = SelectFormData::ward();
        
            return view('respondent.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! Respondent no longer exists in the database');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_1' => 'required|min:9|max:14',
            'phone_2' => 'max:20',
            'phone_3' => 'max:20',
            'phone_4' => 'max:20',
            'region' => 'required',
            'county' => 'required',
            'district' => '',
            'location' => '',
            'sub_location' => '',
            'ward' => '',
            'constituency' => '',
            'gender' => 'required|alpha',
            'exact_age' => 'max:120|numeric',
            'age_group' => '',
            'setting' => '',
            'education_level' => '',
            'marital_status' => '',
            'religion' => '',
            'employment_status' => ''
        ]);

        $respondent = Respondent::find($id);

        if ($respondent)
        {
            $respondent->update($validatedData);

            return redirect()->back()->with('success', 'Respondent details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'Respondent details was not successfully updated');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Respondent::destroy($id))
        {
            return redirect()->back()->with('success', 'Respondent successfully removed from the database');
        }
        else
        {
            return redirect()->back()->with('error', 'Respondent has not been successfully removed from the database');
        }
    }

    /**
     * Export Respondents Database Records Into Excel Format
     */

    public function exportIntoExcel()
    {
        if (Excel::download(new RespondentExport,  date("d-m-Y") . 'RespondentsDatabase.xlsx'))
        {
            return Excel::download(new RespondentExport,  date("d-m-Y") . '-' .auth()->user()->name . '-' . 'RespondentsDatabase.xlsx');
        }
        else
        {
            return redirect()->back()->with('error', 'Excel File failed to download');
        }
    }

    /**
     * Export Respondents Database Records Into CSV Format
     */

    public function exportIntoCsv()
    {
        if (Excel::download(new RespondentExport,  date("d-m-Y") . 'RespondentsDatabase.xlsx'))
        {
            return Excel::download(new RespondentExport,  date("d-m-Y") . '-' .auth()->user()->name . '-' . 'RespondentsDatabase.csv');
        }
        else
        {
            return redirect()->back()->with('error', 'CSV File failed to download');
        }
    }

    /**
     * Import Respondents Database Records From a Spreadsheet i.e either excel or csv
     */
    public function import_form()
    {
        return view('respondent.import');
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'    => 'required|mimes:xlsx,csv'
        ]);

        if ($validator->passes())
        {
            Excel::import(new RespondentImport, $request->file);

            return redirect()->back()->with('success', 'Respondents successfully imported into the system');
        }
        else
        {
            return redirect()->back()->with(['errors' => $validator->errors()->all()]);
        }
        
    }

    /**
     * Display Datatables of the resource for filtering before export.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        $data['respondents'] = Respondent::all();

        return view('respondent.filter', $data);
    }

}

