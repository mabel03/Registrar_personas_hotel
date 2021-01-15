<?php
$mesange = array();
$txt = "";
if($_POST){
    $dbserver = $_POST['Servidor'];
    $dbuser = $_POST['Usuario'];
    $dbclave = $_POST['Clave'];
    $dbname = $_POST['BaseDatos'];

    $correcto = true;

    if($correcto){
       $link = mysqli_connect($dbserver,$dbuser,$dbclave);
       //var_dump($link->connect_error);      
       mysqli_query($link,"CREATE DATABASE {$dbname};");
       //var_dump($link->error);      
       $link->close();

       $link = mysqli_connect($dbserver,$dbuser,$dbclave,$dbname);
       if($link == false){
          $mesange [] = "Revisar porque no esta funcionando";
       }
       else{
       $sql ="CREATE DATABASE {$dbname}";
       mysqli_query($link,$sql);

       mysqli_query($link,"USE{$dbname}");

       $sql = "DROP TABLE IF EXISTS {$dbname}; ";
       mysqli_query($link,$sql);


       $sql= "CREATE TABLE huespederegistrar (
        Id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        Nombre varchar(50) NOT NULL,
        Apellido varchar(100) NOT NULL,
        Pasaporte varchar(200) NOT NULL,
        Correo varchar(200) NOT NULL,
        Telefono varchar(14) NOT NULL,
        PaisOrigen varchar(200) NOT NULL,
        FechaLlegada date NOT NULL,
        FechaSalida date NOT NULL,
        NumeroHabitancion int NOT NULL
      ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;";
      mysqli_query($link,$sql);
       
      $info = "<?php
        define('DB_HOST','{$dbserver}');
        define('DB_USER','{$dbuser}');
        define('DB_PASS','{$dbclave}');
        define('DB_NAME','{$dbname}');
      ?>   
      ";
       }

       file_put_contents("../Libreria/configuracion.php", $info);

       echo"
         <script>
           alert('El sistema esta instalado...');
           //window.location = 'Index.php'; 
         </script>
       ";
       header('Location: ../index.php');
    }
}
$mesange = implode("<br />", $mesange);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="Diseño/Css.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Instalador</title>
    <style>
        .asg_error{
            font-weignt: bold;
            color:blue;
        }
    </style>
</head>
<body>
    <div class = "container">
    <br>
    <br>
    <h3><center>Instalador para la base de datos</center></h3>
    <br>
    <form method="post">
        <div  class = "form-group">
        <label class = "input-group-addon" for="">Servidor</label>
        <input type="text" name ="Servidor" class="form-control form-control-sm" placeholder="Ingrese el servidor"/>
        </br>
        <div  class = "form-group">
        <label class = "input-group-addon" for="">Usuario</label>
        <input type="text" name ="Usuario" class="form-control form-control-sm" placeholder="Ingrese el usuario"/>
        </div>
        </br>
        <div  class = "form-group">
        <label class = "input-group-addon" for="">Clave</label>
        <input type="text" name ="Clave" class="form-control form-control-sm" placeholder="Ingrese la contraseña"/>
        </div>
        </br>
        <div  class = "form-group">
        <label class = "input-group-addon" for="">Base de datos</label>
        <input type="text" name ="BaseDatos" class="form-control form-control-sm" placeholder="Ingrese la base de datos"/>
        </div>
        </br>
            <button type = "submit" class = "btn btn-success btn-block">Instalar</button>
        </form>
    </div>
</body>
</html>