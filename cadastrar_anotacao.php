<?php

$novaAnotacao = array(
    'id' => uniqid(),
    'titulo' => $_POST["titulo"],
    'anotacao' => $_POST["anotacao"]
);

echo $_POST['titulo'] . $_POST['anotacao']; 


$arquivo = file_get_contents('anotacoes.json');

$array = json_decode($arquivo,true);

$array = empty($array) ? [] : $array;

array_push($array,$novaAnotacao);

$dados_json = json_encode($array,JSON_PRETTY_PRINT);

$arquivoAnotacoes = fopen('anotacoes.json','r+');

fwrite($arquivoAnotacoes,$dados_json);

fclose($arquivoAnotacoes);


?>
