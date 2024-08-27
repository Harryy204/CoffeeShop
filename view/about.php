<head>
    <title>Giới Thiệu</title>
    <style>
        .background{
    position: relative;
    background-image: url('../images/background.avif');
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    /* z-index: -1; */
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 0; 
}

.content-section {
    position: relative;
    padding: 60px 0;
    z-index: 1;
}

.content-section h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.content-section p {
    font-size: 18px;
    margin-bottom: 20px;
}

.content-section img {
    max-width: 90%;
    border: 2px solid #ddd;
    border-radius: 5px;
    transition: transform 0.3s;
}

.content-section img:hover {
    transform: scale(1.1);
}

.image-gallery {
    position: relative;
    padding: 60px 0;
    z-index: 1;
}

.image-gallery img {
    max-width: 100%;
    border: 2px solid #ddd;
    border-radius: 5px;
    margin: 10px;
    transition: transform 0.3s;
}

.image-gallery img:hover {
    transform: scale(1.1);
}
    </style>
</head>

<body>
    <!-- header -->
    <?php 
    // include './layout/header.php' 
    ?>
    <!-- nội dung -->
<div class="background">
    <div class="overlay"></div>
    <section class="content-section container text-white">
        <div class="row">
            <div class="col-lg-6">
                <h2>1.Nguồn Gốc</h2>
                <p>
                    Được thành lập vào năm 2023.
                    Coffee Shop là nơi bạn có thể thư giãn và thưởng thức cà phê tuyệt vời. Chúng tôi tự hào cung cấp cà phê chất lượng cao và phục vụ bạn mỗi ngày.
                </p>
                <a href="index.php?act=history"><button type="button" class="btn btn-outline-danger">Xem chi tiết</button></a>
            </div>
            <div class="col-lg-6">
                <img src="./images/shop.jpg" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="content-section container text-white">
        <div class="row">
            <div class="col-lg-6">
                <img src="./images/nguyenlieu.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h2>2.Nguồn Nguyên Liệu</h2>
                <p>
                    Được chế biến từ cà phê Robusta nguyên chất có mùi thơm socola đặc trưng mang đến cho người dùng trải nghiệm chuẩn mực của cà phê thứ thiệt bởi vị đắng đậm đà, thơm nhẹ, hàm lượng caffeine vừa đủ.
                </p>
                <a href="index.php?act=origin"><button type="button" class="btn btn-outline-danger">Xem chi tiết</button></a>
            </div>
        </div>
    </section>

    <section class="content-section container text-white">
        <div class="row">
            <div class="col-lg-6">
                <h2>3.Sứ Mệnh</h2>
                <p>
                    Sứ mệnh của chúng tôi là khơi nguồn cảm hứng và nuôi dưỡng tinh thần, một cốc cà phê vào buổi sáng sẽ giúp bạn có một ngày học tập và làm việc tràn đầy năng lượng.
                </p>
                <a href="index.php?act=mission"><button type="button" class="btn btn-outline-danger">Xem chi tiết</button></a>
            </div>
            <div class="col-lg-6">
                <img src="./images/sumenh.jpg" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="image-gallery container text-white"> 
        <h2>Hình ảnh cửa hàng</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="./images/shop1.jpg" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="./images/shop2.jpg" class="img-fluid">
            </div>
            <div class="col-md-4">
                <img src="./images/shop3.jpg" class="img-fluid">
            </div>
        </div>
    </section>
</div>
    <!-- footer -->
    <?php 
    // include './layout/footer.php'
    ?>

