<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Http\Request;

class RespondentsApiController extends Controller
{
    public function respondent()
    {
        $respondents = Respondent::all();

        return $respondents;
    }
}
