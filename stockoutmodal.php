


 <!-- view Stock Out Modal -->
<div id="viewStockOutHistory<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stock Out history of <?php echo $resultInGetProductTableQry['ProductName']; ?></h4>
      </div>
      <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
       

       <table id="datatable" class="table table-striped table-bordered table-responsive">
         <thead>
           <tr>
              <th>Out ID</th>
              <th>Project Name</th>
              <th>Project Engineer</th>
              <th>Quantity</th>
              <th>Date of Request</th>
              <th>Approval Date</th>
              <th>Method</th>
              <th>Approved by</th>

           </tr>
         </thead>

         <tbody>
         <?php
         $getInTableDataQry = mysqli_query($connection, "select * from outview where ProductID = '" . $resultInGetProductTableQry['ProductID'] . "' and isApproved = 'Approved'");

          while ($getInTableDataQryResult = mysqli_fetch_assoc($getInTableDataQry)) {
          
          ?>

          <tr>

           <td><?php echo $getInTableDataQryResult['OutID']; ?></td>
           <td><?php echo $getInTableDataQryResult['ProjectName']; ?></td>
           <td><?php echo $getInTableDataQryResult['ProjectEngrName']; ?></td>
           <td><?php echo $getInTableDataQryResult['OutQuantity']; ?></td>
           <td><?php echo $getInTableDataQryResult['RequestDate']; ?></td>
           <td><?php echo $getInTableDataQryResult['OutDate']; ?></td>
           <td><?php echo $getInTableDataQryResult['Method']; ?></td>
           <td><?php 
           $getadminnameqry = mysqli_query($connection,"select * from admin_table where adminid = '" . $getInTableDataQryResult['adminid'] . "'");

           $getadminresult = mysqli_fetch_assoc($getadminnameqry);
           echo $getadminresult['fullname']; 


           ?></td>

         </tr>

        <?php
         } ?>
           
         </tbody>
         
       </table>

        <form id="editProductForm" action="delete-product.php" data-parsley-validate class="form-horizontal form-label-left">
        <input type="text" name="productid" value="<?php echo $resultInGetProductTableQry['ProductID']; ?>" hidden>
       

      </div>


      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end modal -->
