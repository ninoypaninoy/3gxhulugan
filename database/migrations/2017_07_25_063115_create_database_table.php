<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //NEED TO BE ASSURED AFTER FINISHING THIS: ON-DELETE-PARENT-TABLE-CASCADE-DELETE-ON-THE-CHILD-TABLE
        //OR DONT DELETE THESE RECORDS AT ALL, TO PREVENT ORPHANED RECORDS, JUST ADD A ROW MARK-DELETED, FOR HISTORY PURPOSES
        //SABOG PA ANG TEXT MESSAGING CONCEPTS KAN WE APP NA NI
        //PAYMENTS NAMAN LANG ANG KULANG

        /********************* DATABASE INFO *******************
        The order of the database schema create are the following:
            text_messaging_contacts     set of all text messaging contacts
            preset_text_messages        set of all pretext messages
            users                       set of all users of the web application
            password_resets             set of all password resets 
            branches                    set of all hulugan branches
            customers                   set of all customers
            note_to_customer_profiles   set of all user notes on the customer profiles
            personal references         set of all personal references of customer
            child_dependents            set of all children of customer
            existing_loans              set of all existing loan of customer
            itineraries                 set of all itinerary created by user (credit investigators)
            itineraries_line            set of all itineraries to the customers
            loan_applications           set of all loan applications of customers
            note_to_loan_applications   set of all user notes on loan applications
            requirements                set of all requirements definition of loan applications
            la_requirements             set of all requirements submitted by the customer for their loan applications
            companies                   set of all vendor names of the 3gx hulugan
            purchase_orders             set of all purchase orders made on the loan application
            products_line               set of all product(s) that is/are included in the purchase order
            products                    set of all products. This table is on ERP database of 3GX Computers and IT Solutions.
            credit_investigations       set of all credit investigation of a loan application
            categories                  set of all category of user (credit investigators) questions
            questions                   set of all user (credit investigators) questions
            questions_line              set of all answered user (credit investigator) questions about customers


        Note: on-drop these tables are arranged backwards. 

        Encoded by: Alarcon, Joshua Oriel           @fb.me/dopaminedope
        Trainees:   Alarcon, Joshua Oriel           @fb.me/dopaminedope
                    Pante, Jorge Benigno Alcanzo    @fb.me/paninoy

        Complete Documentation available @ ...
        ****************************************************/

        /********************* PRESET_TEXT_MESSAGES TABLE *******************/
        Schema::create('preset_text_messages', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title');
            $table->string('content', 5000);

        }); //end schema

        /********************* TEXT_MESSAGING_CONTACTS TABLE *******************/
        Schema::create('text_messaging_contacts', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('contact_no');
            $table->string('description', 5000);


        }); //end schema

        /********************* USERS TABLE *******************/
        Schema::create('users', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('name_extension')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('contact_no')->nullable();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('path_to_photo_small')->nullable();
            $table->string('path_to_photo_big')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //initializing foreign key
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

        }); //end schema

        /********************* PASSWORD_RESETS TABLE *******************/
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();

        }); //end schema

        /********************* BRANCHES TABLE *******************/
        Schema::create('branches', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('municipality');
            $table->string('contact_no')->nullable();
        }); //end schema
    

        /********************* CUSTOMERS TABLE *******************/
        //this is a denormalized table
        //the customer, being a supertype entity, has also subtypes. Namely: Employed, Self-Employed, Remittance and Pensioner
        //these subtypes has been denormalized and combined in the customer table since it is one-to-one relationship with
        //customer and these subtpyes do not have any other relationship with other table(s)
        //Since the relationship of customer and spouse is one-to-one without any other table in relationship with spouse
        //therefore, spouse table has been also denormalized and combined in this table
        //also, since the relationship of customer and location is one-to-one without any other table in relationship 
        //with location. This table has been also denormalized
        Schema::create('customers', function(Blueprint $table){
            //below are the rows about the customer
            $table->increments('id')->unique();
            $table->enum('type', array('inquirer','applicant', 'borrower','fully-paid')); //these are the four (4) customer types identified
            $table->enum('category', array('employed','self-employed','remittance', 'pensioner')); // these are four (4) customer categories identified
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('middle_name')->nullable(); //there are some customers that has no middle name
            $table->string('name_extension')->nullable();
            $table->string('civil_status');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('street_no')->nullable(); //string since there might also means zone like zone 4, zone 5 or so on
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->integer('zip_code')->nullable();
            $table->string('inquiry_type'); //current choices are walk-in, otp, text, email, radio-ad and referral. To make it safe, the choices will de defined on the form level to make the database stable since there might be a possibility that new choice(s) can be added someday.
            $table->string('leads'); //current choices are ads, tvs, posters and friends. To make it safe, the choices will de defined on the form level to make the database stable since there might be a possibility that new choice(s) can be added someday
            $table->integer('years_of_stay');
            $table->string('email')->nullable();
            $table->integer('contact_no')->nullable(); //these can also be a telephone number
            $table->string('path_to_photo_big', 500)->nullable(); //we allow not to store at first the picture of the customer
            $table->string('path_to_photo_small', 500)->nullable();
            $table->string('path_to_customer_picture', 5000)->nullable(); //we allow not to store at first the picture of the customer
            $table->string('encoder_remarks', 2000)->nullable();
            //below are the rows about the location of the customer
            $table->string('location_remarks')->nullable();
            $table->float('location_latitude')->nullable();
            $table->float('location_longitude')->nullable();
            $table->string('path_to_location_sketch')->nullable();
            $table->string('path_to_customer_details_form')->nullable();
            //below are the rows if the customer is Employed
            //we allows these rows to be null since we do not know if the customer is employed, self-employed, remittance or pensioner. However, if the customer is Employed, we will set the constraints that these rows should not be null
            //on the form level of the web application
            $table->enum('employment_type',array('casual','permanent','temporary'))->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->integer('employer_contact_no')->nullable();
            $table->string('employee_position')->nullable();
            $table->double('employee_monthly_salary')->nullable();
            $table->string('length_of_stay_in_the_company')->nullable();
            //below are the rows if the customer is Self-Employed
            //we allows these rows to be null since we do not know if the customer is employed, self-employed, remittance or pensioner. However, if the customer is Self-Employed, we will set the constraints that these rows should not be null
            //on the form level of the web application
            $table->string('self_employed_business_name')->nullable();
            $table->integer('self_employed_contact_no')->nullable();
            $table->string('self_employed_business_address')->nullable();
            $table->string('length_of_stay_in_the_current_business')->nullable();
            //below are the rows if the customer is on Remittance
            //we allows these rows to be null since we do not know if the customer is employed, self-employed, remittance or pensioner. However, if the customer is on Remittance, we will set the constraints that these rows should not be null
            //on the form level of the web application
            $table->string('remittance_name')->nullable();
            $table->string('remittance_relation_to_customer')->nullable();
            $table->string('remittance_sender_name')->nullable();
            //below is a required row if the customer is Pensioner
            //we allows this row to be null since we do not know if the customer is employed, self-employed, remittance or pensioner. However, if the customer is Pensioner, we will set the constraints that these rows should not be null
            //on the form level of the web application
            $table->string('pension_type')->nullable();
            //below are the rows that pertains to the spouse of the customer (if there is)
            //we allow these rows to be null since we do not know if the customer has a spouse.
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_last_name')->nullable();
            $table->string('spouse_middle_name')->nullable();
            $table->string('spouse_name_extension')->nullable();
            $table->integer('spouse_contact_no')->nullable();
            $table->string('spouse_address')->nullable();
            $table->string('spouse_position')->nullable();
            $table->enum('spouse_source_of_income', array('employed', 'self-employed', 'remittance', 'pensioner'))->nullable();
            $table->enum('spouse_employment_status', array('casual','permanent','temporary'))->nullable();
            $table->timestamps();
            //intializing foreign keys
            $table->integer('encoded_by_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->foreign('encoded_by_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');

        }); //end schema

        /********************* NOTE_TO_CUSTOMER_PROFILE TABLE *******************/
        Schema::create('note_to_customer_profiles', function(Blueprint $table){
            //this table contains the notes of the user to the customer profile(s)
            $table->string('note');
            $table->enum('status', array('issue','resolved')); // the note can be marked as issue or resolved
            //initializing foreign keys - these keys are also the primary keys of the table
            $table->integer('user_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_id')->references('id')->on('customers');

        }); //end schema

        /********************* PERSONAL_REFERENCE TABLE *******************/
        Schema::create('personal_references', function(Blueprint $table) {
            //we will allow these rows to be null in the database since the application might be just an inquiry
            //however, in order for the application to be a loan application, some rows of these table must not 
            //be null. The constraints will be defined on the form level of the web application
            $table->increments('id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('address')->nullable();
            $table->integer('contact_no')->nullable();
            $table->string('relationship')->nullable();
            //initializing foreign key
            $table->integer('customer_id')->unsigned()->unique();
            $table->foreign('customer_id')->references('id')->on('customers');

        }); //end schema


        /********************* CHILD_DEPENDENTS TABLE *******************/
        Schema::create('child_dependents', function(Blueprint $table) {
            //these rows can be null since we do not know if the customer has children or does not have children at all
            //the web application will ask first if the customer has children, if yes, then some of these rows are
            //required 
            $table->increments('id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('economic_status')->nullable();
            //initializing foreign key
            $table->integer('customer_id')->unsigned()->unique();
            $table->foreign('customer_id')->references('id')->on('customers');


        }); //end schema

        /********************* EXISTING_LOANS TABLE *******************/
        Schema::create('existing_loans', function(Blueprint $table) {
            //these rows can be null since we do not know if the customer has existing loans
            //the web application will ask first if the customer has existing loans, if yes, then some of these rows are
            //required 
            $table->increments('id')->unique();
            $table->string('creditor')->nullable();
            $table->string('type_of_loan')->nullable();
            $table->double('original_loan_amount')->nullable();
            $table->double('outstanding_balance')->nullable();
            $table->string('contact_person')->nullable();
            $table->integer('contact_no')->nullable();
            //initializing foreign key
            $table->integer('customer_id')->unsigned()->unique();
            $table->foreign('customer_id')->references('id')->on('customers');

        }); //end schema

        /********************* ITINERARIES TABLE *******************/
        Schema::create('itineraries', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->date('date_prepared');
            $table->date('date_checked')->nullable();
            $table->date('date_validated')->nullable();
            $table->date('date_received')->nullable();
            $table->string('itinerary')->nullable();
            $table->string('purpose')->nullable();
            $table->string('expenses')->nullable();
            $table->string('destination')->nullable();
            $table->string('remarks')->nullable();
            $table->string('future_action')->nullable();
            $table->string('status')->nullable();
            $table->string('actual')->nullable();
            $table->string('path_to_itinerary_form')->nullable();
            //initializing foreign keys
            $table->integer('prepared_by_id')->unsigned();
            $table->integer('checked_by_id')->unsigned()->nullable();
            $table->integer('validated_by_id')->unsigned()->nullable();
            $table->integer('received_by_id')->unsigned()->nullable();
            $table->foreign('prepared_by_id')->references('id')->on('users');
            $table->foreign('checked_by_id')->references('id')->on('users');
            $table->foreign('validated_by_id')->references('id')->on('users');
            $table->foreign('received_by_id')->references('id')->on('users');

        }); //end schema

        /********************* ITINERARY_LINES TABLE *******************/
        Schema::create('itineraries_line', function(Blueprint $table) {
            //this is an associative table
            //initializing foreign keys - these keys are also the primary keys of the table
            $table->integer('itinerary_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->foreign('itinerary_id')->references('id')->on('itineraries');
            $table->foreign('customer_id')->references('id')->on('customers');
        }); //end schema

        /********************* LOAN_APPLICATIONS TABLE *******************/
        Schema::create('loan_applications', function(Blueprint $table) {
            //this is a denormalized table
            //this table also contains information about the received delivery receipt from the vendor of the product
            //in this case the 3GX Computers and IT Solutions.
            $table->increments('id')->unique();
            $table->enum('application_type', array('inquiry','loan-aplication'));
            $table->enum('loan_application_tag', array('inquiry', 'ci-investigation', 'ci-re-investigation', 'audit', 'admin-approval', 'release', 'borrower','pulled-out','declined', 'cancelled', 'fully-paid'))->nullable();
            $table->integer('interest_rate');
            $table->integer('downpayment_rate');
            $table->string('date_encoded');
            $table->integer('loan_term');
            $table->double('downpayment')->nullable();
            $table->double('advanced_downpayment')->nullable();
            $table->double('added_price')->nullable();
            $table->date('date_released')->nullable();
            $table->string('endorser_remarks')->nullable();
            //the following rows pertain to the information about the received delivery receipt
            $table->string('product_delivery_receipt_no')->nullable();
            $table->date('product_delivery_received_date')->nullable();
            $table->string('path_to_delivery_receipt')->nullable();
            //the following rows pertain to the forms that has been integrated into this table
            $table->string('path_to_installment_agreement_form')->nullable();
            $table->string('path_to_promissory_note_form')->nullable();
            $table->string('path_to_loan_application_form')->nullable();
            //initializing foreign keys
            $table->integer('customer_id')->unsigned();
            $table->integer('encoded_by_id')->unsigned();
            $table->integer('product_delivery_received_by_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('encoded_by_id')->references('id')->on('users');
            $table->foreign('product_delivery_received_by_id')->references('id')->on('users');

        }); //end schema

        /********************* NOTE_TO_LOAN_APPLICATIONS TABLE *******************/
        Schema::create('note_to_loan_applications', function(Blueprint $table){
            //this table contains the notes of the user to the loan applications
            $table->string('note');
            $table->enum('status', array('issue','resolved')); // the note can be marked as issue or resolved
            //initializing foreign keys - these keys are also the primary keys of the table
            $table->integer('user_id')->unsigned();
            $table->integer('loan_application_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('loan_application_id')->references('id')->on('loan_applications');

        }); //end schema

        /********************* REQUIREMENTS TABLE *******************/
        Schema::create('requirements', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('description');

        }); //end schema

        /********************* LA_REQUIREMENTS TABLE *******************/
        Schema::create('la_requirements', function(Blueprint $table) {
            //this is an associative table containing requirements of loan application
            $table->string('path_to_requirement');
            $table->string('remarks')->nullable();
            //initializing foreign keys - these keys are also the primary keys of the table
            $table->integer('loan_application_id')->unsigned();
            $table->integer('requirement_id')->unsigned();
            $table->foreign('loan_application_id')->references('id')->on('loan_applications');
            $table->foreign('requirement_id')->references('id')->on('requirements');

        }); //end schema


        /********************* COMPANIES TABLE *******************/
        Schema::create('companies', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('contact_person')->nullable();

        }); //end schema

        /********************* PURCHASE_ORDERS TABLE *******************/
        Schema::create('purchase_orders', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('path_to_po_receipt')->nullable();
            //initializing foreign keys
            $table->integer('loan_application_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('accounting_id')->unsigned()->nullable();
            $table->integer('ordered_by_id')->unsigned();
            $table->integer('approved_by_id')->unsigned()->nullable();
            $table->foreign('loan_application_id')->references('id')->on('loan_applications');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('accounting_id')->references('id')->on('users');
            $table->foreign('ordered_by_id')->references('id')->on('users');
            $table->foreign('approved_by_id')->references('id')->on('users');

        }); //end schema

        /********************* PRODUCTS_LINE TABLE *******************/
        Schema::create('products_line', function(Blueprint $table) {
            //associative entity
            //initializing foreign keys - these keys are also the primary keys of the table
            //we just need to store the product id and later retreive the details of it on the form level of the web application
            //since it is only avaiable on the erp database
            $table->integer('product_id'); 
            $table->integer('purchase_order_id')->unsigned();
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');

        }); //end schema

        /********************* CREDIT_INVESTIGATIONS TABLE *******************/
        Schema::create('credit_investigations', function(Blueprint $table) {
            //combination of credit investigation of loan application, disposable income of the customer and spouse (if there is)
            //also, co-maker of the customer if the customer is required to have a co-maker
            //this is a denormalized table since it is one-to-one relationship with credit investigation table and 
            //these other tables do not have any other relationshio on another table(s) 
            $table->increments('id')->unique();
            $table->date('date_created');
            $table->string('endorser_recommendations');
            $table->string('auditor_remarks')->nullable();
            $table->string('admin1_remarks')->nullable();
            $table->date('admin1_approved_date')->nullable();
            $table->string('admin2_remarks')->nullable();
            $table->date('admin2_approved_date')->nullable();
            //below are the row definition of disposable income of the customer combined here in the credit investigation table
            $table->double('customer_monthly_income');
            $table->double('less_others')->nullable();
            $table->double('less_monthly_amortization')->nullable();
            $table->double('less_utilities')->nullable();
            $table->double('less_rent')->nullable();
            $table->double('less_transportation')->nullable();
            $table->double('less_education')->nullable();
            $table->double('less_living_allowance')->nullable();
            $table->double('total_monthly_income');
            $table->double('spouse_other_income')->nullable();
            $table->double('customer_other_income')->nullable();
            $table->double('spouse_deduction')->nullable();
            $table->double('customer_deduction')->nullable();
            $table->double('spouse_monthly_income')->nullable();
            //below are the row defnition of co-maker of the customer if the customer is required to have a co-maker
            $table->string('co_maker_first_name')->nullable();
            $table->string('co_maker_middle_name')->nullable();
            $table->string('co_maker_last_name')->nullable();
            $table->string('co_maker_name_extension')->nullable();
            $table->string('co_maker_relationship_from_the_customer')->nullable();
            $table->string('co_maker_ci_remarks')->nullable();
            $table->string('path_to_co_maker_form_id')->nullable();
            //initializing foreign keys of the table
            $table->integer('endorsed_by_id')->unsigned();
            $table->integer('audited_by_id')->unsigned();
            $table->integer('admin1_id')->unsigned();
            $table->integer('admin2_id')->unsigned();
            $table->integer('loan_application_id')->unsigned()->unique();
            $table->foreign('endorsed_by_id')->references('id')->on('users');
            $table->foreign('audited_by_id')->references('id')->on('users');
            $table->foreign('admin1_id')->references('id')->on('users');
            $table->foreign('admin2_id')->references('id')->on('users');
            $table->foreign('loan_application_id')->references('id')->on('loan_applications');

        }); //end schema

        /********************* CATEGORIES TABLE *******************/
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');

        }); //end schema

        /********************* QUESTIONS TABLE *******************/
        Schema::create('questions', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('description', 5000);

        }); //end schema

        /********************* QUESTIONS_LINE TABLE *******************/
        Schema::create('questions_line', function(Blueprint $table) {
            $table->enum('answer',array('yes','no'));
            $table->string('document_facts')->nullable();
            $table->integer('percentage');
            $table->string('remarks')->nullable();
            //initializing foreign keys of the table - these are also the primary keys of the table
            $table->integer('question_id')->unsigned();
            $table->integer('credit_investigation_id')->unsigned()->unique();
            $table->integer('category_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('credit_investigation_id')->references('id')->on('credit_investigations');
            $table->foreign('category_id')->references('id')->on('categories');
        }); //end schema


        /********************* ITINERARY_LINE TABLE *******************/
        //Schema::create('child_dependent', function(Blueprint $table) {}); //end schema


    } //end up function


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //the list must be reverse from the order of the create schema
        Schema::drop('question_lines');
        Schema::drop('questions');
        Schema::drop('categories');
        Schema::drop('credit_investigations');
        Schema::drop('products_line');
        Schema::drop('purchase_orders');
        Schema::drop('companies');
        Schema::drop('la_requirements');
        Schema::drop('requirements');
        Schema::drop('note_to_loan_applications');
        Schema::drop('loan_applications');
        Schema::drop('itineraries_line');
        Schema::drop('itineraries');
        Schema::drop('existing_loans');
        Schema::drop('child_dependents');
        Schema::drop('personal_references');
        Schema::drop('note_to_customer_profiles');    
        Schema::drop('customers');
        Schema::drop('branches');
        Schema::drop('password_resets');
        Schema::drop('users');
        Schema::drop('text_messaging_contacts');        
        Schema::drop('preset_text_messages'); 
    }
}
