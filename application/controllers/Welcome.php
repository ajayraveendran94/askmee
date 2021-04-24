<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('addproduct_model');
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$category_name = $this->addproduct_model->get_category();
		$products = $this->addproduct_model->get_product();
        $data['category'] = $category_name;
        $data['products'] = $products;
		//print_r($data);
		$this->load->view('templates/header');
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer');
	}
}
