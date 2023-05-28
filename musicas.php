<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finalistas ETGDH</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <script src="js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>



<br><h1>Listar Musica</h1>

    <br>
<?php
require 'config.php';
   $sql ="SELECT *FROM musica ORDER BY Autor";
   
   $res =$conn->query($sql);
   $qtd = $res->num_rows;

   if ($qtd > 0) {
      print "<table class='table table-hover table-striped table-bordered'>";
      print "<tr>";
      print "<th>#</th>";
      print "<th>Autor</th>";
      print "<th>Nome da musica</th>";
      print "<th>Ações</th>";
      print "</tr>";
      while ($row = $res->fetch_object()) {
         print "<tr>";
         print "<td>" .$row->id. "</td>";
         print "<td>" .$row->Autor. "</td>";
         print "<td>" .$row->Nome. "</td>";
         print "<td>
            <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>
         </td>";
         print "</tr>";
      }
      print "</table>";
   }else {
      print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
   }
?>
   <style>
      .box-search{
        display:flex;
        justify-content:center;
        gap:.1%;
      }
    </style>
    <script> 
        var search = document.getElementById('pesquisar');
      search.addEventListener("keydown", function (event) {
         if (event.key === "Enter") {
            searchData();
         }
      });
      function searchData() {
         //window.location ='?page=listar?search='+search.value;
         var searchValue = search.value;
         var newURL = '?page=listar?search=' + searchValue;
         window.location = newURL;
      }

   



   </script>
   