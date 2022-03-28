<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Respondent extends Model
{
    use HasFactory;

    protected $table = 'respondents';

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'r_id',
        'name',
        'phone_1',
        'phone_2',
        'phone_3',
        'phone_4',
        'region',
        'county',
        'sub_county',
        'district',
        'division',
        'location',
        'sub_location',
        'ward',
        'constituency',
        'gender',
        'exact_age',
        'age_group',
        'setting',
        'education_level',
        'marital_status',
        'religion',
        'ethnic_group',
        'employment_status'
    ];

    public static function getRespondent()
    {
        $records = DB::table('respondents')->select('r_id','name','phone_1','phone_2','phone_3','phone_4','region','county','sub_county','district','division','location','sub_location','ward','constituency','gender','exact_age','age_group','setting','education_level','marital_status','religion','ethnic_group','employment_status')
        ->get()->toArray();

        return $records;
    }
}
