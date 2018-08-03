<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");



$id = $_POST['id_fornecedor'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$localidade = $_POST['localidade'];
$cod_postal =  $_POST['cod_postal'];


  if(isset($_POST['submit'])){
    $query_adiciona = pg_query("INSERT INTO t_fornecedor (id_fornecedor, nome, telefone, rua, localidade, cod_postal)  VALUES ('$id', '$nome','$telefone', '$rua', '$localidade', '$cod_postal')");

    if (!$query_adiciona) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível resgistar fornecedores');window.location.href='fornecedores.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Fornecedores registado com sucesso!');window.location.href='fornecedores.php'</script>";
    }

  }

?>
