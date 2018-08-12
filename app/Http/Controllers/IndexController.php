<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Partfolio;
use App\People;



class IndexController extends Controller
{
    public function execute( Request $request ) {

    	$pages = Page::all();
    	$partfolios = Partfolio::all();
    	$services = Service::all();
    	$peoples = People::all();

    	$menu = array();

    	foreach( $pages as $page ){
    		$item = [
	    		'title' => $page->name,
	    		'alias' => $page->alias
    		];
    		array_push($menu, $item);
    	}

    	$item = [
    		'title' => 'Services',
    		'alias' => 'service'
    	];
		array_push($menu, $item);

		$item = [
    		'title' => 'Portfolio',
    		'alias' => 'Portfolio'
    	];
		array_push($menu, $item);

		$item = [
    		'title' => 'Team',
    		'alias' => 'team'
    	];
		array_push($menu, $item);


		$item = [
    		'title' => 'Contact',
    		'alias' => 'contact'
    	];
		array_push($menu, $item);
    
    	return view('site.index', compact(['menu','page', 'partfolios', 'services','peoples']));

    }
}
