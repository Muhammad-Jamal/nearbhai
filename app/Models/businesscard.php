<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businesscard extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'name',
        'service',
        'email',
        'phone',
        'address',
        'country',
        'time',
        'description',
        'detail',
        'image',
        'wallet',
    ];

    //Relation of card with user.Many cards belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
