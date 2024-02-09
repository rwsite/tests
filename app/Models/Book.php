<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'author_id',
        'place',
        'year',
    ];

    protected $guarded = [];

    /**
     * Динамическое свойство для получения всех Авторов книги
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->BelongsToMany(Author::class);
    }
}
