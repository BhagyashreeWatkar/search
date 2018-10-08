<?php

class Welcome_model extends CI_Model
{
	public function insert($products)
	{
		$this->db->insert('product_details',$products);
	}
	public function get_product_lists()
	{
		$query=$this->db->get('product_details');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	public function edit_product_list($id)
	{
		$this->db->select('*');
		$this->db->from('product_details');
		$this->db->where('product_id',$id);
		$query=$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	public function update_product($product,$id)
	{
		$this->db->where('product_id',$id);
		$this->db->update('product_details',$product);
	}

	public function search_product($key)
	{
		$this->db->like('product_name',$key);
		$query = $this->db->get('product_details');
		return $query->result();
	}
	public function select_single_product($id)
	{
		$this->db->select('*');
		$this->db->from('product_details');
		$this->db->where('product_id',$id);
		$query=$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else
		{
			return $query->result();
		}

	}

}
?>