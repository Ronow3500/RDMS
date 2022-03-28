<?php

namespace App\Helpers;

use App\Models\AgeGroup;
use App\Models\Constituency;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\District;
use App\Models\Division;
use App\Models\EducationLevel;
use App\Models\EmploymentStatus;
use App\Models\Gender;
use App\Models\Location;
use App\Models\MaritalStatus;
use App\Models\Region;
use App\Models\Religion;
use App\Models\Setting;
use App\Models\SubLocation;
use App\Models\Ward;
use App\Models\EthnicGroup;

class SelectFormData
{
	public static function age_group()
	{
		return AgeGroup::all();
	}

	public static function constituency()
	{
		return Constituency::all();
	}

	public static function county()
	{
		return County::all();
	}

	public static function sub_county()
	{
		return SubCounty::all();
	}

	public static function district()
	{
		return District::all();
	}

	public static function division()
	{
		return Division::all();
	}

	public static function education_level()
	{
		return EducationLevel::all();
	}

	public static function employment_status()
	{
		return EmploymentStatus::all();
	}

	public static function gender()
	{
		return Gender::all();
	}

	public static function location()
	{
		return Location::all();
	}

	public static function marital_status()
	{
		return MaritalStatus::all();
	}

	public static function region()
	{
		return Region::all();
	}

	public static function ethnic_group()
	{
		return EthnicGroup::all();
	}

	public static function religion()
	{
		return Religion::all();
	}

	public static function setting()
	{
		return Setting::all();
	}

	public static function sub_location()
	{
		return SubLocation::all();
	}

	public static function ward()
	{
		return ward::all();
	}

/*	public static function county()
	{
		return County::all();
	}

	public static function county()
	{
		return County::all();
	}

	public static function county()
	{
		return County::all();
	}
*/
}