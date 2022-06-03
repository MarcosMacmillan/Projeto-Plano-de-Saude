<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Validação</title>
</head>

<body>
    <h1 class="mt-lg-4 text-center">Contrato do Plano</h1>
    <?php if( $msgError != '' ){ ?>

        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?>

        </div>
    <?php }else{ ?> 
        <div class="container border-dark border mt-lg-2 pb-lg-4 col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">
                            Nome
                        </th>
                        <th class="text-center">
                            Idade
                        </th>
                        <th class="text-center">
                            Valor
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>

                    <tr>
                        <td class="text-center">
                            <?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </td>
                        <td class="text-center">
                            <?php echo htmlspecialchars( $value1["idade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ano(s)
                        </td>
                        <td class="text-center">
                            R$ <?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" style="text-align: right;">Total</th>
                        <th class="text-center">R$ <?php echo htmlspecialchars( $total["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a href="/" class="btn btn-primary">Voltar</a>
        </div>
        <?php } ?>

</body>

</html>