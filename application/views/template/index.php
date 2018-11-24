<!DOCTYPE html>
<html lang="en">
  <head>
    <?php print_r($header); ?>
  </head>

  <body id="page-top">
     <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
	<?php if(isset($topnav)){ print_r($topnav); } ?>
    <?php if(isset($sidenav)){ print_r($sidenav); } ?>
	<?php if(isset($footer)){ print_r($footer); } ?>
  </body>
</html>