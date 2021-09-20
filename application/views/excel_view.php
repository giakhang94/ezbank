<?php 
//tạo function currency format
    $this->load->helper('url');
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
//xong function
    $tgian = floatval($data_excel['tgian']);
    $sotien = floatval($data_excel['sotien']);
    $mucdich = floatval($data_excel['mucdich']);
    $laisuat = floatval($data_excel['laisuat']);
    $spvay = $data_excel['spvay'];
    //tính các biến tạm cho đỡ xài if ở dưới

    $mucdich =='3'?$goc=0:$goc =round($sotien/$tgian,3);
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>css/style.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header container">
        <!-- site header-->
          <?php
            include "./include/header.php"
          ?>
        <!--site header-->

        </div>
        <div class="container panel panel-info excel-info">
            <div class="panel-heading info-heading">
                <h2 class="panel-title">Ngân hàng: <?=$data_getbyid[0]['bank'];?> -> Số tiền vay: <?=currency_format($sotien, " đồng")?> - Lãi suất: <?=$laisuat?>%/năm- Thời gian vay: <?=$tgian?> tháng</h2>
            </div>
            <div style="text-align: center"class="disclaimer">
                <h5 class="disclaimer-text alert alert-warning">Thông tin bên dưới chỉ có tính tương đối để anh chị tham khảo - Không đúng chính xác 100% so với thực tế</h5> 
            </div>
            <div class="panel-body">
                
                <table class="table table-hover table-excel-info">
                    <a class ="btn btn-primary nut-excel" href="<?=base_url();?>index.php/bank">Về trang chủ</a>
                    <p><a class="btn btn-primary nut-excel" href="<?=base_url();?>index.php/bank/form-info">Nhấn vào đây</a> để gửi nhu cầu vay chúng tôi sẽ liên lạc lại </p>
                    <thead>
                        <tr>
                            <th>Tháng thứ</th>
                            <th>Dư nợ</th> 
                            <th>Gốc hàng tháng</th>
                            <th>lãi theo dư nợ</th> 
                            <th>Gốc còn lại</th>
                            <th>Tổng đóng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $duno = $sotien;
                        $conlai = $sotien-$goc;
                        for($i=1; $i <=$tgian; $i++): 
                    ?>
                        <tr>
                            <td><?=$i;?></td>
                            <td><?=currency_format($duno,"đ")?></td>
                            <td><?=currency_format($goc,"đ");?></td>
                            <td>
                                <?php 
                                    if ($i<=12):
                                        echo currency_format(round($laisuat*$duno/1200,3),"đ");
                                    else:
                                        $laisuat_sau12m = $data_getbyid[0]['fix_interest'];
                                        echo currency_format(round($data_getbyid[0]['fix_interest']*$duno/1200,3),"đ");
                                    endif;
                                ?>
                            </td>
                            <td><?=currency_format($conlai,"đ");?></td>
                            <td><?=currency_format(round($goc+(($i<=12)?$laisuat:$laisuat_sau12m)*$duno/1200,3),"đ")?></td>
                        </tr>
                        <?php
                            $duno = $conlai;
                            $conlai = $conlai-$goc;
                        endfor;
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>

        <?php include "./include/footer.php"?>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>

