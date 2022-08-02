<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'country',
        'description',
        'detail',
        'budget',
        'image',
        'wallet',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
