<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLog extends Model
{
    use HasFactory;

    protected $table = 'books_log';

    protected $guarded = [];

    protected $fillable = [
        'book_id',
        'user_id',
        'date_start',
        'date_end',
        'planing_end',
    ];

}
