<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finalistas ETGDH</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Comissão ETGDH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?page=nova">Nova musica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="./musicas.php">Listar musica</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Relatar
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>

    <div class="container">
      <div class="row">
        <div class="col mt-5">
        <?php 
        include("config.php");
    switch (@$_REQUEST["page"]) {
      case 'nova':
        include("nova-musica.php");
        break;
      case 'listar':
        include("listar-musica.php");
      break;
      case 'salvar':
        include("salvar-musica.php");
      break;  
      case 'editar':
        include("editar-musica.php");
      break;  
      default:
        print "<h1>Bem vindo</h1>";
        break;
    } echo'
    <div class="box-search">
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
      <button onclick="searchData()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
    </div> <Br>';
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql ="SELECT *FROM musica WHERE id like '%$data%' or Nome like '%$data%' or Autor like '%$data%' ORDER BY Autor";
}
else {
$sql ="SELECT *FROM musica ORDER BY Autor";
}

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

        
     </td> ";
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
     var newURL = 'index.php?search=' + searchValue;
     window.location = newURL;
  }





</script>
        </div>
      </div>
    </div>
    
    <br>
<br>



    <script src="js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>