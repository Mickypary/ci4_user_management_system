<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\DashboardModel;

/**
 * 
 */
class Dashboard extends Controller
{
	public $dModel;
	
	function __construct()
	{
		// code...
		$this->dModel = new DashboardModel();
		$this->session = session();
	}

	public function index()
	{
		if (!is_loggedin()) {
			// code...
			return redirect()->to('login');
		}

		$uniid = session()->get('loggedin_uniid');
		
		$data['userdata'] = $this->dModel->getLoggedInUserData($uniid);


		return view('dashboard_view', $data);
		
	}

	public function logout()
	{
		// code...
		session()->remove('logged_user');
		session()->destroy();
		return redirect()->to('login');
	}
}