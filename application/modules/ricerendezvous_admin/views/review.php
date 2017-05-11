<?php if(isset($mode) && $mode == 'all'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Rating Reviews Information</h3>
      </div>
    </div>
    <!-- /page header -->
   <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li class="active">Rating Review Details</li>
      </ul>
    </div> 
    <!-- /breadcrumbs line -->
      <?php if($this->session->flashdata('message')){?>
    <div class="alert alert-success fade in block-inner">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> </div>
    <?php } ?>
     <?php if($this->session->flashdata('error')){?>
    <div class="alert alert-danger fade in block-inner">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error')?> </div>
    <?php } ?>
  <!-- Datatable with tools menu -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-table"></i>Reviews Content

              </h6>
             <!--  <div class="panel-icons-group">
                <a href="<?php echo site_url().admin?>college_reviews/add" class="btn btn-link btn-icon tip" title="Add Content"><i class="icon-plus"></i></a> </div> -->
            </div>
              <div class="datatable-media">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th class="team-links">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(isset($reviews) && is_array($reviews) && count($reviews)): $i=1;?>
                  <?php foreach ($reviews as $key => $review) { ?>
                    <tr>
                      <td> <?php echo $i++; ?> </td>
                      <td>
                        <?php
                            if($review->image!='' && file_exists('./uploads/reviews/'.$review->image))
                               $src = base_url().'uploads/reviews/'.$review->image;
                            else
                               $src = base_url().'uploads/reviews/male.png';
                         ?>
                       <img src="<?php echo $src?>" height="100px" width="100px"/> 
                       </td>
                      <td> <?php echo $review -> name?> </td>
                      <td> <?php echo $review -> rating?> </td>
                      <td> <?php echo $review -> comments?> </td>
                    <!--   <td> <i data="<?php echo $review->id;?>" class="status_checkc btn icon-<?php echo ($review -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i> </td> -->
                      <td>
                      <div class="icons-group">
                       <!--  <a href="<?php echo site_url().admin?>/review_rating/view/<?php echo $review -> id?>" title="View" class="tip"><i class="icon-eye"></i></a> -->
                        <a href="<?php echo site_url().admin?>/review/delete/<?php echo $review -> id?>" title="Delete" class="tip" onclick="return confirm('Are you sure to delete')"><i class="icon-close"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /datatable with tools menu -->
<?php elseif(isset($mode) && $mode == 'view'): ?>
  <!-- Page header -->
  <div class="page-header">
    <div class="page-title"><h3>View <?php echo $reviews -> name?> rating</h3></div>
  </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>">Home</a></li>
      <li><a href="<?php echo site_url().admin?>/review_rating">Review Rating</a></li>
      <li class="active">View <?php echo $reviews -> name?></li>
    </ul>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h6 class="panel-title"><i class="icon-copy3"></i> View <?php echo $reviews->name;?></h6>
      <div class="pull-right">
          <a href="<?php echo site_url().admin?>/review_rating">
          <button class="btn btn-warning btn-sm" type="button"><i class="icon-point-left"></i> Back</button>
          </a>
          </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <tbody>
            <tr><th>Name:</th> <td> <?php echo $reviews -> name?> </td></tr>
            <tr><th>City:</th> <td><?php echo $reviews -> city?></td></tr>
            <tr><th>Review:</th> <td><?php echo $reviews -> rating?></td></tr>
            <tr><th>Message:</th> <td><?php echo $reviews -> message?></td></tr>
            <tr><th>Photo:</th> <td>
              <?php
                if($reviews->photo!='' && file_exists('./uploads/review_ratting/'.$reviews->photo))
                   $src = base_url().'uploads/review_ratting/'.$reviews->photo;
                else
                   $src = base_url().'uploads/review_ratting/male.png';
              ?>
             <img src="<?php echo $src?>" height="100px"/> </td></tr>
            <tr><th>Type:</th> <td><?php echo $reviews -> type?></td></tr>
        </tbody>
      </table>
    </div>
  </div>
<?php endif; ?>
<script type="text/javascript">
  $('#review').addClass('active');
   $(document).on('click','.status_checkc',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/review_rating/status";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {
            location.reload();
          }
        });
      }
    });
</script>