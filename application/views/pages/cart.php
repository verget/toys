
<?php 
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
        if ($count == 1)
            $count = $count." товар";
        elseif(($count >= 2)&&($count <= 4))
            $count = $count." товара";
        else
            $count = $count." товаров";
        echo("Всего в корзине ".$count);
    }else 
        echo("Ваша корзина пуста");

