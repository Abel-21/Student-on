<?php

require 'conexion.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$contra = $_POST['contra'];
$curso1 = $_POST['curso1'];
$curso2 = $_POST['curso2'];
$curso3 = $_POST['curso3'];
$inserta1 = NULL;
$inserta2 = NULL;
$inserta3 = NULL;
$encripta = sha1($contra);  

    $verificauser = mysqli_query($conexion,"SELECT * FROM usuarios WHERE matricula ='$matricula'");
    if(mysqli_num_rows($verificauser)>0)
    {
        echo '<script> 
             alert("El Usuario ya esta Registrado"); 
             window.history.go(-1);
        </script>';
        exit;
    }

    if($curso3 != "vacio" && $curso2 != "vacio"){
    $junto = $curso1.','.$curso2.','.$curso3;

    $inserta = "INSERT INTO usuarios(email,nombres,apellidos,matricula,contra,cursos,tipo) VALUES ('$email', '$nombres', '$apellidos','$matricula', '$encripta', '$junto', 'alumno')";
    $inserta1="INSERT INTO cursando(claveC,matricula) VALUES ('$curso1','$matricula')";
    $inserta2="INSERT INTO cursando(claveC,matricula) VALUES ('$curso2','$matricula')";
    $inserta3="INSERT INTO cursando(claveC,matricula) VALUES ('$curso3','$matricula')";

    }
    else if($curso2 != "vacio"){
     $junto = $curso1.','.$curso2;

    $inserta = "INSERT INTO usuarios(email,nombres,apellidos,matricula,contra,cursos,tipo) VALUES ('$email', '$nombres', '$apellidos','$matricula', '$encripta', '$junto', 'alumno')";   	
    $inserta1="INSERT INTO cursando(claveC,matricula) VALUES ('$curso1','$matricula')";
    $inserta2="INSERT INTO cursando(claveC,matricula) VALUES ('$curso2','$matricula')";
    }
    else{
    $inserta = "INSERT INTO usuarios(email,nombres,apellidos,matricula,contra,cursos,tipo) VALUES ('$email', '$nombres', '$apellidos','$matricula' ,'$encripta', '$curso1', 'alumno')";  
    $inserta1="INSERT INTO cursando(claveC,matricula) VALUES ('$curso1','$matricula')";
    }

    $resultado = mysqli_query($conexion,$inserta);

    if(!$resultado){
        echo '<script> 
             alert("Error en el Registro"); 
             window.history.go(-1);
        </script>';
   
    }else
    {	if(inserta3 === NULL){
    		if(inserta2 === NULL){
    			 $resultado1 = mysqli_query($conexion,$inserta1);
    		}else{
    			$resultado1 = mysqli_query($conexion,$inserta1);
    			$resultado2 = mysqli_query($conexion,$inserta2);
    		}
    	}else{
    		$resultado1 = mysqli_query($conexion,$inserta1);
    		$resultado2 = mysqli_query($conexion,$inserta2);
    		$resultado3 = mysqli_query($conexion,$inserta3);
    	}

    	session_start();   
     	$_SESSION['matricula'] = $matricula;
         $_SESSION['nombres']= $nombres;
         $_SESSION['tipo']= "alumno";
         $_SESSION['ubicacion']= "index";
         $_SESSION['LOGIN'] = true;

        echo '<script> 
             alert("Registrado Exitosamente"); 
             window.history.go(-1)</script>;;
        </script>';
         
   header("Location: ../index.php");
 

    }