<?php

namespace Hulugan\Http\Controllers;

use Hulugan\Http\Requests\CustomerFormRequest;
use Illuminate\Http\Request;
use Session;
use Hulugan\Customer;
use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
//use DB;

class CustomerController extends Controller
{
    public function create(){
        return view('customers.inquiry');
	}

    /*public function create(){
        return view('index');
    }*/

    //store() method...
    //it will store the data into the database...
    public function store(CustomerFormRequest $request){
        $this->validate($request,[
            'first_name'    =>      'required|min:2|max:35|alpha',
            'last_name'     =>      'required|min:2|max:35|alpha',
            'birth_date'    =>      'required',            
        ],[
            'first_name.required'       =>      '* The first name field is required.',
            'first_name.min'            =>      '* The first name must be at least 2 characters.',
            'first_name.max'            =>      '* The first name may not be greater than 35 characters.',
            'first_name.alpha'          =>      '* The first name must not contain numbers.',
            'last_name.required'        =>      '* The last name field is required.',
            'last_name.min'             =>      '* The last name must be at least 2 characters.',
            'last_name.max'             =>      '* The last name may not be greater than 35 characters.',
            'last_name.alpha'           =>      '* The last name must not contain numbers.',
            'birth_date.required'       =>      '* The birth date field is required.',
        ]);

        //dd('Successfully added all fields.');

        $user = Auth::user();

        $customers = new Customer;
        $customers->encoded_by_id   =   $user->id;
        $customers->branch_id       =   $request->branch_id;
        $customers->first_name      =   $request->first_name;
        $customers->middle_name     =   $request->middle_name;
        $customers->last_name       =   $request->last_name;
        $customers->name_extension  =   $request->name_extension;
        $customers->birth_date      =   $request->birth_date;
        $customers->save();

        return view('products');
    }

    public function applied_by(){
      return $this->belongsTo(User::class,'encoded_by','id');
    }

    public function getIndex(){
        return view('customers.inquirylist');
    }

    public function getInquiryList(){
        $customers = DB::table('customers')->select('first_name', 'middle_name', 'last_name', 'name_extension', 'birth_date', 'branch_id')->get();
        return Datatables::of($customers)->make(true);
    }

}
 