<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
  
    protected $fillable = [
        'title',
        'url',
        'position',
        'active',
        'parent_id',

    ];
    protected $table = "menus";

    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(Page::class, 'menus_page', 'menu_id', 'page_id');
    }

}
