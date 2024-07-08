<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionPage extends Model
{
    protected $fillable = [
        'page_id',
        'session_id',

     ];
     public function section(): BelongsTo
     {
         return $this->belongsTo(Section::class,'session_id','id');
     }
}
