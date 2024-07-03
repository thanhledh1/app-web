<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'page_id',

     ];
     public function menus()
     {
         return $this->belongsTo(Menu::class,'menu_id','id');
     }
}
