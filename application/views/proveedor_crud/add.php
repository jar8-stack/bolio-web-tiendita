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
    <form action="<?php echo base_url("proveedor/add") ?>" method="post">
        <label for="">Nombre</label> <br><br>
        <input type="text" name="nombre"> <br>
        <label for="">Contacto</label> <br><br>
        <input type="text" name="contacto"> <br>
        

        <br><br>

        <input type="submit">
    </form>

    </div>
</body>
</html>