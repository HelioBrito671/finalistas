<?php
session_start();
   if ((!isset($_SESSION['nome']) == true ) and (!isset($_SESSION['password']) == true)) {
      unset($_SESSION['nome']);
      unset($_SESSION['password'] );
      header('location: login.php');
   }
   else {
      $logado = $_SESSION['nome'];
   }
   ?>
<h1>Nova Musica</h1>
<form action="?page=salvar" method="POST">
    <input type ="hidden" name="acao" value="cadastrar">
   <div class="mb-3 ">
      <label for="">Nome da musica</label>
      <input type="text" name="nome" class="form-control" placeholder="musica" required>
   </div>
   <div class="mb-3">
      <label for="">Autor</label>
      <input type="text" name="autor" class="form-control" placeholder="autor" required>
   </div>
   <div class="mb-3">
      <button type="submit" class="btn-primary">Guardar</button>
   </div>
</form>