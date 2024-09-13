<div class="container-fluid">
    <form action="" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>" >
            <input type="date" class='form form-control' required name='schedule' id="schedule">
        </div>
    </form>
</div>
<script>
    $(function(){
        // Set the minimum date to today
        var today = new Date().toISOString().split('T')[0];
        $('#schedule').attr('min', today);

        $('#book-form').submit(function(e){
            e.preventDefault();
            start_loader()
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=book_tour",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err)
                    alert_toast("An error occurred", 'error')
                    end_loader()
                },
                success: function(resp){
                    if (typeof resp == 'object' && resp.status == 'success'){
                        alert_toast("Book Request Successfully sent.")
                        $('.modal').modal('hide')
                    } else {
                        console.log(resp)
                        alert_toast("An error occurred", 'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>
