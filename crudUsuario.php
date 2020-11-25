<?php 
  include 'conexion.php';

  $idUsuario=$_POST['idUsuario'];
  $nombreCompleto=$_POST['nombreCompleto'];
  $ci=$_POST['ci'];
  $correo=$_POST['correo'];
  $codigoPais=$_POST['codigoPais'];
  $celular=$_POST['celular'];
  $usuario=$_POST['usuario'];
  $clave=md5($_POST['clave']);    
  $idRol=$_POST['tipoRol'];
  if($idRol=="Administrador"){
      $idRol=1;
  }else{
      if ($idRol=="Padre") {
          $idRol=2;
      }        
  }

  switch($opcion){
        case 1: //Insertar
            $insertar=" INSERT INTO usuario(nombreCompleto,ci,correo,codigoPais,celular,usuario,clave,idRol) 
                VALUES('$nombreCompleto','$ci','$correo','$codigoPais','$celular','$usuario','$clave','$idRol')";
            $resultado=mysqli_query($conexion,$insertar);
        case 2: //Editar
        case 3: //Eliminar
  }


?>