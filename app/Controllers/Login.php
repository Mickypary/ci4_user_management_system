<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\LoginModel;

/**
 * 
 */
class Login extends Controller
{
	public $loginModel;
	public $session;
	
	function __construct()
	{
		helper('form');
		$this->loginModel = new LoginModel();
		$this->session = \Config\Services::session();
		// $this->session = session();
	}

	public function index()
	{
		if (is_loggedin()) {
			
			return redirect()->to('dashboard');
		}

		$data = [];
		$data['errors'] = null;

		// site login code
		if ($this->request->getMethod() == 'post') {
			
			$rules = [

				'email' => 'required|valid_email',
				'pass' => 'required|min_length[6]|max_length[16]',

			];

			if ($this->validate($rules)) {
				
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('pass');

				$userdata = $this->loginModel->verifyEmail($email);

				if ($userdata) {

						if (password_verify($password, $userdata->password)) {
							// code...

							if ($userdata->status == 'active') {
								// code...
								$loginInfo = [
									'uniid' => $userdata->uniid,
									'agent' => $this->getUserAgentInfo(),
									'ip' => $this->request->getIPAddress(),
									'login_time' => date('Y-m-d H:i:s'),
								];

								// save login activities to database and return the last inserted ID
								$login_activity_id = $this->loginModel->saveLoginInfo($loginInfo);
								if ($login_activity_id) {				
									$this->session->set('la_id', $login_activity_id);	
								}

								$sessUserdata = [
									'loggedin' => true,
									'loggedin_uniid' => $userdata->uniid,
								];

								$this->session->set($sessUserdata);
								return redirect()->to(base_url() .'dashboard');
							}else {
								$this->session->setTempdata('error', 'Please activate your account or contact admin', 3);
								return redirect()->to(current_url());
							}
						}else {

							$this->session->setTempdata('error', 'Incorrect password entered', 3);
							return redirect()->to(current_url());
						}

				}else {
					$this->session->setTempdata('error', 'Sorry! Email does not exist', 3);
					return redirect()->to(current_url());
				}

			}else {
				$data['errors'] = $this->validator;
			}
		}


		// google login code
		require_once APPPATH . "libraries/vendor/autoload.php";

		$google_client = new \Google_Client();
		$google_client->setClientId('36228445799-5j6vn0687emn01g8sg2o39v9e9td1i43.apps.googleusercontent.com');
		$google_client->setClientSecret('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');
		$google_client->setRedirectUri(base_url() . 'login');
		$google_client->addScope('email');
		$google_client->addScope('profile');

		// the 'code' request name is predefined by google
		if ($this->request->getVar('code')) {
			
			$token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
			if (!isset($token['error'])) {
				
				$google_client->setAccessToken($token['access_token']);
				session()->set('access_token', $token['access_token']);

				// to get the profile data
				$google_service = new \Google_Service_Oauth2($google_client);

				$googledata = $google_service->userinfo->get();
								
				if ($this->loginModel->google_user_exists($googledata['id'])) {
					// update
					$userdata = [
						'first_name' => $googledata['given_name'],
						'last_name' => $googledata['family_name'],
						'email' => $googledata['email'],
						'profile_pic' => $googledata['picture'],
					];

					$this->loginModel->updateGoogleUser($googledata['id'], $userdata);
					session()->set('google_user', $userdata);
					return redirect()->to(base_url() . 'dashboard');


				}else {
					// insert
					$userdata = [
						'oauth_id' => $googledata['id'],
						'first_name' => $googledata['given_name'],
						'last_name' => $googledata['family_name'],
						'email' => $googledata['email'],
						'profile_pic' => $googledata['picture'],
					];

					$this->loginModel->createGoogleUser($userdata);
					// session()->set($userdata);
					session()->set('google_user', $userdata);
					return redirect()->to(base_url() . 'dashboard');
				}
			}
		}

		if (!session()->get('access_token')) {
			
			$data['loginButton'] = $google_client->createAuthUrl();
		}
		
		
		return view("login_view", $data);
	}


	public function getUserAgentInfo()
	{
		$agent = $this->request->getUserAgent();

		if ($agent->isBrowser()) {		
			$currentAgent = $agent->getBrowser();
		}elseif ($agent->isRobot()) {
			$currentAgent = $agent->getRobot();
		}elseif ($agent->isMobile()) {
			$currentAgent = $agent->getMobile();
		}else {
			$currentAgent = "Unidentified User Agent";
		}

		return $currentAgent;
	}






} /*End Class*/