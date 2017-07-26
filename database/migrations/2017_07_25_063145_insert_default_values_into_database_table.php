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
            'name' => 'IT Administrator',
            'description' => 'They perform design, backup and maintenance of the database. They also ensure that the databases are securely guarded.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'Installment Department',
            'description' => 'They are assigned to add Inquires and loan application to the web application. They also perform cancellation of loan application if a principal applicant wishes to do so. They can also check Itineraries that has been created by Credit Investigators. Sales Agents also release approved loan application to the customers' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'Credit Investigator',
            'description' => 'They are responsible for credit investigations from customers. They investigate loan applications if a customer has the ability to pay the installment of a particular product(s) they wishes to loan. They can also be a collector of payments and follow up a loan applications.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'Auditor',
            'description' => 'They protect 3GX Hulugan assets by ensuring compliance with established internal control procedures by examining loan applications, required documents, reports, operating practices of other users of the web application especially Credit Investigators, and documentation.' 
        ]); //end insert

        DB::table('roles')->insert([
            'name' => 'Administrator',
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

        /******************* INSERT DEFAULT CATEGORIES TABLE ***********************/
        //Concurrently, there are 4 categories. These categories will be used to conduct
        //credit investigations. This can be find in the credit investagation report form
        //these data must be cached on the form level of the web application
        //for alleviating database load
        DB::table('categories')->insert([
            'name'              => 'Character'
        ]); //end insert
        DB::table('categories')->insert([
            'name'              => 'Capital'
        ]); //end insert
        DB::table('categories')->insert([
            'name'              => 'Capacity'
        ]); //end insert
        DB::table('categories')->insert([
            'name'              => 'Conditions'
        ]); //end insert

        /******************* INSERT DEFAULT QUESTIONS TABLE ***********************/
        //these data must be cached on the form level of the application
        //for alleviating database load
        ////////////// CHARACTER ////////////
        //Question 1. 
        DB::table('questions')->insert([
            'description'      => '1. Does the applicant have a very good payment history on utilities, rentals and credit from 3GX and/or from other financial institutions such as banks, lending investors etc. (Important: A case of one (1) overdue on the applicant’s payment history for the last 3 months on any of the above creditors mentioned shall mean a Yes answer. But a case of more than once overdue on the applicant’s payment history for the last 3 months on any of the abovementioned creditors of if the applicant has no outstanding obligations on utilities and/or rental payment well mean a NO answer.)'
        ]); //end insert
        //Question 2. 
        DB::table('questions')->insert([
            'description'      => '2. Is the applicant an active resident of the community for at least (1) one year?'
        ]); //end insert
        //Question 3. 
        DB::table('questions')->insert([
            'description'      => '3. Does the applicant NOT involved any illegal acts or negative vices such as infidelity (if married) gambling, drugs, excessive drinking, or implicated/convicted in any criminal suit?'
        ]); //end insert
        //Question 4. 
        DB::table('questions')->insert([
            'description'      => '4. Does the applicant not in the EQA list?'
        ]); //end insert
        ////////////// CAPITAL ////////////
        //Question 1. 
        DB::table('questions')->insert([
            'description'      => '1. Does the applicant maintain and make a regular deposit on his/her savings account for at least one (1) year or has a time deposit with an average balance of at least five (5) figures?'
        ]); //end insert
        //Question 2. 
        DB::table('questions')->insert([
            'description'      => '2. Does the applicant own any titled real property free from any encumbrance with a market values of morethan the PN amount?'
        ]); //end insert
        //Question 3. 
        DB::table('questions')->insert([
            'description'      => '3. Does the applicant own any appliances or motor vehicles free from any encumbrance with a market value of at least 50% of the PN?'
        ]); //end insert
        ////////////// CAPACITY ////////////
        //Question 1. 
        DB::table('questions')->insert([
            'description'      => '1. Is the applicant’s age within 21 to 50 years old and excellent physical conditions?'
        ]); //end insert
        //Question 2. 
        DB::table('questions')->insert([
            'description'      => '2. Has the applicant’s completed of Four Year (4-year) course'
        ]); //end insert
        //Question 3. 
        DB::table('questions')->insert([
            'description'      => '3. Has the applicant have three (3) or less dependents and those of school age going to school?'
        ]); //end insert
        //Question 3. 
        DB::table('questions')->insert([
            'description'      => '3. Has the applicant have three (3) or less dependents and those of school age going to school?'
        ]); //end insert
        //Question 4. 
        DB::table('questions')->insert([
            'description'      => '4. Has the applicant been working in his present job, has existing business for more than three (3) years with a very satisfactory performance employment or with a profitable business ventures?'
        ]); //end insert
        //Question 5. 
        DB::table('questions')->insert([
            'description'      => '5. Disposable Income'
        ]); //end insert

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
