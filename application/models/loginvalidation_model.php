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
    public function get_userdetails_from_customers($username,$password){
        $this->load->database();
        $sql = "SELECT * FROM customers  WHERE username=? AND password=?";
        $query=$this->db->query($sql, array($username, $password));
        $userdetails = $query->row_array();
        $this->db->close();
        return $userdetails;
    }
}

?>
