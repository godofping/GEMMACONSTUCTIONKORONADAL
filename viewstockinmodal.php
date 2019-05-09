<!-- view Stock IN Modal -->
<div id="viewStockHistoryModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stock In history of <?php echo $resultInGetProductTableQry['ProductName']; ?></h4>
      </div>
      <div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
       

       <table id="datatable" class="table table-striped table-bordered table-responsive">
         <thead>
           <tr>
              <th>Delivery ID</th>
              <th>Admin</th>
              <th>Bodegero</th>
              <th>Quantity</th>
              <th>Delivery Date</th>

           </tr>
         </thead>

         <tbody>
         <?php
         $getInTableDataQry = mysqli_query($connection, "select * from inview where ProductID = '" . $resultInGetProductTableQry['ProductID'] . "' order by InDate");

          while ($getInTableDataQryResult = mysqli_fetch_assoc($getInTableDataQry)) {
          
          ?>

          <tr>
           <td><?php echo $getInTableDataQryResult['InID']; ?></td>
           <td><?php


            echo $getInTableDataQryResult['fullname']; 


            ?></td>
           <td><?php echo $getInTableDataQryResult['BodegeroName']; ?></td>
           <td><?php echo $getInTableDataQryResult['InQuantity']; ?></td>
           <td><?php echo $getInTableDataQryResult['inDate']; ?></td>

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