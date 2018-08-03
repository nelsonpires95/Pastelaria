<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


$id_produto = $_POST['id_produto'];
$nome = $_POST['nome'];
$preco_venda = $_POST['preco_venda'];
$descricao = $_POST['descricao'];
$id_fornecedor = $_POST['id_fornecedor'];
$id_categoria =  $_POST['id_categoria'];


  if(isset($_POST['submit'])){
    $query_adiciona = pg_query("INSERT INTO t_produto (id_produto, nome, preco_venda, descricao, id_fornecedor, id_categoria)  VALUES ('$id_produto', '$nome', '$preco_venda', '$descricao', '$id_fornecedor', '$id_categoria')");

    if (!$query_adiciona) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível resgistar produtos');window.location.href='produtos.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Produto registado com sucesso!');window.location.href='produtos.php'</script>";
    }

  }

?>
