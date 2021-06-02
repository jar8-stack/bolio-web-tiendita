<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

	function __construct()
 	{
       parent::__construct();
       $this->load->library('pagination'); 
	   $this->load->helper('form');   
 	}


	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Proveedor');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_proveedor['proveedores']= $data2;

		curl_close($ch); 

		$data2['pagination'] = $this->pagination->create_links();
		$this->load->view('admin_proveedores', $data_proveedor);
	}

	public function loadAdd(){
		$this->load->view('proveedor_crud/add');
	}

	public function add(){
		function postapi($resourcePath, $method, $body = null)
		{
			$url = "http://localhost:3000/Proveedor";
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
		$contacto= $this->input->post("contacto");
		
		

		$data= array(); 		
		$data['nombre']= $nombre; 
		$data['contacto']= $contacto; 


		postapi("", "POST", json_encode($data));

		redirect("proveedor");

		
	}

	public function delete($id_proveedor){
		$url = "http://localhost:3000/Proveedor/".$id_proveedor;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		redirect("proveedor");
	}

	public function edit($id_proveedor){		
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Proveedor');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data = curl_exec($ch); 

			$data2= json_decode($data, true);

			$data_enviar= array(); 

			foreach($data2 as $proveedor){
				if($proveedor['id_proveedor'] == $id_proveedor){
					$data_enviar['proveedor']= $proveedor;
					break; 
				}
			}

			if(isset($data_enviar['proveedor']['id_proveedor'])){				
				$params = array(
					'nombre'=> $this->input->post('nombre'),					
					'contacto'=> $this->input->post('contacto')
				);				
				
				if(isset($_POST) && count($_POST) > 0){										
					$url = 'http://localhost:3000/Proveedor/'.$id_proveedor;
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
					$response = curl_exec($ch);
					echo 'Status-Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE);
					echo '<pre>';print_r(json_decode($response, true));echo'</pre>';
					curl_close($ch);
					redirect("proveedor");
					
				}else{										
					$this->load->view('proveedor_crud/edit',$data_enviar);
				}

			}


	}catch (Exception $ex) {
		throw new Exception('Tipo_lesion Controller : Error in edit function - ' . $ex);
	}



	}
}