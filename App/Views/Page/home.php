
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
   
</div>



<h2>Last 10 orders</h2>
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
            <?php foreach ($orders as $order) : ?>
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

