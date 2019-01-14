<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class api extends CI_Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $message;
        // $message['status'] = 'worked';

        // echo json_encode($message);
        // exit();Ç
        //echo HTTP_BASE_PATH . 'government.co.za/api'; // how to get the actual app path

        $message['message'] = 'you are not allowed to acces this api endpoint';

        echo json_encode($message);
        die();
    }

    public function account(){
        //seting up the user model
        $this->load->model('User','user_model');

        $input = file_get_contents('php://input');
        $data = json_decode($input,true);
        $message = array();
        $user = array();

        if($data['action'] == 'signin'){       //sign in api function
            $user_data['username'] = $data['username'];
            $user_data['password'] = $data['password'];

            //log in user
            if($this->user_model->api_log_in($data)){
                $user_model_in_std_class = $this->user_model->api_log_in($data);

                $user_model_in_json = json_encode((array)$user_model_in_std_class[0]);
                echo $user_model_in_json;
                exit();

            }else{
                //account not found 
                $message['id'] = 'error';
                $message['account'] = 'account not found check username and password';
                echo json_encode($message);
                exit();
            }
        }else if($data['action'] == "signup"){      //sign up api function
            //check if username is found
            if(!$this->user_model->field_exists('username', $data['username'])){
                $message['id'] = 'error';
                $message['error'] = 'username is taken';
                echo json_encode($message);
                exit();
            }

            //check if email is found
            if(!$this->user_model->field_exists('email', $data['email'])){
                $message['id'] = 'error';
                $message['error'] = 'email is taken';
                echo json_encode($message);
                exit();
            }


            //create new user
            //if both email and username are not used
            $new_user = $this->user_model->api_create_user($data);

            if($new_user){  //if user is created
                $new_user = $this->user_model->get_user($new_user);
                echo json_encode($new_user[0]);
                exit();
            }else{
                $message['id'] = 'error occured';
                echo json_encode($message);
                exit();
            }
        }
        else{   //only runned if api call is from someone who doesnt know how it works
            $message['feedback'] = 'action is uknown';
        }

        echo json_encode($message);
        exit();
    }

    function government_categories(){
        $this->load->model('government_category');

        //in stdclass format
        $categories = json_encode((array)$this->government_category->api_all());
        echo $categories;
        exit;
    }

    public function get_companies_by_category($id){
        if(empty($id))
        {
            echo 'error occured';
            exit();
        }

        $this->load->model('api_company');

        $companies = json_encode((array) $this->api_company->get_companies_by_category($id));
        echo $companies;
        exit();
    }

    function user($id){

    }

    function update(){

    }

    function logout(){

    }

    function add_favourite($user_id, $company_id){
        echo $user_id;
        echo $company_id;
        exit();
    }

    public function search_company(){
         $this->load->model('api_company');

         $input = file_get_contents('php://input');
         $search_term = json_decode($input,true);
         $response;

         if(isset($search_term['data']) && $search_term['data'] != ''){
             $company_name = $search_term['data'];
              $companies = json_encode((array) $this->api_company->search_company($company_name));
              
              if($companies=='[]'){
                  echo 'failed';
                  exit();
              }
              echo $companies;
              exit();
         }else{
             // $companies = json_encode((array) $this->api_company->search_company($search_term));
             // echo $companies;
             // exit();

             echo 'Enter company name.';
             exit();
         }
    }
}