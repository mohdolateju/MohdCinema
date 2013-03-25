<?php
/**
 * The Login Validation Model to be used by the Login Validation Controller
 */
class loginvalidation_model extends CI_Model
{
    /**
     * Gets A User's Details
     * @param UserId and Password
     * @return A Single User's Details as An Array
     */
    public function get_userdetails($userid,$password){
        $this->load->database();
        $sql = "SELECT * FROM users  WHERE user_id=? AND password=?";
        $query=$this->db->query($sql, array($userid, $password));
        $userdetails = $query->row_array();
        $this->db->close();
        return $userdetails;
    }

    /**
     * Gets All the Book Authors
     * @return All the Book Authors
     */
    public function get_all_authors(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authors = $query->result_array();
        $this->db->close();
        return $authors;
    }
}

?>
