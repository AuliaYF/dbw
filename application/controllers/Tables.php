<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tables extends CI_Controller {

	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'tables_view',
		'breadcrumbs' => "",
		'active_table' => '',
		'active_table_view' => '',
		'active_table_data' => '',
		'option_cats' => '',
		'form_value' => ''
		);

	public function __construct()
	{
		parent::__construct();
	}

	public function index($table_name = 'categories', $method = 'show', $field_id = NULL)
	{
		$table_name = strtolower($table_name);
		$method = strtolower($method);
		if($table_name === 'categories'){
			$this->load->model('categories_model', 'model', TRUE);
			$this->data['active_table'] = 'Categories';

			if($method === 'show'){
				$this->data['active_table_data'] = $this->model->getAll();
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/categories').'">Categories</a>';
				$this->data['active_table_view'] = 'tables/cat_table_view';
			}elseif($method === 'insert'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/categories').'">Categories</a> > Insert';
				$this->data['main_view'] = 'cats/categories_form_view';
				$this->data['form_action'] = 'tables/categories/insert';

				if($this->input->post('submit')){
					if($this->model->validate_add()){
						if($this->model->add()){
							redirect('tables/categories');
						}
					}
				}
			}elseif($method === 'edit'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/categories').'">Categories</a> > Edit';
				$this->data['form_action'] = 'tables/categories/edit/'.$field_id;
				$this->data['main_view'] = 'cats/categories_form_view';

				if(!empty($field_id)){
					if($this->input->post('submit')){
						if($this->model->validate_edit()){
							$this->model->edit($this->session->userdata('active_cat_id'));
							$this->session->set_flashdata('message', 'Success');
							redirect('tables/categories');
						}else{
							$cat = $this->model->getSpecified($field_id);
							foreach ($cat as $key => $value) {
								$this->data['form_value'][$key] = $value;
							}
						}
					}else{
						$cat = $this->model->getSpecified($field_id);
						foreach ($cat as $key => $value) {
							$this->data['form_value'][$key] = $value;
						}
						$this->session->set_userdata('active_cat_id', $cat->cat_id);
						$this->session->set_userdata('active_cat_name', $cat->cat_name);
					}
				}else{
					redirect('tables/categories');
				}
			}elseif($method === 'delete'){
				if(empty($field_id)){
					redirect('tables/categories');
				}else{
					if($this->model->remove($field_id)){
						redirect('tables/categories');
					}
				}
			}
			else{
				$this->data['main_view'] = 'errors/error_404';
			}
		}elseif($table_name === 'topics'){
			$this->load->model('categories_model', 'model_cat', TRUE);
			$cats = $this->model_cat->getAll();
			if($cats){
				foreach ($cats as $cat) {
					$this->data['option_cats'][$cat->cat_id] = $cat->cat_name;
					if($cat->cat_id === $field_id){
						$this->data['form_value']['tp_cat'] = $cat->cat_id;
					}
				}
			}else{
				$this->data['option_cats']['00'] = '-';
			}

			$this->load->model('topics_model', 'model', TRUE);
			$this->data['active_table'] = 'topics';

			if($method === 'show'){
				$this->data['active_table_data'] = $this->model->getAll();
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/topics').'">Topics</a>';
				$this->data['active_table_view'] = 'tables/topics_table_view';
			}elseif($method === 'insert'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/topics').'">Topics</a> > Insert';
				$this->data['main_view'] = 'topics/topics_form_view';
				$this->data['form_action'] = 'tables/topics/insert';

				if($this->input->post('submit')){
					if($this->model->validate_add()){
						if($this->model->add()){
							redirect('tables/topics');
						}
					}
				}
			}elseif($method === 'edit'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/topics').'">Topics</a> > Edit';
				$this->data['form_action'] = 'tables/topics/edit/'.$field_id;
				$this->data['main_view'] = 'topics/topics_form_view';

				if(!empty($field_id)){
					if($this->input->post('submit')){
						if($this->model->validate_edit()){
							$this->model->edit($this->session->userdata('active_tp_id'));
							redirect('tables/topics');
						}else{
							$tp = $this->model->getSpecifiedId($field_id);
							foreach ($tp as $key => $value) {
								$this->data['form_value'][$key] = $value;
							}
						}
					}else{
						$tp = $this->model->getSpecifiedId($field_id);
						foreach ($tp as $key => $value) {
							$this->data['form_value'][$key] = $value;
						}
						$this->session->set_userdata('active_tp_id', $tp->tp_id);
						$this->session->set_userdata('active_tp_title', $tp->tp_title);
					}
				}else{
					redirect('tables/topics');
				}
			}elseif($method === 'delete'){
				if(empty($field_id)){
					redirect('tables/topics');
				}else{
					if($this->model->remove($field_id)){
						redirect('tables/topics');
					}
				}
			}
		}elseif($table_name === 'users'){
			$this->load->model('users_model', 'model', TRUE);
			$this->data['active_table'] = 'users';

			if($method === 'show'){
				$this->session->unset_userdata('active_user_id', '');
				$this->session->unset_userdata('active_user_name', '');
				$this->session->unset_userdata('active_user_email', '');

				$this->data['active_table_data'] = $this->model->getAll();
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/users').'">Users</a>';
				$this->data['active_table_view'] = 'tables/users_table_view';
			}elseif($method === 'insert'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/users').'">Users</a> > Insert';
				$this->data['main_view'] = 'users/users_form_view';
				$this->data['form_action'] = 'tables/users/insert';

				if($this->input->post('submit')){
					if($this->model->validate_add()){
						if($this->model->add()){
							redirect('tables/users');
						}
					}
				}
			}elseif($method === 'edit'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/users').'">Users</a> > Edit';
				$this->data['form_action'] = 'tables/users/edit/'.$field_id;
				$this->data['main_view'] = 'users/users_form_view';

				if(!empty($field_id)){
					if($this->input->post('submit')){
						if($this->model->validate_edit()){
							if($this->model->edit($this->session->userdata('active_user_id'))){
								redirect('tables/users');
							}
						}else{
							$user = $this->model->getSpecified($field_id);
							foreach ($user as $key => $value) {
								$this->data['form_value'][$key] = $value;
								if($key === 'user_pass'){
									$this->data['form_value'][$key] = $this->model->decode($value);
								}
							}
						}
					}else{
						$user = $this->model->getSpecified($field_id);
						foreach ($user as $key => $value) {
							$this->data['form_value'][$key] = $value;
							if($key === 'user_pass'){
								$this->data['form_value'][$key] = $this->model->decode($value);
							}
						}
						$this->session->set_userdata('active_user_id', $user->user_id);
						$this->session->set_userdata('active_user_name', $user->user_name);
						$this->session->set_userdata('active_user_email', $user->user_email);
					}
				}else{
					redirect('tables/users');
				}
			}elseif($method === 'delete'){
				if(empty($field_id)){
					redirect('tables/users');
				}else{
					if($this->model->remove($field_id)){
						redirect('tables/users');
					}
				}
			}else{
				$this->data['main_view'] = 'errors/error_404';
			}
		}else{
			$this->data['main_view'] = 'errors/error_404';
		}
		$this->load->view('basepage', $this->data);
	}

	function _is_cat_name_exist(){
		$active_cat_name = $this->session->userdata('active_cat_name');
		$new_cat_name = $this->input->post('cat_name');

		if($active_cat_name === $new_cat_name){
			return TRUE;
		}

		$query = $this->db->get_where('categories', array('cat_name' => $new_cat_name));

		if($query->num_rows() > 0){
			$this->form_validation->set_message('_is_cat_name_exist', 'Category with name '.$new_cat_name.' is exist.');
			return FALSE;
		}
		return TRUE;
	}

	function _is_tp_title_exist(){
		$active_tp_title = $this->session->userdata('active_tp_title');
		$new_tp_title = $this->input->post('tp_title');

		if($active_tp_title === $new_tp_title){
			return TRUE;
		}

		$query = $this->db->get_where('topics', array('tp_title' => $new_tp_title));

		if($query->num_rows() > 0){
			$this->form_validation->set_message('_is_tp_title_exist', 'Topic with name '.$new_tp_title.' is exist.');
			return FALSE;
		}
		return TRUE;
	}

	function _is_user_name_exist(){
		$active_user_name = $this->session->userdata('active_user_name');
		$new_user_name = $this->input->post('user_name');

		$query = $this->db->get_where('users', array('user_name' => $new_user_name));

		if(($active_user_name !== $new_user_name) && ($query->num_rows() > 0)){
			$this->form_validation->set_message('_is_user_name_exist', 'User with name '.$new_user_name.' is exist.');
			return FALSE;
		}
		return TRUE;
	}

	function _is_user_email_exist(){
		$active_user_email = $this->session->userdata('active_user_email');
		$new_user_email = $this->input->post('user_email');

		$query = $this->db->get_where('users', array('user_email' => $new_user_email));

		if(($active_user_email !== $new_user_email) && ($query->num_rows() > 0)){
			$this->form_validation->set_message('_is_user_email_exist', 'User with email '.$new_user_email.' is exist.');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file Tables.php */
/* Location: ./application/controllers/Tables.php */