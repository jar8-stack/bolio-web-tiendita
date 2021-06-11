<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Empleado Edit</h3>
            <?php echo form_open('empleado/edit/'.$empleado['id_empleado']); ?>            
            <div class="box-body">
              <div class="row clearfix">
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>salario</label>
                <div class="form-group">
                  <input type="text" name="salario" value="<?php echo ($this->input->post('salario') ? $this->input->post('salario') : $empleado['salario']); ?>" class="form-control" id="salario" />
                    <span class="text-danger"><?php echo form_error('salario');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Sucursal</label>
                <div class="form-group">
                    <select name="idSucursal" id="">
                        <?php
                            foreach($sucursales as $sucursal){                            
                                if($sucursal['idSucursal'] == $empleado['id_sucursal']){
                                    ?> <option value="<?php echo $sucursal['idSucursal'] ?>"><?php echo $sucursal['Nombre'] ?></option> <?php
                                    break;
                                }                                
                            }
                        ?>
                        <?php
                            foreach($sucursales as $sucursal){                                                            
                                ?> <option value="<?php echo $sucursal['idSucursal'] ?>"><?php echo $sucursal['Nombre'] ?></option> <?php                                                                                                 
                            }
                        ?>                          
                    </select>                                                                  
                    <span class="text-danger"><?php echo form_error('idSucursal');?></span>
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