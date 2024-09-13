<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success');
</script>
<?php endif; ?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Feedbacks</h3>
        <!-- <div class="card-tools">
            <a href="?page=packages/manage" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
        </div> -->
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-striped text-dark">
                <colgroup>
                    <col width="10%">
                    <col width="10%">
                    <col width="25%">
                    <col width="15%">
                    <col width="30%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Details</th>
                        <th>Rate</th>
                        <th>Feedback</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                   // $qry = $conn->query("SELECT r.*,concat(u.firstname,' ',u.lastname) as name, p.title FROM `rate_review` r inner join users u on u.id = r.user_id inner join `packages` p on p.id = r.package_id order by unix_timestamp(r.date_created) desc ");
                    
                   $qry = $conn->query("select t1.rate,t1.review,t1.date_created,t2.username ,t2.contactnumber from rate_review t1 JOIN users t2 on t1.user_id= t2.id");
                   
                   //select t1.rate,t1.review,t1.date_created,t2.firstname,t3.title,t3.tour_location from rate_review t1 JOIN users t2 JOIN packages t3;
                   while($row= $qry->fetch_assoc()):
                        $row['review'] = strip_tags(stripslashes(html_entity_decode($row['review'])));
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                        <td>
                            <p class="m-0"><b>User:</b> <?php echo ucwords($row['username']) ?></p>
                            <p class="m-0"><b>Contact Number:</b> <?php echo ucwords($row['contactnumber']) ?></p>
                        </td>
                        <td><p class="truncate-1 m-0"><?php echo $row['rate'] ?></p></td>
                        <td><p class="truncate-1 m-0" title="<?php echo $row['review'] ?>"><?php echo $row['review'] ?></p></td>
                        
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this feedback permanently?","delete_review",[$(this).attr('data-id')]);
        });
        
        $('.table').DataTable();
    });

    function delete_review($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Master.php?f=delete_review",
            method:"POST",
            data:{id: $id},
            dataType:"json",
            error:function(err){
                console.log(err);
                alert_toast("An error occurred.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp == 'object' && resp.status == 'success'){
                    location.reload();
                } else {
                    alert_toast("An error occurred.",'error');
                    end_loader();
                }
            }
        });
    }
</script>
