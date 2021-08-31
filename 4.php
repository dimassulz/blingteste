<?php 
/*
4 - Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais triângulos é
possível formar usando estas medidas. Exemplo [abc], [abd]...
*/

function buscarTriangulos(int $a, int $b, int $c, int $d, int $e, int $f){
    try{
      $ct = 0;
      $triangulos = '';
      $arr = [$a,$b,$c,$d,$e,$f];
      for ($i = 0; $i < 6; $i++){
          for ($j = $i + 1; $j < 6; $j++){
              for ($k = $j + 1; $k < 6; $k++){
                  if ($arr[$i] + $arr[$j] > $arr[$k] && 
                      $arr[$i] + $arr[$k] > $arr[$j] && 
                      $arr[$k] + $arr[$j] > $arr[$i] ){
                        $triangulos .= ' ['.$arr[$i] . $arr[$j] . $arr[$k].'] ';
                        $ct++;
                  }
              }
          }
      }
      return $ct.' triângulos e as possibilidades são '.$triangulos;
    }catch(Exception $e){
        return $e->getMessage();
    }
   
}

$resultado = '';
if(isset($_GET['a']) && trim($_GET['a']) && 
   isset($_GET['b']) && trim($_GET['b']) && 
   isset($_GET['c']) && trim($_GET['c']) && 
   isset($_GET['d']) && trim($_GET['d']) && 
   isset($_GET['e']) && trim($_GET['e']) && 
   isset($_GET['f']) && trim($_GET['f'])) { 
  $resultado = buscarTriangulos((int)$_GET['a'], (int)$_GET['b'], (int)$_GET['c'], (int)$_GET['d'], (int)$_GET['e'], (int)$_GET['f']);
}
//echo buscarTriangulos(1,2,3,4,5,6);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 4 - Bling</title>

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
  <form method="get" action="4.php">
    <h1 class="h3 mb-3 fw-normal">Questão 4</h1>

    <div class="form-floating">
      <input type="number" class="form-control" name="a" max="999" id="a" required placeholder="medida 1">
      <label for="floatingInput">Digite a medida 1</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" name="b" max="999" id="b" required placeholder="medida 2">
      <label for="floatingInput">Digite a medida 2</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" name="c" max="999" id="c" required placeholder="medida 3">
      <label for="floatingInput">Digite a medida 3</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" name="d" max="999" id="d" required placeholder="medida 4">
      <label for="floatingInput">Digite a medida 4</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" name="e" max="999" id="e" required placeholder="medida 5">
      <label for="floatingInput">Digite a medida 5</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" name="f" max="999" id="f" required placeholder="medida 6">
      <label for="floatingInput">Digite a medida 6</label>
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
