<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	private $db_table = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($param_arg){
		return $this->db->get_where($this->db_table, $param_arg);
	}

	public function load_form_rules(){
		$form_rules = array(
			array(
				'field' => 'user_email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[30]'),
			array(
				'field' => 'user_pass',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'),
			);
		return $form_rules;
	}

	public function validate(){
		$form = $this->load_form_rules();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */