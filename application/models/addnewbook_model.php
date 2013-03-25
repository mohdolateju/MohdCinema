<?php
/**
 * This Model is used by Add New Book Controller to Create a New Book in the database
 */
class addnewbook_model extends CI_Model
{
    /**Gets the Details of a user that is loggged in using the Firstname and Lastname of the user
     *@param Users Firstname and Lastname
     *@return Users Details as an array
     */
    public function get_loggedin_user($firstname,$lastname){
        $this->load->database();
        $sql = "SELECT * FROM users WHERE firstname=? and lastname=?";
        $query=$this->db->query($sql,array($firstname,$lastname));
        $userdetails = $query->row_array();
        //$this->db->close();
        return $userdetails;
    }

    /**Gets the Maximum Book id from the books in the database
     * @return integer as the book id
     */
    function get_max_id(){
        $this->load->database();
        $query = $this->db->query('SELECT MAX(book_id) FROM books');
        $result = $query->row_array();
        //$this->db->close();
        $maxno=$result['MAX(book_id)']  ;
        return $maxno;

    }

    /**Creates a new book in the database
     *@param Book id, Book title, Author id, Book Publisher, Book Subject, Book Description, Book Cost, Book Stock
     */
    function set_new_book($bookid,$title,$authorid,$publisher,$subject,$description, $cost, $stock){

        $data = array(
            'book_id'=>$bookid,
            'title'=>$title,
            'author_id' => $authorid,
            'publisher'=>$publisher,
            'subject'=>$subject,
            'description'=>$description,
            'cost'=>$cost,
            'stock'=>$stock,
        );

        $this->db->insert('books', $data);
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

}
