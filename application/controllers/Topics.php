<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	public $data = array(
		"title" => "Project-Forum", 
		"breadcrumbs" => "",
		"main_view" => "topics/topics_view",
		"status_message" => "",
		"form_action" => "",
		"form_value" => "",
		"table_data" => "",
		"option_cats" => ""
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('topics_model', 'model_tp', TRUE);
		$this->load->model('categories_model', 'model_cat', TRUE);
	}

	public function index(){
		$data = $this->model_tp->getAll();
		$this->data['breadcrumbs'] = 'TABLES > TOPICS ('.$this->model_tp->countData().')';
		if($data){	
			$table = $this->model_tp->createTable($data);
			$this->data['table_data'] = $table;
		}

		$this->load->view('basepage', $this->data);
	}

	public function insert($cat_id = 0){
		$this->data['breadcrumbs'] = 'TABLES > TOPICS ('.$this->model_tp->countData().') > NEW';
		$this->data['form_action'] = 'topics/insert';
		$this->data['main_view'] = 'topics/topics_form_view';

		$cats = $this->model_cat->getAll();
		if($cats){
			foreach ($cats as $cat) {
				$this->data['option_cats'][$cat->cat_id] = $cat->cat_name;
				if($cat->cat_id === $cat_id){
					$this->data['form_value']['tp_cat'] = $cat->cat_id;
				}
			}
		}else{
			$this->data['option_cats']['00'] = '-';
		}

		if($this->input->post('submit')){
			if($this->model_tp->validate_add()){
				if($this->model_tp->add()){
					$this->session->set_flashdata('message', 'Success');
					redirect('topics');
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
			if($this->model_tp->remove($id)){
				$this->session->set_flashdata('message', 'Success');
				redirect('categories');
			}else{
				$this->session->set_flashdata('message', 'Failed');
				redirect('categories');
			}
		}
	}

	public function edit($tp_id = NULL){
		$this->data['breadcrumbs'] = 'TABLES > TOPICS ('.$this->model_tp->countData().') > EDIT';
		$this->data['form_action'] = 'topics/edit/'.$tp_id;
		$this->data['main_view'] = 'topics/topics_form_view';

		$cats = $this->model_cat->getAll();
		foreach ($cats as $cat) {
			$this->data['option_cats'][$cat->cat_id] = $cat->cat_name;
		}

		if(!empty($tp_id)){
			if($this->input->post('submit')){
				if($this->model_tp->validate_edit()){
					$this->model_tp->edit($this->session->userdata('active_tp_title'));
					$this->session->set_flashdata('message', 'Success');
					redirect('topics');
				}else{
					$topic = $this->model_tp->getSpecifiedId($tp_id);
					foreach ($topic as $key => $value) {
						$this->data['form_value'][$key] = $value;
					}
					$this->session->set_flashdata('message', 'Failed');
					$this->load->view('basepage', $this->data);
				}
			}else{
				$topic = $this->model_tp->getSpecifiedId($tp_id);
				foreach ($topic as $key => $value) {
					$this->data['form_value'][$key] = $value;
				}
				$this->session->set_userdata('active_tp_title', $topic->tp_id);

				$this->load->view('basepage', $this->data);
			}
		}else{
			redirect('topics');
		}
	}

	function is_tp_title_exist(){
		$active_tp_title = $this->session->userdata('active_tp_title');
		$new_tp_title = $this->input->post('tp_title');

		if($active_tp_title === $new_tp_title){
			return TRUE;
		}

		$query = $this->db->get_where('topics', array('tp_title' => $new_tp_title));

		if($query->num_rows() > 0){
			$this->form_validation->set_message('is_tp_title_exist', 'Topic with name '.$new_tp_title.' is exist.');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file Topics.php */
/* Location: ./application/controllers/Topics.php */