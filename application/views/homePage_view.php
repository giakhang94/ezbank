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
            include "./include/header_homepage.php";
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
                <option value="8">Vay Ô tô/Tiêu dùng</option>
            </select>
        </br>
            <select name="loai_laisuat" id="input" class="form-control select-spvay" required="required">
                <option value = "1"selected>Chọn loai lai suat</option>
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
                <h2>Danh sách Ngân hàng gợi ý</h2>
            </div>
            <hr>
            <!-- từ cái này là 1 card -->

            <!-- hết 1 card -->
        </div>
        <div class="btn-cha ">
            <button class="btn-readmore btn btn-primary ">Xem thêm ngân hàng</button>
        </div>

    </div>
    <!-- Site footer -->
    <?php include "./include/footer.php"?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
</body>

</html>