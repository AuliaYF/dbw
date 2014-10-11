<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Threads_model extends CI_Model {

	public $db_table = 'threads';

	public function __construct()
	{
		parent::__construct();
	}

	public function insertNewThread($data){
		// Insert into threads
		$d = array(
			'th_title' => $data['th_title'],
			'th_date' => $data['th_date'],
			'th_topic' => $data['tp_id'],
			'th_starter' => $data['user_id']
			);
		$this->db->insert('threads', $d);

		//Insert into replies
		$d = array(
			'rp_title' => $data['th_title'],
			'rp_content' => $data['rp_content'],
			'rp_date' => $data['rp_date'],
			'rp_thread' => $this->getThreadIDByTitle($data['th_title']),
			'rp_starter' => $data['user_id']
			);
		$this->db->insert('replies', $d);
	}

	public function getThreadIDByTitle($param){
		return $this->db->get_where('threads', array('th_title' => $param))->row()->th_id;
	}

	public function getAll(){
		return $this->db->order_by('th_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($param, $param2){
		return $this->db->like('th_topic', $this->getTopicID($param)->tp_id)->join('users', 'users.user_id = threads.th_starter')->order_by('threads.th_date', $param2)->get($this->db_table)->result();
	}

	public function getThreadChilds($param){
		return $this->db->where(array('rp_thread' => $this->getThreadIDByTitle($param)))->order_by('rp_date', 'asc')->get('replies')->result();
	}

	public function getTopicID($param){
		return $this->db->get_where('topics', array('tp_title' => $param))->row();
	}

	public function getTopicData($param){
		return $this->db->get_where('topics', array('tp_cat' => $this->getTopicID($param)->tp_cat))->result();
	}

	public function countData($param){
		return $this->db->get_where($this->db_table, array('th_topic' => $param))->num_rows();
	}

	public function countReplies($param){
		return $this->db->get_where('replies', array('rp_thread' => $this->getThreadIDByTitle($param)))->num_rows();
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