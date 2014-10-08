<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'forum/frontpage',
		'table_th_data' => '',
		'table_cat_data' => '',
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
		$this->load->model('threads_model', 'model_th', TRUE);
	}

	public function index($param = NULL)
	{	
		if($this->session->userdata('logged_in')){
			if(empty($param)){
				$data = $this->model_tp->getAll();
				$this->data['table_tp_data'] = $data;
				$data = $this->model_cat->getAll();
				$this->data['table_cat_data'] = $data;
			}else{
				$param = strtolower($param);
				$param = str_replace("%20", "-", $param);
				$this->data['main_view'] = 'forum/single_forum_view';
				$data = $this->model_th->getSpecified($param);
				if(count($data) > 0){
					$this->data['active_table_data'] = $data;
				}else{
					show_404();
					return;
				}
			}
			$this->load->view('basepage', $this->data);
		}else{
			redirect('login', 'refresh');
		}
	}

}

/* End of file Forum.php */
/* Location: ./application/controllers/Forum.php */