<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BasePage extends CI_Controller {
	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'admin_only/frontpage',
		'breadcrumbs' => 'Dashboard',
		'active_table' => ''
		);

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('admin_only/basepage', $this->data);
		}else{
			redirect('login', 'refresh');
		}
	}

}

/* End of file Itung.php */
/* Location: ./application/controllers/Itung.php */