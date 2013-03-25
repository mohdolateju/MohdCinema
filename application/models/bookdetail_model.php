<?php
/**
 *This Model is used to get the details of a book from the database
 *it is used by the Book Detail Controller
 */
class bookdetail_model extends CI_Model
{
    /**This Function gets the details of a book from the database with a specific bookid
     * @param the books id as an integer
     * @return details of the books as an array
     */
    public function get_books_details($bookid)
    {
        $this->load->database();
        $sql = "SELECT book_id,title,subject,description, publisher,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
                AND books.book_id=?
                ORDER BY book_id";
        $query = $this->db->query($sql, $bookid);
        $details = $query->row_array();
        $this->db->close();
        return $details;

    }
}
