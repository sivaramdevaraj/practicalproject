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
                <a href="<?php echo site_url('p').'/'.$products->sku_id; ?>" class="btn btn-sm rice_btn clearfix">VIEW</a>
                <select class="drop_bttn change_weight_price">
                   <option <?php if($products->weight=="10"): echo 'selected'; endif; ?> data-group="<?=$products->group_id; ?>" data-id='<?=$products->id; ?>' data-weight="10" value="10">10Kg</option>
                   <option <?php if($products->weight=="25"): echo 'selected'; endif; ?> data-group="<?=$products->group_id; ?>" data-id='<?=$products->id; ?>' data-weight="25" value="25">25Kg</option>
                </select>
             </div>                                        
          </div>
          <div class="clearfix">
            <p class="m_bot_o">Market Price-Rs.<del><?=$products->market_price?></del></p>
            <h5 class="m_to_2">Our Price- Rs.<?=$products->price?>/-</h5>
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