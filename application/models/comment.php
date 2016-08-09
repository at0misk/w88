<?php
// model
class comment extends CI_Model {
     function get_all_comments()
     {
         return $this->db->query("SELECT comments.id AS id, comments.content AS content, comments.Messages_id AS Messages_id, users.first AS first, users.last AS last FROM comments JOIN users ON comments.Users_id = users.id")->result_array();
     }
    function addNewComment($input){
        $query = "INSERT INTO comments (content, Users_id, Messages_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
        $values = array($input['content'],  $input['user_id'], $input['message_id']);
        return $this->db->query($query, $values);
     }
}
?>