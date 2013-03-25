<?php
/**
 * This Controller Udpates a book in the bookstore database
 */
class UpdateBookDetails_Controller extends CI_Controller
{
        /**Default Controller Method*/
       function index(){
           //Loads model and Gets the details of the book to be updated
           $this->load->model("UpdateBookDetails_Model");
           $bookid = $this->input->post('bookid');
           $details= $this->UpdateBookDetails_Model->get_book_details($bookid);

           //The rules for the bookcover image to be uploaded
           $config['upload_path'] = './book_images/';
           $config['file_name'] = $bookid.$details['lastname'];
           $config['allowed_types'] = 'jpg';
           $config['max_size'] = '500';
           $config['max_width'] = '600';
           $config['max_height'] = '800';
           $config['overwrite'] = true;

           //Loads library needed to update book details and sets rules for the form
           $this->load->library('upload', $config);
           $this->load->library('form_validation');

           $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
           $this->form_validation->set_rules('title', 'Title', 'trim|required');
           $this->form_validation->set_rules('author', 'Author', 'required');
           $this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
           $this->form_validation->set_rules('subject', 'Subject', 'trim|required');

           //The rules for the bookcover image if uploaded by user
           if(!empty($_FILES['bookcover']['name'])){
           $this->form_validation->set_rules('bookcover', 'BookCover Image', 'allowed_types|max_size|max_width|max_height');
           }

           $this->form_validation->set_rules('cost', 'Cost', 'trim|required|is_numeric');
           $this->form_validation->set_rules('stock', 'Stock', 'trim|required|integer');
           $this->form_validation->set_rules('description', 'Description', 'trim|required');

           //if New Book Cover is uploaded include book cover image in validation
           if (!empty($_FILES['bookcover']['name']))
           {
               //if the validation of the form rules fail load updatebook page with error messages
               if($this->form_validation->run() == FALSE||!$this->upload->do_upload("bookcover")){
                   $details['uploaderror'] = $this->upload->display_errors();

                   //data needed to load the update book page
                   $details['authors']=$this->UpdateBookDetails_Model->get_all_authors();
                   $this->load->view('UpdateBook',$details);
               }
               //If validation succeeds update book in database and load Update book Page with Success message
               else{
                   $authorname = explode(" ",$this->input->post('author'));
                   $oldlastname=$details['lastname'];
                   $authorid=$this->UpdateBookDetails_Model->get_authorid($authorname[0],$authorname[1]);
                   $title = $this->input->post('title');
                   $publisher = $this->input->post('publisher');
                   $subject = $this->input->post('subject');
                   $cost = $this->input->post('cost');
                   $stock = $this->input->post('stock');
                   $description = $this->input->post('description');
                   $this->UpdateBookDetails_Model->update_book($bookid,$title,$authorid,$publisher, $subject, $description,$cost,$stock);

                   //rename the bookcover image in the directory for book images
                   rename("./book_images/".$bookid.$oldlastname.".jpg","./book_images/".$bookid.$authorname[1].".jpg");
                   $details= $this->UpdateBookDetails_Model->get_book_details($bookid);
                   $details['authors']=$this->UpdateBookDetails_Model->get_all_authors();
                   $details['success']="<div class='searcherror'>Book Successfully Updated</div>";
                   $this->load->view("UpdateBook", $details);
               }


           }
           //if New Book Cover is not uploaded dont include book cover image in validation
           else
           {
               if($this->form_validation->run() == FALSE){
                   $details['authors']=$this->UpdateBookDetails_Model->get_all_authors();
                   $this->load->view('UpdateBook',$details);
               }else{
                   $authorname = explode(" ",$this->input->post('author'));
                   $oldlastname=$details['lastname'];
                   $authorid=$this->UpdateBookDetails_Model->get_authorid($authorname[0],$authorname[1]);
                   $title = $this->input->post('title');
                   $publisher = $this->input->post('publisher');
                   $subject = $this->input->post('subject');
                   $cost = $this->input->post('cost');
                   $stock = $this->input->post('stock');
                   $description = $this->input->post('description');
                   $this->UpdateBookDetails_Model->update_book($bookid,$title,$authorid,$publisher, $subject, $description,$cost,$stock);

                   //rename the bookcover image in the directory for book images
                   rename("./book_images/".$bookid.$oldlastname.".jpg","./book_images/".$bookid.$authorname[1].".jpg");
                   $details= $this->UpdateBookDetails_Model->get_book_details($bookid);
                   $details['authors']=$this->UpdateBookDetails_Model->get_all_authors();
                   $details['success']="<div class='searcherror'>Book Successfully Updated</div>";
                   $this->load->view("UpdateBook", $details);

               }
           }


       }
}
