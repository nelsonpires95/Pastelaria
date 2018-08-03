<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

$nif = $_POST['nif'];
$nome = $_POST['nome'];
$salario = $_POST['salario'];
$rua = $_POST['rua'];
$localidade = $_POST['localidade'];
$cod_postal =  $_POST['cod_postal'];
$contacto = $_POST['contacto'];
$id_utilizador = $_POST['id_utilizador'];
$id_perfil = $_POST['id_perfil'];
$username = $_POST['username'];
$password = $_POST['password'];


  if(isset($_POST['submit'])){
    $result  =  pg_query("INSERT INTO t_utilizador (id_utilizador, username, password, id_perfil)
                                VALUES ('$id_utilizador', '$username', '$password', '$id_perfil')");

    $query_adiciona = pg_query("INSERT INTO t_empregado
                                VALUES ('$id_utilizador','$salario', '$nome','$nif', '$rua', '$localidade', '$cod_postal', '$contacto','$id_utilizador')");

    if (!$query_adiciona && !$result) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível resgistar empregado');window.location.href='empregados.php'</script>";
    }else {
          echo"<script language='javascript' type='text/javascript'>alert('Empregado registado com sucesso!');window.location.href='empregados.php'</script>";
    }




  }

?>
