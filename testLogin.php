<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['password'])) {
   include_once('config.php');
   $nome = $_POST['nome'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM usuario WHERE nome = '$nome' and password = '$password'";
   $res = $conn->query($sql);
   if (mysqli_num_rows($res) < 1) {
      unset($_SESSION['nome']);
      unset($_SESSION['password']);
      header('Location: login.php');
}else {
   $_SESSION['nome'] = $nome;
   $_SESSION['password'] = $password;
   header('Location: index.php');
}
}
else
{
    // Não acessa
    header('Location: login.php');
}
?>