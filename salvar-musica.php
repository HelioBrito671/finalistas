<?php 


switch ($_REQUEST["acao"]) {
   case 'cadastrar':
      $nome = $_POST["nome"];
      $autor = $_POST["autor"];
      
      $sql = "INSERT INTO musica (Nome, Autor) VALUES ('{$nome}', '{$autor}')";

      $res = $conn->query($sql);

      if ($res==true) {
         print "<script>alert('Cadastro realizado com sucesso');</script>";
         print "<script>location.href='?page=nova';</script>";
      }else {
         print "<script>alert('Não foi possivel realizar o cadastro');</script>";
         print "<script>location.href='?page=nova';</script>";
      }


      break;
   case 'editar':
      $nome = $_POST["nome"];
      $autor = $_POST["autor"];

      $sql = "UPDATE musica SET
                  nome ='{$nome}',
                  autor = '{$autor}'
               WHERE
                  id=".$_REQUEST["id"];
      
       

      $res = $conn->query($sql);

      if ($res==true) {
         print "<script>alert('Editado com sucesso');</script>";
         print "<script>location.href='?page=listar';</script>";
      }else {
         print "<script>alert('Não foi possivel editar');</script>";
         print "<script>location.href='?page=listar';</script>";
      }
      break;
   case 'excluir':
      session_start();
if ((!isset($_SESSION['nome']) == true ) and (!isset($_SESSION['password']) == true)) {
   unset($_SESSION['nome']);
   unset($_SESSION['password'] );
   header('location: login.php');
}
else {
   $logado = $_SESSION['nome'];
}
      $sql = "DELETE FROM musica WHERE id=".$_REQUEST["id"];

      $res = $conn->query($sql);

      if ($res==true) {
         print "<script>alert('Eliminado com sucesso');</script>";
         print "<script>location.href='?page=listar';</script>";
      }else {
         print "<script>alert('Não foi possivel excluir');</script>";
         print "<script>location.href='?page=listar';</script>";
      }
      
      break;
   default:
      # code...
      break;
}


