<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tipo Lesion Edit</h3>
            <?php echo form_open('usuario/edit/'.$usuario['id_usuario']); ?>
            <div class="box-body">
              <div class="row clearfix">
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Id usuario</label>
                <div class="form-group">
                  <input type="text" name="id_usuario" value="<?php echo ($this->input->post('id_usuario') ? $this->input->post('id_usuario') : $usuario['id_usuario']); ?>" class="form-control" id="id_usuario" />
                    <span class="text-danger"><?php echo form_error('id_usuario');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Nombre</label>
                <div class="form-group">
                  <input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $usuario['nombre']); ?>" class="form-control" id="nombre" />
                    <span class="text-danger"><?php echo form_error('nombre');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Apellido paterno</label>
                <div class="form-group">
                  <input type="text" name="apellido_paterno" value="<?php echo ($this->input->post('apellido_paterno') ? $this->input->post('apellido_paterno') : $usuario['apellido_paterno']); ?>" class="form-control" id="apellido_paterno" />
                    <span class="text-danger"><?php echo form_error('apellido_paterno');?></span>
               </div>
            </div>

            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Apellido materno</label>
                <div class="form-group">
                  <input type="text" name="apellido_materno" value="<?php echo ($this->input->post('apellido_materno') ? $this->input->post('apellido_materno') : $usuario['apellido_materno']); ?>" class="form-control" id="apellido_materno" />
                    <span class="text-danger"><?php echo form_error('apellido_materno');?></span>
               </div>
            </div>

            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Nombte de usuario</label>
                <div class="form-group">
                  <input type="text" name="usuario" value="<?php echo ($this->input->post('usuario') ? $this->input->post('usuario') : $usuario['usuario']); ?>" class="form-control" id="usuario" />
                    <span class="text-danger"><?php echo form_error('usuario');?></span>
               </div>
            </div>

            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Correo</label>
                <div class="form-group">
                  <input type="text" name="correo" value="<?php echo ($this->input->post('correo') ? $this->input->post('correo') : $usuario['correo']); ?>" class="form-control" id="correo" />
                    <span class="text-danger"><?php echo form_error('correo');?></span>
               </div>
            </div>

            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Password</label>
                <div class="form-group">
                  <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $usuario['password']); ?>" class="form-control" id="password" />
                    <span class="text-danger"><?php echo form_error('password');?></span>
               </div>
            </div>

            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Tpo de usuario</label>
                <div class="form-group">                  
                  <select name="tipo_user" id="tipo_user">
                    <option value="<?php echo $usuario['tipo_user'] ?>"><?php 
                    $tipoUser= $usuario['tipo_user']; 

                    if($tipoUser == 1){
                        echo "Administrador";
                    }else{
                        echo "Empleado";
                    }


                    
                    ?></option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                  </select>
                    <span class="text-danger"><?php echo form_error('password');?></span>
               </div>
            </div>

            </div>
                     </div>
      </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
</body>
</html>