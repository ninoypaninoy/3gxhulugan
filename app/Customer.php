<?php

namespace Hulugan;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user(){
    	return $this->belongsTo('User');
    }

    public static function find(id, $first_name = null){
    	$customer = static::with('user')->find($id);

    	if($first_name and $customer->user->)
    }
}
