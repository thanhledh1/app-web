<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $dates = [
        'delete_at',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'title',
        'url',
        'position',
        'active',
        'parent_id',

    ];
    protected $table = 'menus';

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'menus_page');
    }

}
