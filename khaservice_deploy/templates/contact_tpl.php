    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Liên hệ</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact us area start -->
    <section class="contact-options pt-95 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-left text-md-center relative z-5 mb-40 ">
                        <h5 class="line-head mb-15 ">
                          <span class="line before d-none d-md-block"></span>
                            Liên hệ với chúng tôi
                          <span class="line after"></span>
                        </h5>
                        <h1 class="">Thông tin liên hệ</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex mb-sm-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="fas fa-phone-volume green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Phone & Hotline</h5>
                            <p class="mb-0">Tel: <?=$row_setting['dienthoai']?></p>
                            <p class="mb-0">Hotline: <?=$row_setting['hotline']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex mb-sm-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="far fa-envelope green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Email</h5>
                            <p class="mb-0">Email: <?=$row_setting['email']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex  mt-md-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="fas fa-map-marker-alt green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Address</h5>
                            <p><?=$row_setting['diachi_vi']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact us area end -->

    <!-- Contact form area end -->
    <section class="contact-form  bg-light-white pt-100 pb-100" style="background-image: url('img/bg/bg-abt.jpg');" data-overlay="7">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40">
                        <h5 class="line-head mb-15 ">
                            <span class="line before "></span>
                            Gửi tin nhắn cho chúng tôi
                            <span class="line after"></span>
                        </h5>
                        <h1 class="mb-5">Liên hệ với chúng tôi</h1>
                        <p class="small-p">Vui lòng điền thông tin theo form dưới đây. Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="index.php?com=lien-he" method="post" class="relative z-5 mt-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="text" class="form-control input-lg input-white shadow-5" id="name" name="name" placeholder="Họ & Tên" required>
                                    <i class="far fa-user transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="email" class="form-control input-lg input-white shadow-5" id="email" name="email" placeholder="Email" required>
                                    <i class="far fa-envelope transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="text" class="form-control input-lg input-white shadow-5" id="phone" name="phone" placeholder="Số điện thoại">
                                    <i class="fas fa-mobile-alt transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <textarea class="form-control input-white shadow-5" name="message" id="message" cols="30" rows="7" placeholder="Lời nhắn"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mt-30">
                                <button type="submit" name="btnContact" class="btn btn-square  blob-small">GỬI<i class="fas fa-long-arrow-alt-right ml-20"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact form area end -->

    <!-- cta area start -->
    <section class="cta pt-50 pb-50" style="background-image: url('img/bg/bg_cta.jpg');" data-overlay="9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-5 mb-md-20 text-center text-lg-left">
                    <h3 class="z-5 white f-700 lh-18 wow fadeInLeft">
                        Bạn đang có nhu cầu về dịch vụ nào?
                        <span class="green italic">Liên hệ ngay</span>
                    </h3>
                </div>
                <div class="col-xl-8 col-lg-7 text-center text-lg-right z-5">
                    <a href="mailto:<?=$row_setting['email']?>" class="btn btn-square-white mr-20 mr-xs-00 d-block d-sm-inline-block mb-xs-15 wow fadeInUp">
                        <i class="fas fa-envelope mr-15"></i><?=$row_setting['email']?>
                    </a>
                    <a href="tel:<?=$row_setting['hotline']?>" class="btn btn-square-green d-block d-sm-inline-block blob-small wow fadeInUp">
                        <i class="fas fa-phone mr-15"></i><?=$row_setting['hotline']?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta area end -->