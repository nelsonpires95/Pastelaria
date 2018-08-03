<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

$emp = $_POST['emp'];
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



  if(isset($_POST['editempregados'])){
    $result  =  pg_query("UPDATE t_utilizador (id_utilizador, username, password, id_perfil)
                                SET id_utilizador = '$id_utilizador', username = '$username', password = '$password', id_perfil = '$id_perfil' ");

    $query_adiciona = pg_query("UPDATE t_empregado
                                SET 'id_utilizador = '$id_utilizador',salaraio = '$salario',nome = '$nome',nif = '$nif', rua = '$rua', localidade = '$localidade', cod = '$cod_postal', contacto = '$contacto' WHERE id_empregado = $emp ");

    if (!$query_adiciona) {
      die();
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível lkjhlkjh editar empregado');window.location.href='empregados.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Empregado editado com sucesso!');window.location.href='empregados.php'</script>";
    }

    if (!$result) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível editar empregado');window.location.href='empregados.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Empregado editado com sucesso!');window.location.href='empregados.php'</script>";
    }

  }

?>
