<!-- START CONTENT -->
<div id="leadscont" class="">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Create General Invoice</h1>
    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="#" class="btn btn-light"><i class="fa fa-remove"></i>Close</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->
  </div>
  <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START CONTAINER -->
  <div class="container-padding">
    <!-- Start Row -->
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-default">
 
          <div class="panel-title">
            Client Information
            <ul class="panel-tools">
              <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
              <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
              <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
            </ul>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" id="frmi1">
              <div class="form-group">
                <label class="col-sm-2 control-label form-label">Client</label>
                <div class="col-sm-10">
                  <select class="selectpicker form-control" name="client" id="clients" style="padding-left:5px" data-live-search="true" >
                    <option data-icon="fa fa-user">Select Customer...</option>
                    <option data-icon="fa fa-user">Alex Mbaka</option>
                    <option data-icon="fa fa-user">Prince Munene</option>
                    <option data-icon="fa fa-user">Chase Assurance</option>
                    <option data-icon="fa fa-user">Genghis Capital</option>
                    <option data-icon="fa fa-user">Light House Properties</option>
                  </select>  
                </div>              
              </div>
            </form>
          </div>

          <div class="panel-title">
            Invoice Item
          </div>

              <div class="panel-body">
                <form class="form-horizontal" id="frmi2">  
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Service</label>
                    <div class="col-sm-10">
                      <select class="selectpicker form-control" name="service" id="services" style="padding-left:5px" data-live-search="true" >
                        <option data-icon="fa fa-question-circle" class="defserve">Select One...</option>
                        <option data-icon="fa fa-question-circle">General Boundary Survey</option>
                        <option data-icon="fa fa-question-circle">Fixed Boundary Survey</option>
                        <option data-icon="fa fa-question-circle">Topocadastral Survey</option>
                        <option data-icon="fa fa-question-circle">Engineering Survey</option>
                        <option data-icon="fa fa-question-circle">General Land Consultancy</option>
                        <option data-icon="fa fa-question-circle">GIS Training</option>
                      </select>  
                    </div>              
                  </div>  
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Task</label>
                    <div class="col-sm-10">
                      <input type="text" name="task" class="form-control" id="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Quantity</label>
                    <div class="col-sm-3">
                      <input type="text" name="qty" class="form-control" id="">
                    </div>
                    <label class="col-sm-4 control-label form-label">Tax [%]</label>
                    <div class="col-sm-3">
                      <input type="text" name="tax" class="form-control" id="" value="0">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label form-label">Unit Price</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-addon"><i class="">Ksh.</i></div>
                        <input type="text" name="price" class="form-control" id="">
                        <div class="input-group-addon">.00</div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-default iadd">Add To Invoice</button>
                </form>

              </div>

        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-default">

          <div class="panel-title">
            Invoice Particulars <span class="label label-primary">?</span>
            <ul class="panel-tools">
              <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
              <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
              <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
            </ul>
          </div>

          <div class="panel-body table-responsive">
            <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <td>Activity</td>
                      <td>Price [KES]</td>
                      <td>Qty</td>
                      <td>Sub-total</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td>Topocadastral Survey<br><span style="font-style:italic; font-size:11px">The Task goes here</span></td>
                      <td>450</td>
                      <td>3</td>
                      <td>Ksh. 1,350</td>
                    </tr>
                    <tr>
                      <td>Topocadastral Survey<br><span style="font-style:italic; font-size:11px">The Task goes here</span></td>
                      <td>450</td>
                      <td>1</td>
                      <td>Ksh. 450</td>
                    </tr>
                    <tr>
                      <td>Engineering Survey<br><span style="font-style:italic; font-size:11px">The Task goes here</span></td>
                      <td>450</td>
                      <td>1</td>
                      <td>Ksh. 450</td>
                    </tr>
                    <tr>
                      <td>General Land Consultancy<br><span style="font-style:italic; font-size:11px">The Task goes here</span></td>
                      <td>450</td>
                      <td>2</td>
                      <td>Ksh. 900</td>
                    </tr>
                  </tbody>
            </table>
          
            
            <form class="form-horizontal" style="overflow:hidden;border-top:5px solid #ddd;padding-top:20px">
              <div class="form-group">
                <label class="col-sm-2 control-label form-label">Taxes</label>
                <div class="col-sm-2">
                  <input type="text" name="tax" class="form-control" id="tottax" placeholder="Tax" value="" readonly>
                </div>
                <label class="col-sm-2 control-label form-label" style="font-weight:600">TOTAL</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="">Ksh.</i></div>
                    <input type="text" id="totamt" class="form-control" readonly>
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-warning idiscard float-r" style="margin-left:20px">Discard</button>
              <button type="submit" class="btn btn-default igenerate float-r">Generate Invoice</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Row -->
  </div>
</div>
