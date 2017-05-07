<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>

<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row">
            <?php
              if($aboutus->image!='' && file_exists('./uploads/pages/'.$aboutus->image))
                $src = base_url().'uploads/pages/'.$aboutus->image;
              else
                $src = base_url().'uploads/pages/cy1.jpg';
            ?>
      	    <img src="<?php echo $src?>" class="abt_img">
        </div>
    </div> 
</div>


<div class="container-fluid">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">About Us</h1>
      	    <p><?php echo $aboutus->description?></p>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>