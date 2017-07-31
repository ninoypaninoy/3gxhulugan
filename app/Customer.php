<?php

namespace Hulugan;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	//...
	protected $fillable = ['first_name', 'middle_name', 'last_name', 'name_extension', 'birth_date', 'branch_id'];

	// Many to one relationship between Customer and User
    public function user(){
    	return $this->belongsTo('User');
    }

   
}
 