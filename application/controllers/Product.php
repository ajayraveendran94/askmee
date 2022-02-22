<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Product extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('productlist_model');
    }

    public function view($page){
        //$product_data = $this->productlist_model->get_product_data($page);
        $product_data = $this->productlist_model->get_product_data($page);
        if(!empty($product_data))
        {
            $category_products = $this->productlist_model->get_category_data($product_data[0]->c_id);
            $data['products'] = $category_products;
        }
        $review_data = $this->productlist_model->get_review_data($page);
        // else
        // {

        // }
        $data['product_data'] = $product_data;
        $data['reviews'] = $review_data;
        $this->load->helper('navbar');
        echo header_helper_ex();
        echo navbar_helper_ex();
        if(count($review_data) > 0){
            $rating_1 = 0;
            $rating_2 = 0;
            $rating_3 = 0;
            $rating_4 = 0;
            $rating_5 = 0;
            foreach($review_data as $review){
              if($review->ur_rating > 0){
                switch ($review->ur_rating){
                  case 1:
                    $rating_1 = $rating_1 + 1;
                    break;
                  case 2:
                    $rating_2 = $rating_2 + 1;
                    break;
                  case 3:
                    $rating_3 = $rating_3 + 1;
                    break;
                  case 4:
                    $rating_4 = $rating_4 + 1;
                    break;
                  case 5:
                    $rating_5 = $rating_5 + 1;
                    break;
                }
              }  
            }
            $data['rating_1'] = $rating_1;
            $data['rating_2'] = $rating_2;
            $data['rating_3'] = $rating_3;
            $data['rating_4'] = $rating_4;
            $data['rating_5'] = $rating_5;
            if($rating_1 + $rating_2 + $rating_3 + $rating_4 + $rating_5 > 0){
                $data['average_rating'] = round((($rating_1 + (2 * $rating_2) + (3 * $rating_3) + (4 * $rating_4) + (5 * $rating_5)) / ($rating_1 + $rating_2 + $rating_3 + $rating_4 + $rating_5)), 2);
            }
            else{
                $data['average_rating'] = 0;
            }
            //print_r($data['reviews'][0]);
        }
        //print_r($review_data[0]->ur_rating);
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
    }
    public function view_product($page){
        //$this->load->model('addproduct_model');
        //$product_data = $this->productlist_model->get_product_data($page);
        $category_products = $this->productlist_model->get_category_product_data($page);
        foreach($category_products as $key=>$value){
            $category_products[$key]['category_name'] = $value['product_name'];
        }
        $data['products'] = $category_products;
        $this->load->helper('navbar');
        echo header_helper_ex();
        echo navbar_helper_ex();
        $this->load->view('product_list', $data);
        $this->load->view('templates/footer');
    }

    public function get_product(){
        $product_data = $this->productlist_model->get_product_and_id(trim($this->input->post('category_id')));
        print_r(json_encode($product_data));
    }
}