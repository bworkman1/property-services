<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/login');
            exit;
        }
    }

    public function index()
    {
        $this->output->set_template('logged-in-admin');
    }

}