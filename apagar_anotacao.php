<?php



$arquivo = file_get_contents('anotacoes.json');

$objetoAnotacoes = json_decode($arquivo,true);

$indice = 0;

$tamanho = sizeof($objetoAnotacoes);


for($indice;$indice<=$tamanho;$indice++)
{
    //echo " Objeto do array   "   . $objetoAnotacoes[$indice]['id'];
    //echo " post recebido   "   . $_POST['id'];
            
    if($objetoAnotacoes[$indice]['id']===$_POST['id'])
    {             
        unset($objetoAnotacoes[$indice]);    

        $dados_json = json_encode($objetoAnotacoes,JSON_PRETTY_PRINT);
    
        $arquivoAnotacoes = fopen('anotacoes.json','w');
        
        fwrite($arquivoAnotacoes,$dados_json);
        
        fclose($arquivoAnotacoes);
        break;
    }     
    
}


?>
