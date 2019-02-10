<?php


/**
 * @property CI_DB $db
 * @property CI_Session $session
 */
class category_model extends CI_Model
{

    /**
     * @return mixed
     */
    public function get_categories()
    {
        return $this->db->get('category')->result_array();
    }

    /**
     * @param $id
     * @return array
     */
    public function get_categories_by_id($id)
    {
        return $this->db->get_where('category', ['id' => $id])->row_array();
    }

    /**
     * @param CI_Input $input
     * @return bool
     * @throws Exception
     */
    public function set_categories(CI_Input $input)
    {
        $category = [
            'label' => $input->post('label'),
            'description' => $input->post('description'),
        ];
        if ($id = $input->post('id')) {
            return $this->db->update('category', $category, ['id' => $id]);
        }

        return $this->db->insert('category', $category);
    }

    /**
     * @param $id
     */
    public function delete_categories($id)
    {
        $this->db->delete('category', ['id' => $id]);
    }
}