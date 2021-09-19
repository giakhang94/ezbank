<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- [if lt IE 9] -->
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- [endif] -->
    </head>
    <body>
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h3 class="panel-title">Thêm bank #EzBank</h3>
                    <a class="btn btn-info" href="http://localhost/mvc/ezbank/index.php/user/listuser">Về trang user</a>
                    <a class="btn btn-success" href="http://localhost/mvc/ezbank/index.php/admin/login" >Về dashboard</a>
            </div>
            <div class="panel-body">
                <?php foreach ($data_value as $key => $value) :
                    var_dump($value['user_name']);
                ?>
                    <form action="http://localhost/mvc/ezbank/index.php/user/insertUser/<?php echo $value['id']?>" method="POST" enctype="multipart/form-data" role="">
                        <legend>Thêm thông tin ngân hàng</legend>
                        <div class="form-group">
                            <?php echo form_error('name', '<div class="alert alert-danger">', '</div>'); ?>
                            <label for="">Tên user</label>
                            <input value = "<?php echo $value['name']?>" name="name" type="text" class="form-control" id="name" placeholder="Tên người quản trị">
                        </div>
                        <div class="form-group">
                            <?php echo form_error('user_name', '<div class="alert alert-danger">', '</div>'); ?>
                            <label for="">User ID</label>
                            <input value = "<?php echo $value['user_name']?>"name="user_name" type="text" step="any" class="form-control" id="user_name" placeholder="tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <?php echo form_error('pass', '<div class="alert alert-danger">', '</div>'); ?>
                            <label for="">Pass</label>
                            <input value = "<?php echo $value['pass']?>"name="pass" type="password" step="any" class="form-control" id="pass" placeholder="Mật khẩu đăng nhập">
                        </div>
                        <div class="form-group">
                            <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                            <label for="">Email</label>
                            <input value = "<?php echo $value['email']?>"name = "email"type="text" step="any" class="form-control" id="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <?php echo form_error('phone', '<div class="alert alert-danger">', '</div>'); ?>
                            <label for="">Phone Number</label>
                            <input value = "<?php echo $value['phone']?>"name="phone"type="text" step="any" class="form-control" id="phone" placeholder="số điện thoại">
                        </div>
                        </div>
                        <?php endforeach ?>
                    
                        <button type="submit" name="save" class="btn btn-primary">Thêm vào DB</button>
                        <button type="reset" name="reset" class="btn btn-primary">Làm lại</button>
                    </form>
                    
            </div>
        </div>
    

    <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
