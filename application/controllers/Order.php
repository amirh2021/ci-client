<?php
    Class Order extends CI_Controller{
        var $api ="";
        function __construct() {
            parent::__construct();
            $this->api="https://api-test.godig1tal.com/order/all_order";
            $this->load->library('session');
            $this->load->library('curl');
            $this->load->helper('form');
            $this->load->helper('url');
        }
        function index(){
            $data['judul'] = 'List Order API';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('order/v_list');
            $this->load->view('templates/footer');
        }
        function tambah()
        {
            $tahun = tahun($this->input->post('datepicker'));    
            $date = tgl_standard($this->input->post('datepicker'));    
            $no = $this->input->post('no');
            $country = $this->input->post('country');    
            $order_id = $country."-".$tahun."-".$no;    
            $customer_id = $this->input->post('customer_id');    
            $region = $this->input->post('region');
            $product_id = $this->input->post('product_id');
            $sales = $this->input->post('sales');
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api-test.godig1tal.com/order/new_order',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('order_id' => $order_id,'customer_id' => $customer_id,'region' => $region,'product_id' => $product_id,'date' => $date,'sales' => $sales),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $hasil = json_decode($response, true);
            if($hasil['status'] == "200 - success") {
            $this->session->set_flashdata("info", "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil!</strong> Menambah Data.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>");
            redirect('order');
            } else {
                $this->session->set_flashdata("info", "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Gagal!</strong> Menambah Data.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>");
                redirect('order');
            }   
        }
    }
?>