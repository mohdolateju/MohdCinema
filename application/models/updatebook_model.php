<?php
/**
 * This Model is used by the Update Book Controller to load the Update book page
 */
class updatebook_model extends CI_Model
{
    /**Gets the details of A Book from the database
     * @param Book id
     *@return All the details of the book as arrays
     */
    public function get_book_details($bookid)
    {
        $this->load->database();
        $sql = "SELECT book_id,title,subject,description, publisher,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
                AND books.book_id=?";
        $query = $this->db->query($sql, $bookid);
        $row = $query->row_array();
        //$this->db->close();
        return $row;

    }

    /**Gets All Authors from the database
     *@return All the authors as arrays
     */
    public function get_all_authors(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $row = $query->result_array();
        //$this->db->close();
        return $row;
    }

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
        //$this->db->close();
        return $books;

    }

}
