<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">Cancellation</h1>
            <?php
                if(isset($cancellation) && is_array($cancellation) && count($cancellation)): $i=1;?>
                <?php foreach ($cancellation as $key => $cancel) { ?>
      	           <p>&raquo; <?php echo $cancel->description?></p>
                 <?php } ?>
            <?php endif; ?>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>