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
		$this->load->model('threads_model', 'model_th', TRUE);
		$this->load->model('topics_model', 'model_tp', TRUE);
	}

	public function index($tp_id = NULL)
	{
		if(!empty($tp_id)){
			$data = $this->model_tp->getSpecifiedId($tp_id);
			$this->data['table_tp_data'] = $data;
			$data = $this->model_th->getSpecified($tp_id);
			$this->data['table_th_data'] = $data;
		}else{
			redirect('/');
		}
		$this->load->view('basepage', $this->data);
	}

}

/* End of file Forum.php */
/* Location: ./application/controllers/Forum.php */