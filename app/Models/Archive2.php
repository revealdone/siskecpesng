<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive2 extends Model
{
    protected $table = 'archives2';

    protected $fillable = ['title', 'physical_location', 'pdf_path', 'stored_at'];

    protected $casts = [
        'stored_at' => 'date',
    ];
}
