<?php
if (count($empleados) === 0) {
    ?>
    <center><h3>No existen empleados registrados...</h3></center>
    <?php
} else {
    foreach ($empleados as $emp) {
        ?>
        <div class='item_empleado' id="<?php echo $emp->usu_id ?>">
            <div class="titulo_empleado"><h6><?php echo $emp->per_identificacion ?></h6>
                <h5><?php echo $emp->per_nombre . " " . $emp->per_apellido ?></h5></div>
        </div>
        <?php
    }
}