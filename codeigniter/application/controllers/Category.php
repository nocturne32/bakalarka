<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Base.php';

class Category extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->authorize();
    }

    public function index()
    {
        $data['categories'] = $this->category_model->get_categories();
        $this->render('category/index', $data);
    }

    /**
     * @throws Exception
     */
    public function create()
    {
        $this->form_validation->set_rules('label', 'Label', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('category/create');
        } else {
            $this->category_model->set_categories($this->input);
            redirect(site_url('categories'));
        }
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function edit($id)
    {
        $data['category'] = $this->category_model->get_categories_by_id($id);
        $this->form_validation->set_rules('label', 'Label', 'required');

        if ($this->form_validation->run() === false) {
            $this->render('category/edit', $data);
        } else {
            $this->category_model->set_categories($this->input);
            redirect(site_url('categories'));
        }
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->category_model->delete_categories($id);
        redirect(site_url('categories'));
    }
}

