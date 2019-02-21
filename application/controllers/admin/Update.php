<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }

        //TODO: Create an update page
        //TODO: Make sure an admin is logged in before update or else kick them out
        if(!$this->session->userdata('changed')) {
            echo '<h3>Everything is already up to date</h3>';
        } else {
            echo $this->session->userdata('changed');
        }

        $this->session->unset_userdata('changed');
    }

}
