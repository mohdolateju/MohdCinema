<?php
/**
 * This Model is used to  Get all the books from the database, it is used by the Browse Books Controller
 */
class browsebooks_model extends CI_Model
{

    /**Gets all the books and returns the as an array
     *@return Books as Array
     */
    public function get_all_books()
    {
        $this->load->database();
        $sql = "SELECT book_id,title,description,subject, publisher,cost, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
                ORDER BY book_id";
        $query = $this->db->query($sql);
        $books = $query->result_array();
        $this->db->close();
        return $books;

    }
}
