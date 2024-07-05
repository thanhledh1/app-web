<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionPage extends Model
{
    protected $fillable = [
        'page_id',
        'session_id',

     ];
     public function section()
     {
         return $this->belongsTo(Section::class,'session_id','id');
     }
}
