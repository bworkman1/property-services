<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    protected $Settings;

    public function __construct()
    {
        parent::__construct();

        $this->Settings = get_settings();
    }

    public function index()
    {
        $this->output->set_template('blank');

        $this->load->view('pages/login', $this->Settings);
    }

}
