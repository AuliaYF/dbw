<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Controller{


	public $db_table = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll(){
		return $this->db->order_by('user_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($user_id){
		return $this->db->where('user_id', $user_id)->limit(1)->get($this->db_table)->row();
	}

	public function getSpecifiedName($user_name){
		return $this->db->where('user_name', $user_name)->get($this->db_table)->result();
	}

	public function add(){
		$users = array(
			'user_name' => $this->input->post('user_name'),
			'user_pass' => $this->input->post('user_pass'),
			'user_email' => $this->input->post('user_email'),
			'user_profile_pic' => $this->input->post('user_profile_pic'),
			'user_profile_signature' => $this->input->post('user_profile_signature'),
			'user_date_joined' => $this->input->post('user_date_joined')
			);
		$this->db->insert($this->db_table, $users);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function edit($user_id){
		$user = array(
			'user_name' => $this->input->post('user_name'),
			'user_pass' => $this->input->post('user_pass'),
			'user_email' => $this->input->post('user_email')
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

	public function countData(){
		return $this->db->count_all($this->db_table);
	}

	public function load_form_rules_add(){
		$form_rules = array(
			array(
				'field' => 'user_name',
				'label' => 'Name',
				'rules' => 'required|max_length[30]|is_unique['.$this->db_table.'.user_name]'),
			array(
				'field' => 'user_pass',
				'label' => 'Password',
				'rules' => 'required|max_length[32]'),
			array(
				'field' => 'user_email',
				'label' => 'Email',
				'rules' => 'required|max_length[255]|is_unique['.$this->db_table.'.user_email]'),
			);
		return $form_rules;
	}

	public function load_form_rules_edit(){
		$form_rules = array(
			array(
				'field' => 'user_name',
				'label' => 'Name',
				'rules' => 'required|callback__is_cat_name_exist'),
			array(
				'field' => 'user_email',
				'label' => 'Email',
				'rules' => 'required|valid_email|max_length[255]|callback_is_user_email_exist')
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
		}else{
			return FALSE;
		}
	}

	public function createTable($data){
		$tmpl = array(
			'table_open' => '<p class="dark below"><table border="1" cellpadding="4" cellspacing="0" style="width: 100%;">',
			'cell_start' => '<td align="middle">',
			'cell_alt_start' => '<td align="middle">',
			'table_close' => '</table></p>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('No',  'user_name', 'user_pass','user_email', 'user_profile_pic','user_profile_signature','user_date_joined','ACTION');

		$no = 0;

		foreach ($data as $row) {
			$this->table->add_row(++$no, $row->user_name, $row->user_pass, $row->user_email, $row->user_profile_pic, $row->user_profile_signature, $row->user_date_joined, 
				anchor('users/edit/'.$row->user_id, '<button>EDIT</button>').' '.
				anchor('users/delete/'.$row->user_id, '<button>DELETE</button>', array('onclick' => "return confirm('Are you sure?')")));
		}

		$table = $this->table->generate();

		return $table;
	}
}