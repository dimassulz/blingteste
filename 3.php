<?php 
/*
3. Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial e final recebidos no
formato dd/mm/aaaa. Não deve usar funções de data e hora.
*/

function ajustarAnosBissextos($arrDt){
    $ano = $arrDt[0];
    if ($arrDt[1] <= 2)
        $ano--;
    return floor($ano / 4) - floor($ano / 100) + floor($ano / 400);
}
 
function gerarArrDatas(string $dt){
    try{
        if(trim(strlen($dt)) < 10){
            throw new Exception('Ocorreu um erro ao enviar as datas!');
        }
        if(substr_count($dt, '-') !== 2){
            throw new Exception('Ocorreu um erro ao informar as datas, informe no formato dd/mm/aaaa');
        }
        return explode('-', $dt);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function buscarDiferenca(string $dt1, string $dt2){
    try{
        $arrDt1 = gerarArrDatas($dt1);
        $arrDt2 = gerarArrDatas($dt2);
        $totalDias1 = contarDias($arrDt1, $dt1);
        $totalDias2 = contarDias($arrDt2, $dt2);
        return ($totalDias2 - $totalDias1);
    }catch(Exception $e){
        return $e->getMessage();
    }
   
}

function contarDias(array $arrData, string $data){
    $diasMes=[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $d = $arrData[0] * 365 + $arrData[2];
    for ($i = 0; $i < $arrData[1] - 1; $i++){
        $d += $diasMes[$i];
    }
    $d += ajustarAnosBissextos($data);
    return $d;
}
$resultado = '';
if(isset($_GET['dt1']) && trim($_GET['dt1']) && 
   isset($_GET['dt2']) && trim($_GET['dt2']) !== ""){
  $resultado = buscarDiferenca($_GET['dt1'], $_GET['dt2']);
}
//echo buscarDiferenca('2010-01-01', '2021-01-01');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Questão 3 - Bling</title>

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
  <form method="get" action="3.php">
    <h1 class="h3 mb-3 fw-normal">Questão 3</h1>

    <div class="form-floating">
      <input type="date" class="form-control" name="dt1" maxlength="10" minlength="10" id="dt1" required placeholder="dd/mm/aaaa">
      <label for="floatingInput">Digite a primeira data</label>
    </div>
     <div class="form-floating">
      <input type="date" class="form-control" name="dt2" maxlength="10" minlength="10" id="dt2" required placeholder="dd/mm/aaaa">
      <label for="floatingInput">Digite a segunda data</label>
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
