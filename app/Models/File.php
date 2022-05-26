<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    protected $table = 'files';

    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'file_title',
        'folder_id',
        'file_name',
        'file_description',
        'file_type',
        'file_size',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the folder that owns the file
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
