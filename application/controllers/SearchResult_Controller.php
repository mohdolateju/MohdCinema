<?php
/**
 * This Controller Searches the database for books that match the search term provided in the
 * Search Book page and displays the result in the Search Result Page
 * It makes use of the SearchResult_Model
 */
class SearchResult_Controller extends CI_Controller
{
    /**Default Controller Method*/
    function index()
    {
            //Using the form validation library to set rules for the search form
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<span class="searcherror" >', '</span>');
            $this->form_validation->set_rules('searchvalue', 'Search Term', 'trim|required|xss_clean');

            //Loading Controller Defined Model SearchResult_Model
            session_start();
            $this->load->model("SearchResult_Model");

            //If Search FormValiation Fails return to SearchBooks page and report the error
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->View("SearchBooks");
            }

            //If form Validation Suceeds
            else{

                    //if search type is author search for the author in the database
                    //return the results to the Search Result Page
                    if($this->input->post('searchtype')=='author'){
                    $author = $this->input->post('searchvalue');
                    $data['books']=$this->SearchResult_Model->get_books_by_authors($author);
                    $data['searchterm']=$this->input->post('searchvalue');
                    $data['searchtype']=$this->input->post('searchtype');
                    session_start();
                    $this->load->View("SearchResult",$data);
                        }

                    //if search type is title search for the title in the database
                    //return the results to the Search Result Page
                    else if($this->input->post('searchtype')=='title'){
                        $title = $this->input->post('searchvalue');
                        $data['books']=$this->SearchResult_Model->get_books_by_title($title);
                        $data['searchterm']=$this->input->post('searchvalue');
                        $data['searchtype']=$this->input->post('searchtype');
                        $this->load->View("SearchResult",$data);
                    }

                    //if search type is subject search for the subject in the database
                    //return the results to the Search Result Page
                    else if($this->input->post('searchtype')=='subject'){
                        $subject = $this->input->post('searchvalue');
                        $data['books']=$this->SearchResult_Model->get_books_by_subject($subject);
                        $data['searchterm']=$this->input->post('searchvalue');
                        $data['searchtype']=$this->input->post('searchtype');
                        $this->load->View("SearchResult",$data);
                    }

                    //if search type is description search for the description in the database
                    //return the results to the Search Result Page
                    else if($this->input->post('searchtype')=='description'){
                        $description = $this->input->post('searchvalue');
                        $data['books']=$this->SearchResult_Model->get_books_by_description($description);
                        $data['searchterm']=$this->input->post('searchvalue');
                        $data['searchtype']=$this->input->post('searchtype');
                        $this->load->View("SearchResult",$data);
                    }
            }

    }
}
