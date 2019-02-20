<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

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
		$data['navItems'] = navMenu();

		$this->load->view('theme/header');

		$this->load->view('theme/nav-bar', $data);

		$this->load->view('pages/contact');

		$this->load->view('theme/footer', $data);
	}

	public function send()
	{
		$feedback = array('success' => false, 'msg' => 'Contact form failed to send, try again');

		$this->load->library('form_validation');
		$this->load->library('email');

		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[50]');
		$this->form_validation->set_rules('phone', 'Phone', 'min_length[12]|max_length[12]|alpha_dash');
		$this->form_validation->set_rules('budget', 'Budget', 'required|min_length[11]|max_length[16]');
		$this->form_validation->set_rules('project_date', 'Project Date', 'min_length[10]|max_length[10]');
		$this->form_validation->set_rules('project', 'Project', 'required|min_length[50]|max_length[500]');

		if ($this->form_validation->run() == false) {

			$feedback['msg'] = 'Form failed to send, fix the errors and try again';
			$feedback['data'] = validation_errors_array();

        } else {
        	if($this->validRecaptcha($_POST['g-recaptcha-response'])) {
	        	$config['mailtype'] = 'html';
				$this->email->initialize($config);		

				$this->email->from('no-reply@samsonconcrete.com', 'No Reply | Samson Concrete');
				$this->email->to('george@samsonconcrete.com');

				$this->email->subject('Contact Form | Quote Request');
				
				$email = $this->load->view('email/contact-form', '', true);
				
				$this->email->message($email);
				if(1 + 1 == 2) {
				//if($this->email->send()) {
					$feedback['success'] = true;
					$feedback['msg'] = 'Message successfully sent!';
				} else {
					$feedback['msg'] = 'Emailed failed to send, please call us or email us directly.';
				}
			} else {
				$feedback['msg'] = 'It looks as though you might be a spammer. Sorry for the inconvenience, please call us at 740 344-7036';
			}	
        }

        echo json_encode($feedback);
	}

	private function validRecaptcha($response)
	{
		$data = array(
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        );

		$verify = curl_init();

		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

		$response = json_decode(curl_exec($verify));
	
		return $response->success;
	}

	public function preview_email() {
		 $this->load->view('email/contact-form');
	}
}
