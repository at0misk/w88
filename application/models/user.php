<?php
// model
class user extends CI_Model {
     function get_all_users()
     {
         return $this->db->query("SELECT * FROM users")->result_array();
     }
     function get_user_by_email($email)
     {
         return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
     }
     function add_user($user)
     {
         $query = "INSERT INTO users (first, last, email, password, created_at, updated_at) VALUES(?,?,?,?, NOW(), NOW())";
         $values = array($user['first'], $user['last'], $user['email'], $user['password']); 
         return $this->db->query($query, $values);
     }
}
?>