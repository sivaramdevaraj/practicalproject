<table width="640" cellspacing="0" style="font:12px/16px Arial,sans-serif;color:#333;background-color:#fff;margin:0 auto" cellpadding="0"> 
   <tbody>
    <tr> 
     <td valign="top" style="padding:14px 0px 10px 20px;width:100px;border-collapse:collapse"> 
     <a href="#" title="Rice Rendezvous" target="_blank">
     <img alt="Rice Rendezvous" width="100"  border="0" src="<?php echo base_url(IMAGES); ?>/logo2.png" class="CToWUd">
     </a> </td> 
     <td style="text-align:right;padding:0px 20px"> 
      <table cellspacing="0" style="font:12px/16px Arial,sans-serif;color:#333;margin:0 auto;border-collapse:collapse" cellpadding="0"> 
       <tbody>      
        <tr> 
         <td style="text-align:right;padding:7px 0px 0px 20px;width:490px"> <span style="font:20px Arial,san-serif">Order Confirmation</span> </td> 
        </tr> 
        <tr> 
         <td style="text-align:right;padding:0px 0px 5px 20px;width:490px"> <span style="font-size:12px"> <span class="il">Order</span> #<a href="#" style="text-decoration:none;color:#006699" target="_blank"><?php echo $orders->order_number; ?></a> </span> </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td colspan="2" style="width:640px"> <p style="font:18px Arial,sans-serif;color:#cc6600;margin:15px 20px 0 20px">Hello <?php echo $orders->name; ?>,</p> <p style="margin:4px 20px 18px 20px;width:640px">We're writing about the order(Order# <?php echo $orders->order_number; ?>) you placed on <?php echo $orders->order_date; ?>. </p> </td> 
    </tr> 
    <tr> 
     <td colspan="2" style="padding:0 20px;width:640px"> 
      <table cellspacing="0" style="border-top:3px solid #2d3741;width:640px" cellpadding="0"> 
       <tbody>
        <tr> 
         <td valign="top" style="font:14px Arial,san-serif;padding:11px 18px 14px 18px;width:280px;background-color:#efefef">
              <span style="color:#666">Your package was sent to:</span>
              <br>
               <p style="margin:2px 0">
                 <strong> <?php echo $orders->name; ?> <br><?php echo $orders->shipping_address; ?><br> 
                 <u></u> <?php echo $orders->shipping_city; ?>,<?php echo $orders->shipping_state; ?> - <?php echo $orders->shipping_postcode; ?>  <u></u> <br>India</strong>
               </p>
          </td> 
        </tr> 
        <tr> 
         <td colspan="2" style="font-size:10px;color:#666;padding:0 10px 20px 10px;line-height:16px;width:640px"> <p style="margin:10px 0 0 0;font:11px/16px Arial,sans-serif;color:#333">  In case of queries, please <a  href="#">Contact us</a> </p> </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
    <tr> 
     <td colspan="2" style="width:640px"> <p style="font:18px Arial,sans-serif;color:#cc6600;border-bottom:1px solid #ccc;margin:0 20px 3px 20px;padding:0 0 3px 0"> Order Details </p> </td> 
    </tr> 
    <tr> 
     <td colspan="2" style="padding:16px 40px;width:640px"> 
      <table width="600" cellspacing="0" cellpadding="0"> 
       <tbody>
       <tr>
        <td valign="top" style="color:#666;padding:10px 10px 0 10px;"><span style="font:10px Arial,sans-serif;text-decoration:none;color:#0000;">Name</span></td>
        <td valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;"><span style="font:10px Arial,sans-serif;text-decoration:none;color:#666;">Qty</span></td>
        <td valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;"><span style="font:10px Arial,sans-serif;text-decoration:none;color:#666;">Price</span></td>
        <td align="right" valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;"><span style="font:10px Arial,sans-serif;text-decoration:none;color:#666;">Sub total</span></td>
       </tr>
       <!-- All product info  -->
       <?php foreach ($orderlist as $key => $order) { ?>
        <tr>
         <td valign="top" style="color:#666;padding:10px 10px 0 10px;">
          <a href="#" style="font:12px Arial,sans-serif;text-decoration:none;color:#006699" target="_blank">
           <?php echo $order->product_name; ?>
          </a>
         </td> 
         <td  valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;">
          <strong> <?php echo $order->qty; ?></strong>
         </td>
         <td  valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;">
          <strong><?php echo $order->price; ?></strong>
         </td>
         <td align="right" valign="top" style="font:10px Arial,san-serif;padding:10px 0 0 0;">
          <strong><?php echo $order->subtotal; ?></strong>
         </td>  
        </tr>        
        <tr> 
         <td colspan="4" style="border-top:1px solid rgb(234,234,234);padding:0pt 0pt 16px;width:560px"> &nbsp; </td> 
        </tr> 
     <!-- End product info -->
       <?php } ?>
        
        <tr> 
         <td colspan="2" align="right" valign="top" style="font:12px/18px Arial,sans-serif;padding:0 10px 0 0;color:#333;width:480px"> Discount: </td> 
         <td align="right" valign="top" style="font:12px/18px Arial,sans-serif;color:#333;width:85px"> Rs.<?php echo $orders->discount_amount; ?> </td> 
        </tr> 
        <tr> 
         <td colspan="2" align="right" valign="top" style="font:12px/18px Arial,sans-serif;padding:10px 10px 0 0;color:#333;width:480px"> Delivery charge: </td> 
         <td align="right" valign="top" style="color:#333;font:12px/18px Arial,sans-serif;padding:10px 0 0 0;color:#333;width:85px"> Rs.<?php echo $orders->delivery_charge; ?> </td> 
        </tr> 
        <tr> 
         <td colspan="2" align="right" valign="top" style="font:14px Arial,sans-serif;padding:10px 10px 10px 0;color:#333;width:480px"> Shipment Total: </td> 
         <td align="right" valign="top" style="color:#333;font:14px Arial,sans-serif;padding:10px 0 5px 0;color:#333;width:85px"> <strong> Rs.<?php echo $orders->grand_total; ?> </strong> </td> 
        </tr> 
       </tbody>
      </table>
       </td> 
    </tr> 
    <tr> <td colspan="2" style="padding:0 20px;line-height:22px;width:640px"></td></tr> 
    <tr> 
     <td colspan="2" style="padding:0 20px 0 20px;line-height:22px;width:640px"> <p style="margin:10px 0;padding:0 0 20px 0;border-bottom:1px solid #eaeaea">We hope to see you again soon!<br> <span style="font:14px Arial,san-serif"> <strong><span class="il">RiceRendezvous</span>.com</strong> </span> </p> </td> 
    </tr> 
    <tr> 
     <td colspan="2" style="font-size:10px;color:#666;padding:0 20px 20px 20px;line-height:16px;width:640px"> <p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p> </td> 
    </tr> 
   </tbody>
  </table>