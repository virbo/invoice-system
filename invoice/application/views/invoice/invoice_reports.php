
  <!--  Notification  -->
        <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
        <div class="alert alert-danger" >
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <b><?php print_r($msg); ?></b>
        </div>
        <?php } ?>

    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <!-- general form elements -->     
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Invoice reports</h3>
            </div><!-- /.box-header -->
            <div class="box-body">  
                <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                    <td>Id</td>
                    <td>Date</td>
                    <td>Customer</td>
                    <td>Sub Total</td>
                    <td>service tax</td>
                    <td>Total</td>   
                    <td>View</td> 
                    <td>Delete</td>
                </tr>
              </thead>
              <tbody>              
                  <?php
                  $i=1;
                    if(!empty($invoice)){
                        foreach ($invoice as $val){
                                echo "<tr>";
                                echo "<td>".$i++."</td>";
                                echo "<td>".$val->date."</td>";
                                echo "<td>".$val->customer_name."</td>";
                                echo "<td>".$val->sub_total."</td>";  
                                echo "<td>".$val->o_tax."</td>";  
                                echo "<td>".$val->grand_total."</td>";  
                                echo "<td><a href='#myModal_".$val->id."'class='btn btn-primary' data-toggle='modal'>View</button></td>";       
                                echo "<td><a href='#delete_".$val->id."'class='btn btn-danger' data-toggle='modal'>Delete</button></td>"; 
                            echo "</tr>";
                        }
                    }
                  ?>    
              </tbody>
          </table>
            </div>

            <!--view  Modal -->

            <?php if(!empty($invoice)){
                        foreach ($invoice as $vals){?>
<div class="modal fade" id="myModal_<?php echo $vals->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:800px;margin-left:-120px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Invoice Item details</h4>
      </div>
      <div class="modal-body">
       <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                    <td>Id</td>                  
                    <td>Item</td>
                    <td>Rate</td>  
                    <td>Tax</td>  
                    <td>Quantity</td>  
                    <td>Amount</td>  
                   
                </tr>
              </thead>
              <tbody>              
                  <?php

                            $item_name=explode(',',$vals->name);
                            $rate=explode(',',$vals->rate);
                            $tax=explode(',',$vals->tax);
                            $quantity=explode(',',$vals->quantity);
                            $amount=explode(',',$vals->amount);
                                $count=count($item_name);
                            for($k=0;$k<$count;$k++)
                            {
                                $j=$k+1;

                            echo "<tr>";
                            echo "<td>".$j."</td>";        
                            echo "<td>".$item_name[$k]."</td>";
                            echo "<td>".$rate[$k]."</td>";
                             echo "<td>".$tax[$k]."</td>";
                            echo "<td>".$quantity[$k]."</td>";
                            echo "<td>".$amount[$k]."</td>";
                            echo "</tr>";
                        }
                        
                    
                  ?>    
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Happy to help!</button>
       
      </div>
    </div>
  </div>
</div>
<?php }}?>


<!--Delete Modal -->
<?php if(!empty($invoice)){
                        foreach ($invoice as $v){?>
<div class="modal fade" id="delete_<?php echo $v->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning !</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" align="center">
        Are you sure to delete !
        </div>
        <div align="center">
            <form action="<?php echo site_url('invoice/delete_invoice');?>" method="post">
            <input type="hidden" value="<?php echo $v->id;?>" name="id">
            <button type="submit" class="btn btn-primary">yes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </form>
        </div>

       </div>
      <div class="modal-footer">
            
      </div>
    </div>
  </div>
</div>
<?php } } ?>