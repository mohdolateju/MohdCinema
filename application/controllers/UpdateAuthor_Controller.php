<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mohammed
 * Date: 12/12/12
 * Time: 10:01 PM
 * To change this template use File | Settings | File Templates.
 */
class UpdateAuthor_Controller extends CI_Controller
{
        function index(){
            $this->load->model("UpdateAuthor_Model");
            $data['authorids']=$this->UpdateAuthor_Model->get_authorids();
            $this->load->view("UpdateAuthor",$data);
        }
}
