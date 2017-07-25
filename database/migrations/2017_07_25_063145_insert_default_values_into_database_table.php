<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultValuesIntoDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /******************* INSERT DEFAULT DATA TO ROLES TABLE ***********************/
        //the description of the each role in are copied to the hulugan documentation

        DB::table('roles')->insert([
            'name' => 'it-administrator',
            'description' => 'They perform design, backup and maintenance of the database. They also ensure that the databases are securely guarded.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'sales-agent',
            'description' => 'They are assigned to add Inquires and loan application to the web application. They also perform cancellation of loan application if a principal applicant wishes to do so. They can also check Itineraries that has been created by Credit Investigators. Sales Agents also release approved loan application to the customers' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'credit-investigator',
            'description' => 'They are responsible for credit investigations from customers. They investigate loan applications if a customer has the ability to pay the installment of a particular product(s) they wishes to loan. They can also be a collector of payments and follow up a loan applications.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'auditor',
            'description' => 'They protect 3GX Hulugan assets by ensuring compliance with established internal control procedures by examining loan applications, required documents, reports, operating practices of other users of the web application especially Credit Investigators, and documentation.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'administrator',
            'description' => 'Final Approvals of Loan Applications are care of administrators. Loan Application are required to have two approvals of two administrators by way of singing their signature. However, on the web application, they will be signing their approval using their password on the web application.' 
        ]); //end insert

        /******************* INSERT DEFAULT DATA TO BRANCH TABLE ***********************/
        DB::table('branches')->insert([
            'name'              => '3GX Main',
            'address'           => 'Elias Angeles Street, Corner Evangelista Street, Naga City, 4400',
            'municipality'      => 'Naga City, 4400',
            'contact_no'        => '(054) 473-4119/473-4958/881-1527/205-0060 '
        ]); //end insert

        DB::table('branches')->insert([
            'name'              => '3GX Legazpi',
            'address'           => 'Purok 2 Brgy. Orosite, Legazpi City, 4500',
            'municipality'      => 'Legazpi City, 4500',
            'contact_no'        => '(052) 480-4355/201-0248 '
        ]); //end insert

        DB::table('branches')->insert([
            'name'              => '3GX Tabaco',
            'address'           => '- Quinale, Riosa Street, Tabaco City, 4511 ',
            'municipality'      => 'Tabaco City, 4511',
            'contact_no'        => '(052) 203.0118'
        ]); //end insert

        DB::table('branches')->insert([
            'name'              => '3GX Daet',
            'address'           => 'Ofelia Street, Corner F., Pimentel Avenue, Brgy II, Daet, 4610, Camarines Norte',
            'municipality'      => 'Daet, 4610, Camarines Norte',
            'contact_no'        => '0946 8734042'
        ]); //end insert

        /******************* INSERT DEFAULT USERS TABLE ***********************/

    } //end function

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
