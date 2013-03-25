<?php
/**
 * This Model is used by the Delete Book Controller to delete books from the bookstore database
 */
class deletebook_model extends CI_Model
{
    /**Deletes a book from the database
     *@param Book id
     */
    public function delete_book($book_id)
    {
        $this->load->database();
        $this->db->where('book_id', $book_id);
        $this->db->delete('books');
        //$this->db->close();

    }

    /**Gets All Books from the database
     *@return All the book details as arrays
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

    /**Gets the Author details by using a book id
     * @param book id
     * @return Author details as string
     */
    public function get_author_by_bookid($bookid)
    {
        $this->load->database();
        $sql = "SELECT firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
                and book_id=?
                ORDER BY book_id";
        $query = $this->db->query($sql,$bookid);
        $authordetails = $query->row_array();
        //$this->db->close();
        return $authordetails;

    }
}
