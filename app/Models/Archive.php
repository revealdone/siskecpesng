<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
        protected $fillable = ['title', 'physical_location', 'pdf_path', 'stored_at'];

    protected $casts = [
        'stored_at' => 'date',
    ];
}
