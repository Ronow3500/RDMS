<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    use HasFactory;

    protected $table = 'ethnic_groups';
    protected $fillable = ['name'];
}
