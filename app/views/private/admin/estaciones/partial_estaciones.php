<?php
if (count($estaciones) === 0) {
    ?>
    <center><h3>No existen estaciones registradas...</h3></center>
    <?php
} else {
    ?>
    <h1>VEHICULOS</h1>
    <?php
    foreach ($estaciones as $est) {
        $est instanceof Estacion;

        if ($est->getTiv_id() === 1) {
            $id = null;

            if ($est->getEst_estado() === "nodisponible") {
                foreach ($parqueos as $pao) {
                    $pao instanceof Parqueo;

                    if ($pao->getEst_id() === $est->getEst_id() && $pao->getPao_estado() === Parqueo::$PARQUEO_ACTIVO) {
                        $id = $pao->getPao_id();
                        break;
                    }
                }
            } else {
                $id = $est->getEst_id();
            }
            ?>
    <div class="estacion estacion_big estacion_<?php echo $est->getEst_estado() ?>" accesskey="<?php echo $id ?>" data-tipo="<?php echo $est->getTiv_id()?>">
                <div>
                    <div class="codigo_estacion">
                        <h4><?php echo $est->getEst_codigo() ?></h4>
                    </div>
                    <div class="automovil">
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <br><br><h1>MOTOCICLETAS</h1>
    <?php
    foreach ($estaciones as $est) {
        $est instanceof Estacion;

        if ($est->getTiv_id() === 2) {
            $id = null;

            if ($est->getEst_estado() === "nodisponible") {
                foreach ($parqueos as $pao) {
                    $pao instanceof Parqueo;

                    if ($pao->getEst_id() === $est->getEst_id()) {
                        $id = $pao->getPao_id();
                    }
                }
            } else {
                $id = $est->getEst_id();
            }
            ?>
            <div class="estacion estacion_small estacion_<?php echo $est->getEst_estado() ?>" accesskey="<?php echo $id ?>" data-tipo="<?php echo $est->getTiv_id()?>">
                <div class="codigo_estacion">
                    <h4><?php echo $est->getEst_codigo() ?></h4>
                </div>
                <div class='motocicleta'>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <br><br><h1>BICICLETAS</h1>
    <?php
    foreach ($estaciones as $est) {
        $est instanceof Estacion;

        if ($est->getTiv_id() === 3) {
            $id = null;

            if ($est->getEst_estado() === "nodisponible") {
                foreach ($parqueos as $pao) {
                    $pao instanceof Parqueo;

                    if ($pao->getEst_id() === $est->getEst_id()) {
                        $id = $pao->getPao_id();
                    }
                }
            } else {
                $id = $est->getEst_id();
            }
            ?>
            <div class="estacion estacion_min estacion_<?php echo $est->getEst_estado() ?>" accesskey="<?php echo $id ?>">
                <div class="codigo_estacion">
                    <h4><?php echo $est->getEst_codigo() ?></h4>
                </div>
                <div class='bicicleta'>
                </div>
            </div>
            <?php
        }
    } 
    ?>
    <br><br><h1>LLAVES</h1>
    <?php
    foreach ($estaciones as $est) {
        $est instanceof Estacion;

        if ($est->getEst_tipo() === "llave") {
            ?>
            <div class="estacion estacion_accesorio estacion_<?php echo $est->getEst_estado() ?>" accesskey="<?php echo $id ?>">
                <div class="codigo_accesorio">
                    <h5><?php echo $est->getEst_codigo() ?></h5>
                </div>
                <div class='llave'>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <br><br><h1>CASCOS</h1>
    <?php
    foreach ($estaciones as $est) {
        $est instanceof Estacion;

        if ($est->getEst_tipo() === "casco") {
            ?>
            <div class="estacion estacion_accesorio estacion_<?php echo $est->getEst_estado() ?>" accesskey="<?php echo $id ?>">
                <div class="codigo_accesorio">
                    <h5><?php echo $est->getEst_codigo() ?></h5>
                </div>
                <div class="casco">
                </div>
            </div>
            <?php
        }
    }
}
?>
