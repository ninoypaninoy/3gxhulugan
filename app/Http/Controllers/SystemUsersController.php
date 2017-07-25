<?php

namespace Hulugan\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Hulugan\User;
use DB;

class SystemUsersController extends Controller
{
	//return view
    public function getIndex() {

    	return view('products');

    } //end function 

    /**
 	* Process datatables ajax request.
 	*
 	* @return \Illuminate\Http\JsonResponse
 	*/

	public function getProducts() {


        $db_ext = \DB::connection('mysql2');
        $productList = $db_ext->table('inventory')->select('Item_No', 'Item_Desc', 'Item_Price');
        return Datatables::of($productList)->make(true);

	} //end function

} //end class

