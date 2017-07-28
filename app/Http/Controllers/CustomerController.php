<?php

namespace Hulugan\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
		return view ('customers.forms');
	}

	public function applied_by(){
      return $this->belongsTo(User::class,'encoded_by','id');
    }

    public function store(){
    	$input = Request::all();

    	Customer::create([
    		'first_name' => $input['first_name'],
    		'middle_name' => $input['middle_name'],
    		'last_name' => $input['last_name'],
    		'name_extension' => $input['name_extension']

    	]);
    }
}
