<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-12">
            <ol class="breadcrumb breadc_b">
               <li><a href="<?php echo site_url(); ?>"  class="black"> <i class="fa fa-home"></i> <span class="hidden-xs">Home</span></a></li>
               <li><a href="<?php echo site_url('rice').'/'.str_replace(' ','-',$p_cat->name); ?>"  class="black"><?=$p_cat->name; ?></a></li>
               <li><a  class="black" href="<?php echo site_url('rice').'/'.str_replace(' ','-',$p_cat->name); ?>#t_<?=str_replace(' ','-',$categories->name); ?>"><?=$categories->name; ?></a></li>
               <li class="red"> <?=$product_info->product_type; ?></li>
            </ol>
         </div>
         <div class="clearfix"></div>
         <div class="col-md-4 col-sm-4">
         <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
         <!-- Indicators -->
         <ol class="carousel-indicators">
            <li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
            <?php if(isset($gallery) && is_array($gallery) && count($gallery)): $i=1;?>
              <?php foreach ($gallery as $key => $gal) { ?>
                <li data-target="#transition-timer-carousel" data-slide-to="<?php echo $i; ?>"></li>
                <?php } ?>
             <?php endif; ?>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner">
            <div class="item active">
              <a class="fancybox" href="<?php echo base_url(); ?>uploads/products/<?=$product_info->image; ?>" data-fancybox-group="gallery"><img src="<?php echo base_url(); ?>uploads/products/<?=$product_info->image; ?>" class="view_prod_img img-thumbnail"></a>
            </div>
             <?php if(isset($gallery) && is_array($gallery) && count($gallery)): $i=1;?>
              <?php foreach ($gallery as $key => $gal) { ?>
                  <div class="item ">
                     <a class="fancybox" href="<?php echo base_url(); ?>uploads/gallery/<?=$gal->image; ?>" data-fancybox-group="gallery"><img src="<?php echo base_url(); ?>uploads/gallery/<?=$gal->image; ?>" class="view_prod_img img-thumbnail"></a>
                  </div>
              <?php } ?>
             <?php endif; ?>            
         </div>
         <!-- Controls -->
         <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
         <!-- Timer "progress bar" -->
        <!--    <img src="<?php echo base_url(); ?>uploads/products/<?=$product_info->image; ?>" class="view_prod_img img-thumbnail " alt="">-->
      </div>
           <div class="clearfix m_top_10">
              <?php if($product_info->video_link!="") :  ?>
                <h4 class="text-center"><a href="#video" data-toggle="modal" class="black"><i class="fa fa-play-circle-o red"></i> Watch Product Video</a></h4>
              <?php endif;?>
            </div>
         </div>
         <div class="col-md-8 col-sm-8">
            <h4 class="<?=$product_info->product_type; ?>"><?=$p_cat->name; ?>-<?=$categories->name; ?>-<?=$product_info->product_type; ?></h4>                      
              <p>Type : <?=$p_cat->name; ?></p>
              <p>Weight : 
              <select class="drop_bttn change_weight_price">
               <option <?php if($product_info->weight=="10"): echo 'selected'; endif; ?> data-group="<?=$product_info->group_id; ?>" data-id='<?=$product_info->id; ?>' data-weight="10" value="10">10Kg</option>
               <option <?php if($product_info->weight=="25"): echo 'selected'; endif; ?> data-group="<?=$product_info->group_id; ?>" data-id='<?=$product_info->id; ?>' data-weight="25" value="25">25Kg</option>
            </select>
              </p>
            <div class="price_bord ">
            <div class="row">
            <div class="col-md-6 col-sm-6">
              <p class="m_bot_o"><span class="lg_font">Market Price: A$ <del> <?=$product_info->market_price; ?></del></span></p>
              <p><span class="lg_font">You Save: A$ <?=$product_info->market_price-$product_info->price; ?></span></p>
            </div>
            <div class="col-md-6 col-sm-6">
               <p><span class="lg_font"><b>Total Price:</b> A$ <?=$product_info->price; ?></span></p>
               </div>
               </div>
            </div>
             <?php $cart_data= $this->cart->in_cart($product_info->id); ?>            
              <?php if($product_info->qty!="0") : ?>
                <div <?php echo($cart_data!="") ? 'style="display:none;"' : ''; ?> class="row add<?=$product_info->id;?>  m_top_10">
                  <div class="col-md-2 col-sm-3 col-xs-5">
                     <div class="input-group">
                         <span class="input-group-addon qty">QTY</span>
                         <input type="text" min="1" max="<?=$product_info->qty;?>" class="form-control text-center qty1<?=$product_info->id;?>" value="1">                                       
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="#" data-title="<?=@$category->name.'-'.$product_info->product_type;?>" data-id="<?=$product_info->id;?>"  class="btn btn-danger btn-sm add_cart_pro m_top2"> ADD <i class="fa fa-shopping-cart"></i></a>
                  </div>
                  <div class="col-md-6 col-sm-5 col-xs-2"></div>
                </div>
              <?php else : ?>
                <p class="red out_st">Out of stock</p>
              <?php endif; ?>

             <!-- Cart + bar code -->
              <div class="clearfix m_top_10 detail_add<?=$product_info->id;?>" <?php echo($cart_data=="") ? 'style="display:none;"' : ''; ?>>
                <div class=" col-md-4 i_left">
                  <ul class="list-inline in_de_ul m_bot_o">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-danger s_btn btn-number"  data-id="<?=$product_info->id;?>" data-title="<?=@$category->name.'-'.$product_info->product_type;?>"  data-field="quant<?=$product_info->id;?>"  data-type="minus" >
                          <span class="glyphicon glyphicon-minus"></span>
                        </button>
                      </span>
                        <input type="text" name="quant<?=$product_info->id;?>" class="form-control input-number s_btn1 inc_qty<?=$product_info->id;?>" value="<?php echo @$cart_data ?> bag in cart" min="1" max="<?=$product_info->qty;?>">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-success s_btn btn-number" data-type="plus" data-title="<?=@$category->name.'-'.$product_info->product_type;?>" data-id="<?=$product_info->id;?>" data-field="quant<?=$product_info->id;?>">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                      </span>
                    </div>
                  </ul>
                </div>
                <div class="col-md-8"></div>
              </div>
             <!-- Cart + bar code end -->
            
            <div class="clearfix">
               <div class="price_bord m_top_10 clearfix">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if(count($this -> data['customer_reviews'])!="0") : ?>
                           <?php
                            $ratting_result=$this -> data['total_rating']->rating/count($this -> data['customer_reviews']);
                           ?>
                           <?php
                              $vote_sent1=$ratting_result;
                           ?>
                     <p><span class="click1" data-score="<?php echo $ratting_result?>"></span> <?php echo count($this -> data['customer_reviews'])?> reviews</p>
                      <?php else: ?>
                         <?php
                            $ratting_result="0";
                           ?>
                           <?php
                              $vote_sent1=$ratting_result;
                              if($vote_sent1=="0") { ?>
                              <p><span id="click"></span> 0 reviews</p>
                               <?php  } ?>
                            <?php endif; ?>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php if($user_details=$this -> session -> userdata('user')): ?>
                     <p><a href="#" class="red" data-toggle="modal" data-target="#review"><i class="fa fa-pencil"></i> Write a review</a></p>
                    <?php else: ?>
                      <p><a href="#" class="red login_user"  data-target="#review"><i class="fa fa-pencil"></i> Write a review</a></p>
                    <?php endif; ?>
                      
                  </div>
                  </div>
               </div>
            </div>
            <div class="clearfix">
               <p class="m_top_10"><span class="red"><i class="fa fa-share-alt"></i> Share</span>
                        <meta property="og:url"           content="<?php echo current_url()?>" />
                        <meta property="og:type"          content="website" />
                        <meta property="og:title"         content="<?=$p_cat->name; ?>-<?=$categories->name; ?>-<?=$product_info->product_type; ?>" />
                        <meta property="og:description"   content="<?=$product_info->product_description; ?>" />
                        <meta property="og:image"         content="<?php echo base_url(); ?>uploads/products/<?=$product_info->image; ?>" />
                         <a href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?=$product_info->product_description; ?>&p[url]=<?php echo current_url()?>&p[title]=<?=$p_cat->name; ?>-<?=$categories->name; ?>-<?=$product_info->product_type; ?>"><i class="fa fa-facebook-official fac"></i></a>
                         <a href="https://plus.google.com/share?url=<?php echo current_url()?>" onclick="javascript:window.open(this.href,
                          'mostlikers', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus fa-google-plus1"></i></a>
                      </p>
            </div>
         </div>
         <div class="clear"></div>
         <div class="col-md-12">
            <div class="tabbable-panel m_top_10 ">
               <div class="tabbable-line">
                  <ul class="nav nav-tabs ">
                     <li class="active">
                        <a href="#tab_default_1" data-toggle="tab">
                        Description</a>
                     </li>
                     <li class="hidden-xs">
                        <a href="#tab_default_2" data-toggle="tab">
                        Our Quality </a>
                     </li>
                     <li>
                        <a href="#tab_default_3" data-toggle="tab">
                        Customer Reviews </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active text-justify make_center" id="tab_default_1">
                       <?php if($product_info->description_image!="") :  ?>
                          <img src="<?php echo base_url(); ?>uploads/products/<?=$product_info->description_image; ?>" class="make_img">
                          <p><?=$product_info->description_text; ?></p>
                       <?php endif; ?>   
                        <p><?=$product_info->product_description; ?> </p>
                     </div>
                     <div class="tab-pane text-justify hidden-xs" id="tab_default_2">
                        <p><?=$product_info->quality_description; ?></p>
                     </div>
                      <div class="tab-pane text-justify" id="tab_default_3">
                       <div class="row">
                         <?php
                            if(isset($customer_reviews) && is_array($customer_reviews) && count($customer_reviews)): $i=1;?>
                              <?php foreach ($customer_reviews as $key => $reviews) { ?>
                                <div data-id="<?php echo $reviews->id?>" class="h144 col-md-6 col-sm-6 ">
                                <script>var page_<?php echo $reviews->id ?> = <?php echo json_encode($reviews);?></script>
                                  <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-3">
                                    <?php
                                      if($reviews->image!='' && file_exists('./uploads/reviews/'.$reviews->image))
                                        $src = base_url().'uploads/reviews/'.$reviews->image;
                                      else
                                        $src = base_url().'uploads/reviews/cy1.jpg';
                                    ?>
                                      <img src="<?php echo $src?>" class="img-circle rate_img">
                                    </div>
                                    <div class="col-md-10 col-sm-9 padding_l_o col-xs-9">
                                      <h5 class="red rev_top_o"><?php echo $reviews->name?></h5>
                                      <p class="display-rate" data-score="<?php echo $reviews->rating?>" data-readonly="readonly"></p>
                                    </div>
                                  </div>
                                  <p class="h_60"><?php echo substr($reviews->comments, 0,200)?></p>
                                  <?php  if(strlen($reviews->comments) > 200) : ?><a href="#" data-toggle="modal" data="<?php echo 'page_'.$reviews->id ?>" class="pull-right red view_comment clearfix">View More</a><?php endif; ?>
                                </div>
                                <?php $i++; } ?>
                              <?php else : ?>
                            <p class="text-center">No review has be found for this product</p>
                          <?php endif;?>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
<div class="container-fluid m_top_10 hidden-xs">
     <div class="container">
      <div class="row">
           <h3 class="text-center">Similar Products</h3>
           <?php if(isset($similar_product) && is_array($similar_product) && count($similar_product)): $i=1;?>
              <?php foreach ($similar_product as $key => $category) { ?>
               <div class="col-md-3 col-sm-3 col-xs-6">
                <a href="<?php echo site_url('p').'/'.$category->sku_id; ?>" class="black"><img src="<?php echo base_url(); ?>uploads/products/<?=$category->image; ?>"  class="img-thumbnail center-block sim_prod" alt="image">
                <p class="text-center m_top_10"><b><?php echo $category->cat_name.'-'.$category->sub_cat_name.'-'.$category->product_type; ?></b></p></a>
               </div>
              <?php } ?>
           <?php endif; ?>

      </div>
     </div>       
          
         </div>

  <!-- Modal -->
  <div class="modal fade" id="review" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title red">Write A Review</h4>
        </div>
        <div class="modal-body">
         <div class="row">
         <div class="col-md-9 col-md-offset-1 mar_tp_10">

         <form class="form-horizontal" role="form" id="review_form" action="<?php echo site_url('rating/review')?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-3 normal" for="name">Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control required" name="name" placeholder="Enter Name..">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 normal" for="name">Upload Photo:</label>
            <div class="col-sm-9">
              <input type="file" class="form-control required" name="image">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 normal" for="rate">Ratings:</label>
            <div class="col-sm-9">          
             <div id="rating" class="rat_mar"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 normal" for="comment">Comments:</label>
            <div class="col-sm-9">          
             <textarea class="form-control required" name="comment" rows="5"></textarea>
            </div>
          </div>
          
          <div class="form-group">        
            <div class="col-sm-offset-5 col-sm-5">
              <input type="hidden" name="product_id" value="<?php echo $product_info->id?>"/>
              <input type="hidden" name="curl" value="<?php echo current_url()?>"/>
              <button type="submit" class="btn  btn-danger">Submit</button>
            </div>
          </div>
        </form>
     </div>
  </div>
          
        </div>
        
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
<!-- Alert pop up data model -->
<div class="modal fade flash-message" id="alert-info" tabindex="-1" role="dialog" aria-labelledby="userLogin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         <span id="alet_qty_title"></span>
      </div>
      <div class="modal-body clearfix">
          <i class="fa fa-exclamation-triangle"></i>We're sorry! we have only <span id="alet_qty_val"></span> quantities of this product.</div>
    </div>
  </div>
</div>
<!-- End alert pop up data model -->
<!--watch video-->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title red text-center" id="myModalLabel">Watch <?=$p_cat->name; ?>-<?=$categories->name; ?>-<?=$product_info->product_type; ?></h4>
      </div>
      <div class="modal-body">
        <div class="responsive-video">
                  <iframe width="100%" height="355" src="<?=$product_info->video_link; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
               </div>
      </div>
      
    </div>
  </div>
</div>
<!--watch video end-->
<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
 $('#review_form').validate();
  $(document).on('click','.add_cart_pro',function(){
     var p_id = $(this).attr('data-id');
     title = $(this).attr('data-title');
     var qty = $('.qty1'+p_id).val();
     $(".detail_add"+p_id).show();
     $(".add"+p_id).hide();
     $('.inc_qty'+p_id).val(qty + ' bag in cart');
     if (!isNaN(qty)) {          
        if(parseInt(qty) > 0) {            
            url = "<?php echo site_url()?>product_cart/add_cart_data/"; 
            $.ajax({
                dataType:"json",
                url: url,
                data: {p_id:p_id,qty:qty,title:title},
                success: function(data)
                {       
                   $('.cart_ajax_result').html(data.pro);
                   $('.cart_ajax_total_result').html(data.cart_total);
                   $('.cart_my_msg').html('Item has been added to your cart');
                   $('#sucess_alert_pop').modal({ 
                    keyboard : true,
                    show: true,
                    backdrop :'static'
                  });
                   setTimeout(function(){ $("#sucess_alert_pop").modal('toggle'); }, 2500);
                }
            });
        }
        else
        {
          alert('Invalid Quantity');
          $('.qty1'+p_id).val('1');
        }       
     }
     return false;
  });

  $(document).on('click','.btn-number',function(){
      p_id = $(this).attr('data-id');
      title = $(this).attr('data-title');
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
        if(type == 'minus') {
          if(currentVal > input.attr('min')) {
            input.val(currentVal - 1 + ' bag in Cart').change();
            qty = parseInt(input.val());
            url = "<?php echo site_url()?>product_cart/add_cart_update/"; 
            $.ajax({
                dataType:"json",
                url: url,
                data: {p_id:p_id,qty:qty,title:title},
                success: function(data)
                {       
                   $('.cart_ajax_result').html(data.pro);
                   $('.cart_ajax_total_result').html(data.cart_total);
                }
            });
          } 
          if(parseInt(input.val()) == input.attr('min')) {
            url = "<?php echo site_url()?>product_cart/add_cart_delete/"; 
            $.ajax({
                dataType:"json",
                url: url,
                data: {p_id:p_id},
                success: function(data)
                {       
                   $('.cart_ajax_result').html(data.pro);
                   $('.cart_ajax_total_result').html(data.cart_total);
                }
            });
            $(this).attr('disabled', true);
            $(".detail_add"+p_id).hide();
            $(".add"+p_id).show();
          }
        }
        else if(type == 'plus') {
          if(currentVal < input.attr('max')) {
          input.val(currentVal + 1 + ' bag in Cart').change();
          qty = parseInt(input.val());
          url = "<?php echo site_url()?>product_cart/add_cart_data/"; 
            $.ajax({
                dataType:"json",
                url: url,
                data: {p_id:p_id,qty:qty,title:title},
                success: function(data)
                {       
                   $('.cart_ajax_result').html(data.pro);
                   $('.cart_ajax_total_result').html(data.cart_total);
                }
            });
          }
          if(parseInt(input.val()) == input.attr('max')) {
             $("#alet_qty_val").html(input.attr('max'));
             $("#alet_qty_title").html(title);
             $('#alert-info').modal({ keyboard : false,show: true,backdrop :'static'});
             $(this).attr('disabled', true);

          }
        }
      } 
      else
      {
          input.val(0);
      }
      return false;
  });
  $(document).on('change','.change_weight_price',function(){
    var weight = $(this).children(":selected").attr("data-weight"); 
    var group_id =  $(this).children(":selected").attr("data-group"); 
    var group_ajax_id =  $(this).children(":selected").attr("data-id");
    url = "<?php echo site_url()?>welcome/change_view_product_price/";    
    $.ajax({
        dataType: "json",
        url: url,
        data: {weight:weight,group_id:group_id},
        success: function(data)
        {       
           window.location.href = data.pro;
        }
    });      
  });
</script>
<script>
  $('.display-rate').raty({
    path : '<?php echo base_url()?>/resources/images',
    starOff : 'star-off.png',
    starOn  : 'star-on.png',
    readOnly: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
  $(document).on('click','.view_comment',function(){
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
<script>
  $(".click1").raty({
     path : '<?php echo base_url()?>resources/images/',
     starOff : 'star-off.png',
     starOn  : 'star-on.png',
     readOnly    : true,
     score: function() {
       return $(this).attr('data-score');
     }
     });
</script>

       