<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index()
	{
		$this->load->view('registration');
	}

	public function registerUser(){
		$name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
       
        $this->form_validation->set_rules('name','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone','Phone','required|regex_match[/^[0-9]{11}$/]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
        
        $this->form_validation->set_error_delimiters('<span style="font-size: 15px;color:white">', '</span><br/>');
        
        if($this->form_validation->run() == FALSE){
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }
        
        else{

			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'password' => md5($password)
			);
            $result = $this->UserModel->register($data);
            if($result){
                echo json_encode(['success'=>'User Has Been Registered Successfully']);
            }
            else{
                echo json_encode(array("msg"=>"failed"));
            }
        }
	}

    public function checkUser(){
        $email = $this->input->get('email');
        $result = $this->UserModel->checkUser($email);
        echo $result;
    }
}
?>
