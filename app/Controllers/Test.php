<?php

namespace App\Controllers;
use CodeIgniter\Controller;

/**
 * 
 */
class Test extends Controller
{
	
	function __construct()
	{
		// code...
	}

	public function index()
	{
		// code...
		$parser = \Config\Services::parser();

		$data = [
			"page_title" => "My Blog Title",
			"page_heading" => "My Blog Heading",
			"subjects_list" => [
				['subject' => 'HTML', 'abbr' => 'Hyper Text Markup Language'],
				['subject' => 'CSS', 'abbr' => 'Cascading Style Sheet'],
				['subject' => 'JSON', 'abbr' => 'JavaScript Object Notation'],
				['subject' => 'AJAX', 'abbr' => 'Asynchronous JavaScript And XML'],
				['subject' => 'PHP', 'abbr' => 'Hypertext Preprocessor'],

			],
			"status" => true,
		];

		return $parser->setData($data)->render('myview');

		// return view('myview');
	}
}