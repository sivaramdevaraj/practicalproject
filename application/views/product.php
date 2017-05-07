<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-3 col-sm-4">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default bd_none mar_bt_13">
                     <div class="panel-heading bag_red head_padd">
                        <h5 class="text-center white f_h5">FILTER BY</h5>
                     </div>
                  </div>
                  <div class="panel panel-default">
                     <div class="panel-heading head_padd">
                        <h5 class="text-uppercase br_bt red f_h5">Categories</h5>
                     </div>
                     <div class="panel-body padd_5">
                        <ul class="list-unstyled cate">
                        <li><a href="<?php echo site_url('rice/shop_now')?>" class="l_txt">All Category</a></li>
                          <?php if(isset($search_categories) && is_array($search_categories) && count($search_categories)): $i=1;?>
                             <?php foreach ($search_categories as $key => $category) { ?>
                                <li><a href="<?php echo site_url('rice').'/'.str_replace(' ','-',$category->name); ?>" class="l_txt at_<?php echo str_replace(' ','-',$category->name); ?>"><?=$category->name; ?></a></li>
                             <?php } ?>
                          <?php endif; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-9 col-sm-8">
            <div class="row  prdct_sec">
               <div class="col-md-12">
                  <ol class="breadcrumb breadc_b">
                     <li><a href="<?php echo site_url(); ?>"  class="black"> <i class="fa fa-home"></i> <span class="hidden-xs">Home</span></a></li> 
                     <?php if(isset($cat_data)) : ?>
                      <li><a  class="black">Category</a></li>
                      <li><a href="<?php echo site_url('rice/shop_now'); ?>" class="black">All category</a></li>
                      <li class="red"><?=$cat_data->name; ?></li>
                     <?php else : ?>
                      <li class="red">All category</li>
                     <?php endif; ?>
                  </ol>
                 <?php if(isset($all_categories) && is_array($all_categories) && count($all_categories)): $i=1;?>
                   <?php foreach ($all_categories as $key => $category) { ?>
                      <div class="panel panel-default pnl_big">
                         <div class="panel-heading">
                            <h4 id="t_<?=str_replace(' ','-',$category->name); ?>" class="text-center"><?=$category->name; ?></h4>
                         </div>
                         <div class="panel-body panl-bdy ">
                            <div class="row insid_pnl">
                                <?php if(isset($all_products) && is_array($all_products) && count($all_products)): $i=1;?>
                                  <?php foreach ($all_products as $key => $products) { ?>
                                   <?php if($products->sub_cat_id==$category->id): ?>
                                     <?php $cart_data= $this->cart->in_cart($products->id); ?>                                     
                                     <div class="ajax_change_result<?php echo $products->id; ?>">
                                        <div  class="col-md-4 col-sm-6">
                                          <div class="panel panel-default">
                                             <div class="panel-body">
                                                <div class="row">
                                                   <div class="col-md-7 col-xs-7">
                                                    <img src="<?php echo base_url('uploads/products/thumb').'/'.$products->image; ?>" class="img-responsive prd_img" alt="">
                                                   </div>
                                                   <div class="col-md-5 col-xs-5">
                                                      <a href="<?php echo site_url('p').'/'.$products->sku_id;?>" class="btn btn-sm rice_btn clearfix">VIEW</a>
                                                      <select id="sels<?php echo $products->id; ?>" class="drop_bttn change_weight_price">
                                                         <option <?php if($products->weight=="10"): echo 'selected'; endif; ?> data-group="<?=$products->group_id; ?>" data-id='<?=$products->id; ?>' data-weight="10" value="10">10Kg</option>
                                                         <option <?php if($products->weight=="25"): echo 'selected'; endif; ?> data-group="<?=$products->group_id; ?>" data-id='<?=$products->id; ?>' data-weight="25" value="25">25Kg</option>
                                                      </select>
                                                   </div>                                        
                                                </div>
                                                <div class="clearfix">
                                                  <p class="m_bot_o">Market Price - A$ <del><?=$products->market_price?></del></p>
                                                  <h5 class="m_to_2">Our Price - A$ <?=$products->price?></h5>
                                                </div>
                                                <!--cart session check-->                                                
                                                 <div <?php echo($cart_data!="") ? 'style="display:none;"' : ''; ?> class="clearfix row text-center  add<?=$products->id;?>">                                              
                                                    <?php if($products->qty!="0") : ?>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                         <div class="input-group">
                                                             <span class="input-group-addon qty">QTY</span>
                                                             <input type="text" min="1" max="<?=$products->qty;?>" class="form-control text-center qty1<?=$products->id;?>" value="1">                                        
                                                         </div>
                                                      </div>
                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                          <a href="#" data-title="<?=@$category->name.'-'.$products->product_type;?>" data-id="<?=$products->id;?>" class="btn btn-danger btn-sm add_cart_pro"> ADD <i class="fa fa-shopping-cart"></i></a>
                                                      </div>
                                                    <?php else : ?>
                                                      <p class="red">Out of Stock</p>
                                                    <?php endif; ?>

                                                 </div>
                                                <!--cart session check-->
                                                <!--cart session check-->
                                                  <div class="clearfix text-center detail_add<?=$products->id;?>" <?php echo($cart_data=="") ? 'style="display:none;"' : ''; ?>> 
                                                    <div class="m5_left">
                                                     <ul class="list-inline in_de_ul m5">
                                                        <div class="input-group">
                                                           <span class="input-group-btn">
                                                             <button type="button" class="btn btn-danger s_btn btn-number" data-id="<?=$products->id;?>" data-title="<?=@$category->name.'-'.$products->product_type;?>"  data-field="quant<?=$products->id;?>"  data-type="minus">
                                                           <span class="glyphicon glyphicon-minus"></span>
                                                           </button>
                                                           </span>                                                            
                                                             <input type="text" name="quant<?=$products->id;?>" class="form-control input-number s_btn1 inc_qty<?=$products->id;?>" value="<?php echo @$cart_data ?> bag in cart" min="1" max="<?=$products->qty;?>">
                                                           <span class="input-group-btn">
                                                           <button type="button" class="btn btn-success s_btn btn-number"  data-title="<?=@$category->name.'-'.$products->product_type;?>" data-id="<?=$products->id;?>" data-field="quant<?=$products->id;?>" data-type="plus">
                                                             <span class="glyphicon glyphicon-plus"></span>
                                                           </button>
                                                           </span>
                                                        </div>
                                                     </ul>
                                                    </div>
                                                  </div>
                                                <!--cart session check-->


                                             </div>
                                             <div class="panel-footer ni_prdpnl_ftr <?php if($products->product_type=='Gold') : echo 'ni_prdpnl_ftrgld'; elseif($products->product_type=='Premium'): echo 'ni_prdpnl_ftr_pre'; endif; ?>">
                                                <p class="text-center"><?php echo $products->product_type; ?></p>
                                             </div>
                                          </div>
                                        </div>                                         
                                     </div>
                                  <?php endif;?> 
                                  <?php } ?>
                                <?php endif;?>                              
                            </div>
                         </div>
                      </div>
                  <?php } ?>
                <?php endif; ?>                
               </div>
            </div>
         
         </div>
      </div>
   </div>
</div>
<!-- Alert pop up data model -->
<div class="modal fade flash-message" id="alert-info" tabindex="-1" role="dialog" aria-labelledby="userLogin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         <span id="alet_qty_title"></span>
      </div>
      <div class="modal-body clearfix">
          <i class="fa fa-exclamation-triangle"></i>We're sorry! we have only <span id="alet_qty_vals"><span id="alet_qty_val"></span> quantities</span> of this product.</div>
    </div>
  </div>
</div>
<!-- End alert pop up data model -->
<?php include_once('includes/footer.php'); ?>
<script>
$(document).ready(function(){
  $('.at_<?php echo str_replace(' ', '-',$cat_data->name)?>').addClass('red');
   $('#shop_menu_active').addClass('active');
  
  $(document).on('change','.change_weight_price',function(){
    var weight = $(this).children(":selected").attr("data-weight"); 
    var group_id =  $(this).children(":selected").attr("data-group"); 
    var group_ajax_id =  $(this).children(":selected").attr("data-id");
    url = "<?php echo site_url()?>welcome/change_product_price/"; 
    $.ajax({
        dataType: "json",
        url: url,
        data: {weight:weight,group_id:group_id},
        success: function(data)
        {  
           if(data.errors=='0'){
            $('.ajax_change_result'+group_ajax_id).html(data.pro);
           }
           else{
             $('#sels'+group_ajax_id).find('option:selected').removeAttr("selected");
             $("#alet_qty_vals").html(data.weight);
             $('#alert-info').modal({ keyboard : false,show: true,backdrop :'static'});
             $(this).attr('disabled', true);
             setTimeout(function(){ $("#alert-info").modal('toggle'); }, 2500);       
           }     
        }
    });      
  });
  
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
                   $('#sucess_alert_pop').modal({ keyboard : true,show: true,backdrop :'static'});
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
          if(parseInt(input.val()) == input.attr('max')) {
             $("#alet_qty_val").html(input.attr('max'));
             $("#alet_qty_title").html(title);
             $('#alert-info').modal({ keyboard : false,show: true,backdrop :'static'});
             $(this).attr('disabled', true);
             setTimeout(function(){ $("#alert-info").modal('toggle'); }, 2500);


          }
        }
      } 
      else
      {
          input.val(0);
      }
  });
       
});
</script>