<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuPage extends Model
{
    protected $fillable = [
        'menu_id',
        'page_id',

     ];
     public function menus(): BelongsTo
     {
         return $this->belongsTo(Menu::class,'menu_id','id');
     }
}
