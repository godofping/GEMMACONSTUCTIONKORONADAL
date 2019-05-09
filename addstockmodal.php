<!-- Add new Modal -->
<div id="addStockModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add stocks</h4>
      </div>
      <div class="modal-body">
        
        <br />
                    <form id="demo-form2" action="insert-stock.php" data-parsley-validate class="form-horizontal form-label-left">

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InID">Delivery ID <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="InID" name="InID" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BodegeroName">Bodegero Name <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="BodegeroName" name="BodegeroName" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InQuantity">Quantity <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" id="InQuantity" name="InQuantity" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inDate">Delivery date <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="date" id="inDate" max="2018" name="inDate" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <input type="text" name="ProductID" hidden value="<?php echo $resultInGetProductTableQry['ProductID']; ?>">


                      
                      
                      
        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
       </form>

        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i>  Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end modal -->