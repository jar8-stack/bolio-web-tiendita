<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Agregar usuario</title>
</head>
<body>
    <div style="margin-left: 30px; margin-top: 30px;">
    <h3>Agregar proveedor</h3>
    <form action="<?php echo base_url("sucursal/add") ?>" method="post">
        <label for="">Nombre de sucursal</label> <br><br>
        <input type="text" name="nombre"> <br>
        <label for="">Ubicación de sucursal</label> <br><br>
        <input type="text" name="ubicacion"> <br>


        <br><br>
        <label for="">Usuario que administra</label> <br><br>
        <select name="id_usuario" id="">
            <?php 
                foreach($usuarios as $usuario){                
                    ?> <option value="<?php echo $usuario['id_usuario'] ?>"> <?php echo $usuario['nombre'] ?> </option> <?php
                }
            ?>            
        </select>
        

        <br><br>

        <input type="submit">
    </form>

    </div>
</body>
</html>