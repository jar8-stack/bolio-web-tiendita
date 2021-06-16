<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Producto Edit</h3>
            <?php echo form_open('producto/edit/'.$producto['id_producto']); ?>
            <div class="box-body">
              <div class="row clearfix">
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Nombre del producto</label>
                <div class="form-group">
                  <input type="text" name="descripcion" value="<?php echo ($this->input->post('descripcion') ? $this->input->post('descripcion') : $producto['descripcion']); ?>" class="form-control" id="descripcion" />
                    <span class="text-danger"><?php echo form_error('descripcion');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Precio de producto</label>
                <div class="form-group">
                  <input type="number" name="precio" value="<?php echo ($this->input->post('Nombre') ? $this->input->post('precio') : $producto['precio']); ?>" class="form-control" id="precio" />
                    <span class="text-danger"><?php echo form_error('precio');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Stock</label>
                <div class="form-group">
                  <input type="text" name="stock" value="<?php echo ($this->input->post('stock') ? $this->input->post('stock') : $producto['stock']); ?>" class="form-control" id="stock" />
                    <span class="text-danger"><?php echo form_error('stock');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Proveedor</label>
                <div class="form-group">
                    <select name="id_proveedor" id="">
                        <?php
                            foreach($proveedores as $proveedor){                            
                                if($proveedor['id_proveedor'] == $producto['id_producto']){
                                    ?> <option value="<?php echo $proveedor['id_proveedor'] ?>"><?php echo $proveedor['nombre'] ?></option> <?php
                                    break;
                                }                                
                            }
                        ?>
                        <?php
                            foreach($proveedores as $proveedor){                                                            
                                ?> <option value="<?php echo $proveedor['id_proveedor'] ?>"><?php echo $proveedor['nombre'] ?></option> <?php                                                                                                 
                            }
                        ?>                          
                    </select>                                                                  
                    <span class="text-danger"><?php echo form_error('id_proveedor');?></span>
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