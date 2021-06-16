<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	function __construct()
 	{
       parent::__construct();
       $this->load->library('pagination'); 
	   $this->load->helper('form');   
 	}


	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Producto');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_sucursal['productos']= $data2;

		curl_close($ch); 

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Proveedor');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data3= json_decode($data, true);

		$data_sucursal['proveedores']= $data3;

		$data2['pagination'] = $this->pagination->create_links();
		$this->load->view('admin_productos', $data_sucursal);
	}

	public function loadAdd(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Proveedor');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_users['proveedores']= $data2;

		$this->load->view('producto_crud/add', $data_users);
	}

	public function add(){
		function postapi($resourcePath, $method, $body = null)
		{
			$url = "http://localhost:3000/Producto/".$resourcePath;
			//
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			if($method == "POST") {
				curl_setopt($ch, CURLOPT_POST, true);
			}
			
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			
			if($body != null) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
			}
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			$data = curl_exec($ch);
			if (curl_errno($ch)) {

			} else {
				$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			}

			curl_close($ch);
			if ($data != false) {

				$result = json_decode($data);

				if ($result != null) {
					return $result;
				}
			}
			return false;
		}



		$nombre= $this->input->post("nombre");
		$precio= $this->input->post("precio");
		$stock= $this->input->post("stock");		
        $idProveedor= $this->input->post("id_proveedor");		
		

		$data= array(); 
		$data['descripcion']= $nombre; 
		$data['precio']= $precio; 
		$data['stock']= $stock; 	

		postapi($idProveedor, "POST", json_encode($data));

		redirect("producto");

		
	}

	public function delete($idProducto){
		$url = "http://localhost:3000/Producto/".$idProducto;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		redirect("producto");
	}

	public function edit($idProducto){		
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Producto');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data = curl_exec($ch); 

			$data2= json_decode($data, true);

			$data_enviar= array(); 

			foreach($data2 as $producto){
				if($producto['id_producto'] == $idProducto){
					$data_enviar['producto']= $producto;
					break; 
				}
			}


            $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Proveedor');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data2 = curl_exec($ch); 

			$data3= json_decode($data2, true);
            $data_enviar['proveedores']= $data3;

			if(isset($data_enviar['producto']['id_producto'])){
				$params = array(
					'descripcion'=> $this->input->post('descripcion'),
					'precio'=> $this->input->post('precio'),
                    'stock'=> $this->input->post('stock'),
                    'id_proveedor'=> $this->input->post('id_proveedor')
				);
				if(isset($_POST) && count($_POST) > 0){
					$url = 'http://localhost:3000/Producto/'.$idProducto;
					$data_json = json_encode($params);

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response  = curl_exec($ch);
					curl_close($ch);
					redirect("producto");
					
				}else{
					
					$this->load->view('producto_crud/edit',$data_enviar);
				}

			}


	}catch (Exception $ex) {
		throw new Exception('Tipo_lesion Controller : Error in edit function - ' . $ex);
	}



	}
}