<?php

class persona{

    private $id = 0;
    private $Nombre= "";
    private $Apellido = "";
    private $Pasaporte = "";
    private $Correo = "";
    private $Telefono = "";
    private $PaisOrigen = "";
    private $FechaLlegada = "";
    private $FechaSalida = "";
    private $NumeroHabitancion = "";

    function __construct($id=0){

        $id = $id+0;
        if($id > 0){
            $sql = "SELECT * FROM huespederegistrar WHERE Id ={$id}";
            $rs = mysqli_query(conexion::obj(), $sql);

            if(mysqli_num_rows($rs) > 0){
               $fila = mysqli_fetch_array($rs);
               $this->Nombre = $fila['Nombre'];
               $this->Apellido = $fila['Apellido'];
               $this->Pasaporte = $fila['Pasaporte'];
               $this->Correo = $fila['Correo'];
               $this->Telefono = $fila['Telefono'];
               $this->PaisOrigen = $fila['PaisOrigen'];
               $this->FechaLlegada = $fila['FechaLlegada'];
               $this->FechaSalida = $fila['FechaSalida'];
               $this->NumeroHabitancion = $fila['NumeroHabitancion'];
            }
        }
    }
    static function desactivar($id){
          $sql ="DELETE FROM huespederegistrar WHERE Id ={$id} ";
          mysqli_query(conexion::obj(), $sql);
    }

    static function listado(){
        
        $datos = array();
        $sql = "SELECT * FROM huespederegistrar";

        $rs = mysqli_query(conexion::obj(), $sql);

        while($fila = mysqli_fetch_object($rs)){
            $datos[] = $fila;
        }
        return $datos;
    }

    function Guardar(){

       if($this->id > 0){
          $sql = "UPDATE huespederegistrar SET Nombre = '{$this->Nombre}',Apellido = '{$this->apellido}',Pasaporte= '{$this->Pasaporte}',Correo= '{$this->Correo}', Telefono = '{$this->Telefono}',PaisOrigen= '{$this->PaisOrigen}',FechaLlegada= '{$this->FechaLlegada}', FechaSalida= '{$this->FechaSalida}', NumeroHabitancion= '{$this->NumeroHabitancion}' WHERE Id ='{$this->Id}';
          "; 
                  $link = conexion::obj();
                  mysqli_query($link, $sql);
                  echo mysqli_error($link);
       }
       else{
        $sql = "INSERT INTO huespederegistrar VALUES('0','{$this->Nombre}','{$this->Apellido}','{$this->Pasaporte}','{$this->Correo}','{$this->Telefono}','{$this->PaisOrigen}','{$this->FechaLlegada}','{$this->FechaSalida}','{$this->NumeroHabitancion}')";
        $link = conexion::obj();
        mysqli_query($link, $sql);
        echo mysqli_error($link);
        $this->id = mysqli_insert_id($link);
       }

    }


    function __toString(){
        return"Soy una persona";
    }

    function __get($propiedad){
        if(isset($this->$propiedad)){
            return $this->$propiedad;
        }
        else{
            echo"No existe una propiedad llamada {$propiedad}";
        }
    }

    function __set($propiedad, $valor){
        if(isset($this->$propiedad)){
            $this->$propiedad = $valor;
        }
        else{
            echo"No existe una propiedad llamada {$propiedad}";
        }
    }
}

?>