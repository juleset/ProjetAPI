<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = ['id','name','firstname','birthday','death_date','created_at','updated_at'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
