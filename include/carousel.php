<div id="carousel-id" class="carousel slide main-slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item">
            <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?php echo base_url();?>img/slider12.png">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Hỗ trợ tìm ngân hàng phù hợp nhu cầu</h1>
                    <p style="font-size: 20px;">-Nhập thông tin khoản vay</p>
                    <p style="font-size: 20px;">-Nhấn nút và xem gợi ý của chúng tôi</p>
                    <p><a class="btn btn-lg btn-primary" href="#input1" role="button">Tìm ngân hàng</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="<?php echo base_url();?>img/slider2.jpg">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Tiếp nhận nhu cầu vay vốn</h1>
                    <p style="font-size: 20px;">-Nhập thông tin cá nhân cơ bản</p>
                    <p style="font-size: 20px;">-Gửi lời nhắn cho chúng tôi</p>
                    <p><a class="btn btn-lg btn-primary" href="<?=base_url()?>index.php/customer" role="button">Gửi nhu cầu</a></p>
                </div>
            </div>
        </div>
        <div class="item active">
            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="<?php echo base_url();?>img/slider12.png">
            <div class="container">
                <div class="carousel-caption change-bank">
                    <h1>Hỗ trợ chuyển ngân hàng vay</h1>
                    <p style="font-size: 20px;">- Bạn đang có dư nợ tại 1 ngân hàng?</p>
                    <p style="font-size: 20px;">- Bạn muốn chuyển sang vay ở ngân hàng khác</p>
                    <p><a class="btn btn-lg btn-primary" href="<?=base_url()?>index.php/customer/changebank" role="button">Gửi nhu cầu</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

</div>