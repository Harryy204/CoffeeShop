<head>
    <title>Liên Hệ</title>
    <style>
    .background{
    background-image: url('../images/background.avif');
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    position: relative;
    z-index: -1;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 0;
}

.contact-section {
    margin-top: 0;
    padding: 60px 0;
    position: relative;
    z-index: 1;
}
.form .row{
    text-align: center;
    align-items: center;
}
.form .row h3{
    color: black;
}
.form .row .box img{
    width: 200px;
}
.col-md-6 form{
    padding-top: 120px;
}
    </style>
</head>

<body>
    <!-- liên hệ -->
    <div class="background">
        <h2 class="bg-light text-dark text-center p-2 border-bottom">Liên Hệ Với Chúng Tôi</h2>
        <section class="contact-section container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/contact-img.svg" class="img-fluid mb-3">
                </div>
                <div class="col-md-6">
                    <form action="" method="post" class="mt-5">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control p-2" placeholder="Nhập tên của bạn" required maxlength="50">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="number" class="form-control p-2" placeholder="Nhập số điện thoại của bạn" required maxlength="10">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control p-2" placeholder="Nhập địa chỉ email của bạn" required maxlength="50">
                        </div>
                        <div class="mb-3">
                            <textarea name="msg" class="form-control p-2" required placeholder="Nhập phản hồi của bạn..." maxlength="500" rows="5"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn btn-primary">Gửi tin nhắn</button>
                    </form>
                </div>
            </div>
            <hr></hr>
            <div class="form">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box bg-white p-3">
                            <img src="images/email-icon.png" alt="">
                            <h3>Email của chúng tôi</h3>
                            <a href="#" class="text-decoration-none text-dark">coffee@gmail.com</a><br>
                            <a href="#" class="text-decoration-none text-dark">coffee@shop.com</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box bg-white p-3">
                            <img src="images/clock-icon.png" alt="">
                            <h3>Giờ mở cửa</h3>
                            <p class="text-black">Từ 6h-23h30</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box bg-white p-3">
                            <img src="images/map-icon.png" alt="">
                            <h3>Địa chỉ quán</h3>
                            <a href="#" class="text-decoration-none text-dark">123, Đà Nẵng</a><br>
                            <a href="#" class="text-decoration-none text-dark">234, Đà Nẵng</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box bg-white p-3">
                            <img src="images/phone-icon.png" alt="">
                            <h3>Điện thoại</h3>
                            <a href="#" class="text-decoration-none text-dark">0123.456.788</a><br>
                            <a href="#" class="text-decoration-none text-dark">0123.456.789</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </section>
    </div>
