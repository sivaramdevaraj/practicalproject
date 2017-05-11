<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>
<div class="container-fluid m_top_10">
   <div class="container">
      <div class="row  prdct_sec">
         <h3 class="text-center red m_top_10 m_bot_15">Wholesale Zone</h3>
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
            <div class="row prdct_sec">
              <?php if(isset($all_categories) && is_array($all_categories) && count($all_categories)): $i=1;?>
                 <?php foreach ($all_categories as $key => $category) { ?>
                   <div class="panel panel-default pnl_big">
                      <div class="panel-heading">
                         <h4 class="text-center"><?=$category->cat_name; ?> - <?=$category->name; ?></h4>
                      </div>
                      <div class="panel-body panl-bdy ">
                         <div class="row insid_pnl">
                          <?php if(isset($all_products) && is_array($all_products) && count($all_products)): $i=1;?>
                            <?php foreach ($all_products as $key => $products) { ?>
                             <?php if($products->sub_cat_id==$category->id): ?>
                               <?php $cart_data= $this->cart->in_cart($products->id); ?>  
                              <div class="col-md-4 col-sm-6">
                                 <div class="panel panel-default">
                                    <div class="panel-body">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div>
                                                <img src="<?php echo base_url('uploads/products').'/'.$products->image; ?>" class="wh_zone center-block" alt="">
                                             </div>
                                          </div>
                                         
                                       </div>
                                       <div class="clearfix">
                                          <button type="button" class="btn btn-xs btn-danger btn-block view_sale_price" data-id="<?=$products->id?>">View Price</button>
                                       </div>
                                    </div>
                                    <div class="panel-footer <?php if($products->product_type=='Gold') : echo 'ni_prdpnl_ftrgld'; elseif($products->product_type=='Premium'): echo 'ni_prdpnl_ftr_pre'; endif; ?>">
                                       <p class="text-center">Silver</p>
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
<!--view_more-->
<div class="modal fade" id="view_more_sales_zone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="ajax_sale_result"></div>
</div>
<!--view_more end-->
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
<?php include_once('includes/footer.php'); ?>
<script>
$(document).ready(function(){
  $('#zone_menu_active').addClass('active');  
  $(document).on('click','.view_sale_price',function(){
     var p_id = $(this).attr('data-id');
     url = "<?php echo site_url()?>welcome/change_sale_price/";    
     $.ajax({
        type:"POST",
        dataType: "json",
        url: url,
        data: {p_id:p_id},
        success: function(data)
        {       
           $('.ajax_sale_result').html(data.pro);
           $('#view_more_sales_zone').modal({
              keyboard: false,
              show:true,
              backdrop:'static'
          });
          // setTimeout(function(){ $("#view_more_sales_zone").modal('toggle'); }, 2500);
        }
    });      
  });  
  $(document).on('click','.add_cart_pro',function(){
     var p_id = $(this).attr('data-id');
     title = $(this).attr('data-title');
     var qty = $('.qty1'+p_id).val();
     $('.inc_qty'+p_id).val(qty + ' bag in cart');
     if (!isNaN(qty)) {          
        if(parseInt(qty) > 9) {
            $(".detail_add"+p_id).show();
            $(".add"+p_id).hide();            
            url = "<?php echo site_url()?>product_cart/add_cart_data_ws/"; 
            $.ajax({
                type:"POST",
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
        else
        {
          alert('Minmum 10 bag only allow');
          $('.qty1'+p_id).val('10');
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
            url = "<?php echo site_url()?>product_cart/add_cart_update_ws/"; 
            $.ajax({
                type:"POST",
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
            //$(this).attr('disabled', true);
            $(".detail_add"+p_id).hide();
            $(".add"+p_id).show();
          }
        }
        else if(type == 'plus') {
          if(currentVal < input.attr('max')) {
          input.val(currentVal + 1 + ' bag in Cart').change();
          qty = parseInt(input.val());
          url = "<?php echo site_url()?>product_cart/add_cart_data_ws/"; 
            $.ajax({
                type:"POST",
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
  });       
});
</script>