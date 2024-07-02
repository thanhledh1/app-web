<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $dates = [
        'delete_at',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'filename',
        'html_content',
        'image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'image_7',
        'image_8',
        'text_1',
        'text_1',
        'text_2',
        'text_3',
        'text_4',
        'text_5',
        'text_6',
        'text_7',
        'text_8',
        'text_9',
        'text_10',


    ];
    protected $table = 'sessions';

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}
