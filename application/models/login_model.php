                                <?php
class Login_model  extends CI_Model {

    private $perms = array(
        'god'               => 0,
        'users_access'      => 0,
        'items_god'     => 0,
        'news_access'       => 0,
        'items_show'    => 0,
    );

    private $roles = array(

        1 => array(
            'title' => 'admin',
            'perms' => array(
                'god'               => 1,
            ),
        ),

        2 => array(
            'title' => 'editor',
            'perms' => array(
                'items_god'     => 1,
                'news_access'       => 1,
                'items_show'    => 1,
            ),
        ),

        3 => array(
            'title' => 'user',
            'perms' => array(
                'items_show'    => 1,
            ),
        ),

        4 => array(
            'title' => 'guest',
            'perms' => array(),
        ),

    );

	public function __construct()
	{
		$this->load->database();
	}

	public function login_logic( $login, $password ) {
        $login = trim($login);
        $password = md5(trim($password));
        $res = $this->db->get_where('users', array('username' => $login, 'password' => $password ));
        $userdata = $res->row_array();

		// Если пользователь найден
		if ( !empty($userdata) && $userdata['username'] == $login && 
				$userdata['password'] == $password) {
			// Создаем массим с данными сессии
			$authdata = array(
				'username' => $login,
				'logged_in' => true,
                'role'      => $userdata['role_id'],
			);
			// Добавляем данные в сессию
			$this->session->set_userdata('user', $authdata);
			return true;
		}else { // Если нет то выводим форму авторизации
			return false;
		}
	}


    public function add_user($username, $passwd, $role = 4) {
        $username = trim($username);
        $passwd = md5(trim($passwd));
        $role = intval(trim($role));

        $data = array(
            'username' => $username,
            'password' => $passwd,
            'role_id'  => $role,
        );

        if ($res = $this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update_user($id, $username, $passwd, $role = 4){
        $id = intval($id);
        $username = trim($username);
        $passwd = md5(trim($passwd));
        $role = intval(trim($role));

        $data = array(
            'username' => $username,
            'password' => $passwd,
            'role_id'  => $role,
        );

        $this->db->where('id', $id);
        if ($res = $this->db->update('users', $data)) return true;
        else return false;
    }

    public function delete_user($id){
        $id = intval($id);
        return $this->db->delete('users', array('id' => $id));
    }

    public function get_users_list($page = 1 ) {
        $limit = 50000;
        $offset = (intval($page) - 1)*$limit;
        $out = array();
        $query = $this->db->get('users', $limit, $offset);
        foreach ($query->result() as $row) {
            $out[] = array(
                'id' => $row->id,
                'username' => $row->username,
                'role'  => $this->roles[$row->role_id]['title'],
            );
        }
        return $out;
    }

    public function get_user_info($id){
        $query = $this->db->get_where('users', array('id' => $id));
        return reset($query->result());
    }

    /**
     * @param int $role
     * @param string $flag
     * @return bool
     */
    public function check_perm( $role = 4, $flag = 'items_show') {
        $perms = @array_merge( (array)$this->perms, (array)$this->roles[$role]['perms']);
//        echo "<pre>"; print_r($perms); echo "</pre>";
        if ($perms['god'] == 1) return true;
        return $perms[$flag] ? true : false;
    }

    /**
     * @return array
     */
    public function get_roles_list() {
        $list = array();
        foreach ($this->roles as $key => $role) {
            $list[$key] = $role['title'];
        }
        return $list;
    }

    public function get_perms_list(){
        $out = array();
        foreach ($this->perms as $perm => $value) {
            $out[] = $perm;
        }
        return $out;
    }


}
                            