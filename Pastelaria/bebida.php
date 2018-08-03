<?php
  session_start();

  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

  $query_bebida = pg_query("SELECT * FROM t_produto WHERE id_categoria = '1'") or die("erro ao selecionar");

  if (isset($_POST['Bebidas'])){
    if (pg_num_rows($query_bebida)<=0){
      echo"<script language='javascript' type='text/javascript'>alert('Não existem bebidas registadas'); window.close();</script>";
      die();
    }else{
      echo "<div id='downbar'>";
      echo "<h2>Bebidas</h2>";
      echo "<table border='1' style='width:95%; margin-top: 1em; class='table table-bordered'>";
      // echo "<tr>";
      // echo "<th>Nome</th>";
      // echo "<th>Preço</th>";
      // echo "</tr>";
      //   while($aux = pg_fetch_array($query_bebida)){
      //     echo "<tr><td>".$aux['nome']."</td>
      //               <td>".$aux['preco_venda']."</td>
      //           </tr>";
      echo "</table>";
      echo "</div>";
    }
  }
?>
