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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menus_page', 'page_id', 'menu_id');
    }
    public function sessions()
    {
        return $this->belongsToMany(Section::class, 'section_page', 'page_id', 'session_id');
    }
}
