<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Agregar producto</title>
</head>
<body>
    <div style="margin-left: 30px; margin-top: 30px;">
    <h3>Agregar producto</h3>
    <form action="<?php echo base_url("producto/add") ?>" method="post">
        <label for="">Nombre de producto</label> <br><br>
        <input type="text" name="nombre"> <br>
        <label for="">Precio</label> <br><br>
        <input type="number" name="precio"> <br>
        <label for="">Stock</label> <br><br>
        <input type="number" name="stock"> <br>


        <br><br>
        <label for="">Proveedor que loproporciona</label> <br><br>
        <select name="id_proveedor" id="">
            <?php 
                foreach($proveedores as $proveedor){                
                    ?> <option value="<?php echo $proveedor['id_proveedor'] ?>"> <?php echo $proveedor['nombre'] ?> </option> <?php
                }
            ?>            
        </select>
        

        <br><br>

        <input type="submit">
    </form>

    </div>
</body>
</html>