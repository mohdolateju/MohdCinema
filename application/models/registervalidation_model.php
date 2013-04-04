<?php
/**
 * The Register Validation Model used to register new user into the database by the Register Validation Controller
 */
class registervalidation_model  extends CI_Model
{
    /**Gets the Maximum Id of the Existing Users from the Database
     * @return Maximum User's as int
     */
      function get_max_customerid(){
          $this->load->database();
          $query = $this->db->query('SELECT MAX(customer_id) FROM customers');
          $result = $query->row_array();
          //$this->db->close();
          $maxno=$result['MAX(customer_id)']  ;
          return $maxno;

      }

    /**Creates A New customer in the database
     * @param customer Id,customer Firstname, customer Lastname, customer Email, customer Password
     */
    function set_new_customer($customerid, $firstname, $lastname, $email, $password){
        $username=$firstname.$customerid;
        $data = array(
            'customer_id' => $customerid,
            'username' => $username,
            'firstname' => $firstname ,
            'lastname' => $lastname ,
            'email' => $email,
            'password' => $password
        );
        $this->db->insert('customers', $data);
    }
}
