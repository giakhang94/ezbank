

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
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center">Danh sách Quản trị viên</h3>
                    <a class="btn btn-info" href="adduser" >Thêm user</a>
                    <a class="btn btn-success" href="../admin/login" >Về dashboard</a>
                </div>
                <div class="panel-body">
                    
                    <table class="table table-hover">
                        <thead >
                            <tr>
                                <th></th>
                                <th>Tên user</th>
                                <th>User_name</th>
                                <th>email </th>
                                <th>SĐT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($data_user as $key => $row) :
                            ?>
                                <tr>
                                    <td>
                                        <a class = "btn btn-success" href="addUser/<?php echo $row['id'] ?>"> Sửa</a>
                                        <a class = "btn btn-warning" Onclick="confirm('Chắc chưa?')" href="xoaUser/<?php echo $row['id'] ?>"> Xóa</a>
                                    </td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['user_name']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['phone']?></td>
                                </tr>
                            <?php 
                                endforeach;
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>


            <!-- jQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Bootstrap JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    </body>
</html>
