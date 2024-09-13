<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Payments</h3>

	</div>
	<div class="card-body">
        <div class="container-fluid">
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
                    <th>User Name</th>
                    <th>Cash / Card</th>
                    <th>Card Number</th>  
                    <th>Contact Number</th>
                    <th>Amount</th>  
                    <th>Transaction Date / Time:</th> 
                </tr>
            </thead>
            <tbody>
        
                <?php 
                
                $i=1;
                    $qry = $conn->query("SELECT * from payment_details");
                   while($row= $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['full_name'] ?></td>
                        <td><?php echo $row['name_on_card'] ?></td>
                        <td><?php echo $row['card_number'] ?></td>
                        <td><?php echo $row['contactnumber'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                <?php endwhile; ?>
            </tbody>
        </table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this booking permanently?","delete_booking",[$(this).attr('data-id')])
		})
        $('.view_data').click(function(){
            uni_modal("Payment Information","books/view.php?id="+$(this).attr('data-id'))
        })
		$('.table').dataTable();
	})
	function delete_booking($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_booking",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>

<script>
$(document).ready(function(){
    $('.view_payment').click(function(){
        var payment_detailsId = $(this).data('id');
        $.ajax({
            url: 'view_payment.php?id=' + payment_detailsId,
            type: 'GET',
            success: function(response) {
                
                alert(response);
            },
            error: function(xhr, status, error) {
                alert('An error occurred while fetching payment details.');
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

