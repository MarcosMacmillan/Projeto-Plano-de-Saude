<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plano de Saúde</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="/vendor/modelsplano/javascript/form.js"></script>
    </head>
    <body>
        <div class="container border-dark border mt-lg-5 pb-lg-5 ">
            <h2 class="mb-lg-4 pt-lg-1 mt-lg-2 text-center">Cadastro de beneficiários</h2>
            <form method="post" class="row g-3" action="/enviar">
                <div class="row">
                    <div class="col-md-6">
                        <label for="qtdbeneficiarios" class="form-label" >Quantidade de beneficiários</label>
                        <input type="number" class="form-control" name="qntd" id="qtdbeneficiarios" max="10" onchange="enter(this)" required>
                    </div>
                    <div class="col-md-6">
                        <label for="plano" class="form-label">Plano</label>
                        <select id="plano" class="form-select" name="plano" required>
                            <option value="" disabled selected hidden>Selecione...</option>
                            <?php $counter1=-1;  if( isset($json2) && ( is_array($json2) || $json2 instanceof Traversable ) && sizeof($json2) ) foreach( $json2 as $key1 => $value1 ){ $counter1++; ?>

                                <option value="<?php echo htmlspecialchars( $value1->codigo, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1->nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="row" id="beneficiarios"></div>
                <div class="col text-center pt-2">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>        
            </form>
        </div>
    </body>
</html>