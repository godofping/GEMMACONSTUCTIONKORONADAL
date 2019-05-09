 <!-- edit Modal -->
            <div id="editModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit product</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="editProductForm" action="update-product.php" data-parsley-validate class="form-horizontal form-label-left">

                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productname">Product Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input type="text" id="productname" value="<?php echo $resultInGetProductTableQry['ProductName']; ?>" name="productname" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>


                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productdescription">Product Description <span class="required"></span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                      <textarea rows= "3" type="text" id="productdescription" name="productdescription" required="required" class="form-control col-md-7 col-xs-12"><?php echo $resultInGetProductTableQry['ProductDescription']; ?></textarea>
                                    </div>
                                  </div>
                                    
                                    <input type="text" name="productid" value="<?php echo $resultInGetProductTableQry['ProductID']; ?>" hidden>
                                  
                                  
                                  

                              

                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i style="font-size: 14px;" class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->