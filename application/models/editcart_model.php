<?php
///**
// * Created by JetBrains PhpStorm.
// * User: Mohammed
// * Date: 11/25/12
// * Time: 5:00 PM
// * To change this template use File | Settings | File Templates.
// */
//class EditCart_Model extends CI_Model
//{
//    public function get_books_details($bookid)
//    {
//        $this->load->database();
//        $sql = "SELECT book_id,title,subject,description, publisher,cost,stock, firstname,lastname
//                FROM books,authors
//                WHERE books.author_id=authors.author_id
//                AND books.book_id=?
//                ORDER BY book_id";
//        $query = $this->db->query($sql, $bookid);
//        $row = $query->row_array();
//        $this->db->close();
//        return $row;
//
//    }
//}
