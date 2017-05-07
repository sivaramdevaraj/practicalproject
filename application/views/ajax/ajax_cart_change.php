<div class="cart_ajax_result">
   <?php if(isset($cart_content)&& is_array($cart_content) && count($cart_content)) : ?>
      <table class="table basket">
         <thead>
            <tr>
               <th class="text-center red">Product Image</th>
               <th class="text-center red">Product Name</th>
               <th class="text-center red">Weight</th>
               <th class="text-center red">Qty</th>
               <th class="text-center red">Amount</th>
               <th class="text-center red">Remove</th>
            </tr>
         </thead>
         <tbody>
            <!--<tr>
               <td colspan="5" align="center">Your cart is empty!</td>
               </tr>-->
            <?php foreach ($cart_content as $key => $items) { ?>
               <tr>
                  <td class="text-center"><img src="<?php echo base_url(); ?>uploads/products/<?php echo $items['image'] ?>" class="cart_prod"></td>
                  <td class="text-center"><?php echo $items['name'] ?></td>
                  <td class="text-center"><?php echo $items['weight'] ?> kg</td>
                  <td class="text-center"><?php echo $items['qty'] ?> </td>
                  <td class="text-center"><i class="fa fa-usd"></i> <?php echo $items['subtotal'] ?></td>
                  <td class="text-center"><a data-id="<?php echo $items['id'] ?>" href="#" class="black remove_del"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
               </tr>
            <?php } ?>
            <div class="clearfix"></div>
            <tr>
               <td colspan="3" style="padding: 15px 0px 0px 20px;">
                  <b>TOTAL AMOUNT: <span><i class="fa fa-usd"></i> <?php echo $this->cart->format_number($this->cart->total()); ?></span></b>
               </td>
               <!-- <td colspan="3"></td> -->
               <td>
                  <?php if($this -> session -> userdata('user')) : ?>
                     <a class="btn btn-success btn-sm" href="<?php echo site_url('viewcart'); ?>">View Cart</a>
                  <?php else : ?>
                     <a class="btn btn-success btn-sm cart_login_user" href="#">View Cart</a>
                  <?php endif; ?>
               </td>
               <td>
                  <?php if($this -> session -> userdata('user')) : ?>
                     <a class="btn btn-danger btn-sm" href="<?php echo site_url('checkout'); ?>">Check Out</a>
                  <?php else : ?>
                     <a class="btn btn-danger btn-sm check_login_user" href="#">Check Out</a>
                  <?php endif; ?>
               </td>
            </tr>
         </tbody>
      </table>
   <?php else :  ?>
      <h6 align="center">Your cart is empty. Start shopping now! <i class="fa fa-shopping-cart"></i></h6>
   <?php endif; ?>
</div>
