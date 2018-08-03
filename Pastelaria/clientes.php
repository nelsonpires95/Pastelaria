<?php
  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

    $query_cliente = pg_query("SELECT * FROM t_cliente") or die("erro ao selecionar");

    if (pg_num_rows($query_cliente)<=0){
      echo"<script language='javascript' type='text/javascript'>alert('Não existem clientes registados'); window.close();</script>";
      die();
    }else{
      echo "<h2>Clientes</h2>";
      echo "<table border='1' style='width:95%; margin-top: '1em' class='table table-bordered'>";
      echo "<tr>";
      echo "<th>#</th>";
      echo "<th>Nome</th>";
      echo "<th>NIF</th>";
      echo "<th>Rua</th>";
      echo "<th>Localidade</th>";
      echo "<th>Código Postal</th>";
      echo "</tr>";
        while($aux = pg_fetch_array($query_cliente)){
          echo "<tr><td>".$aux['id_cliente']."</td>
                    <td>".$aux['nome_cliente']."</td>
                    <td>".$aux['nif']."</td>
                    <td>".$aux['rua']."</td>
                    <td>".$aux['localidade']."</td>
                    <td>".$aux['cod_postal']."</td>
                </tr>";
        }
      echo "</table>";
    }


 ?>
