<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-3">
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
                           <li><a href="#" class="l_txt">Category 1</a>
                           </li>
                           <li><a href="#" class="l_txt">Categery 2</a>
                           </li>
                          
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="row  prdct_sec">
               <div class="col-md-12">
                  <ol class="breadcrumb breadc_b">
                     <li><a href="index.php" class="red"> <i class="fa fa-home"></i> Home</a></li>
                     <li><a href="#" class="red"> Shopping Cart  </a></li>
                     <li class="active">Checkout </li>
                  </ol>
                  <div class="panel panel-default pnl_big">
                     <div class="panel-heading">
                        <h4 class="text-center">Check Out</h4>
                     </div>
                     <div class="panel-body panl-bdy">
                        <div class="row">
                           <div  class="col-md-8 col-md-offset-2 mar_tb_10">
                           <form action="#" class="form-horizontal" role="form" id="check_form">
                              <!-- Text input-->  
                              <div class="form-group">
                                 <label class="col-md-3 control-label normal">Email Id <span class="red">*</span></label>
                                 <div class="col-md-9">
                                    <input type="text" placeholder="Enter valid Email Id" class="form-control required email" name="email">
                                 </div>
                              </div>
                              <!-- Text input-->  
                              <!-- Text input-->  
                              <div class="form-group">
                                 <label class="col-md-3 control-label normal">Password <span class="red">*</span></label>
                                 <div class="col-md-9">
                                    <input type="password" placeholder="Enter your password" class="form-control required" name="password">
                                 </div>
                              </div>
                              <!-- Text input-->  
                              <!-- Text input-->  
                              <div class="form-group">
                                 <label class="col-md-3 control-label normal">Referal Code</label>
                                 <div class="col-md-9">
                                    <input type="text" placeholder="Enter referal code" class="form-control" name="ref">
                                 </div>
                              </div>
                              <!-- Text input-->  
                              <div class="row">
                               <!-- Text input-->  
                              <div class="col-md-4 cent sm_top padding_l_o">
                                 <a class="black" href="#register1" data-toggle="modal">New User?</a>
                              </div>
                              <!-- Text input--> 
                              <!-- Text input-->  
                              <div class="col-md-4 cent sm_top padding_l_o">
                                 <a class="black" href="#forgot" data-toggle="modal">Forgot Password?</a>
                              </div>
                              <!-- Text input-->  
                            
                              <div class="col-md-4 padding_r_o">
                                 <button type="submit" class="btn btn-danger btn-sm  pull-right">Continue</button>
                              </div>
                                 </div>
                              <div class="clearfix"></div>
                           </form>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>
<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
 $('#check_form').validate();
</script>