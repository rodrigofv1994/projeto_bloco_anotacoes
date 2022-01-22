<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minhas anotações</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <style>
            *{
                box-sizing:border-box;
            }
            body{
                margin:0;
                background-color: #DBD3F2;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .sectionInserirAnotacao{
                width:25%;
                height:100vh;
                background-color:#FAE9BB;
                padding:1em;
                display:flex;
                flex-direction:column;
                animation-name: exibirSectionInserirAnotacao;
                animation-duration: 2s;
                box-shadow: 0px 1px 30px 5px #8888;
                position:fixed;
                left:0;
                bottom:0;

            }

            .sectionAnotacao{
                width:100%;
                height:100vh;
                background-color:#DBD3F2;
                position:fixed;
                right:0;
                bottom:0;
                padding:1em;
                overflow:scroll;
                overflow-x: hidden;
            }

            .sectionAnotacao2{
                width:75%;
                height:100vh;
                background-color:#DBD3F2;
                position:fixed;
                right:0;
                bottom:0;
                padding:1em;
                animation-name: diminuirSectionAnotacoes;
                animation-duration: 2s;
                overflow:scroll;
                overflow-x: hidden;
            }

            @keyframes exibirSectionInserirAnotacao {
                from{
                    margin-left:-50%;
                }
                to{
                    margin-left:0;
                }
            }

            @keyframes diminuirSectionAnotacoes {
                from{
                    width:100%
                }
                to{
                    width:75%
                }
            }


            .botaoAbrirSection{
                position:fixed;
                right:2em;
                bottom:1em;
                background-color:#FAE9BB;
                outline:none;
                border:none;
                padding:1em;
                cursor:pointer;
                transition: all 1s;
                z-index: 9999;
            }

            .botaoAbrirSection:hover{
                position:fixed;
                right:2em;
                bottom:1em;
                background-color:#FAE9BB;
                outline:none;
                border:none;
                padding:1em;
                cursor:pointer;
                box-shadow: 0px 1px 30px 5px #F4D172;
            }

            .anotacao{
                width:auto;
                max-width:310px;
                height:auto;
                padding:1em;
                float:right;
                margin:0.5em;
                background-color:#F4D172;
                transition: all 2s;
                word-wrap: break-word;
            }

            h2,p{
                margin:0;
            }
            p{
                margin-top:0.5em
            }

            input[type="text"]
            {
                width:100%;
                height:2.5em;
                border-style:solid;
                border-width:0.2em;
                border-color:#F4D172;
                border-top-style:none;
                border-left-style:none;
                border-right-style:none;
                margin-top:1em;
                outline:none;
                padding-left:0.5em;
                background-color:#FAE9BB;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

            }

            textarea{
                width:100%;
                height:15em;
                border-style:solid;
                border-width:0.2em;
                border-color:#F4D172;
                margin-top:1em;
                outline:none;
                padding-left:0.5em;
                padding-top:0.5em;
                background-color:#FAE9BB;
                resize: none;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .botaoInserirAnotacao{
                width:100%;
                height:2.5em;
                background-color:#F4D172;
                transition: all 1s;
                margin-top:1em;
                border:none;
                cursor:pointer;
            }

            .botaoInserirAnotacao:hover{
                width:100%;
                height:2.5em;
                border:none;
                background-color:#F4D172;
                box-shadow: 0px 1px 30px 5px #F4D172;
                cursor:pointer;
            }




        </style>
    </head>
    <body onload="mostrarAnotacoes()">
        <button class="botaoAbrirSection" onclick="abrirSection()"><i class="far fa-file-alt"></i>   Criar anotação</button>

        <section class="sectionInserirAnotacao" id="sectionInserirAnotacao" style="display:none;">

            <h2>Fique a vontade, anote o que precisar...</h2>
            <input type="text" name="titulo" id="titulo" placeholder="Digite o título">
            <textarea name="anotacao" id="anotacao" placeholder="Digite sua anotação"></textarea>
            <button class="botaoInserirAnotacao" onclick="cadastrarAnotacao(titulo.value, anotacao.value)"><i class="far fa-file-alt"></i>   Criar anotação</button>


        </section>

        <section class="sectionAnotacao" id="sectionAnotacao">    

        </section>


        <script language="javascript">

            var anotacoes = [];

            function abrirSection()
            {
                document.getElementById("sectionInserirAnotacao").style.display = "flex";
                document.getElementById("sectionAnotacao").classList.remove("sectionAnotacao");
                document.getElementById("sectionAnotacao").classList.add("sectionAnotacao2");

            }

            function mostrarAnotacoes()
            {

                if (window.XMLHttpRequest)
                {
                    httpRequest = new XMLHttpRequest();
                }

                httpRequest.onreadystatechange = function ()
                {
                    if (httpRequest.readyState == 1)
                    {
                        console.log("Requisição  para mostrar anotação será feita em segundos");
                    }

                    if (httpRequest.readyState == 4)
                    {
                        console.log("Requisição  para mostrar anotação  foi feita e foi entregue.");
                        if (httpRequest.status == 200)
                        {                            
                            sectionAnotacao = document.getElementById("sectionAnotacao").innerHTML = httpRequest.responseText;                                                       
                        }
                    }
                }

                httpRequest.open('POST', 'mostrar_anotacao.php', false);
                httpRequest.setRequestHeader('Accept', 'application/json');
                httpRequest.send(null);

            }


            var form = new FormData();
            var formExcluir = new FormData();
            var httpRequest;

            function cadastrarAnotacao(titulo, anotacao)
            {

                if (titulo == "" || anotacao == "") {
                    alert("Preencha os campos corretamente.");
                } else
                {
                    if (window.XMLHttpRequest)
                    {
                        httpRequest = new XMLHttpRequest();
                    }

                    httpRequest.onreadystatechange = function ()
                    {
                        if (httpRequest.readyState == 1)
                        {
                            console.log("Requisição será feita em segundos");
                        }

                        if (httpRequest.readyState == 4)
                        {
                            console.log("Requisição foi feita e foi entregue.");
                            if (httpRequest.status == 200)
                            {
                                mostrarAnotacoes();
                            }
                        }
                    }

                    httpRequest.open('POST', 'cadastrar_anotacao.php', false);
                    form.append("titulo", titulo);
                    form.append("anotacao", anotacao);
                    httpRequest.send(form);
                }
            }
            
            
            function excluirAnotacao(id)
            {
                    if (window.XMLHttpRequest)
                    {
                        httpRequest = new XMLHttpRequest();
                    }

                    httpRequest.onreadystatechange = function ()
                    {
                        if (httpRequest.readyState == 1)
                        {
                            console.log("Requisição de exclusão será feita em segundos");
                        }

                        if (httpRequest.readyState == 4)
                        {
                            console.log("Requisição de exclusão foi feita e foi entregue.");
                            if (httpRequest.status == 200)
                            {
                                console.log("Excluiu a anotação "+ id);
                                console.log("Recebeu via post "+httpRequest.responseText);
                                mostrarAnotacoes();
                            }
                        }
                    }

                    httpRequest.open('POST', 'apagar_anotacao.php', false);
                    formExcluir.append("id",id);                    
                    httpRequest.send(formExcluir);
                
            }


        </script>
    </body>
</html>