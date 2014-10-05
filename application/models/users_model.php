<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public $db_table = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	public function encode($string){
		return $this->encrypt->encode($string);
	}

	public function decode($string){
		return $this->encrypt->decode($string);
	}

	public function getCurrentDate(){
		$datestring = '%Y-%m-%d';
		$time = time();
		return mdate($datestring, $time);
	}
	
	public function add(){
		$user = array(
			'user_name' => $this->input->post('user_name'),
			'user_pass' => $this->encode($this->input->post('user_pass')),
			'user_email' => $this->input->post('user_email'),
			'user_profile_signature' => $this->input->post('user_profile_signature'),
			'user_date_joined' => $this->getCurrentDate()
			);
		$this->db->insert($this->db_table, $user);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function getAll(){
		return $this->db->order_by('user_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($user_id){
		return $this->db->where('user_id', $user_id)->limit(1)->get($this->db_table)->row();
	}

	public function countData(){
		return $this->db->count_all($this->db_table);
	}

	public function edit($user_id){
		$user = array(
			'user_name' => $this->input->post('user_name'),
			'user_pass' => $this->encode($this->input->post('user_pass')),
			'user_email' => $this->input->post('user_email'),
			'user_profile_signature' => $this->input->post('user_profile_signature')
			);

		$this->db->where('user_id', $user_id);
		$this->db->update($this->db_table, $user);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function remove($id){
		$this->db->where('user_id', $id)->delete($this->db_table);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function load_form_rules_add(){
		$form_rules = array(
			array(
				'field' => 'user_name',
				'label' => 'User Name',
				'rules' => 'required|max_length[30]|is_unique['.$this->db_table.'.user_name]'),
			array(
				'field' => 'user_email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[255]|is_unique['.$this->db_table.'.user_email]'),
			);
		return $form_rules;
	}

	public function load_form_rules_edit(){
		$form_rules = array(
			array(
				'field' => 'user_name',
				'label' => 'User Name',
				'rules' => 'required|max_length[30]|callback__is_user_name_exist'),
			array(
				'field' => 'user_email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[255]|callback__is_user_email_exist'),
			);
		return $form_rules;
	}

	public function validate_add(){
		$form = $this->load_form_rules_add();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}

	public function validate_edit(){
		$form = $this->load_form_rules_edit();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */