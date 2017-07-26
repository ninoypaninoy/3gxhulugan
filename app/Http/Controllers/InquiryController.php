<?php

namespace Hulugan\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class InquiryController extends Controller
{
	public function index(){
		return view ('customers.inquiry_form');
	}
    /*public $table = "customers";
    public $fillable = [
	    'type',
	    'category',
	    'first_name',
	    'last_name',
	    'middle_name',
	    'name_extension',
	    'civil_status',
	    'gender',
	    'birth_date',
	    'street_no',
	    'street',
	    'barangay',
	    'municipality',
	    'zip_code',
	    'inquiry_type',
	    'leads',
	    'years_of_stay',
	    'email',
	    'contact_no',
	    'path_to_photo_big',
	    'path_to_photo_small',
	    'path_to_customer_pictures',
	    'encoder_remarks'
    ];*/

    public function applied_by(){
      return $this->belongsTo(User::class,'encoded_by','id');
    }
}
