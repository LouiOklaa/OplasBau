<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_id',
        'section_name',
        'note',
        'media',
        'created_by',
    ];

    public function sections(){

        return $this->belongsTo(ServicesSections::class);

    }
}
