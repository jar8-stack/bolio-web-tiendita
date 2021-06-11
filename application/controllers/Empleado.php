<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

	function __construct()
 	{
       parent::__construct();
       $this->load->library('pagination'); 
	   $this->load->helper('form');   
 	}


	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Empleado');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_empleado['empleados']= $data2;

		curl_close($ch); 

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Sucursal');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data3= json_decode($data, true);

		$data_empleado['sucursales']= $data3;

		$data2['pagination'] = $this->pagination->create_links();
		$this->load->view('admin_empleados', $data_empleado);
	}

	public function loadAdd(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Sucursal');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_sucursal['sucursales']= $data2;

		$this->load->view('empleado_crud/add', $data_sucursal);
	}

	public function add(){
		function postapi($resourcePath, $method, $body = null)
		{
			$url = "http://localhost:3000/Empleado/".$resourcePath;
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



		$salario= $this->input->post("salario");		
		$idSucursal= $this->input->post("idSucursal");		
		

		$data= array(); 
		$data['salario']= $salario; 
		$data['id_sucursal']= $idSucursal; 		

		postapi($idSucursal, "POST", json_encode($data));

		redirect("empleado");

		
	}

	public function delete($idEmpleado){
		$url = "http://localhost:3000/Empleado/".$idEmpleado;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		redirect("empleado");
	}

	public function edit($idEmpleado){		
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Empleado');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data = curl_exec($ch); 

			$data2= json_decode($data, true);

			$data_enviar= array(); 

			foreach($data2 as $empleado){
				if($empleado['id_empleado'] == $idEmpleado){
					$data_enviar['empleado']= $empleado;
					break; 
				}
			}

			if(isset($data_enviar['empleado']['id_empleado'])){	
				
				$params = array(
					'salario'=> $this->input->post('salario'),
					'id_sucursal'=> $this->input->post('idSucursal')					
				);	
				
				if(isset($_POST) && count($_POST) > 0){																			
					$url = 'http://localhost:3000/Empleado/'.$idEmpleado;					
					$data_json = json_encode($params);

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response  = curl_exec($ch);
					curl_close($ch);							
					redirect("empleado");					
					
				}else{					

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Sucursal');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
					curl_setopt($ch, CURLOPT_HEADER, 0); 
					$data = curl_exec($ch); 

					$data2= json_decode($data, true);

					$data_enviar['sucursales']= $data2;
					
					$this->load->view('empleado_crud/edit',$data_enviar);
				}

			}


	}catch (Exception $ex) {
		throw new Exception('Tipo_lesion Controller : Error in edit function - ' . $ex);
	}



	}
}