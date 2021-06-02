<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Administración de Sucursales</h3>
              <div class="box-tools">
              <a href="<?php echo site_url('inicio'); ?>" class="btn btn-success btn-sm">Volver al tablero</a>
                </div>
                <br>
                <div class="box-tools">
                <a href="<?php echo site_url('sucursal/loadAdd'); ?>" class="btn btn-success btn-sm">Add</a>                  
                  </div>   
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>                    
                    <th>Nombre de sucrsal</th>
                    <th>Ubicación</th>                    
                    <th>administrador de sucursal</th>
                    <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                            if(isset($sucursales) && $sucursales!=null)
                            {
                            foreach($sucursales as $t){ ?>
                                        <tr>                                        
                                        <td><?php echo $t['Nombre']; ?></td>
                                        <td><?php echo $t['ubicacion']; ?></td>
                                        <td><?php 
                                        
                                        $idUsuario=  $t['id_usuario']; 

                                        foreach($usuarios as $usuario){
                                            if($usuario['id_usuario']==$idUsuario){
                                                echo $usuario['nombre'];
                                            }
                                        }
                                        
                                        ?></td>                                        
                                        <td><a href="<?php echo site_url('sucursal/edit/'.$t['idSucursal']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                            <a
                                            onclick="return confirm('Are you sure You want to delete?')"
                                                href="<?php echo site_url('sucursal/delete/'.$t['idSucursal']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                        </td>
                                        </tr>
                                        <?php }

                           }else{
                                  echo 'No data found';
                            }

                    ?>
                    
                    </tbody>
                </table>                
            </div>

        </div>
    </div>

</div>
</body>
</html>