<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    public function user()
    {
        return $this->belongsTo(User::class);
//        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
