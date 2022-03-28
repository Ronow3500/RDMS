<?php

namespace App\Imports;

use App\Models\Respondent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class RespondentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
            '*phone_1' => 'required|unique:respondents,phone_1'
        ])->validate();

        return new Respondent([
            'r_id' => $row['r_id'],
            'name' => $row['name'],
            'phone_1' => $row['phone_1'],
            'phone_2' => $row['phone_2'],
            'phone_3' => $row['phone_3'],
            'phone_4' => $row['phone_4'],
            'region' => $row['region'],
            'county' => $row['county'],
            'sub_county' => $row['sub_county'],
            'district' => $row['district'],
            'division' => $row['division'],
            'location' => $row['location'],
            'sub_location' => $row['sub_location'],
            'ward' => $row['ward'],
            'constituency' => $row['constituency'],
            'gender' => $row['gender'],
            'exact_age' => $row['exact_age'],
            'age_group' => $row['age_group'],
            'setting' => $row['setting'],
            'education_level' => $row['education_level'],
            'marital_status' => $row['marital_status'],
            'religion' => $row['religion'],
            'ethnic_group' => $row['ethnic_group'],
            'employment_status' => $row['employment_status']
        ]);
    }
}
