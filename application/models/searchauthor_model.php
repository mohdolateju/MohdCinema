<?php
/**
 * This Model is used by the Search Author Controller to Search for an author
 */
class searchauthor_model extends CI_Model
{
    /**Gets all authors id
     *@return author ids as arrays
     */
    public function get_authorids(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authorids = $query->result_array();
       // $this->db->close();
        return $authorids;
    }

    /**Gets an authors details from a supplied author id
     * @param An author's id
     *@return Returns the authors details as an array
     */
    public function get_author_by_id($authorid){
        $this->load->database();
        $sql = "SELECT * FROM authors WHERE author_id=?";
        $query=$this->db->query($sql,$authorid);
        $authordetails = $query->row_array();
       // $this->db->close();
        return $authordetails;
    }
}
