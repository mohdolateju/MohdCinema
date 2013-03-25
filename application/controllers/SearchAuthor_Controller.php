<?php
/**
 * Used to Search for a particular author with an author id
 */
    class SearchAuthor_Controller extends CI_Controller
    {
        /**Default Controller Method*/
        function index(){

            //loads model
            $this->load->model("SearchAuthor_Model");

            //gets all the authorids to be sent to the UpdateAuthor page incase of another search
            $data['authorids']=$this->SearchAuthor_Model->get_authorids();

            //gets the author details requested by the user and send it to the Update Author page
            $author=$this->SearchAuthor_Model->get_author_by_id($this->input->post('authorid'));
            $data['firstname']=$author['firstname'];
            $data['lastname']=$author['lastname'];
            $data['author_id']=$author['author_id'];
            $this->load->view("UpdateAuthor",$data);
        }
}
