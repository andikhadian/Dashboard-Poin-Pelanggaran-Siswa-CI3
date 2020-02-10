<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        // load base_url
        $this->load->helper('url');
    }

    public function index()
    {

        $data['title'] = 'Page Not Found &mdash; Polansis';
        $this->load->view('error404', $data);
    }
}
