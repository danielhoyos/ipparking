<table class="info_contrato">
    <thead>
        <tr>
            <th>PARQUEADERO</th>
            <th>FECHA PAGO</th>
            <th>INICIO</th>
            <th>FIN</th>
            <th>VALOR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $contratos = json_decode(json_encode($contratos->data));
        foreach ($contratos as $c) {
        ?>
        <tr>
            <td><?php echo $c->par_nombre ?></td>
            <td><?php echo $c->pcp_fecha_pago ?></td>
            <td><?php echo $c->pcp_fecha_inicio_periodo ?></td>
            <td><?php echo $c->pcp_fecha_fin_periodo ?></td>
            <td><span class="icon-coin-dollar"> </span><?php echo number_format($c->pcp_valor, 0, ",", "."); ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>