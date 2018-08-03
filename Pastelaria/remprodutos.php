<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


$produtos = $_POST['produtos'];




  if(isset($_POST['remover'])){
    $query_remove = pg_query("DELETE FROM t_produto WHERE id_produto = $produtos");

    if (!$query_remove) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível remover produtos');window.location.href='produtos.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Produtos removido com sucesso!');window.location.href='produtos.php'</script>";
    }

  }

?>
