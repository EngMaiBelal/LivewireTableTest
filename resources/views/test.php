<?php 
if($_POST){
    print_r($_POST['products']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php for($i = 0;$i< 3 ; $i++) {?>
            <input type="text" name="products[<?= $i ?>][name]" id="">
            <input type="number" name="products[<?= $i ?>][price]" id="">
            <input type="number" name="products[<?= $i ?>][quantity]" id="">
            <br>
        <?php } ?>
        <button>submit</button>
    </form>
</body>
</html>