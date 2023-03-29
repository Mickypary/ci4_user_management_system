<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Welcome to CodeIgniter 4',
            'page_heading' => 'CodeIgniter 4 training',

        ];

        return view('homeview', $data);
    }

    public function about()
    {

        return view('aboutview');
    }

    public function training()
    {
        // code...
        return view("trainingview");
    }

    public function online()
    {
        // code...
        return view("onlineview");
    }

    public function _remap($method, $param1 = null, $param2 = null) {
        
        if (method_exists($this, $method)) {
            // code...
            return $this->$method($param1, $param2);
        }

        throw PageNotFoundException::forPageNotFound();
        
        
    }
}
