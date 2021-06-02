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
                <h3 class="box-title">Proveedor Edit</h3>
            <?php echo form_open('proveedor/edit/'.$proveedor['id_proveedor']); ?>
            <div class="box-body">
              <div class="row clearfix">
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Id proveedor</label>
                <div class="form-group">
                  <input type="text" name="id_proveedor" value="<?php echo ($this->input->post('id_proveedor') ? $this->input->post('id_proveedor') : $proveedor['id_proveedor']); ?>" class="form-control" id="id_proveedor" />
                    <span class="text-danger"><?php echo form_error('id_proveedor');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Nombre</label>
                <div class="form-group">
                  <input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $proveedor['nombre']); ?>" class="form-control" id="nombre" />
                    <span class="text-danger"><?php echo form_error('nombre');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Contacto</label>
                <div class="form-group">
                  <input type="text" name="contacto" value="<?php echo ($this->input->post('contacto') ? $this->input->post('contacto') : $proveedor['contacto']); ?>" class="form-control" id="contacto" />
                    <span class="text-danger"><?php echo form_error('contacto');?></span>
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