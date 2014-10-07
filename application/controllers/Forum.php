<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'forum/frontpage',
		'table_th_data' => '',
		'table_tp_data' => '',
		'breadcrumbs' => "Dashboard",
		'active_table' => '',
		'active_table_view' => '',
		'active_table_data' => '',
		);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model', 'model_cat', TRUE);
		$this->load->model('topics_model', 'model_tp', TRUE);
	}

	public function index($tp_id = NULL)
	{
		if($this->session->userdata('logged_in')){
			$data = $this->model_tp->getAll();
			$this->data['table_tp_data'] = $data;
			$data = $this->model_cat->getAll();
			$this->data['table_cat_data'] = $data;
			$this->load->view('basepage', $this->data);
		}else{
			redirect('login', 'refresh');
		}
	}

}

/* End of file Forum.php */
/* Location: ./application/controllers/Forum.php */