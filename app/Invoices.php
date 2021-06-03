<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $fillable = [
        'numero_factura', 'emisor', 'receptor','valor','iva','total','item_id'
    ];

    public function item() {
		return $this->belongsTo(Items::class,'item_id');
	}
}
