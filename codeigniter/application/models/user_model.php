<?php


/**
 * @property CI_DB $db
 * @property CI_Session $session
 */
class user_model extends CI_Model
{

    /**
     * @return mixed
     */
    public function get_users()
    {
        return $this->db->get('user')->result_array();
    }

    /**
     * @param $id
     * @return array
     */
    public function get_users_by_id($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    /**
     * @param CI_Input $input
     * @return bool
     * @throws Exception
     */
    public function set_users(CI_Input $input)
    {
        $user = [
            'username' => $input->post('username'),
            'email' => $input->post('email'),
            'password' => password_hash($input->post('password'), PASSWORD_BCRYPT),
            'roles' => 'ROLE_USER',
            'registered_at' => (new DateTimeImmutable('now'))->format('Y-m-d H:i:s')
        ];
        if ($user['email'] === '') {
            unset($user['email']);
        }
        return $this->db->insert('user', $user);
    }

    /**
     * @param CI_Input $input
     * @return bool
     */
    public function authenticate(CI_Input $input)
    {
        $password = $input->post('password');
        $user = $this->get_users_by(['username' => $input->post('username')]);

        if (!password_verify($password, $user['password'])) {
            return false;
        }
        if (password_needs_rehash($user['password'], PASSWORD_BCRYPT)) {
            $update['password'] = password_hash($password, PASSWORD_BCRYPT);
            $this->db->update('user', $update, ['id' => $user['id']]);
        }

        $this->session->set_userdata('is_user_logged_in', true);
        $this->session->set_userdata('user_id', $user['id']);

        return true;
    }

    /**
     * @param array $conditions
     * @return mixed
     */
    public function get_users_by($conditions = [])
    {
        return $this->db->get_where('user', $conditions)->row_array();
    }

    /**
     * @return bool
     */
    public function is_user_logged_in()
    {
        if ($this->session->userdata('is_user_logged_in')) {
            return true;
        }
        return false;
    }
}