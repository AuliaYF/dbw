<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tables extends CI_Controller {

	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'tables_view',
		'breadcrumbs' => "",
		'active_table' => '',
		'active_table_view' => '',
		'active_table_data' => ''
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
						}else{
							$this->load->view('basepage', $this->data);
						}
					}else{
						$this->form_validation->set_message('cat_name', 'asdasd');
					}
				}
			}elseif($method === 'edit'){
				$this->data['breadcrumbs'] = '<a href="'.base_url('tables').'">Tables</a> > <a href="'.base_url('tables/categories').'">Categories</a> > Edit';
				$this->data['form_action'] = 'tables/categories/edit/'.$field_id;
				$this->data['main_view'] = 'cats/categories_form_view';

				if(!empty($field_id)){
					if($this->input->post('submit')){
						if($this->model->validate_edit()){
							$this->model->edit($this->session->userdata('active_cat_name'));
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
						$this->session->set_userdata('active_cat_name', $cat->cat_id);
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
}

/* End of file Tables.php */
/* Location: ./application/controllers/Tables.php */