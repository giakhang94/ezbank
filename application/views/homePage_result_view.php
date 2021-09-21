<?php
    $this->load->helper('url');
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
?>
<!DOCTYPE html>
<html lang="vie">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tư vấn khoản vay</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]> -->
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- <![endif] -->
    <!-- tạo smooth scrool -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
</head>

<body>

    <div class="header-site container">
        <?php 
            include "./include/header.php";
            include "./include/carousel.php";
        ?>
    <div class="main container">
        </br>
        </br>
        <form id="input1" class="input-khoanvay" action="<?php echo base_url()?>index.php/bank/caculate" method="POST" enctype="multipart/form-data">
            <select name="mucdich" id="input" class="form-control select-spvay" required="required">
                <option value="1"selected>Chọn sản phẩm vay</option>
                <option value="1">Vay mua nhà</option>
                <option value="2">Vay sửa nhà</option>
                <option value="3">Vay kinh doanh ngắn hạn</option>
                <option value="8">Vay Ô-tô/Tiêu dùng</option>
            </select>           
        </br>
            <select name="loai_laisuat" id="input" class="form-control select-spvay" required="required">
                <option value="1"selected>Chọn loai lai suat</option>
                <option value="1">Ưu đãi 12 tháng</option>
                <option value="2">Cố định không phạt</option>
            </select>
            </br>
            <div class="chon-sp">
                <div class="form-check">
                    <input class="form-check-input input-thechap" type="radio" name="thechap" id="thechap" checked>
                    <label class="form-check-label label-thechap" for="thechap">
                      Thế chấp
                    </label>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-sotienvay input-group-addon">Số tiền vay</span>
                    <input name = "sotien"id="sotien" type="text" class="form-control" name="msg" placeholder="Ví dụ: 500,000,000">
                    <span class="input-group-addon">Thời gian vay</span>
                    <input id="time" type="text" class="form-control" name="time" placeholder="Ví dụ 120">
                </div>

            </div>
            </br>
            <input class="btn btn-primary submit-btn" type="submit" value="Tìm Ngân Hàng">
            </br>

        </form>
        <div class="container">
            <div class="row">
                <h2>Danh sách Ngân hàng gợi ý --- <?php echo $datapost['spvay'];?></h2>
            </div>
            <hr>
            <!-- từ cái này là 1 card -->
            <?php foreach ($data_homepage as $key => $value) :
            ?>
            <div class="row row-margin-bottom">
                <div class="col-md-12 no-padding lib-item" style="align-content:center" data-category="view">
                    <div class="lib-panel">
                        <div class="row box-shadow">
                            <div class="col-md-6 info-logo">
                                <img class="lib-img-show logo-bank" src="<?php echo base_url();?>uploads/<?php echo $value['logo']; ?> ">
                            </div>
                            <div class="col-md-6 ">

                                <div class="lib-row lib-header goc-info ">
                                    <div class=" " style="text-align: left; " href=" ">
                                        <span type=" " style="font-size:20px; " class="badge badge-primary vay-info ">
                                            Lãi suất
                                        </span>
                                        <span style="margin-left:25px; ">
                                            <?php 
                                                if($datapost['loai_ls'] == 1){
                                                    echo $value['12m_interest'];echo "%/năm - ưu đãi 12 tháng";
                                                    $laisuat = $value['12m_interest'];
                                                }else 
                                                {
                                                    echo $value['fix_interest']; echo"%/năm - Có miễn phạt trả trước";
                                                    $laisuat = $value['fix_interest'];
                                                }
                                               $laisuat = floatval($laisuat);
                                            ?>
                                                    
                                        </span>
                                    </div>
                                    <!-- <div class="lib-header-seperator "></div> -->
                                </div>
                                <div class="lib-row lib-header goc-info ">
                                    <div class=" " style="text-align: left; " href=" ">
                                        <span type=" " style="font-size:20px; " class="badge badge-primary vay-info ">
                                            Thời hạn
                                        </span>
                                        <span style="margin-left:25px; ">
                                            <?php 

                                               if ($datapost['mucdich']==1) {
                                                    if($datapost['time'] <= floatval($value['time_buy'])){
                                                        echo $datapost['time'];echo " tháng";
                                                        $t = $datapost['time'];
                                                    }
                                                    else {echo $value['time_buy']; echo " tháng";echo " (tối đa)"; $t =  floatval($value['time_buy']);}
                                                }else if($datapost['mucdich']==2) {
                                                    if($datapost['time'] <= floatval($value['time_build'])){
                                                        echo $datapost['time']; echo " tháng";
                                                        $t = $datapost['time'];
                                                    }
                                                    else {echo $value['time_buy']; echo " tháng";echo " (tối đa)"; $t = floatval($value['time_build']);}
                                                }else if($datapost['mucdich']==3) {
                                                    echo $value['time_business'];echo " tháng";
                                                    $t = floatval($value['time_consumer']);
                                                }else {
                                                    if($datapost['time'] <= floatval($value['time_consumer'])){
                                                        echo $datapost['time'];echo " tháng";
                                                        $t = $datapost['time'];
                                                    }else {echo $value['time_consumer']; echo " tháng";echo " (tối đa)"; $t = floatval($value['time_consumer']);}
                                                }

                                            ?>        
                                        </span>
                                    </div>
                                    <!-- <div class="lib-header-seperator "></div> -->
                                </div>
                                <div class="lib-row lib-header goc-info ">
                                    <div class=" " style="text-align: left; " href=" ">
                                        <span type=" " style="font-size:20px; " class="badge badge-primary vay-info ">
                                            Gốc hàng tháng
                                        </span>
                                        <span style="margin-left:25px; ">
                                            <?php 
                                            
                                            if ($datapost['mucdich'] != 3){
                                                $goc = round($datapost['sotien']/$t,3);
                                                echo currency_format($goc," đồng/tháng");
                                            }
                                            else {echo "0 đ/tháng => gốc cuối kỳ";}
                                            ?>
                                                
                                        </span>
                                    </div>
                                    <!-- <div class="lib-header-seperator "></div> -->
                                </div>
                                <div class="lib-row lib-header goc-info ">
                                    <div class=" " style="text-align: left; " href=" ">
                                        <span type=" " style="font-size:20px; " class="badge badge-primary vay-info ">
                                            Lãi tháng đầu
                                        </span>
                                        <span style="margin-left:25px; ">
                                            <?php
                                                $lai = round($datapost['sotien']*$laisuat/1200,3);
                                                echo currency_format($lai," đồng/tháng"); 
                                            ?>
                                        </span>
                                    </div>
                                    <div class="lib-header-seperator "></div>
                                </div>

                                <div class="lib-row lib-desc " style="text-align: left; ">
                                    </br>
                                    <a class="btn btn-info btn_xembank" id="btn_xembank" href="<?php echo base_url();?>index.php/bank/excel/<?php echo $value['id'];?>/<?=$datapost['sotien']?>/<?=$t?>/<?=$datapost['mucdich']?>/<?=$datapost['spvay']?>/<?=$laisuat?>" style=" width: 90% ;">Xem bảng tính gốc lãi chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- hết 1 card -->
            <?php endforeach?>
        </div>
        <div class="btn-cha ">
            <button class="btn-readmore btn btn-primary ">Xem thêm ngân hàng</button>
        </div>

    </div>
    <p>Fuck Bank</p>
    <!-- Site footer -->
    <?php include "./include/footer.php"?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
</body>

</html>