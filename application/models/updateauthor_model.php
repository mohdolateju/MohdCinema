<?php
/**
 * Model is Used by the UpdateAuthor Controller to get all the id's of the authors
 */
class updateauthor_model extends CI_Model
{
    /** Gets all the ids of the authords
     *@return all authors ids as arrays
     */
    public function get_authorids(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authorsids = $query->result_array();
        //$this->db->close();
        return $authorsids;
    }
}
