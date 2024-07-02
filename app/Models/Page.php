<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $dates = [
        'delete_at',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'domain',
        'logo',
        'user_id',
    ];
    protected $table = 'pages';
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_page', 'page_id', 'menu_id');
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'session_page', 'page_id', 'session_page_id');
    }
}
