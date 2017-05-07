<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">Privacy Policy</h1>
            <?php
                if(isset($terms_condition) && is_array($terms_condition) && count($terms_condition)): $i=1;?>
                <?php foreach ($terms_condition as $key => $terms) { ?>
      	            <p>&raquo; Text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here text here.</p>
                 <?php } ?>
            <?php endif; ?>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>