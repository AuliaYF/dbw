<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics_model extends CI_Model {

	public $db_table = 'topics';

	public function __construct()
	{
		parent::__construct();
	}

	public function add(){
		$cat = array(
			'tp_title' => $this->input->post('tp_title'),
			'tp_cat' => $this->input->post('tp_cat'),
			'tp_desc' => $this->input->post('tp_desc')
			);
		$this->db->insert($this->db_table, $cat);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function remove($id){
		$this->db->where('tp_id', $id)->delete($this->db_table);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function getAll(){
		return $this->db->order_by('tp_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($id){
		return $this->db->order_by('tp_id', 'ASC')->get_where($this->db_table, array('tp_cat' => $id))->result();
	}

	public function getSpecifiedId($id){
		return $this->db->where('tp_id', $id)->limit(1)->get($this->db_table)->row();
	}

	public function getSpecifiedByCat($id){
		return $this->db->get_where($this->db_table, array('tp_cat' => $id));
	}


	public function countData(){
		return $this->db->count_all($this->db_table);
	}

	public function edit($tp_id){
		$cat = array(
			'tp_cat' => $this->input->post('tp_cat'),
			'tp_title' => $this->input->post('tp_title'),
			'tp_desc' => $this->input->post('tp_desc')
			);

		$this->db->where('tp_id', $tp_id);
		$this->db->update($this->db_table, $cat);

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		return FALSE;
	}

	public function createTable($data){
		$tmpl = array(
			'table_open' => '<p class="dark below"><table border="1" cellpadding="4" cellspacing="0" style="width: 100%;">',
			'cell_start' => '<td align="middle">',
			'cell_alt_start' => '<td align="middle">',
			'table_close' => '</table></p>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('No', 'TP_ID', 'TP_CAT', 'TP_TITLE', 'TP_DESC', 'ACTION');

		$no = 0;

		foreach ($data as $row) {
			$this->table->add_row(++$no, $row->tp_id, $row->tp_cat, $row->tp_title, $row->tp_desc, 
				anchor('topics/edit/'.$row->tp_id, '<button>EDIT</button>').' '.
				anchor('topics/delete/'.$row->tp_id, '<button>DELETE</button>', array('onclick' => "return confirm('Are you sure?')")));
		}

		$table = $this->table->generate();

		return $table;
	}

	public function load_form_rules_add(){
		$form_rules = array(
			array(
				'field' => 'tp_cat',
				'label' => 'Category',
				'rules' => 'required'
				),
			array(
				'field' => 'tp_title',
				'label' => 'Topic Title',
				'rules' => 'required|max_length[255]|is_unique['.$this->db_table.'.tp_title]'),
			array(
				'field' => 'tp_desc',
				'label' => 'Topic Description')
			);
		return $form_rules;
	}

	public function load_form_rules_edit(){
		$form_rules = array(
			array(
				'field' => 'tp_cat',
				'label' => 'Category',
				'rules' => 'required'
				),
			array(
				'field' => 'tp_title',
				'label' => 'Topic Title',
				'rules' => 'required|max_length[255]|callback__is_tp_title_exist'),
			array(
				'field' => 'tp_desc',
				'label' => 'Topic Description')
			);
		return $form_rules;
	}

	public function validate_add(){
		$form = $this->load_form_rules_add();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}

	public function validate_edit(){
		$form = $this->load_form_rules_edit();
		$this->form_validation->set_rules($form);

		if($this->form_validation->run()){
			return TRUE;
		}
		return FALSE;
	}
}

/* End of file categories_model.php */
/* Location: ./application/models/categories_model.php */