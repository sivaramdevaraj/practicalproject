<div class="col-md-12 chang_cart_data">
<?php if(isset($cart_content)&& is_array($cart_content) && count($cart_content)) : ?>
    <table class="table table-condensed tb_bor">
          	<tr class="tb_head bold">
               	<td class="text-center">Image</td>
             	<td class="text-center">Item Name</td>
             	<td class="text-center">Weight</td>
             	<td class="text-center">Quantity</td>
             	<td class="text-center">Price <span>( <i class="fa fa-inr"></i> )</span></td>
             	<td class="text-center">Amount<span> ( <i class="fa fa-inr"></i> )</span></td>
          	</tr>		         
        <tbody>
           <?php foreach ($cart_content as $key => $items) { ?>
           	<?php $cart_data= $this->cart->in_cart($items['id']); ?> 
           	<?php $products=$this->product->get($items['id']);?>
          	 <tr>
               	<td class="text-center"><img src="<?php echo base_url(); ?>uploads/products/<?php echo $items['image'] ?>" class="prod_imgs"></td>
             	<td class="text-center p_tops_33"><?php echo $items['name'] ?></td>
             	<td class="text-center p_tops_33"><?php echo $items['weight'] ?> kg</td>
             	<td class="text-center p_tops_33">
             		<div class="input-group bt_wth pull-left">
                    <span class="input-group-btn">
                    	<button type="button" class="btn btn-danger s_btn2 btn-number" data-id="<?=$items['id'];?>" data-title="<?=$items['name'];?>"  data-field="quant<?=$items['id'];?>"  data-type="minus">
           			<span class="glyphicon glyphicon-minus"></span>
                    </button>
                    </span>
                    <input type="text" name="quant<?=$items['id'];?>" max="<?=$products->qty;?>" <?=($products->whole_sale!="1") ? 'min="0"' : 'min="9"' ?> class="form-control input-number s_btn11" value="<?php echo @$cart_data ?>">
                    <span class="input-group-btn">
                    	<button type="button" class="btn btn-success s_btn2 btn-number" data-title="<?=$items['name'];?>" data-id="<?=$items['id'];?>" data-field="quant<?=$items['id'];?>" data-type="plus">
                    <span class="glyphicon glyphicon-plus"></span>
                    </button>
                    </span>
                	</div>	                            	 
                	 <a data-id="<?php echo $items['id'] ?>" href="#" class="red remove_del"><i class="fa fa-times"></i></a>
                </td>
             	<td class="text-center p_tops_33">$ <?php echo $items['price'] ?>/-</td>
	                
             	<td class="text-center p_tops_33">$ <?php echo $items['subtotal'] ?>/-</td>
          	 </tr>
            <?php } ?>
          	<tr>
          		<td colspan="6" class="text-right padd_r_10"><h4>Total Amount : $ <?php echo $this->cart->format_number($this->cart->total()); ?></h4></td>		                  		
          	</tr>		                    
        </tbody>
    </table> 
<?php else : ?>
    	<div><h6 align="center">There are no items in this cart. <a class="btn btn-success btn-sm" href="<?php echo site_url('rice/shop_now'); ?>">Continue Shopping</a></h6></div>	
 <?php endif; ?>
 <a href="<?php echo site_url('checkout'); ?>" type="button" class="btn-sm btn pull-right btn-danger">Place Order</a>		            
</div>