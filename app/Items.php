<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'cantidad','valor','total','user_id'
    ];

    public function user() {
		return $this->belongsTo(User::class,'user_id');
	}
}
