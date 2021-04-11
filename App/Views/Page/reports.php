
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Reports</h1>
</div>
<form action="search" method="POST">
  
  <div class="form-group row">
    <label for="from" class="col-sm-2 col-form-label">Date From</label>
    <div class="btn-group border-right-0">
        <button class="btn btn-sm border-right-0">
            <span data-feather="calendar"></span>
        </button>
    </div>
    <div class="col-sm-5" id="from-group">
       <div class="input-group date " id="input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            <input id="from" type="text" name="from" class="form-control" placeholder="Date from" value="<?php echo $from; ?>">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="to" class="col-sm-2 col-form-label">Date To</label>
    <div class="btn-group border-right-0">
        <button class="btn btn-sm border-right-0">
            <span data-feather="calendar"></span>
        </button>
    </div>
    <div class="col-sm-5" id="to-group">
       <div class="input-group date" id="input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            <input id="to" type="text" name="to" class="form-control" placeholder="Date to" value="<?php echo $to; ?>">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
    <div class="col-sm-5" id="user_id-group">
      <input type="text"  class="form-control" id="user_id" name="user_id" value="" onkeypress='validateOnlyNumbers(event)' maxlength="10" >
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Search</button>
<?php if(isset($searchOrders ))
{?>
  <div class="form-group row">
     <div class="col-sm-12" id="result-group">
      <h2></h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Receipt</th>
                        <th>Items</th>
                        <th>Email</th>
                        <th>IP</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Entry By</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($searchOrders as $order) : ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['amount'];?></td>
                            <td><?php echo $order['buyer']; ?></td>
                            <td><?php echo $order['receipt_id']; ?></td>
                            <td><?php echo $order['items']; ?></td>
                            <td><?php echo $order['buyer_email']; ?></td>
                            <td><?php echo $order['buyer_ip']; ?></td>
                            <td><?php echo $order['note']; ?></td>
                            <td><?php echo $order['city']; ?></td>
                            <td><?php echo $order['phone']; ?></td>
                            <td><?php echo $order['entry_at']; ?></td>
                            <td><?php echo $order['entry_by']; ?></td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>

    </div>
  </div>
<?php
}
else
print "Data Not Found";?>
</form>

 <!-- <script src="/js/report.js"></script>-->
  <script src="/js/validation.js"></script>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="/js/report.js"></script>?>


