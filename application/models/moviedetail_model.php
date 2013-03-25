<?php
/**
 *This Model is used to get the details of a book from the database
 *it is used by the Book Detail Controller
 */
class moviedetail_model extends CI_Model
{
    /**This Function gets the details of a book from the database with a specific bookid
     * @param the books id as an integer
     * @return details of the books as an array
     */
    public function get_movie_details($movieid)
    {
        $this->load->database();
        $sql = "SELECT * FROM movies,directors
                WHERE movies.director_id=directors.director_id
                AND movies.movie_id=?";
        $query = $this->db->query($sql, $movieid);
        $details = $query->row_array();
        $this->db->close();
        return $details;

    }
}
