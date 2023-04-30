<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\User;

use App\Libraries\Csvimport;

/**
 * 
 */
class SiteController extends BaseController
{
    public $validation;
    public $user_model;
    public $session;
    public $mycsv;
	
	function __construct()
	{
        helper(['url']);
		$this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->user_model = new User();

        $this->mycsv = new Csvimport();
	}

    public function index()
    {
        $data = array();
        
        // Get rows
        $data['users'] = $this->user_model->getAllUsers();
        
        // Load the list page view
        return view('users/index', $data);
    }

	// ajax method
	public function ajaxMethod()
	{
		// helper(["url"]);
		return view('ajax-method');
	}

	public function handleAjaxRequest()
	{
		// 'name' in getVar is the name coming from the Ajax Request in view page in ajax-method.php
		$name = $this->request->getVar('name');
		$email = $this->request->getVar('email');
		$data = $this->request->getVar();

		echo json_encode(array(
			"status" => 1,
			"message" => "Successful Request",
			"name" => $name,
			"email" => $email,
			"data" => $data

		));
	}


	public function permission($role_id = '')
    {
    	
    	$builder = $this->db->table('staff_privileges');

        // $roleList = $this->role_model->getRoleList();
        // $allowRole = array_column($roleList, 'id');
        // if (!in_array($role_id, $allowRole)) {
        //     access_denied();
        // }
        if (isset($_POST['save'])) {
            $role_id = $this->request->getVar('role_id');
            $privileges = $this->request->getVar('privileges');
            echo "<pre>";
            print_r($privileges);
            die();
            foreach ($privileges as $key => $value) {
                $is_add = (isset($value['add']) ? 1 : 0);
                $is_edit = (isset($value['edit']) ? 1 : 0);
                $is_view = (isset($value['view']) ? 1 : 0);
                $is_delete = (isset($value['delete']) ? 1 : 0);
                $arrayData = array(
                    'role_id' => $role_id,
                    'permission_id' => $key,
                    'is_add' => $is_add,
                    'is_edit' => $is_edit,
                    'is_view' => $is_view,
                    'is_delete' => $is_delete,
                );
                $exist_privileges = $builder->select('id')->limit(1)->where(array('role_id' => $role_id, 'permission_id' => $key))->get()->getNumRows();
                if ($exist_privileges > 0) {
                    $builder->where(array('role_id' => $role_id, 'permission_id' => $key))->update($arrayData);
                } else {
                    $builder->insert($arrayData);
                }
            }
            set_alert('success', translate('information_has_been_updated_successfully'));
            return redirect()->to(base_url('role/permission/' . $role_id));
        }
        $this->data['role_id'] = $role_id;
        // $this->data['modules'] = $this->role_model->getModulesList();
        $this->data['title'] ='roles';
        $this->data['sub_page'] = 'role/permission';
        $this->data['main_menu'] = 'settings';
        return view('role/permission', $this->data);
    }


    public function import()
    {
        $path = FCPATH . "public/uploads/";

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'csv';
            $config['max_size'] = 1024000;
            // $this->load->library('upload', $config);

            // $this->upload->initialize($config);
            // $this->validate($rules);
            $file = $this->request->getFile('file');

            if (!$file->move($path)) {
                $error = $this->validation->getErrors();

                $this->session->setFlashdata('error', $this->validation->getErrors());
                redirect()->to(base_url('sitecontroller'));
                // redirect("users");
                //echo $error['error'];
            } else {

                $file_data = $file->getName();
                $file_path = base_url() . "public/uploads/" . $file_data;

                $csv_data = $this->mycsv->parse_file($file_path);
                // print_r($csv_data);
                die();

              // Add created and modified date if not include
                $date = date("Y-m-d H:i:s");

                if ($csv_data) {
                    
                    foreach ($csv_data as $row) {

                        $insert_data[] = array(
                            'name' => $row['Name'],
                                'email' => $row['Email'],
                                'phone' => $row['Phone'],
                                'status' => $row['Status'],
                                'created' => $date,
                                'modified' => $date,
                        );
                
                    }
                   
              $this->user->insert_user($insert_data);
              $this->session->set_flashdata('success', "Csv imported successfully");
                    redirect()->to(base_url('sitecontroller'));

                } else {
                    $data['error'] = "Error occured";
                    $this->session->setFlashdata('error', $data['error']);
                    redirect()->to(base_url('sitecontroller'));
                }
                
            }
    }








} /*End Class */