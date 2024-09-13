<section class="page-section">
    <div class="container">
        <div class="w-100 justify-content-between d-flex">
            <h4><b>Booked Packages</b></h4>
            <a href="./?page=edit_account" class="btn btn btn-primary btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a>
        </div>
        <hr class="border-warning">
        <table class="table table-stripped text-dark">
            <colgroup>
                <col width="5%">
                <col width="10">
                <col width="15">
                <col width="25">
                <col width="20">
                <col width="5">
                <col width="5">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>DateTime</th>
                    <th>Package</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                $qry = $conn->query("SELECT b.*,p.title FROM book_list b inner join `packages` p on p.id = b.package_id where b.user_id ='".$_settings->userdata('id')."' order by date(b.date_created) desc ");
                while($row= $qry->fetch_assoc()):
                    $review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['package_id']}' and user_id = ".$_settings->userdata('id'))->num_rows;
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo date("d-m-y H:i",strtotime($row['date_created'])) ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo date("d-m-y",strtotime($row['schedule'])) ?></td>
                        <td class="text-center">
                            <?php if($row['status'] == 0): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-primary">Date Confirmed</span>
                            <?php elseif($row['status'] == 2): ?>
                                <span class="badge badge-danger">Cancelled</span>
                            <?php elseif($row['status'] == 3): ?>
                                <span class="badge badge-success">Done</span>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($row['status'] != 2): ?> <!-- Check if the status is not "Cancelled" -->
                                <button type="button" class="btn btn-flat btn-default border btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>

                                <div class="dropdown-menu" role="menu">
                               
                                    <?php if($row['status'] == 3 && $review < 20): ?>
                                        <a class="dropdown-item submit_review" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><img src="../tourism/uploads/feedback.png" alt="Icon" width="24" height="24"> Submit Review</a>
                                    <?php endif; ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item cancel_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                                        <img src="../tourism/uploads/canceled.png" alt="Icon" width="20" height="20">  Cancel Booking
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if ($row['status'] == 1): ?> 
                                <form action="u_payment.html" method="post">
                                    <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Pay Now">
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<script>
    function cancel_book($id){
        start_loader()
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=update_book_status",
            method: "POST",
            data: {id: $id, status: 2},
            dataType: "json",
            error: function(err) {
                console.log(err)
                alert_toast("An error occurred", 'error')
                end_loader()
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    alert_toast("Booking cancelled successfully", 'success')
                    setTimeout(function(){
                        location.reload()
                    }, 2000)
                } else {
                    console.log(resp)
                    alert_toast("An error occurred", 'error')
                }
                end_loader()
            }
        })
    }

    $(function(){
        $('.cancel_data').click(function(){
            _conf("Are you sure to cancel this booking?", "cancel_book", [$(this).data('id')])
        })
        $('.submit_review').click(function(){
            uni_modal("Rate & Feedback", "./rate_review.php?id=" + $(this).data('id'), 'mid-large')
        })
        $('table').dataTable();
    })
</script>