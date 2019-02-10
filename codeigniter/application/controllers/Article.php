<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Base.php';

class Article extends Base
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
        $this->authorize();

        $data['articles'] = $this->article_model->get_articles();
        $this->render('article/index', $data);
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $data['article'] = $this->article_model->get_articles_by_id($id);
        $this->render('article/show', $data);
    }

    /**
     * @throws Exception
     */
    public function create()
    {
        $this->authorize();
        $data['categories'] = $this->category_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('article/create', $data);
        } else {
            $this->article_model->set_articles($this->input);
            redirect(site_url('articles'));
        }
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function edit($id)
    {
        $this->authorize();
        $data['article'] = $this->article_model->get_articles_by_id($id);
        $data['categories'] = $this->category_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('article/edit', $data);
        } else {
            $this->article_model->set_articles($this->input);
            redirect(site_url('articles'));
        }
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->authorize();
        $this->article_model->delete_articles($id);
        redirect(site_url('articles'));
    }
}

