<?php 
/*
6 - Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano cartesiano e calcule a
área do retângulo criado pela sobreposição. Deve receber como entrada dois retângulos formados por
pontos, ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma saída informando a área calculada
ou zero se não ocorrer sobreposição.
*/

function gerar($r1x, $r1y, $l1x, $l1y, $r2x, $r2y, $l2x, $l2y){
    try{
 
        if ($l1x == $r1x || $l1y== $r1y || $l2x == $r2x || $l2y == $r2y) {
            return 0;
        }
 
        if ($l1x >= $r2x || $l2x >= $r1x) {
            return 0;
        }
 
        if ($r1y >= $l2y || $r2y >= $l1y) {
            return 0;
        }
 
        return 'Área retângulo 1: '.($r1x*$l1y) .' e Área retângulo 2: '+($r2x*$l2y) ;
 
    }catch(Exception $e){
        return $e->getMessage();
    }
}

$resultado = '';
if(isset($_GET['texto']) && trim($_GET['texto']) && 
   isset($_GET['busca']) && trim($_GET['busca'])) { 
  $resultado = buscar($_GET['busca'], $_GET['texto']);
}
//echo gerar('ada', 'padaria');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 6 - Bling</title>

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
  <form method="get" action="6.php">
    <h1 class="h3 mb-3 fw-normal">Questão 6</h1>
     <div class="form-floating">
      <input type="text" class="form-control" name="r1" maxlength="300" id="texto" required placeholder="r1">
      <label for="floatingInput">Retangulo 1</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="r2" maxlength="300" id="busca" required placeholder="r2">
      <label for="floatingInput">Retangulo 2</label>
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
