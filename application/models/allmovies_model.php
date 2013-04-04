<?php
/**
 * This Model Gets All The movies from the database
 */
class allmovies_model extends CI_Model
{
    /**Gets all the Movies and returns the as an array
     *@return Movies as Array
     */
    public function get_all_movies()
    {
        $this->load->database();
        $sql = "SELECT movie_id, title
                FROM movies,directors
                WHERE movies.director_id=directors.director_id";
        $query = $this->db->query($sql);
        $movies = $query->result_array();
        $this->db->close();
        return $movies;

    }
}
