<?php
class Users extends CI_Controller{


	public $data = array(
		"title" => "Project-Forum", 
		"breadcrumbs" => "",
		'main_view' => 'users/users_view',
		"status_message" => "",
		"form_action" => "",
		"table_data" => ""
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'model', TRUE);
	}

	public function index($cat_id = NULL)
	{
		if(empty($users_id)){
			$data = $this->model->getAll();
			$this->data['breadcrumbs'] = 'TABLES > USERS ('.$this->model->countData().')';
			if($data){
				$table = $this->model->createTable($data);	
				$this->data['table_data'] = $table;
			}

			$this->load->view('basepage', $this->data);
		}else{
			redirect('users/edit/'.$users_id);
		}
	}

	public function insert()
	{
		$this->data['breadcrumbs'] = 'TABLES > USERS ('.$this->model->countData().') > NEW';
		$this->data['form_action'] = 'users/insert';
		$this->data['main_view'] = 'users/users_form_view';

		if($this->input->post('submit')){
			if($this->model->validate_add()){
				if($this->model->add()){
					$this->session->set_flashdata('message', 'Success');
					redirect('users');
				}else{
					$this->session->set_flashdata('message', 'Failed');
					$this->load->view('basepage', $this->data);
				}
			}else{
				$this->session->set_flashdata('message', 'Failed');
				$this->load->view('basepage', $this->data);
			}
		}else{
			$this->session->set_flashdata('message', 'Failed');
			$this->load->view('basepage', $this->data);
		}

	}

	public function delete($id = NULL){
		if(empty($id)){
			$this->session->set_flashdata('message', 'No ID Specified.');
			redirect('users');
		}else{
			if($this->model->remove($id)){
				$this->session->set_flashdata('message', 'Success');
				redirect('users');
			}else{
				$this->session->set_flashdata('message', 'Failed');
				redirect('users');
			}
		}
	}

	public function edit($user_id = NULL){
		$this->data['breadcrumbs'] = 'TABLES > USERS ('.$this->model->countData().') > EDIT';
		$this->data['form_action'] = 'users/edit/'.$user_id;
		$this->data['main_view'] = 'users/users_form_view';

		if(!empty($user_id)){
			if($this->input->post('submit')){
				$this->_is_cat_name_exist();
				if($this->model->validate_edit()){
					$this->model->edit($this->session->userdata('active_user_id'));
					$this->session->set_flashdata('message', 'Success');
					redirect('users');
				}else{
					$user = $this->model->getSpecified($user_id);
					foreach ($user as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_flashdata('message', 'Failed');
					$this->load->view('basepage', $this->data);
				}
			}else{
				$user = $this->model->getSpecified($user_id);
				foreach ($user as $key => $value) {
					$this->data['form_value'][$key] = $value;
				}
				$this->session->set_userdata('active_user_id', $user->user_id);

				$this->load->view('basepage', $this->data);
			}
		}else{
			redirect('users');
		}
	}

	public function is_user_name_exist(){
		$active_user_name = $this->session->userdata('active_user_id');
		
		$new_user_name = $this->input->post('user_name');

		if($active_user_name === $new_user_name){
			return TRUE;
		}

		$query = $this->db->get_where('users', array('user_name' => $new_user_name));

		if($query->num_rows() > 0){
			$msg = 'User with name '.$new_user_name.' is exist.';
			echo $msg;
			$this->form_validation->set_message('is_user_name_exist', $msg);
			return FALSE;
		}
		return TRUE;
	}

	public function _is_cat_name_exist(){
		$this->form_validation->set_message('_is_cat_name_exist', 'Category with name '.'asd'.' is exist.');
		/*$active_cat_name = $this->session->userdata('active_user_id');
		$new_cat_name = $this->input->post('user_name');

		if($active_cat_name === $new_cat_name){
			return TRUE;
		}

		$query = $this->db->get_where('users', array('user_name' => $new_cat_name));

		if($query->num_rows() > 0){
			$this->form_validation->set_message('is_cat_name_exist', 'Category with name '.$new_cat_name.' is exist.');
			return FALSE;
		}
		return TRUE;*/
	}

	function is_user_email_exist(){
		$active_user_email = $this->session->userdata('active_user_id');
		$new_user_email = $this->input->post('user_email');

		if($active_user_email === $new_user_email){
			return TRUE;
		}

		$query = $this->db->get_where('users', array('user_email' => $new_user_email));

		if($query->num_rows() > 0){
			$msg = 'User with email '.$new_user_email.' is exist.';
			echo $msg;
			$this->form_validation->set_message('is_user_email_exist', $msg);
			return FALSE;
		}
		return TRUE;
	}
}