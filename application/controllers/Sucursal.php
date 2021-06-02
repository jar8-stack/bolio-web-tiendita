<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal extends CI_Controller {

	function __construct()
 	{
       parent::__construct();
       $this->load->library('pagination'); 
	   $this->load->helper('form');   
 	}


	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Sucursal');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_sucursal['sucursales']= $data2;

		curl_close($ch); 

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Usuario');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data3= json_decode($data, true);

		$data_sucursal['usuarios']= $data3;

		$data2['pagination'] = $this->pagination->create_links();
		$this->load->view('admin_sucursales', $data_sucursal);
	}

	public function loadAdd(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Usuario');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_users['usuarios']= $data2;

		$this->load->view('sucursal_crud/add', $data_users);
	}

	public function add(){
		function postapi($resourcePath, $method, $body = null)
		{
			$url = "http://localhost:3000/Sucursal/".$resourcePath;
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
		$ubicacion= $this->input->post("ubicacion");
		$idSucursal= $this->input->post("idSucursal");		
		

		$data= array(); 
		$data['Nombre']= $nombre; 
		$data['ubicacion']= $ubicacion; 
		$data['idSucursal']= $idSucursal; 	

		postapi($idSucursal, "POST", json_encode($data));

		redirect("sucursal");

		
	}

	public function delete($idSucursal){
		$url = "http://localhost:3000/Sucursal/".$idSucursal;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		redirect("sucursal");
	}

	public function edit($idSucursal){		
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Sucursal');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data = curl_exec($ch); 

			$data2= json_decode($data, true);

			$data_enviar= array(); 

			foreach($data2 as $sucursal){
				if($sucursal['idSucursal'] == $idSucursal){
					$data_enviar['sucursal']= $sucursal;
					break; 
				}
			}

			if(isset($data_enviar['sucursal']['idSucursal'])){
				$params = array(
					'Nombre'=> $this->input->post('Nombre'),
					'ubicacion'=> $this->input->post('ubicacion')					
				);
				if(isset($_POST) && count($_POST) > 0){
					$url = 'http://localhost:3000/Sucursal/'.$idSucursal;
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
					$response = curl_exec($ch);
					echo 'Status-Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE);
					echo '<pre>';print_r(json_decode($response, true));echo'</pre>';
					curl_close($ch);
					redirect("sucursal");
					
				}else{
					
					$this->load->view('sucursal_crud/edit',$data_enviar);
				}

			}


	}catch (Exception $ex) {
		throw new Exception('Tipo_lesion Controller : Error in edit function - ' . $ex);
	}



	}
}