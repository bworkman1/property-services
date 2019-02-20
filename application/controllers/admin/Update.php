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

        echo '<h3>Updated</h3>';
    }

}
