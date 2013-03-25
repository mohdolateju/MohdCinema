<?php
/**
 * Used by Edit Books Controller to Get all the book details from the database
 */
class editbooks_model extends CI_Model
{
    /**Gets all the books details
     @return All Books As Arrays
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
        //$this->db->close();
        return $books;

    }
}
