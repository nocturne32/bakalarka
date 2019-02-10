<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Base.php';

class User extends Base
{
    /**
     * @throws Exception
     */
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('user/register');
        } else {
            $this->user_model->set_users($this->input);
            redirect(site_url('login'));
        }
    }

    /**
     * @throws Exception
     */
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('user/login');
        } else if ($this->user_model->authenticate($this->input)) {
            redirect(base_url());
        } else {
            redirect(site_url('login'));
        }
    }

    public function logout()
    {
        $this->authorize();
        $this->session->unset_userdata('is_user_logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

