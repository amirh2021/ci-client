<?php
    Class Dashboard extends CI_Controller{
        var $api ="";
        function __construct() {
            parent::__construct();
            $this->api="";
            $this->load->library('session');
            $this->load->library('curl');
            $this->load->helper('form');
            $this->load->helper('url');
        }
        function index(){
            $data['judul'] = 'Dashboard';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dashboard/v_list');
            $this->load->view('templates/footer');
        }
        
    }
?>