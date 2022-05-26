<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    protected $table = 'folders';

    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'folder_name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    /**
     * Get the files owned by the folder
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
