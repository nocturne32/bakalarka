<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Base.php';

class Homepage extends Base
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if ($user_id = $this->input->get('author', TRUE)) {
            $data['articles'] = $this->article_model->get_articles_by(['user_id' => $user_id]);
        } elseif ($category_id = $this->input->get('category', TRUE)) {
            $data['articles'] = $this->article_model->get_articles_by(['category_id' => $category_id]);
        } else {
            $data['articles'] = $this->article_model->get_articles();
        }
        $this->render('homepage/index', $data);
    }

}

