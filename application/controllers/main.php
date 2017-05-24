<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('main_model');
	}

	public function index()
	{

		$users = $this->main_model->retrieveUsers();
		$data['result'] = $users;
		$this->load->view('index.html', $data);
	}

	public function user_data(){

			$arrData['id']=				$this->input->post('id');
			$arrData['BorrowerName']=	$this->input->post('BorrowerName');
			$arrData['DateTime']=		$this->input->post('DateTime');

			$this->main_model->updateBorrower($arrData);
	}

	public function checkUserName(){
		$username=$this->input->post('username');
		$password = $this->main_model->getPassword($username);
		$data['password']=$password;
		$data['username']=$username;

		$this->output->set_output(json_encode($data));
	}

	public function setNewPassword(){
		$username=$this->input->post('username');

		$oldPassword = $this->input->post('oldPassword');
		$newPassword = $this->input->post('newPassword');

		$data['debugOP']=$oldPassword;
		$data['debugNP']=$newPassword;
		$data['debugUN']=$username;

		$password = $this->main_model->getPassword($username);
		$data['debugCP']=$password;
		if($password==$oldPassword){
			//if true then old password and password from db is correct
			$arrData['password']=$newPassword;
			$arrData['username']=$username;

			$this->main_model->updatePassword($arrData);

			$data['result']="success";
		}else{
			$data['result']="fail";
		}

		$this->output->set_output(json_encode($data));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
