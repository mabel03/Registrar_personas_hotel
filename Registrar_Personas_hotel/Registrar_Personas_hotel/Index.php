<?php
  include("Libreria/Motor.php");
 $persona = new persona();

 if($_POST){
    $persona->Nombre = $_POST['Nombre'];
    $persona->Apellido = $_POST['Apellido'];
    $persona->Pasaporte	 = $_POST['Pasaporte'];
    $persona->Correo = $_POST['Correo'];
    $persona->Telefono = $_POST['Telefono'];
    $persona->PaisOrigen = $_POST['PaisOrigen'];
    $persona->FechaLlegada = $_POST['FechaLlegada'];
    $persona->FechaSalida	 = $_POST['FechaSalida'];
    $persona->NumeroHabitancion = $_POST['NumeroHabitancion'];
    $persona->Guardar();
 }
 else if (isset($_GET['id'])){
     $persona = new persona($_GET['id']);
 }
 else if (isset($_GET['del'])){
  persona::desactivar($_GET['del']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="Diseño/Css.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Hotel BEXI</title>
</head>
<body>
    <div class= "Hola" class = "card card-body">
    <h3><center>*-Hotel BEXI-*</center></h3>
     <h4><center>Registrar huéspedes del hotel BEXI</center></h4>
          </br>
             <div class = "cold-nd-4">
                 <form action = "" method="post">
                      <div class = "form-group">
                        <label class = "input-group-addon" for="Nombre">Nombre</label>
                        <input type="text" value ="<?php echo $persona->Nombre; ?>" name = "Nombre" class = "form-control"placeholder="Ingrese su nombre"/>
                        </div>
                      </div>
                      </br>
                      <div  class = "form-group">
                        <label class = "input-group-addon" for="">Apellido</label>
                        <input type="text" value = "<?php echo $persona->Apellido; ?>" name = "Apellido" class = "form-control" placeholder="Ingrese su Apellido"/>
                      </div>
                      </br>
                      <div class = "form-group">
                        <label class = "input-group-addon" for="">Pasaporte</label>
                        <input type="tel" value = "<?php echo $persona->Pasaporte; ?>" name = "Pasaporte" class = "form-control" placeholder="Ingrese el su pasaporte"/>
                      </div>
                      </br>
                      <div class = "form-group ">
                        <label class = "input-group-addon" for="">Correo</label>
                        <input type="email" value = "<?php echo $persona->Correo; ?>"  name = "Correo" class = "form-control" placeholder="Ingrese su correo"/>
                      </div>
                      </br>
                      <div class = "form-group ">
                        <label class = "input-group-addon" for="">Telefono</label>
                        <input type="text" value = "<?php echo $persona->Telefono; ?>"  name = "Telefono" class = "form-control" placeholder="Ingrese su numero de telefono"/>
                      </div>
                      </br>
                      <div class = "form-group" class="btn btn-secondary btn-block ">
                        <label class = "input-group-addon" for="">Pais de origen</label>
                        <input type="text" value = "<?php echo $persona->PaisOrigen; ?>"  name = "PaisOrigen" class = "form-control" placeholder="Ingrese su pais"/>
                      </div>
                      </br>
                      <div class = "form-group">
                        <label class = "input-group-addon" for="">Fecha de llegada</label>
                        <input type="date" value = "<?php echo $persona->FechaLlegada; ?>"  name = "FechaLlegada" class = "form-control" />
                      </div>
                      </br>
                      <div class = "form-group ">
                        <label class = "input-group-addon" for="">Fecha de salida</label>
                        <input type="date" value = "<?php echo $persona->FechaSalida; ?>"  name = "FechaSalida" class = "form-control"/>
                      </div>
                      </br>
                      <div class = "form-group">
                        <label class = "input-group-addon" for="">Numero de habitación</label>
                        <input  type="number" value = "<?php echo $persona->NumeroHabitancion; ?>" name = "NumeroHabitancion" class="form-control form-control-sm" placeholder="Ingrese el numero de habitacion" />
                      </div>
                      <br>
                      <div class = "text-center">
                        <a href="index.php" class = "btn btn-success btn-block" >Nuevo</a>
                         <button type = "submit" class = "btn btn-info btn-block">Guardar informacion</button>
                      </div>
                 </form>
           <br>
        <table class="table">
          <thead class="thead-dark">
               <tr>
               </br>
               <h4><strong>Los datos agregados</strong><h4>
               <th>Nombre</th>
	             <th>Apellido</th>
               <th>Pasaporte</th>
               <th>Correo</th>
               <th>Telefono</th>
               <th>Pais origen</th>
               <th>Fecha llegada</th>
               <th>Fecha salida</th>
               <th>Numero habitación</th>
               <th></th>
               <th></th>
                </tr>
                </thead>
                    <tbody>
                      
                    </tbody>
                <?php 
                 
                  $datos = persona::listado();
                 foreach ($datos as $fila) {
                     echo"
                  <tr>
                  <center>
                     <td>{$fila->Nombre}</td>
                     <td>{$fila->Apellido}</td>
                     <td>{$fila->Pasaporte}</td>
                     <td>{$fila->Correo}</td>
                     <td>{$fila->Telefono}</td>
                     <td>{$fila->PaisOrigen}</td>
                     <td>{$fila->FechaLlegada}</td>
                     <td>{$fila->FechaSalida}</td>
                     <td>{$fila->NumeroHabitancion}</td>
                     <td>
                        <a href = 'index.php?id={$fila->Id}' class ='btn btn-success'>Editar</a>
                     </td>
                     <td>
                     <a href = 'index.php?del={$fila->Id}'class ='btn btn-danger'>Eliminar</a>
                  </td>
                </center>
                 </tr>      
                     
                     ";
                 }           
                
                ?>
                </table>

                 </div>
             </div>
        </div>    
    </div>
</body>
</html>