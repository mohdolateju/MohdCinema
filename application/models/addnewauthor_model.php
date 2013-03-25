<?php
/**
 * Model used to Add New Author to the database
 */
class addnewauthor_model extends CI_Model
{
    /**This gets the details of the logged in user
     *@param user firstname,user lastname
     *@return user details as array
     */
    public function get_loggedin_user($firstname,$lastname){
        $this->load->database();
        $sql = "SELECT * FROM users WHERE firstname=? and lastname=?";
        $query=$this->db->query($sql,array($firstname,$lastname));
        $userdetails = $query->row_array();
        //$this->db->close();
        return $userdetails;
    }

    /**
     *Used to test if an author exists
     *@param author firstname, author's lastname
     * @return True if author exist false if author doesnt exist
     */
    public function ifauthorexists($firstname,$lastname){
        $this->load->database();
        $sql = "SELECT * FROM authors WHERE firstname=? and lastname=?";
        $query=$this->db->query($sql,array($firstname,$lastname));
        $result = $query->row();
        //$this->db->close();
        if(empty($result)){
            return FALSE;
        }else{
            return TRUE;
        }

    }

    /**Gets the Maximum id of the available authors
     *@return Maximum number as int
     */
    function get_max_id(){
        $this->load->database();
        $query = $this->db->query('SELECT MAX(author_id) FROM authors');
        $result = $query->row_array();
        //$this->db->close();
        $maxno=$result['MAX(author_id)']  ;
        return $maxno;

    }

    /**Creates an new Author
     *@param New Author's id, Firstname, Lastname
     */
    function set_new_author($authorid, $firstname, $lastname){
        $data = array(
            'author_id' => $authorid,
            'firstname' => $firstname ,
            'lastname' => $lastname
        );

        $this->db->insert('authors', $data);
        //$this->db->close();

    }

    /**Gets all authors in the database
     * @return all authors as array
     */
    public function get_all_authors(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authors = $query->result_array();
        //$this->db->close();
        return $authors;
    }


}
