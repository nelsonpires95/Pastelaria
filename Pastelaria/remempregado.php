<?php
$connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

$emp = $_POST['emp'];




  if(isset($_POST['remover'])){


    $remove_utilizador = pg_query("DELETE FROM t_utilizador WHERE id_utilizador = $emp");

    $query_remove = pg_query("DELETE FROM t_empregado WHERE id_empregado = $emp AND id_utilizador=$emp");

    if (!$remove_utilizador && !$query_remove) {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível apagar empregado');window.location.href='empregados.php'</script>";
    }else {
          echo"<script language='javascript' type='text/javascript'>alert('Empregado apagado com sucesso!');window.location.href='empregados.php'</script>";
      }
  }

?>
