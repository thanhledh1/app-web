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
        'html_content',
    ];
    protected $fillable = [
        'name',
        'filename',
        'content',
    ];
    protected $table = 'sessions';
}
