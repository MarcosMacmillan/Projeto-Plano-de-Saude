<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plano de Saúde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container border-dark border mt-lg-5 pb-lg-4">
        <h1 class="mb-lg-4 pt-lg-1">Cadastro de beneficiários</h1>
        <form method="post" class="row g-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="qtdbeneficiarios" class="form-label" >Quantidade de beneficiários</label>
                    <input type="number" class="form-control" id="qtdbeneficiarios" onchange="enter(this)">
                </div>
                <div class="col-md-6">
                    <label for="plano" class="form-label">Plano</label>
                    <select id="plano" class="form-select">
                        <option selected>Selecione...</option>
                        <option value="p1">Plano 1</option>
                        <option value="p2">Plano 2</option>
                        <option value="p3">Plano 3</option>
                    </select>
                </div>
            </div>
            <div class="row" id="beneficiarios"></div>
            <div class="col text-center pt-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script>
        function enter(e) { //Tem que passar e como parâmetro 
            html=''
            for(let i = 0 ; i < e.value ; i++){
                teste = document.querySelector('#beneficiarios');
                html+= "<div class='col-md-6 mt-4'>"
                html+="    <label for='nome"+i+"' class='form-label'>Nome</label>"
                html+="    <input type='text' class='form-control' id='nome"+i+"'>"
                html+="</div>"
                html+="<div class='col-md-6 mt-4'>"
                html+="    <label for='idade"+i+"' class='form-label'>Idade</label>"
                html+="    <input type='number' class='form-control' id='idade"+i+"'>"
                html+="</div>"
                }
                teste.innerHTML = html;
        }
    </script>

</body>

</html>