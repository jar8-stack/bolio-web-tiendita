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
                <h3 class="box-title">Sucursal Edit</h3>
            <?php echo form_open('sucursal/edit/'.$sucursal['idSucursal']); ?>
            <div class="box-body">
              <div class="row clearfix">
            <div class="col-md-6">
               <label for="id_lesion" class="control-label">  <span class="text-danger"></span>Id sucursal</label>
                <div class="form-group">
                  <input type="text" name="idSucursal" value="<?php echo ($this->input->post('idSucursal') ? $this->input->post('idSucursal') : $sucursal['idSucursal']); ?>" class="form-control" id="idSucursal" />
                    <span class="text-danger"><?php echo form_error('idSucursal');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Nombre de sucursal</label>
                <div class="form-group">
                  <input type="text" name="Nombre" value="<?php echo ($this->input->post('Nombre') ? $this->input->post('Nombre') : $sucursal['Nombre']); ?>" class="form-control" id="Nombre" />
                    <span class="text-danger"><?php echo form_error('Nombre');?></span>
               </div>
            </div>
            <div class="col-md-6">
               <label for="desc_lesion" class="control-label">  <span class="text-danger"></span>Ubicación sucursal</label>
                <div class="form-group">
                  <input type="text" name="ubicacion" value="<?php echo ($this->input->post('ubicacion') ? $this->input->post('ubicacion') : $sucursal['ubicacion']); ?>" class="form-control" id="ubicacion" />
                    <span class="text-danger"><?php echo form_error('ubicacion');?></span>
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