<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BasePage extends CI_Controller {
	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'frontpage',
		'breadcrumbs' => 'Dashboard',
		'active_table' => ''
		);

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('basepage', $this->data);
	}
}

/* End of file Itung.php */
/* Location: ./application/controllers/Itung.php */