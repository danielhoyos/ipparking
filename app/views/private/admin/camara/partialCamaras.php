<?php
     foreach ($camaras as $c) {
         $c instanceof Camara;
         $urlCam = "http://{$c->getCam_ip()}:{$c->getCam_puerto()}/video";
         ?>
         <div class="cam">
             <div class="edit_cam" data-cam-id="<?php echo $c->getCam_id(); ?>"><span class="icon-pencil"></span></div>
             <div class="expandir_cam" data-cam-nombre="<?php echo $c->getCam_nombre(); ?>">
                 <span class="datos_camara" ><?php echo $c->getCam_nombre(); ?></span>
                 <img class="expandir_cam"  data-url-cam="<?php echo $urlCam ?>" src="<?php echo $urlCam ?>"/>
             </div>
         </div>
         <?php
     }