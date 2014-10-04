<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $data = array(
		"title" => "Project-Forum", 
		"breadcrumbs" => "",
		'main_view' => 'cats/categories_view',
		"status_message" => "",
		"form_action" => "",
		"table_data" => ""
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model', 'model', TRUE);
	}

	public function index($cat_id = NULL){
		if(empty($cat_id)){
			$data = $this->model->getAll();
			$this->data['breadcrumbs'] = 'TABLES > CATEGORIES ('.$this->model->countData().')';
			if($data){
				$table = $this->model->createTable($data);	
				$this->data['table_data'] = $table;
			}

			$this->load->view('basepage', $this->data);
		}else{
			redirect('categories/edit/'.$cat_id);
		}
	}

	public function insert(){
		$this->data['breadcrumbs'] = 'TABLES > CATEGORIES ('.$this->model->countData().') > NEW';
		$this->data['form_action'] = 'categories/insert';
		$this->data['main_view'] = 'cats/categories_form_view';

		if($this->input->post('submit')){
			if($this->model->validate_add()){
				if($this->model->add()){
					$this->session->set_flashdata('message', 'Success');
					redirect('categories');
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
			redirect('categories');
		}else{
			if($this->model->remove($id)){
				$this->session->set_flashdata('message', 'Success');
				redirect('categories');
			}else{
				$this->session->set_flashdata('message', 'Failed');
				redirect('categories');
			}
		}
	}

	public function edit($cat_id = NULL){
		$this->data['breadcrumbs'] = 'TABLES > CATEGORIES ('.$this->model->countData().') > EDIT';
		$this->data['form_action'] = 'categories/edit/'.$cat_id;
		$this->data['main_view'] = 'cats/categories_form_view';

		if(!empty($cat_id)){
			if($this->input->post('submit')){
				if($this->model->validate_edit()){
					$this->model->edit($this->session->userdata('active_cat_name'));
					$this->session->set_flashdata('message', 'Success');
					redirect('categories');
				}else{
					$cat = $this->model->getSpecified($cat_id);
					foreach ($cat as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_flashdata('message', 'Failed');
					$this->load->view('basepage', $this->data);
				}
			}else{
				$cat = $this->model->getSpecified($cat_id);
				foreach ($cat as $key => $value) {
					$this->data['form_value'][$key] = $value;
				}
				$this->session->set_userdata('active_cat_name', $cat->cat_id);

				$this->load->view('basepage', $this->data);
			}
		}else{
			redirect('categories');
		}
	}

	function is_cat_name_exist(){
		$active_cat_name = $this->session->userdata('active_cat_name');
		$new_cat_name = $this->input->post('cat_name');

		if($active_cat_name === $new_cat_name){
			return TRUE;
		}

		$query = $this->db->get_where('categories', array('cat_name' => $new_cat_name));

		if($query->num_rows() > 0){
			$this->form_validation->set_message('is_cat_name_exist', 'Category with name '.$new_cat_name.' is exist.');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file Categories.php */
/* Location: ./application/controllers/Categories.php */