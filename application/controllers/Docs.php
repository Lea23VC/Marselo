<?php
    class Docs extends CI_Controller{

        public function index() {


            $data['title'] = 'Latest Posts';

            $this->load->view('templates/header');
            $this->load->view('pages/docs', $data);
            $this->load->view('templates/footer');

        }


    }