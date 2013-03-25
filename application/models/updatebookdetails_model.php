<?php
/**
 * This Model Updates the details of a book
 */
class updatebookdetails_model extends CI_Model
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
        $bookdetails = $query->row_array();
        //$this->db->close();
        return $bookdetails;

    }

    /**Gets All Authors from the database
     *@return All the authors as arrays
     */
    public function get_all_authors(){
        $this->load->database();
        $sql = "SELECT * FROM authors";
        $query=$this->db->query($sql);
        $authors = $query->result_array();
        //$this->db->close();
        return $authors;
    }

    /**Udpates and existing book in the database
     *@param Book id, Book title, Author id, Book Publisher, Book Subject, Book Description, Book Cost, Book Stock
     */
    function update_book($book_id, $title, $authorid, $publisher, $subject, $description,$cost,$stock){

        $data = array(
            'title' => $title,
            'author_id' => $authorid ,
            'publisher' => $publisher ,
            'subject' => $subject,
            'description' => $description,
            'cost' => $cost,
            'stock' => $stock,
        );
        $this->db->where('book_id', $book_id);
        $this->db->update('books', $data);
        //$this->db->close();


    }

    /**Gets the AuthorId using the firstname and lastname of the author
     * @param Author's Firstname, Author's Lastname
     * @return Author id as an integer
     */
    public function get_authorid($authorfname,$authorlname){
        $this->load->database();
        $sql = "SELECT author_id FROM authors WHERE firstname=? AND lastname=? ";
        $query=$this->db->query($sql,array($authorfname,$authorlname));
        $row = $query->row_array();
        //$this->db->close();
        return $row['author_id'];
    }
}
