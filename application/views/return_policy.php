<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">Return Policy</h1>
            <?php
                if(isset($return_policy) && is_array($return_policy) && count($return_policy)): $i=1;?>
                <?php foreach ($return_policy as $key => $return) { ?>
      	           <p>&raquo; <?php echo $return->description?></p>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>