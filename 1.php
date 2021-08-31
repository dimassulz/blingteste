<?php 
/*
1. Escrever um algoritmo que rotacione um array em k posições. Exemplo: o array [1,2,3,4,5,6] se for
girado duas posições para a esquerda se torna [3,4,5,6,1,2]. Tente resolver sem usar uma cópia da
array. 
*/

function rotacionarArray($arr, $k){
    $ctArray = count($arr);
    for ($i = 0; $i < $k; $i++){
        $x = $arr[0];
        for ($j = 0; $j < $ctArray - 1; $j++){
            $arr[$j] = $arr[$j + 1];
        }
        $arr[$ctArray-1] = $x;
    }
    return $arr;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 1 - Bling</title>

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
  <form method="get" action="1.php">
    <h1 class="h3 mb-3 fw-normal">Questão 1</h1>

    <div class="form-floating">
      <input type="text" class="form-control" required name="arr" id="arr" placeholder="1,2,3,4,5,6">
      <label for="floatingInput">Digite os itens Ex. 1,2,3,4,5,6</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" required name="pos" id="pos" placeholder="1,2,3,4,5,6">
      <label for="floatingInput">Quantidade POSIÇÕES</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Gerar Resultado</button>
    <div class="form-floating">
         <h1 class="h3 mb-3 fw-normal"> Resultado: <br><?php 
            if(isset($_GET['arr']) && trim($_GET['arr']) !== "" && isset($_GET['pos']) && trim($_GET['pos']) !== ""){
                $arr = explode(",",$_GET['arr']);
                $arrPreparado = rotacionarArray($arr, (int) $_GET['pos']);
                for ($i = 0; $i < count($arr); $i++){
                    echo $arrPreparado[$i] . " ";
                }
            }
        ?></h1>
    </div>

    

    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>


    
  </body>
</html>
