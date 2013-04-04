<?php
/**
 * This Controller Loads the SearchBooks Page
 */
class SearchMovies_Controller extends CI_Controller
{

        /**Default Controller Method*/
        function index()
        {
            //Using the form validation library to set rules for the search form
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="padding-left: 30%;padding-top: 1%;">', '</div>');
            $this->form_validation->set_rules('searchvalue', 'Search', 'trim|required|xss_clean');

            //Loading Controller Defined Model SearchResult_Model

            //resumes session
            session_start();
            $this->load->model("SearchMovies_Model");

            //If Search FormValiation Fails return to SearchBooks page and report the error
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->View("SearchMovies");
            }

            //If form Validation Succeeds
            else{
                //if search type is title search for the title in the database
                //return the results to the Search Result Page
                    $title = $this->input->post('searchvalue');
                    $data['movies']=$this->SearchMovies_Model->get_movie_by_title($title);
                    if(is_null($data['movies'])){
                        $data['searched']==true;
                    }
                    $this->load->View("SearchMovies",$data);

            }

        }


}
