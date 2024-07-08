<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Page extends Model
{
    
    protected $fillable = [
        'name',
        'domain',
        'logo',
        'user_id',
    ];
    protected $table = 'pages';

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function menus():BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'menus_page', 'page_id', 'menu_id');
    }
    public function sessions():BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'section_page', 'page_id', 'session_id');
    }
}
