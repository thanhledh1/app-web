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
        'session_id',
        'menu_id',
        'user_id',
    ];
    protected $table = 'menus';
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menus_page');
    }
    public function sessions()
    {
        return $this->belongsToMany(Section::class, 'section_page');
    }
}
