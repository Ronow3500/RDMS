<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftp extends Model
{
    protected $table = 'ftps';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'file_title',
        'file_name',
        'file_description',
        'file_type',
        'file_size'
    ];
}
