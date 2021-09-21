<nav class="navbar navbar-default main-menu" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        <a class="navbar-brand" href="<?=base_url()?>index.php/bank"><img height="60px" src="<?php echo base_url();?>img/logo2.png" class="" alt=""></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <!-- <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form> -->
        <ul class="nav navbar-nav navbar-right">
            <li  >
                <a href="<?=base_url()?>index.php/bank#input1" >Vay thế chấp</a>
                <ul class="dropdown-menu menu-sub">
                </ul>
            </li>
            <li><a href="<?=base_url()?>index.php/customer">Vay tín chấp</a></li>
            <li><a href="<?php echo base_url()?>index.php/customer">Đăng nhu cầu vay</a></li>
            <li><a href="<?php echo base_url()?>index.php/customer/changebank">Đổi ngân hàng vay</a></li>
            <li><a href="<?php echo base_url()?>index.php/admin/login">Đăng nhập</a></li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>