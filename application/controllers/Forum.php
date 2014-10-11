<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

	public $data = array(
		'title' => 'Project-Forum',
		'main_view' => 'forum/frontpage',
		'sidebar_view' => 'forum/frontpage_sidebar',
		'active_user_name' => '',
		'form_action' => '',
		'insert' => FALSE,
		'table_th_data' => '',
		'table_cat_data' => '',
		'table_tp_data' => '',
		'breadcrumbs' => "<a href='#'>Home</a>",
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

	public function index($param = NULL, $param2 = NULL)
	{	
		if($this->session->userdata('logged_in')){
			$this->data['active_user_name'] = $this->session->userdata('logged_in')['active_user_name'];
		}
		if(empty($param)){
			$data = $this->model_tp->getAll();
			$this->data['table_tp_data'] = $data;
			$data = $this->model_cat->getAll();
			$this->data['table_cat_data'] = $data;

			$this->data['breadcrumbs'] = NULL;
		}else{
			if($param === 'insert'){
				$this->insert($param2);
			}
			if(!empty($param2)){
				if($param2 === "insert"){
					if($this->session->userdata('logged_in')){
						$this->data['breadcrumbs'] = NULL;
						$this->data['insert'] = TRUE;
						$this->data['main_view'] = 'forum/forum_thread_insert';
						$this->data['sidebar_view'] = 'forum/forum_insert_thread_sidebar';
						$this->data['active_topic'] = $param;
					}else{
						$this->session->set_userdata('url_to_go', current_url());
						redirect('login');
					}
				}else{
					$param2 = strtolower($param2);
					$param2 = str_replace("%20", " ", $param2);
					$data = $this->model_th->getThreadChilds($param2);
					$this->data['active_table_data'] = $data;
					$this->data['main_view'] = 'forum/single_thread_view';
				}
			}else{	
				$param = strtolower($param);
				$param = str_replace("%20", "-", $param);
				$data = $this->model_th->getSpecified($param, 'desc');
				$this->data['main_view'] = 'forum/single_forum_view';
				$this->data['table_tp_data'] = $this->model_th->getTopicID($param);
				$this->data['breadcrumbs'] = $this->model_th->getTopicData($param);
				$this->data['active_table_data'] = $data;

				$this->data['sidebar_view'] = 'forum/forum_sidebar';
			}
		}
		$this->load->view('basepage', $this->data);
	}

	public function insert($param = NULL){
		if(empty($param)){
			redirect('/');
		}else{
			if($this->input->post('submit')){
				$time = unix_to_human(gmt_to_local(human_to_unix(unix_to_human(time(), TRUE, 'eu')), 'UP4', TRUE), TRUE, 'eu');
				$data = array(
					'user_id' => $this->session->userdata('logged_in')['active_user_id'],
					'tp_id' => $this->model_th->getTopicID($param)->tp_id,
					'th_title' => $this->input->post('th_title'),
					'th_date' => $time,
					'rp_date' => $time,
					'rp_content' => $this->input->post('rp_content')
					);

				$this->model_th->insertNewThread($data);
				redirect(base_url('/forum/'.$param));
			}
		}
	}
}

/* End of file Forum.php */
/* Location: ./application/controllers/Forum.php */