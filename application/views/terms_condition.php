<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">Terms & Conditions</h1>
            <?php
                if(isset($privacy_policy) && is_array($privacy_policy) && count($privacy_policy)): $i=1;?>
                <?php foreach ($privacy_policy as $key => $privacy) { ?>
      	            <p>&raquo; <?php echo $privacy->description?></p>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>