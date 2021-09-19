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
                    <a class="btn btn-info" href="listbank">Về trang bank</a>
                    <a class="btn btn-success" href="?page=login" >Về dashboard</a>
            </div>
            <div class="panel-body">
                <?php foreach ($data_value2 as $key => $value) :
   
                ?>
                    <form action="http://localhost/mvc/ezbank/index.php/bank/insertData/<?php echo $value['id']?>" method="POST" enctype="multipart/form-data" role="">
                        <legend>Thêm thông tin ngân hàng</legend>
                        <div class="form-group">
                            <label for="">Tên bank</label>
                            <input value = "<?php echo $value['bank']?>" name="bank" type="text" class="form-control" id="bank" placeholder="Ví dụ: mother f*cker">
                        </div>
                        <div class="form-group">
                            <label for="">lãi_fix</label>
                            <input value = "<?php echo $value['fix_interest']?>"name="fix_interest" type="number" step="any" class="form-control" id="fix_interest" placeholder="Lãi cố định">
                        </div>
                        <div class="form-group">
                            <label for="">lãi_12m</label>
                            <input value = "<?php echo $value['12m_interest']?>"name="12m_interest" type="number" step="any" class="form-control" id="12m_interest" placeholder="lãi ưu đãi 12 tháng">
                        </div>
                        <div class="form-group">
                            <label for="">Tgian sua nha</label>
                            <input value = "<?php echo $value['time_build']?>"name = "time_build"type="number" step="any" class="form-control" id="time_build" placeholder="TG vay suanha">
                        </div>
                        <div class="form-group">
                            <label for="">TG_muanha</label>
                            <input value = "<?php echo $value['time_buy']?>"name="time_buy"type="number" step="any" class="form-control" id="time_buy" placeholder="TG vay muanha">
                        </div>
                        <div class="form-group">
                            <label for="">TG_kdoanh</label>
                            <input value = "<?php echo $value['time_business']?>"name="time_business"type="number" step="any" class="form-control" id="time_business" placeholder="12 hoặc 24 tháng thôi">
                        </div>
                        <div class="form-group">
                            <label for="">TG_tiedung</label>
                            <input value = "<?php echo $value['time_consumer']?>" name="time_consumer"type="number" step="any" class="form-control" id="time_consumer" placeholder="TG vay tieu dung">
                        </div>
                        <div class="form-group">
                            <label for="">logo</label>
                            <input value = "<?php echo $value['logo']?>" name="logo" type="file" class="form-control" id="logo" placeholder="thêm hình ảnh">
                        </div> 

                        <div class="form-group">
                            <input value = "<?php echo $value['logo']?>" name="logo2" type="text" class="form-control hidden" id="logo2" placeholder="thêm hình ảnh">
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
