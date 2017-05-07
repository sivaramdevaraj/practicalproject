<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
   <div class="container">
      <div class="row mar_top">
      <?php
         if(isset($rating) && is_array($rating) && count($rating)): $i=1;?>
            <?php foreach ($rating as $key => $reviews) { ?>
               <!--repeat-->
               <div class="col-md-4 col-sm-6 text-justify m_bot_10 txt_cent_cust">
               <div class="cust_speak clearfix">
                  <div class="clearfix">
                     <div data-id="<?php echo $reviews->id?>" class="col-md-3 col-sm-6">
                     <script>var page_<?php echo $reviews->id ?> = <?php echo json_encode($reviews);?></script>
                        <?php
                           if($reviews->image!='' && file_exists('./uploads/reviews/'.$reviews->image))
                              $src = base_url().'uploads/reviews/'.$reviews->image;
                                 else
                              $src = base_url().'uploads/reviews/cy1.jpg';
                        ?>
                        <img src="<?php echo $src?>" class="img-circle rate_img">
                     </div>
                     <div class="col-md-9 padding_l_o col-sm-6">
                        <h5 class="red"><?php echo $reviews->name?></h5>
                        <p class="display-rate" data-score="<?php echo $reviews->rating?>" data-readonly="readonly"></p>
                     </div>
                  </div>
                  <div class="col-md-12">
                  <p class="h_100"><?php echo substr($reviews->comments, 0,200)?></p>
                 <?php  if(strlen($reviews->comments) > 200) : ?> <a href="#view_more" data="<?php echo 'page_'.$reviews->id ?>"  data-toggle="modal" class="pull-right red clearfix view_comments">View More</a> <?php endif; ?> 
                  </div>
               </div>
            </div>
            <!--repeat end-->
         <?php $i++; } ?>
         <?php else : ?>
          <p class="text-center">No review has be found for this product</p>
         <?php endif;?>
   </div>
</div>
</div>
<!--view_more-->
<div class="modal fade clearfix" id="view_more" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center red" id="myModalLabel"><span class="e_name"></span></h4>
         </div>
         <div class="modal-body text-justify">
            <p><span class="description"></span></p>
         </div>
      </div>
   </div>
</div>
<!--view_more-->
<?php include_once('includes/footer.php');?>
<script type="text/javascript">
 $('.display-rate').raty({
    path : '<?php echo base_url()?>/resources/images',
    starOff : 'star-off.png',
    starOn  : 'star-on.png',
    readOnly: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
$(document).on('click','.view_comments',function(){
     var data = eval($(this).attr('data'));
    $('#p_id').val(data.id);
    $('.e_name').html(data.name);
    $('.description').html(data.comments);
    $('#view_more').modal({
      keyboard: false,
      show:true,
      backdrop:'static'
    });
    $('label.error').hide();

    });  
</script>