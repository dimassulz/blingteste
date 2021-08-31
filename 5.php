<?php 
/*
5 - Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. (Não usar funções de busca
em string).
*/

function buscar(string $busca, string $texto){
    try{
      $lenBusca = strlen($busca);
      $lenTxt = strlen($texto);
  
      for ($i = 0; $i <= ($lenTxt - $lenBusca); $i++)
      {
          for ($j = 0; $j < $lenBusca; $j++){
              if ($texto[$i + $j] != $busca[$j])
                  break;
          }
          if ($j == $lenBusca)
              return "Na palavra <strong>".$texto."</strong> <br> o termo <u>". $busca . "</u> foi encontrado no indice ".$i;
      }
    }catch(Exception $e){
        return $e->getMessage();
    }
}

$resultado = '';
if(isset($_GET['texto']) && trim($_GET['texto']) && 
   isset($_GET['busca']) && trim($_GET['busca'])) { 
  $resultado = buscar($_GET['busca'], $_GET['texto']);
}
//echo buscar('ada', 'padaria');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 5 - Bling</title>

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Favicons -->
<meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="get" action="5.php">
    <h1 class="h3 mb-3 fw-normal">Questão 5</h1>
     <div class="form-floating">
      <input type="text" class="form-control" name="texto" maxlength="300" id="texto" required placeholder="Digite o texto">
      <label for="floatingInput">Texto</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="busca" maxlength="300" id="busca" required placeholder="Digite o texto busca">
      <label for="floatingInput">Texto a ser buscado</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Gerar Resultado</button>
    <div class="form-floating">
         <h1 class="h3 mb-3 fw-normal"> Resultado: <br><?php 
            echo $resultado;
        ?></h1>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>
    
  </body>
</html>
