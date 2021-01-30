<?php
    Class Customer extends CI_Controller{
        var $api ="";
        function __construct() {
            parent::__construct();
            $this->api="https://api-test.godig1tal.com/customer/all_customer";
            $this->load->library('session');
            $this->load->library('curl');
            $this->load->helper('form');
            $this->load->helper('url');
        }
        function index(){
            $data['judul'] = 'List Customer API';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('customer/v_list');
            $this->load->view('templates/footer');
        }
        
    }
?>