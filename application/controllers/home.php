<?php

class Home extends CI_Controller
{
    
    public function index()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        $this->load->view('home/inc/footer_view');
    }

    public function register()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/register_view');
        $this->load->view('home/inc/footer_view');
    }


//    public function code()
//    {
////        $this->load->library('encrypt');
////        echo $this->encrypt->encode('My Secret Password');
////        echo $this->encrypt->decode('mVdvlbGw+OiC3cDEYO+wCGctVnTJ6t3Fq5FWVGh0hjL1LS/hrFFbC4cp8J2dsqjGAXGNoc3AQyV/R42pK2uVKg==');
////          echo hash('sha256','admin'.SALT);
//
//    }

//    public function test()
//    {
////        $sql = "SELECT user_id, login FROM user ORDER BY user_id DESC";
//
////        $this->db->where(['user_id'=>2]);
////        $this->db->select('user_id,login');
////        $q = $this->db->get_where('user',['user_id' => 1]);
////        $q = $this->db->get('user');
////        print_r($q->result());
//
//        // SELECT user_id, login FROM user ORDER BY user-id DESC
//        $this->db->select('user_id,login');
////        $this->db->from('user');
//        $this->db->order_by('user_id DESC');
//        $q = $this->db->get('user');
//        print_r($q->result());
//
//        $this->db->select();
//        print_r($q->result());
//
//        $data = array('user',[
//            'login' => 'Jenkins'
//        ]);
//        $this->db->insert('user',$data);
//    }



}