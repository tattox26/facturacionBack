<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [
        'numero_factura', 'emisor','valor','iva','total','user_id',
    ];

    public function user() {
		return $this->belongsTo(User::class,'user_id');
	}
}
