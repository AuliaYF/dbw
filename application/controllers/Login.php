<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	private $data = array(
		'loginerr' => '',
		'form_action' => 'login/index',
		'err_msg' => ''
		);
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'model', TRUE);
	}

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			if($this->input->post('submit')){
				if($this->model->validate()){
					$email = $this->input->post('user_email');
					$pass = $this->input->post('user_pass');
					$query = $this->model->getUserData(array('user_email' => $email));
					if($query->num_rows() > 0){
						$dbPass = $this->encrypt->decode($query->row()->user_pass);
						if($dbPass === $pass){
							$sess_array = array();
							foreach($query->result() as $row)
							{
								$sess_array = array(
									'active_user_name' => $row->user_name
									);
								$this->session->set_userdata('logged_in', $sess_array);
							}
							redirect('basepage', 'refresh');
						}else{
							$this->data['loginerr'] = TRUE;
							$this->data['err_msg'] = 'Wrong Password';
						}
					}else{
						$this->data['loginerr'] = TRUE;
						$this->data['err_msg'] = 'User with email '.$email.' does not exist.';
					}
				}

			}
			$this->load->view('login_view', $this->data);
		}else{
			redirect('basepage', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('basepage', 'refresh');
	}
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */