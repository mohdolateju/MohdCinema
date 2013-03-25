<?php
/**
 * The Register Validation Model used to register new user into the database by the Register Validation Controller
 */
class registervalidation_model  extends CI_Model
{
    /**Gets the Maximum Id of the Existing Users from the Database
     * @return Maximum User's as int
     */
      function get_max_costumerid(){
          $this->load->database();
          $query = $this->db->query('SELECT MAX(user_no) FROM users');
          $result = $query->row_array();
          //$this->db->close();
          $maxno=$result['MAX(user_no)']  ;
          return $maxno;

      }

    /**Creates A New costumer in the database
     * @param CostumerNumber,Costumer Firstname, Costumer Lastname, Costumer Email, Costumer Password,Costmer Address
     */
    function set_new_costumer($costumerno, $firstname, $lastname, $email, $password, $address){
        $costumerid=$firstname.$costumerno;
        $data = array(
            'user_no' => $costumerno,
            'firstname' => $firstname ,
            'lastname' => $lastname ,
            'email' => $email,
            'user_id' => $costumerid,
            'password' => $password,
            'address' => $address,
            'type' =>"costumer"
        );
        $this->db->insert('users', $data);
        //$this->db->close();
    }
}
