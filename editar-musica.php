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
   $sql = "SELECT * FROM musica WHERE id=".$_REQUEST["id"];
   $res = $conn->query($sql);
   $row = $res->fetch_object();
?>
<h1>Editar Musica</h1>
<form action="?page=salvar" method="POST">
   <input type ="hidden" name="acao" value="editar">
   <input type ="hidden" name="id" value="<?php print $row->id; ?>">
   <div class="mb-3 ">
      <label for="">Nome da musica</label>
      <input type="text" name="nome" class="form-control" placeholder="musica" value="<?php print $row->Nome; ?>">
   </div>
   <div class="mb-3">
      <label for="">Autor</label>
      <input type="text" name="autor" class="form-control" placeholder="autor" value="<?php print $row->Autor; ?>">
   </div>
   <div class="mb-3">
      <button type="submit" class="btn-primary">Enviar</button>
   </div>
</form>