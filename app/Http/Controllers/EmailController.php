<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function contactUs(Request $request){

		$message = [
			'required' => 'Поле :attribute обязательно для заполнения!',
			'email' => 'Поле :attribute должно соответствовать Email адресу!',
		]; 

    	$this->validate($request, [
    		'name' 	=> 'required|max:100',
    		'email' => 'required|email',
    		'text' 	=> 'required'
    	], $message);

    	
    	Mail::to('vladislavvitalevich@gmail.com')->send(new ContactUs($request->all()));
	    	return redirect()->back(); 
    	


    }
}
