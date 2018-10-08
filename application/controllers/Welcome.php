<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model'); 
	}
 

	public function index()
	{
		//$error=array('error_image' => '',
			//'error_name' => '');
		$product['products']=$this->welcome_model->get_product_lists();
		echo "<pre>";
		print_r($product);
		echo "<pre>";
		$this->load->view('product_list',$product);
	}
	public function uploads()
	{
		//$error=array('error_image' => '',
			//'error_name' => '');
		$this->form_validation->set_rules('productname','product name','trim|required|');
		//if($this->form_validation->run() == FALSE)
		//{
			//echo validation_errors();
		//}
		//else
		//{
		/*$data= array();
		if($this->input->post('submit') && !empty($_FILES['userfile']['name']))
		{
			$filecount = count($_FILES['userfile']['name']);
			for($i=0;$i<$filecount;$i++)
		{
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                */
			
		

		$config=array(
		//$config_image = array();
		'upload_path' =>'./uploads/',
		'allowed_types' => 'jpg|png|gif',
		'max_size' => '4000');
		//print_r($config);


		//$config_image['max_width'] = '1024';
		//$config_image['max_height'] = '768';
	$this->load->library('upload',$config);
	if($this->form_validation->run()==FALSE and empty($_FILES['userfile']['name'][0]))
	{
		//echo validation_errors();
		$error = array('error_image'=>'please choose image to upload',
			'error_name'=>'please insert the product name');
		$this->load->view('product_list');
	}
	elseif($this->form_validation->run()==true and empty($_FILES['userfile']['name'][0]))
	{
		//echo "please enter image";
		$error = array('error_image'=>'please choose image to upload',
			'error_name'=>'');
		$this->load->view('product_list',$error_namer);

	}
	elseif($this->form_validation->run()==FALSE and !empty($_FILES['userfile']['name'][0]))
	{
		!$this->upload->data();
		$error = array('error_image'=>'',
			'error_name'=>'please fill the product name');
		$this->load->view('product_list',$error);

	}
	elseif($this->form_validation->run()==true and !empty($_FILES['userfile']['name'][0]))
	{
		$this->upload->do_upload();
		$data=array('upload_data'=>$this->upload->data());
		//$this->image_resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
	$products=array('product_name'=>$this->input->post('productname'),
					'product_image'=>$data['upload_data']['file_name']);
		$this->welcome_model->insert($products);

	}


	//$this->upload->initialize($config);


	//$data=array('upload_data'=>$this->upload->data());
	// echo "<pre>";
	// print_r($data);
	// echo "<pre>";
	
	

//$this->load->view('upload_image');
	//redirect('index.php/welcome/product_list');
//}
	//$this->load->view('product_list');


	//if(!$this->upload->do_upload())
	//{
		//$error= array('error'=>$this->upload->display_errors());
		//$this->load->view('upload_image',$error);
	//}
	//else
	//{
	//	$data = array('upload_data'=>$this->upload->data());
		//print_r($data);
	//	$this->image_resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);

	//}
	}


	/*public function image_resize($path,$file)
	{
		$config_resize = array('image_library'=>'gd2',
			'source_image'=>$path,
			'craete_thumb'=>TRUE,
			'maintain_ratio'=>TRUE,
			'width'=>160,
			'height'=>120,
			'new_image'=>'./uploads/thumb/'.$file);
		$this->load->library('image_lib',$config_resize);
		$this->image_lib->resize();
	}*/

	public function product_list()
	{
		
		$product['products']=$this->welcome_model->get_product_lists();
		//echo "<pre>";
		//print_r($product);
		//echo "<pre>";
		$this->load->view('product_list',$product);
	}
	public function edit_product($id)
	{
		$product['products']=$this->welcome_model->edit_product_list($id);
		//print_r($product);
		$this->load->view('edit_product',$product);
	}
	public function update()
	{
		$config=array(
		//$config_image = array();
		'upload_path' =>'./uploads/',
		'allowed_types' => 'jpg|png|gif',
		'max_size' => '4000');
		//$config_image['max_width'] = '1024';
		//$config_image['max_height'] = '768';
	$this->load->library('upload',$config);
	$this->upload->do_upload();
	$data=array('upload_data'=>$this->upload->data());
	//echo "<pre>";
	//print_r($data);
	//echo "<pre>";
	$id=$this->input->post('productid');
	//echo $id;
	//$query=$this->db->query("select * from product_details where product_id='{$id}'");
//print_r($query);
	//foreach ($query->result() as $row)
	//{
	//	unlink('/.uploads/'.$row->product_image);
	//}
	//$product['products']=$this->welcome_model->edit_product_list($id);
	//print_r($product);
	//$this->load->view('edit_product',$product);
	$product=array('product_name'=>$this->input->post('productname'),
					'product_image'=>$data['upload_data']['file_name']);
	//print_r($product);

	$this->welcome_model->update_product($product,$id);
	redirect('index.php/welcome/product_list');
	}
	
	public function delete_product($id)
		{
			//$query = $this->db->query("select * from product_details where product_id ='{$id}'");
			//foreach($query->result() as $row){}
			$this->db->where('product_id',$id);
			$this->db->delete('product_details');
			redirect('index.php/welcome/product_list');
		}
		public function search()
		{
			$key=$this->input->post('search');
			//echo $key;
			$products['products']=$this->welcome_model->search_product($key);
			//print_r($products);
			$this->load->view('search_product_list',$products);
			
		}
		public function single_product($id)
		{
			$product['products']=$this->welcome_model->select_single_product($id);
			//print_r($product);
			$this->load->view('single_product_list',$product);
		}
	
}
