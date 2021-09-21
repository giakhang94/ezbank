<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- site header  -->
        <?php include "./include/header.php"?>
        <!-- xong header -->
        <div class="container thongbao-info">
            <p class="info-text alert alert-success">Cảm ơn bạn đã gửi thông tin, chúng tôi sẽ phản hồi trong thời gian ngắn nhất</p>
            <a class = "btn btn-primary btnInfo" href="<?php echo base_url();?>index.php/bank">Về trang chủ </a>    <a class = "btn btn-primary btnInfo" href="<?php echo base_url();?>index.php/customer">Gửi lại nhu cầu vay</a> 
        </div>
        <!-- site footer -->
        <?php include "./include/footer.php"?>
        <!-- xong foooter -->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
