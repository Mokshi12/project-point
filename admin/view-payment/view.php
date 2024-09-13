<?php
include '../../config.php';
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `payment_details` where id = '{$_GET['id']}' ");
    foreach($qry->fetch_assoc() as $k => $v){
        $$k = $v;
    }
    $conn->query("UPDATE `payment_details` set `status` = 1 where id = '{$_GET['id']}' ");

}
?>
<style>
    #uni_modal .modal-content>.modal-footer{
        display:none;
    }
</style>
<p><b>Full Name:</b> <?php echo ucwords($full_name) ?></p>
<p><b>Name of the card:</b> <?php echo $name_on_card ?></p>
<p><b>Card Number:</b> <?php echo $card_number ?></p>
<p><b>Card CVV:</b> <?php echo $card_cvv ?></p>
<p><b>exp_month:</b> <?php echo $exp_month ?></p>
<p><b>exp_year:</b> <?php echo $exp_year ?></p>
<p><b>Amount:</b> <?php echo $amount ?></p>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>
    $(function(){
        $('#book-status').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_book_status",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        location.reload()
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>