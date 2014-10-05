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
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('basepage', $this->data);
		}else{
			redirect('login', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('basepage', 'refresh');
	}
}

/* End of file Itung.php */
/* Location: ./application/controllers/Itung.php */