<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/index');
        $this->load->view('common/footer');
    }

    public function user()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/user');
        $this->load->view('common/footer');
    }

    public function userdetail()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/userdetail');
        $this->load->view('common/footer');
    }

    public function info()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info');
        $this->load->view('common/footer');
    }

    public function info2()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info2');
        $this->load->view('common/footer');
    }

    public function info3()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/info3');
        $this->load->view('common/footer');
    }

    public function qrscan()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/qrscan');
        $this->load->view('common/footer');
    }

    public function upiid()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/upiid');
        $this->load->view('common/footer');
    }

    public function history()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/history');
        $this->load->view('common/footer');
    }

    public function qps()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/qps');
        $this->load->view('common/footer');
    }

    public function thankyou()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/thankyou');
        $this->load->view('common/footer');
    }

    public function claimupi()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('Packet/claimupi');
        $this->load->view('common/footer');
    }
}
