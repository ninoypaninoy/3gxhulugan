<?php

namespace Hulugan\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display random messages on the header of home page
         $greetings = array(
            'How are you today?',
            'Good Day!',
            'How is it going?',
            'Can I be of assistance?',
            'What else can I do for you?',
            'Alrighty, What\'s next?',
            'What would you like to do now?',
            'What can I do now?',
            'Anything else can I do?',
            'Need anything?',
            '"Smile. It\'s the best thing anyone can wear." :)',
            'Hi there!',
            'I\'m here to help. :)',
            '"Think economically." ;)',
            '"No rain. No flowers." :)',
            '"You are amazing. Always remember that." :)',
            '"The best is yet to come." :)',
            '"You are somebody\'s reason to smile." :)',
            '"Remind youreself that it\'s ok not to be perfect." :)',
            '"Do what you love." :)',
            '"Conquer from within." :)',
            '"Stay positive." :)',
            '"You can and you will." :)',
            'Never give up!',


        );

        return view('home', array('greetings' => $greetings[rand(0, count($greetings) - 1)] ));

    } //end function index

    

} //end controller
