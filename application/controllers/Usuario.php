<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
 	{
       parent::__construct();
       $this->load->library('pagination'); 
	   $this->load->helper('form');   
 	}


	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Usuario');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$data = curl_exec($ch); 

		$data2= json_decode($data, true);

		$data_user['usuarios']= $data2;

		curl_close($ch); 

		$data2['pagination'] = $this->pagination->create_links();
		$this->load->view('admin_usuarios', $data_user);
	}

	public function loadAdd(){
		$this->load->view('user_crud/add');
	}

	public function add(){
		function postapi($resourcePath, $method, $body = null)
		{
			$url = "http://localhost:3000/Usuario";
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
		$apePaterno= $this->input->post("ape_paterno");
		$apeMaterno= $this->input->post("ape_materno");
		$userName= $this->input->post("username");
		$correo= $this->input->post("correo");
		$userName= $this->input->post("username");
		$password= $this->input->post("password");
		$tipoUsuario= $this->input->post("tipo_usuario");
		

		$data= array(); 
		$data['nombre']= $nombre; 
		$data['apellido_paterno']= $apePaterno; 
		$data['apellido_materno']= $apeMaterno; 
		$data['usuario']= $userName;
		$data['correo']= $correo; 	
		$data['password']= $password; 
		$data['tipo_user']= $tipoUsuario; 

		postapi("", "POST", json_encode($data));

		redirect("usuario");

		
	}

	public function delete($id_usuario){
		$url = "http://localhost:3000/Usuario/".$id_usuario;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		redirect("usuario");
	}

	public function edit($id_usuario){		
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/Usuario');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_HEADER, 0); 
			$data = curl_exec($ch); 

			$data2= json_decode($data, true);

			$data_enviar= array(); 

			foreach($data2 as $usuario){
				if($usuario['id_usuario'] == $id_usuario){
					$data_enviar['usuario']= $usuario;
					break; 
				}
			}

			if(isset($data_enviar['usuario']['id_usuario'])){
				$params = array(
					'nombre'=> $this->input->post('nombre'),
					'apellido_paterno'=> $this->input->post('apellido_paterno'),
					'apellido_materno'=> $this->input->post('apellido_materno'),
					'usuario'=> $this->input->post('usuario'),
					'correo'=> $this->input->post('correo'),
					'password'=> $this->input->post('password'),
					'tipo_user'=> $this->input->post('tipo_user')
				);
				if(isset($_POST) && count($_POST) > 0){
					$url = 'http://localhost:3000/Usuario/'.$id_usuario;
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
					curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
					$response = curl_exec($ch);
					echo 'Status-Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE);
					echo '<pre>';print_r(json_decode($response, true));echo'</pre>';
					curl_close($ch);
					redirect("usuario");
					
				}else{
					
					$this->load->view('user_crud/edit',$data_enviar);
				}

			}


	}catch (Exception $ex) {
		throw new Exception('Tipo_lesion Controller : Error in edit function - ' . $ex);
	}



	}
}