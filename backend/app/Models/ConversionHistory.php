<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversionHistory extends Model
{
    protected $fillable = [
        'original_filename',
        'converted_filename',
        'type_conversion',
        'file_size_kb',
        'status',
        'ai_summary',
    ];
}
