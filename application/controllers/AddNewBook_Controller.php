<?php
/**
 * This Controller Adds A New Book to the Database
 */
class AddNewBook_Controller extends CI_Controller
{

    /**Default Controller Method*/
    function index()
    {
        //Split the author field
        $authorname = explode(" ",$this->input->post('author'));
        //Load the Controller Specific model
        $this->load->model("AddNewBook_Model");
        //gets the max id of the available books and increamets it by 1 for the new book to be added
        $id=$this->AddNewBook_Model->get_max_id();
        $newid=(int)$id;
        $nextid=$newid+1;

        //The rules for the bookcover image to be uploaded
        $config['upload_path'] = './book_images/';
        $config['file_name'] = $nextid.$authorname[1];
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '500';
        $config['max_width'] = '600';
        $config['max_height'] = '800';

        //Loading the required Libraries and setting of rules to process the adding of a new book to the database
        $this->load->library('upload', $config);
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('bookcover', 'BookCover Image', 'allowed_types|max_size|max_width|max_height');
        $this->form_validation->set_rules('cost', 'Cost', 'trim|required|is_numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|integer');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        //if the validation of the form rules fail load admin page with error messages
        if (($this->form_validation->run() == FALSE)||(!$this->upload->do_upload("bookcover")))
        {
            $firstname = $this->input->post('userlname');
            $lastname = $this->input->post('userfname');

            //data needed to load the Admin page
            $data=$this->AddNewBook_Model->get_loggedin_user($firstname,$lastname);
            $data['authors']=$this->AddNewBook_Model->get_all_authors();
            $data['uploaderror'] = $this->upload->display_errors();
            $this->load->view('AdminDetails',$data);
        }
        //If validation succeeds add new book to database and load Admin Page with Success message
        else{
            $userfirstname = $this->input->post('userlname');
            $userlastname = $this->input->post('userfname');
            $title = $this->input->post('title');
            $publisher = $this->input->post('publisher');
            $subject = $this->input->post('subject');
            $description = $this->input->post('description');
            $cost = $this->input->post('cost');
            $stock = $this->input->post('stock');
            $data=$this->AddNewBook_Model->get_loggedin_user($userfirstname,$userlastname);
            $data['authors']=$this->AddNewBook_Model->get_all_authors();
            (int)$authorid=$this->AddNewBook_Model->get_authorid($authorname[0],$authorname[1]);
            $this->AddNewBook_Model->set_new_book($nextid,$title,$authorid,$publisher,$subject,$description, $cost, $stock);
            $this->upload->data("bookcover");
            $data['bookadded']="<div class='searcherror'>Book Successfully Added</div>";
            $this->load->view('AdminDetails',$data);
        }

    }

}
