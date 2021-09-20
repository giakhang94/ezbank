<?php
    $this->load->library('session');
    $this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="vie">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tư vấn khoản vay</title>
    <link rel="stylesheet" href="<?=base_url()?>css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- site header-->
    <?php include "./include/header.php";?>
    </div>
    <div class="main-info container">
        <form action="<?=base_url()?>index.php/customer/insertFormInfo" method="POST" enctype="multipart/form-data">
            <div class="row row-eq-height">
                <div class="col-md-6 col-sm-12 input-info">
                    <div class="form-group info-input-form1">
                        <input type="text" name="hoTen" id="hoTen" class="form-control" value="" placeholder="Tên của bạn" required="required"  title="">
                    </div>
                    <div class="form-group info-input-form1">
                        <input type="text" name="sdt" id="sdt" class="form-control" value="" placeholder="Số điện thoại" required="required"  title="">
                    </div>
                    <div class="form-group info-input-form">
                        <input type="text" name="email" id="email" class="form-control" value="" placeholder="Email"   title=" ">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 input-demand ">
                    <div class="form-group textarea-input ">
                        <textarea type="text " name="nhuCau" id="nhuCau" class="form-control input-demand-text " value=" " placeholder="Nhu cầu của bạn là gì? Ví dụ: Số tiền vay; Thời gian vay; Lãi suất; sản phẩm vay... " required="required" pattern="
                            " title=" "></textarea>
                    </div>
                </div>
            </div>
            <div class="dropdown-contact ">
                <div class="input-group input-thunhap ">
                    <span class="input-group-addon "><i class="glyphicon glyphicon-usd "></i></span>
                    <input id="thuNhap" required="required" type="number" class="form-control " name="thuNhap" placeholder=" thu nhập 1 tháng - Ví dụ 25,000,000 ">
                </div>
                <label for="hoKhau"> Hộ khẩu </label>
                <select name="hoKhau" id="hoKhau" class="form-control select-hokhau " required="required">
                    <option value="TP.HCM">TP.HCM</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Long An">Long An</option>
                    <option value="Tỉnh khác">Tỉnh khác</option>
                </select>
                <label for="CIC"> Lịch sử tín dụng </label>
                <select name="CIC" id="CIC" class="form-control select-CIC " required="required">
                    <option value="Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)">Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)</option>
                    <option value="Có nợ chú ý (nợ nhóm 2)">Có nợ chú ý (nợ nhóm 2)</option>
                    <option value="Nợ nhóm 3 trở lên">Nợ nhóm 3 trở lên</option>
                </select>
                <label for="honNhan">Tình trạng hôn nhân </label>
                <select name="honNhan" id="honNhan" class="form-control select-phaply " required="required">
                    <option value="Độc thân">Độc thân</option>
                    <option value="Đã kết hôn">Đã kết hôn</option>
                    <option value="Ly hôn">Ly hôn</option>
                    <option value="Khác">Khác</option>
                </select>

            </div>
            <div class="button-contact-cha ">
                <button type="submit"name="send" class="submit-contact btn btn-primary ">Gửi thông tin</button>
            </div>
        </form>


    </div>

    <!-- Site footer -->
    <?php include "./include/footer.php";?>

    <!-- jQuery -->
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
</body>

</html>