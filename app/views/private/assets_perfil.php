<img id="portada" src="<?php echo $portada ?>"/>

<div id="contenido_avatar">
    <div class="loadingAvatar"><img id="avatar" src="<?php echo $avatar ?>" border="0"/></div>
    <div id="datos_perfil">
        <h5><?php echo strtoupper($rol) ?></h5>
        <h3><?php echo $user->per_nombre . " " . $user->per_apellido ?></h3>
    </div>
</div>

<?php if ($user->usu_estado === "activo") { ?>
    <form id="editarAvatar" action="?action=update_avatar" enctype="multipart/form-data" method="POST">
        <div class="upload_img upload_avatar"><input type="file" name="usu_avatar" id="usu_avatar" /></div>
    </form>

    <form id="editarPortada" action="?action=update_portada" enctype="multipart/form-data" method="POST">
        <div class="upload_img upload_portada"><input type="file" name="usu_portada" id="usu_portada" /></div>
    </form>
    <?php
}
?>