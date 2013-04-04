<?php
/**
 * Used to Search For Movies
 */
class SearchMovies_Model extends CI_Model
{
    /**Gets the movies that match any title specified in the parameter
     * @param Movie title
     * @return movie details as string
     */
    function get_movie_by_title($title){
        $this->load->database();
        $sql = "SELECT movie_id, title
                FROM movies
                WHERE title REGEXP ?
                ORDER BY movie_id";
        $query=$this->db->query($sql,$title);
        $movies = $query->result_array();
        $this->db->close();
        return $movies;
    }

}
