<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Gallery_model');

		$data['navItems'] = navMenu();

        $data['gallery'] = $this->input->get('gallery');
        $data['galleries'] = $this->Gallery_model->getGallery();

		$this->load->view('theme/header');

		$this->load->view('theme/nav-bar', $data);

		$this->load->view('pages/gallery');

		$this->load->view('theme/footer', $data);
	}
}
