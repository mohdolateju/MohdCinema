<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mohammed
 * Date: 24/03/13
 * Time: 17:57
 * To change this template use File | Settings | File Templates.
 */
class SearchMovies_Model extends CI_Model
{
    /**Gets the books that match any title specified in the parameter
     * @param Book title
     * @return book details as string
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
