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
		if (session()->has('la_id')) {
			$la_id = session()->get('la_id');
			$status = $this->dModel->updateLogoutTime($la_id);
			if ($status) {	
				session()->remove('logged_user');
				session()->remove('la_id');
				session()->destroy();
			
				return redirect()->to('login');
			}
		}	
	}

	public function login_activity()
	{
		$data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('loggedin_uniid'));
		$data['login_info'] = $this->dModel->getLoginUserInfo(session()->get('loggedin_uniid'));

		return view('login_activity_view', $data);
	}









} /*End Class*/