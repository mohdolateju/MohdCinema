<?php
/**
 * Search Result Model searches for books in the database
 * It is used by Search Result Controller
 */
class searchresult_model extends CI_Model
{

    /**Gets the books by author that matches with the specified
     * parameter
     * @param Author's name
     * @return book details as string
     */
    function get_books_by_authors($author){
        $this->load->database();
        $sql = "SELECT book_id,title,description, publisher,subject,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
				AND (firstname REGEXP ? OR lastname REGEXP ? OR
					  CONCAT(firstname,' ',lastname) REGEXP ? )
                ORDER BY book_id";
        $query=$this->db->query($sql,array($author,$author,$author));
        $books = $query->result_array();
        $this->db->close();
        return $books;
    }

    /**Gets the books that match any title specified in the parameter
     * @param Book title
     * @return book details as string
     */
    function get_books_by_title($title){
        $this->load->database();
        $sql = "SELECT book_id,title,description, publisher,subject,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
				AND title REGEXP ?
                ORDER BY book_id";
        $query=$this->db->query($sql,$title);
        $books = $query->result_array();
        $this->db->close();
        return $books;
    }

    /**Gets the books that match any subject specified in the parameter
     * @param Book subject
     * @return book details as string
     */
    function get_books_by_subject($subject){
        $this->load->database();
        $sql = "SELECT book_id,title,description, publisher,subject,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
				AND subject REGEXP ?
                ORDER BY book_id";
        $query=$this->db->query($sql,$subject);
        $books = $query->result_array();
        $this->db->close();
        return $books;
    }

    /**Gets the books that matches any word in a books description
     * @param Book Description
     * @return book details as string
     */
    function get_books_by_description($description){
        $this->load->database();
        $sql = "SELECT book_id,title,description, publisher,subject,cost,stock, firstname,lastname
                FROM books,authors
                WHERE books.author_id=authors.author_id
				AND description REGEXP ?
                ORDER BY book_id";
        $query=$this->db->query($sql,$description);
        $books = $query->result_array();
        $this->db->close();
        return $books;
    }

}
