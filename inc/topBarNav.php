 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand" href="../tourism/index.php"><span class="text-waring">Tourly</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>"><b>Home</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="./?page=packages"><b>Packages</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#about"><b>About</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $page !='home' ? './':''  ?>#contact"><b>Contact</b></a></li>
                        <?php if(isset($_SESSION['userdata'])): ?>
                          <li class="nav-item"><a class="nav-link" href="./?page=my_account"><b><i class="fa fa-user"></i> Hi, <?php  echo $_settings->userdata('firstname') ?>!</b></a></li>
                          <li class="nav-item"><a class="nav-link" href="logout.php"><b><i class="fa fa-sign-out-alt"></i></b></a></li>
                        <?php else: ?>
                          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" id="login_btn"><b>Login</b></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#login_btn').click(function(){
      uni_modal("","login.php","large")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })
</script>