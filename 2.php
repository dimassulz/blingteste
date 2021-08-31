<?php 
/*
2. Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no início os
números pares de forma crescente e, depois, os ímpares de forma decrescente.
*/
  
function ordenarParesImpares($arr,$n){
    $esq = 0;
    $dir = $n - 1;
    $ctImpar = 0;
    while ($esq < $dir){
        while ($arr[$esq] % 2 != 0){
            $esq++;
            $ctImpar++;
        }
        while ($arr[$dir] % 2 == 0 && $esq < $dir){
            $dir--;
        }
        if ($esq < $dir){
            $temp = $arr[$esq];
            $arr[$esq] = $arr[$dir];
            $arr[$dir] = $temp;
        }
    }
  $par = [];
  for($i=0;$i<($n-$ctImpar);$i++){
      $par[$i]=$arr[$ctImpar+$i];
  }

  $impar = [];
  for($i=0;$i<$ctImpar;$i++){
      $impar[$i]=$arr[$i];
  }
 
  usort($par, function($a, $b){
    return $a-$b;
  });

  usort($impar, function($a,$b){
    return $b-$a;
  });
    
  return array_merge($par,$impar);
}

$resultado = '';
if(isset($_GET['arr']) && trim($_GET['arr']) !== ""){
  $arr = explode(",",$_GET['arr']);
  $ctArr = count($arr);
  $ordenado = ordenarParesImpares($arr, $ctArr);
  for($i=0;$i<count($ordenado);$i++){
        $resultado .= $ordenado[$i]. " ";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 2 - Bling</title>

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
  <form method="get" action="2.php">
    <h1 class="h3 mb-3 fw-normal">Questão 2</h1>

    <div class="form-floating">
      <input type="text" class="form-control" required name="arr" id="arr" placeholder="1,2,3,4,5,6">
      <label for="floatingInput">Digite os itens Ex. 1,2,3,4,5,6</label>
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
