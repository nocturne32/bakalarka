<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property article_model $article_model
 * @property category_model $category_model
 * @property user_model $user_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Base extends CI_Controller
{

//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->helper('url');
//    }

    protected function render($view, $data = [])
    {
        $menu = $this->user_model->is_user_logged_in() ? $this->menu_logged_in() : $this->menu();
        $this->load->view('layout/header', [
            'menu' => $menu
        ]);
        $this->load->view($view, $data);
        $this->load->view('layout/footer');
    }

    /**
     * @return array
     */
    protected function menu_logged_in()
    {
        return [
            base_url() => 'Articles',
            site_url('articles/create') => 'New article',
            site_url('articles') => 'Edit articles',
            site_url('categories') => 'Edit categories',
            site_url('logout') => 'Sign out',
        ];
    }

    /**
     * @return array
     */
    protected function menu()
    {
        return [
            base_url() => 'Articles',
            site_url('login') => 'Sign in',
            site_url('register') => 'Sign up',
        ];
    }

    protected function authorize()
    {
        if (!$this->user_model->is_user_logged_in()) {
            redirect(site_url('login'));
        }
    }
}

