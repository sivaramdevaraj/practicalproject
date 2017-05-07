 <?php $cart_data= $this->cart->in_cart($products->id); ?> 
 <div class="ajax_sale_result"> 
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header view_bord">
            <button type="button" class="close red" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <p class="sm_fonts">For >10bags : Rs.<?php echo $products->ws_first_rang_price ?>/each bag</p>
            <p class="sm_fonts">10-20 Bags : Rs.<?php echo $products->ws_second_rang_price ?>/each bag</p>
            <p class="sm_fonts">20-30 Bags : Rs.<?php echo $products->ws_third_rang_price ?>/each bag</p>
            <p class="sm_fonts">30-40 Bags : Rs.<?php echo $products->ws_more_rang_price ?>/each bag</p>
         </div>
         <div class="modal-footer">
            <div class="clearfix add<?=$products->id;?>" <?php echo($cart_data!="") ? 'style="display:none;"' : ''; ?>>
               <div class="col-md-1"></div>
               <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="input-group">
                     <span class="input-group-addon qty">QTY</span>
                     <input type="text" min="10" max="<?=$products->qty;?>"  value="10" class="form-control text-center qty1<?=$products->id;?>" value="10">
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 col-xs-6">
                 <a href="#" data-title="<?=@$category->name.'-'.$products->product_type;?>" data-id="<?=$products->id;?>" class="btn btn-danger btn-sm add_cart_pro view_Add"> ADD <i class="fa fa-shopping-cart"></i></a>
               </div>
               <div class="col-md-1"></div>
            </div>
               <div class="clearfix detail_add<?=$products->id;?>" <?php echo($cart_data=="") ? 'style="display:none;"' : ''; ?>>
                  <div class="col-md-1"></div>
                  <div class="col-md-10 i_left">
                     <ul class="list-inline in_de_ul m_bot_o">
                     <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-danger s_btn btn-number"  data-id="<?=$products->id;?>" data-title="<?=@$category->name.'-'.$products->product_type;?>"  data-field="quant<?=$products->id;?>"  data-type="minus">
                           <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="text" name="quant<?=$products->id;?>" class="form-control input-number s_btn1 inc_qty<?=$products->id;?>" value="<?php echo @$cart_data ?> bag in cart" min="10" max="<?=$products->qty;?>">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-success s_btn btn-number"  data-title="<?=@$category->name.'-'.$products->product_type;?>" data-id="<?=$products->id;?>" data-field="quant<?=$products->id;?>" data-type="plus">
                           <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        </span>
                     </div>
                     </ul>
                  </div>
                  <div class="col-md-1"></div>
               </div>
         </div>
      </div>
   </div>
 </div>