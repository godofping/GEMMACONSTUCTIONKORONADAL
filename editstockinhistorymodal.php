<!-- edit Stock HistoryModal -->
<div id="editStockHistoryModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Stock In history of <?php echo $resultInGetProductTableQry['ProductName']; ?></h4>
      </div>
      <div class="modal-body" style="max-height: calc(100vh - 210px) !important;overflow-y: auto !important;">
       

       <table id="datatable" class="table table-striped table-bordered table-responsive">
         <thead>
           <tr>
              
              <th>Quantity</th>
              <th>Delivery Date</th>
              <th>Action</th>
              <th>Action</th>

           </tr>
         </thead>

         <tbody>
         <?php
         $getInTableDataQry = mysqli_query($connection, "select * from in_table where ProductID = '" . $resultInGetProductTableQry['ProductID'] . "'");

          while ($getInTableDataQryResult = mysqli_fetch_assoc($getInTableDataQry)) {
          
          ?>

          <tr>
          <form action="update-stock-history.php">
            
            <input type="text" name="InID" value="<?php echo $getInTableDataQryResult['InID']; ?>" hidden>   

           <td>
                <div class="form-group">  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="number" id="InQuantity" name="InQuantity" required="required" class="form-control col-md-12 col-xs-12" value="<?php echo $getInTableDataQryResult['InQuantity']; ?>">
                  </div>
                </div>
          </td>
           

           <td>
                <div class="form-group">  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="date" id="inDate" name="inDate" required="required" class="form-control col-md-12 col-xs-12" value="<?php echo $getInTableDataQryResult['inDate']; ?>">
                  </div>
                </div>
          </td>

           <td style="text-align: center;"><button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button></td>
           
          </form>

          <form action="delete-stock-history.php">
            <td style="text-align: center;"><button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></td>
            <input type="text" name="InID" value="<?php echo $getInTableDataQryResult['InID']; ?>" hidden> 
          </form>
         </tr>

        <?php
         } ?>
           
         </tbody>
         
       </table>

       
       

      </div>


      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end modal -->