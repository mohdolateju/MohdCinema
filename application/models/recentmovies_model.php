<?php
/**
 *This Model returns movies in the Other of their Release Dates
 */
class recentmovies_model extends CI_Model
{
    /**Gets all the Movies and returns the as an array
     *@return Movies as Array
     */
    public function get_new_movies($noOfMovies)
    {
        $this->load->database();
        $sql = "SELECT movie_id, title
                FROM movies,directors
                WHERE movies.director_id=directors.director_id
                ORDER BY date
                LIMIT $noOfMovies";
        $query = $this->db->query($sql);
        $books = $query->result_array();
        $this->db->close();
        return $books;

    }
}
