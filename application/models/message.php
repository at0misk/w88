<?php
// model
class message extends CI_Model {
     function get_all_messages()
     {
         return $this->db->query("SELECT messages.content AS content, users.first AS first, users.last AS last, messages.id AS id, messages.title AS title FROM messages JOIN users ON messages.Users_id = users.id")->result_array();
     }
    function addNewMessage($input){
        $query = "INSERT INTO messages (title, content, Users_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
        $values = array($input['title'],  $input['content'], $input['user_id']);;
        return $this->db->query($query, $values);
     }
}
?>