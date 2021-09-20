<?php
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
        <?php include "./include/header.php"?>
    </div>
    <div class="main-change container">
        <div class="greeting-text">
            <h1 class="alert alert-info" id="greeting1">Chúng tôi sẽ liên lạc với bạn sau khi nhận đầy đủ thông tin bên dưới từ bạn!</h1>
        </div>
        <form action="<?php echo base_url()?>index.php/customer/insertchangebank" method = "POST" enctype="multipart/form-data">
            <div class="row row-change">
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="bankDangVay" id="bankDangVay" placeholder="Ngân hàng đang vay (ví dụ: Vietcombank" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="number" name="duNo" id="duNo" placeholder="Dư nợ(VND), ví dụ 300,000,000" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="CMND" id="CMND" placeholder="CMND/CCCD/Passport" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="TSTC" id="TSTC" placeholder="Địa chỉ tài sản thế chấp" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="GiaTriTS" id="GiaTriTS" placeholder="Giá trị TS ví du: 3,200,000,000" class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="targetBank" id="targetBank" placeholder="Ngân hàng muôn vay mới. Để trống nếu chưa bạn biết.." class="form-control " value="" required="required"  title="">
                </div>
                <div class="col-md-3 col-sm-12 input-change">
                    <input type="text" name="hoTen" id="targetBank" placeholder="Họ tên của bạn" class="form-control " value="" required="required"  title="">
                </div>

            </div>
            <div class="dropdown-contact ">
                <div class="input-group input-thunhap ">
                    <span class="input-group-addon "><i class="glyphicon glyphicon-usd "></i></span>
                    <input id="thuNhap " type="number" class="form-control " name="thuNhap" placeholder=" thu nhập 1 tháng - Ví dụ 25,000,000 ">
                </div>
                <select name="hoKhau" id="hoKhau" class="form-control select-hokhau " required="required ">
                    <option value="TP.HCM">TP.HCM</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Long An">Long An</option>
                    <option value="Tỉnh khác">Tỉnh khác</option>
                </select>
                <select name="CIC" id="CIC" class="form-control select-CIC " required="required ">
                    <option value="Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)">Tốt (không có nợ chú ý, không nợ xấu, không quá hạn thẻ)</option>
                    <option value="Có nợ chú ý (nợ nhóm 2)">Có nợ chú ý (nợ nhóm 2)</option>
                    <option value="Nợ nhóm 3 trở lên">Nợ nhóm 3 trở lên</option>
                </select>
                <select name="phapLy" id="phapLy" class="form-control select-phaply " required="required ">
                    <option value="Độc thân">Độc thân</option>
                    <option value="Đã kết hôn">Đã kết hôn</option>
                    <option value="Ly hôn">Ly hôn</option>
                    <option value="Khác">Khác</option>
                </select>

            </div>
            <div class="button-contact-cha ">
                <button type="submit" class="submit-contact btn btn-primary " name="send">Gửi thông tin</button>
            </div>
        </form>
    </div>

    <p>Fuck Bank</p>
    <!-- Site footer -->
    <?php include "./include/footer.php"?>

    <!-- jQuery -->
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
</body>

</html>