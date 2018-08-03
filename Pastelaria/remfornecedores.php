<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


$fornecedor = $_POST['fornecedor'];




  if(isset($_POST['remover'])){
    $query_remove = pg_query("DELETE FROM t_fornecedor WHERE id_fornecedor = $fornecedor");

    if (!$query_remove) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível remover fornecedores');window.location.href='fornecedores.php'</script>";
    }else {
      echo"<script language='javascript' type='text/javascript'>alert('Fornecedor removido com sucesso!');window.location.href='fornecedores.php'</script>";
    }

  }

?>
