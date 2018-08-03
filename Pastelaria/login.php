<?php
  session_start();

  if(isset($_SESSION['use']))   {
    header("Location:index.html");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $entrar = $_POST['entrar'];

  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");
  $restricao1 = pg_query("SELECT * FROM t_utilizador WHERE username LIKE '$username' AND password LIKE '$password' AND id_perfil=1") or die("erro ao selecionar");

    if (isset($entrar)) {


      $verifica = pg_query("SELECT * FROM t_utilizador WHERE username LIKE '$username' AND password LIKE '$password'") or die("erro ao selecionar");
        if (pg_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou username incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          if (pg_num_rows($restricao1)>0) {
            $_SESSION['username']=$username;
            #setcookie("login",$login);
            header("Location:index.php");
          }else {
            $_SESSION['username']=$username;
            header("Location:index2.php");
          }




        }
    }
?>
