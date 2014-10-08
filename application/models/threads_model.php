<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Threads_model extends CI_Model {

	public $db_table = 'threads';

	public function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$cat = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_desc' => $this->input->post('cat_desc')
			);
		$this->db->insert($this->db_table, $cat);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function getAll(){
		return $this->db->order_by('th_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($param){
		return $this->db->like('th_topic', $this->getTopicID($param)->tp_id)->join('users', 'users.user_id = threads.th_starter')->get($this->db_table)->result();
	}

	private function getTopicID($param){
		return $this->db->get_where('topics', array('tp_title' => $param))->row();
	}

	public function countData($param){
		return $this->db->get_where($this->db_table, array('th_topic' => $param))->num_rows();
	}

	public function edit($cat_id){
		$cat = array(
			'cat_name' => $this->input->post('cat_name'),
			'cat_desc' => $this->input->post('cat_desc')
			);

		$this->db->where('cat_id', $cat_id);
		$this->db->update($this->db_table, $cat);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function remove($id){
		$this->db->where('cat_id', $id)->delete($this->db_table);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

}

/* End of file threads_model.php */
/* Location: ./application/models/threads_model.php */