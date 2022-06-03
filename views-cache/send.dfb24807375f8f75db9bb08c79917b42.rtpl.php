<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação</title>
</head>
<body>
    <?php $counter1=-1;  if( isset($json) && ( is_array($json) || $json instanceof Traversable ) && sizeof($json) ) foreach( $json as $key1 => $value1 ){ $counter1++; ?>
        <?php $counter2=-1;  if( isset($value1) && ( is_array($value1) || $value1 instanceof Traversable ) && sizeof($value1) ) foreach( $value1 as $key2 => $value2 ){ $counter2++; ?>
            <p>teste<?php echo htmlspecialchars( $value2, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <?php } ?>
        
    <?php } ?>
</body>
</html>