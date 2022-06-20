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
        'email',
        'occupation',
        'region',
        'county',
        'sub_county',
        'district',
        'division',
        'location',
        'sub_location',
        'constituency',
        'ward',
        'setting',
        'gender',
        'exact_age',
        'education_level',
        'marital_status',
        'religion',
        'income',
        'lsm',
        'ethnic_group',
        'employment_status',
        'age_group',
    ];

    public static function getRespondent()
    {
        $records = DB::table('respondents')->select('r_id','name','phone_1','phone_2','phone_3','phone_4','region','county','sub_county','district','division','location','sub_location','ward','constituency','gender','exact_age','age_group','setting','education_level','marital_status','religion','ethnic_group','employment_status')
        ->get()->toArray();

        return $records;
    }

    /**
     * Check if respondent has a given project
     * @param string $project
     * return bool
     */
    public function hasAnyProject(string $project)
    {
        return null !== $this->roles()->where('name', $project)->first();
    }

    /**
     * Check if respondent has any of the given roles
     * @param array $project
     * return bool
     */
    public function hasAnyProjects(array $project)
    {
        return null !== $this->roles()->whereIn('name', $project)->first();
    }    
}
