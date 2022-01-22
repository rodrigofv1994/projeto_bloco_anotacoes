<?php

            //header('Content-Type: application/json'); 

             $arquivo = file_get_contents('anotacoes.json');
            
            $arquivo = json_decode($arquivo,true);

            $tamanho = sizeof($arquivo);
            

            $indice = 0;

            if($tamanho>0)
            {
                 for($indice;$indice<$tamanho;$indice++)
            {
                echo "<section class='anotacao'>" ;
                echo "<h2>".$arquivo[$indice]['titulo']."</h2>";
                echo "<p>".$arquivo[$indice]['anotacao']."</p>";
                echo "<button class='btnExcluirAnotacao' onclick='excluirAnotacao(this.value)' value=".$arquivo[$indice]['id'].">"."Excluir</button>";
                echo "</section>";
            }                
            }
?>