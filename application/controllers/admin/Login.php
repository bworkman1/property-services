<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    protected $Settings;

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('form','english');
        $this->lang->load('auth','english');

        $this->Settings = get_settings();
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('admin/dashboard');
        }

        $this->output->set_template('blank');

        $this->load->view('pages/login', $this->Settings);
    }

    public function submit()
    {
        if(isset($_POST)) {
            $feedback = ['success' => false, 'msg' => lang('login_error'), 'hash' => $this->security->get_csrf_hash()];
            $this->load->library('form_validation');

            $this->form_validation->set_rules('', 'Identity', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('remember-me', 'Remember Me', 'max_length[2]');

            $data = $this->security->xss_clean($_POST);
            $data['remember-me'] = 'on' ? TRUE : FALSE;

            if ($this->form_validation->run() !== FALSE) {
                if ($this->ion_auth->login($data['identity'], $data['password'], $data['remember-me'])) {
                    $this->ion_auth->clear_login_attempts($data['identity']);

                    echo json_encode([
                        'success' => true,
                        'msg' => 'Login successful',
                        'redirect' => base_url('admin/dashboard')
                    ]);
                    exit;
                }
            }

            /*
                TODO: STILL SOME LOGIC THAT NEEDS IMPORVED HERE. WHEN THE VALIDATION FAILS AN ATTEMPT TO LOGIN ISN'T
                ACTUALLY CREATED SO THE ATTEMPTS NUMBER NEVER INCREASES. NOT A SHOW STOPPER BUT KIND OF WEIRD. NOT SURE
                IF I SHOULD JUST GO AHEAD AND RUN THE LOGIN EVERY TIME OR SET SOME RULES ON THE CLIENT SIDE TO PREVENT
                SUBMISSION IF THE MIN REQUIREMENTS AREN'T MET. TBD
            */

            if($this->ion_auth->is_max_login_attempts_exceeded($data['identity'])) {
                $feedback['msg'] = lang('login_attempts_max');
            } else {
                $attempts = $this->ion_auth->get_attempts_num($data['identity']);
                $feedback['msg'] = $attempts > 0
                    ? $feedback['msg'] = str_replace('{TRIES_LEFT}', '(' . $attempts . ' attempts left)', lang('login_error_with_tries'))
                    : lang('login_error');
            }

            echo json_encode($feedback);
        } else {
            show_404();
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('admin/login');
        exit;
    }

}
