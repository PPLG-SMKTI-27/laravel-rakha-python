<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'judul_project',
        'deskripsi',
        'teknologi',
        'link_project',
    ];

    protected $casts = [
        'teknologi' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
