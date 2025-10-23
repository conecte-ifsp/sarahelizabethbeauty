<?php
    if(isset($_SESSION['mensagem'])){
?>

<div role="alert">
    <?= $_SESSION['mensagem'];?>
    <button name="fechar"></button>
</div>

<?php 
        unset($_SESSION['mensagem']);
    }
?>