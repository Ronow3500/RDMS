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
            'email'   => $row['email'],
            'occupation' => $row['occupation'],
            'region' => $row['region'],
            'county' => $row['county'],
            'sub_county' => $row['sub_county'],
            'district' => $row['district'],
            'division' => $row['division'],
            'location' => $row['location'],
            'sub_location' => $row['sub_location'],
            'constituency' => $row['constituency'],
            'ward' => $row['ward'],
            'setting' => $row['setting'],
            'gender' => $row['gender'],
            'exact_age' => $row['exact_age'],
            'education_level' => $row['education_level'],
            'marital_status' => $row['marital_status'],
            'religion' => $row['religion'],
            'income' => $row['income'],
            'lsm' => $row['lsm'],
            'ethnic_group' => $row['ethnic_group'],
            'employment_status' => $row['employment_status'],
            'age_group' => $row['age_group']
        ]);
    }
}
