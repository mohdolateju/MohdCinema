<?php

class Checkout_Model extends CI_Model
{
    public function voucher_exist($voucher)
    {
        $this->load->database();
        $sql = "SELECT *
                FROM vouchernos
                WHERE voucher_no REGEXP ?
                ORDER BY movie_id";
        $query=$this->db->query($sql,$voucher);
        $vouchers = $query->result_array();
        if(empty($vouchers)){
            return false;
        }else{
            return true;
        }

    }
    public function getMaxSeatNo($movie_id,$screen)
    {
        $this->load->database();
        $sql = "SELECT max(seat_no)
                FROM reservations
                WHERE movie_id=?
                AND screen_no=?";
        $query=$this->db->query($sql,array($movie_id,$screen));
        $maxSeatNo = $query->result_array()[0];

        return $maxSeatNo["max(seat_no)"];


    }

    public function getMaxScreenNo($movie_id)
    {
        $this->load->database();
        $sql = "SELECT max(screen_no)
                FROM reservations
                WHERE movie_id=?";
        $query=$this->db->query($sql,$movie_id);
        $maxSeatNo = $query->result_array()[0];

        return $maxSeatNo["max(screen_no)"];


    }

    /**Creates A New customer in the database
     * @param customer Id,customer Firstname, customer Lastname, customer Email, customer Password
     */
    function store_voucher($voucher_no, $movie_id,$customer_id,$seat,$selectedtime,$screen){
        $data1 = array(
            'voucher_no' => $voucher_no,
            'movie_id' => $movie_id
        );

        $dateArray=getdate();
        $date=$dateArray['year']."-".$dateArray['mon']."-".
              $dateArray['wday']." ".$dateArray['hours'].":".$dateArray['minutes'].":".$dateArray['seconds'];

        $data2 = array(
            'voucher_no' => $voucher_no,
            'movie_id'=>$movie_id,
            'customer_id' => $customer_id,
            'transaction_date' => $date,
            'seat_no' => $seat,
            'showtiming'=>$selectedtime,
            'screen_no'=>$screen
        );

        $this->db->trans_start();
        $this->db->insert('vouchernos', $data1);
        $this->db->insert('reservations', $data2);
        $this->db->trans_complete();
        //$this->db->close();
    }
}
