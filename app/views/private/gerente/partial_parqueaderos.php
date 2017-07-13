<?php
foreach ($parqueaderos as $p) {
    $p instanceof Parqueadero;
    ?>
    <div class='item_parqueadero' id="<?php echo $p->getPar_id() ?>">
        <div class="titulo_parqueadero"><h6><?php echo $p->getPar_nit() ?></h6><h5><?php echo $p->getPar_nombre() ?></h5></div>
    </div>
    <?php
}
?>