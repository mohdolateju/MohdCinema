<?php
/**
 * This Model is used by the Update Author Controller to Update details of an Author
 */
class updateauthordetails_model extends CI_Model
{
    /**Gets All Author Id's
     *@return Author Id's as arrays
     */
    public function get_authorids(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authorids = $query->result_array();
        //$this->db->close();
        return $authorids;
    }

    /**Updates the Details of Existing Authors
     *@param Existing Authors id, Authors Firstname, Author's Lastname
     */
    function update_author($authorid, $firstname, $lastname){

        $data = array(
            'author_id' => $authorid ,
            'firstname' => $firstname ,
            'lastname' => $lastname
        );
        $this->db->where('author_id', $authorid);
        $this->db->update('authors', $data);
       // $this->db->close();


    }

    /**Gets the Id of An author
     *@param Authors Firstname, Author's Lastname
     *@return The Authors Id
     */
    public function get_authorid($authorfname,$authorlname){
        $this->load->database();
        $sql = "SELECT author_id FROM authors WHERE firstname=? AND lastname=? ";
        $query=$this->db->query($sql,array($authorfname,$authorlname));
        $author = $query->row_array();
        //$this->db->close();
        return $author['author_id'];
    }

    /**Gets Author Details From a specified Author's id
     *@param Existing Authors id
     *@return Returns Author's Details
     */
    public function get_author_by_id($authorid){
        $this->load->database();
        $sql = "SELECT * FROM authors WHERE author_id=?";
        $query=$this->db->query($sql,$authorid);
        $author = $query->row_array();
        //$this->db->close();
        return $author;
    }

 }

