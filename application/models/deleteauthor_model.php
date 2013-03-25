<?php
/**
 * This Model is used by the Delete Author Controller to Delete an Author
 */
class deleteauthor_model extends CI_Model
{
    /**Get all id of the existing authors
     *@return all the id's of the authors*/
    public function get_authorids(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authorsids = $query->result_array();
        //$this->db->close();
        return $authorsids;
    }

    /**deletes an author with a specified id
     *@param the id of the author to be deleted
     */
    function delete_author($authorid){

        $this->db->where('author_id', $authorid);
        $this->db->delete('authors');
        //$this->db->close();

    }

    /**Gets the Id of An author
     *@param Authors Firstname, Author's Lastname
     *@return The Authors Id
     */
    public function get_authorid($authorfname,$authorlname){
        $this->load->database();
        $sql = "SELECT author_id FROM authors WHERE firstname=? AND lastname=? ";
        $query=$this->db->query($sql,array($authorfname,$authorlname));
        $row = $query->row_array();
        //$this->db->close();
        return $row['author_id'];
    }

    /**Gets Author Details From a specified Author's id
     *@param Existing Authors id
     *@return Returns Author's Details
     */
    public function get_author_by_id($authorid){
        $this->load->database();
        $sql = "SELECT * FROM authors WHERE author_id=?";
        $query=$this->db->query($sql,$authorid);
        $row = $query->row_array();
        //$this->db->close();
        return $row;
    }
}

