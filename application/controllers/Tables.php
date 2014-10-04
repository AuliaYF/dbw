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

	public function index($table_name = 'categories')
	{
		if(strtolower($table_name) === 'categories'){
			$this->load->model('categories_model', 'model', TRUE);

			$this->data['active_table_data'] = $this->model->getAll();
			$this->data['breadcrumbs'] = 'Tables > Categories';
			$this->data['active_table'] = 'Categories';
			$this->data['active_table_view'] = 'tables/cat_table_view';
		}else{
			$this->data['main_view'] = 'errors/error_404';
		}
		$this->load->view('basepage', $this->data);
	}

}

/* End of file Tables.php */
/* Location: ./application/controllers/Tables.php */