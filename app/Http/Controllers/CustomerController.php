<?php

namespace Hulugan\Http\Controllers;

use Hulugan\Http\Requests\CustomerFormRequest;
use Illuminate\Http\Request;
use Session;
use Hulugan\Customer;
use Auth;
//use DB;

class CustomerController extends Controller
{
    public function create(){
        return view('customers.create');
	}

    /*public function create(){
        return view('index');
    }*/

    //store() method...
    public function store(CustomerFormRequest $request){
        $user = Auth::user();

        $customers = new Customer;
        $customers->encoded_by_id = $user->id;
        $customers->branch_id = $request->branch_id;
        $customers->first_name = $request->first_name;
        $customers->middle_name = $request->middle_name;
        $customers->last_name = $request->last_name;
        $customers->name_extension = $request->name_extension;
        $customers->birth_date = $request->birth_date;
        $customers->save();

        return view('products');
  }

    public function applied_by(){
      return $this->belongsTo(User::class,'encoded_by','id');
    }
}
 