<?php


/**
 * @property CI_DB $db
 * @property CI_Session $session
 */
class article_model extends CI_Model
{

    /**
     * @return mixed
     */
    public function get_articles()
    {
        $this->db->select('article.*, category.label, category.description, user.username');
        $this->db->from('article');
        $this->db->join('user', 'user.id = article.user_id');
        $this->db->join('category', 'category.id = article.category_id');
        $this->db->order_by('id DESC');
        return $this->db->get()->result_array();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get_articles_by_id($id)
    {
        $this->db->select('article.*, category.label, category.description, user.username');
        $this->db->from('article');
        $this->db->join('user', 'user.id = article.user_id');
        $this->db->join('category', 'category.id = article.category_id');
        $this->db->order_by('id DESC');
        return $this->db->where('article.id', $id)->get()->row_array();
    }

    /**
     * @param array $conditions
     * @return mixed
     */
    public function get_articles_by($conditions = [])
    {
        $this->db->select('article.*, category.label, category.description, user.username');
        $this->db->from('article');
        $this->db->join('user', 'user.id = article.user_id');
        $this->db->join('category', 'category.id = article.category_id');
        $this->db->order_by('id DESC');
        $this->db->where($conditions);
        return $this->db->get()->result_array();
    }

    /**
     * @param CI_Input $input
     * @return bool
     * @throws Exception
     */
    public function set_articles(CI_Input $input)
    {
        $article = [
            'title' => $input->post('title'),
            'user_id' => $this->session->userdata('user_id'),
            'category_id' => $input->post('category_id'),
            'content' => $input->post('content'),
            'created_at' => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s')
        ];
        if ($id = $input->post('id')) {
            unset($article['user_id'], $article['created_at']);
            return $this->db->update('article', $article, ['id' => $id]);
        }

        return $this->db->insert('article', $article);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete_articles($id)
    {
        return $this->db->delete('article', ['id' => $id]);
    }
}