<?php
    defined('BASEPATH') OR exit('No direct scripts access allowed');

    class API extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Api_model');
        }

        function index() {
            $data = $this->Api_model->getAll();
            echo json_encode($data->result_array());
        }

        function get_by_id() {
            if($this->input->post('id')) {
                $data = $this->Api_model->get_by_id($this->input->post('id'));
                foreach($data as $row)
                {
                    $ouput['id_barang'] = $row["id_barang"];
                    $ouput['nama'] = $row["nama"];
                }
                echo json_encode($ouput);
            }
        }
    }
?>