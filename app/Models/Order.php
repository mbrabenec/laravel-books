<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'book_id',
            'quantitiy',
            'price',
            'total',
            'discount'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function books ()
    {
        return $this->hasMany(Book::class);            //// CHECK!!!!!!!!!!
    } 
}
