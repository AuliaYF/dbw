<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public $db_table = 'categories';

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
		return $this->db->order_by('cat_id', 'ASC')->get($this->db_table)->result();
	}

	public function getSpecified($cat_id){
		return $this->db->where('cat_id', $cat_id)->limit(1)->get($this->db_table)->row();
	}

	public function countData(){
		return $this->db->count_all($this->db_table);
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

	public function createTable($data){
		$tmpl = array(
			'table_open' => '<p class="dark below"><table border="1" cellpadding="4" cellspacing="0" style="width: 100%;">',
			'cell_start' => '<td align="middle">',
			'cell_alt_start' => '<td align="middle">',
			'table_close' => '</table></p>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('No', 'CAT_ID', 'CAT_NAME', 'CAT_DESC', 'ACTION');

		$no = 0;

		foreach ($data as $row) {
			$this->table->add_row(++$no, $row->cat_id, $row->cat_name, $row->cat_desc, 
				anchor('categories/edit/'.$row->cat_id, '<button>EDIT</button>').' '.
				anchor('categories/delete/'.$row->cat_id, '<button>DELETE</button>', array('onclick' => "return confirm('Are you sure?')")));
		}

		$table = $this->table->generate();

		return $table;
	}

	public function load_form_rules_add(){
		$form_rules = array(
			array(
				'field' => 'cat_name',
				'label' => 'Category Name',
				'rules' => 'required|max_length[255]|is_unique['.$this->db_table.'.cat_name]'),
			array(
				'field' => 'cat_desc',
				'label' => 'Category Description')
			);
		return $form_rules;
	}

	public function load_form_rules_edit(){
		$form_rules = array(
			array(
				'field' => 'cat_name',
				'label' => 'Category Name',
				'rules' => 'required|max_length[255]|callback__is_cat_name_exist'),
			array(
				'field' => 'cat_desc',
				'label' => 'Category Description')
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