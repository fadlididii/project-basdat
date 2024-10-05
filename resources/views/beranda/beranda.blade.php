<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="{{ asset('beranda_assets/favicon.png') }}">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('beranda_assets/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('beranda_assets/fonts/flaticon/font/flaticon.css') }}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="{{ asset('beranda_assets/css/tiny-slider.css') }}">
	<link rel="stylesheet" href="{{ asset('beranda_assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('beranda_assets/css/glightbox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('beranda_assets/css/style.css') }}">

	<link rel="stylesheet" href="{{ asset('beranda_assets/css/flatpickr.min.css') }}">

	<title>Sodaqo Mart</title>

</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="#" class="logo m-0 float-start">Sodaqo Mart<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center ">
                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#about-us">About Us</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                                <li><a href="#team">Team</a></li> 
						</div>
						<div class="col-2 text-end">
							<!-- Tombol Login -->
							<a href="{{ route('login') }}" class="btn btn-warning btn-sm rounded-pill">
								<span class="icon-user"></span> Login
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="hero overlay">
		<img src="{{ asset('beranda_assets/images/blob.svg') }}"alt="" class="img-fluid blob">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5">
					<h1 class="heading text-white mb-3" data-aos="fade-up">Sodaqo Mini Mart</h1>
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Sodaqo Mart adalah sebuah mini market yang mengusung konsep sosial, di mana setiap transaksi belanja Anda ikut berkontribusi dalam kegiatan amal dan sedekah. Belanja kita. Sedekah kita.</p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="{{ route('login') }}" class="btn btn-outline-white-reverse me-4">Login</a>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="img-wrap">
						<img src="{{ asset('beranda_assets/images/sodaqo.jpg_large') }}" alt="Image" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>


    <div class="section py-5" id="about-us">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Bagian Gambar -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('beranda_assets/images/sodaqo_m.jpg') }}" alt="Image" class="img-fluid rounded w-75">
                </div>

                <!-- Bagian Teks -->
                <div class="col-lg-5">
                    <div>
                        <h2 class="text-black h4 mb-4">About Us</h2>
                        <p>Sodaqo merupakan salah satu perwujudan wakaf produktif dari Global Wakaf ACT. Selain itu, produk karya UMKM binaan ACT yang selama ini mendapatkan kesulitan dalam hal pemasaran, dengan adanya Sodaqo diharapkan dapat terbantukan. Sodaqo bisa menjadi etalase penjualan dari produk-produk karya anak negeri.</p>
                        <p>Dengan berbelanja di Sodaqo, 30% dari keuntungan akan disedekahkan bagi anak-anak yatim piatu, kaum dhuafa, dan kaum cacat (disabilitas). Jumlah sedekah dari total pembelanjaan akan tercatat di struk belanja pembeli.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section sec-features">
        <div class="container">
            <div class="row g-5">
                <!-- Number of Branches -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature d-flex">
                        <span class="bi-shop"></span>
                        <div>
                            <h3>40+ Branches</h3>
                            <p>Sodaqo Mart kini hadir di 40 lebih lokasi strategis di seluruh Indonesia.</p>
                        </div>
                    </div>
                </div>
                <!-- Products Sold -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <span class="bi-cart-fill"></span>
                        <div>
                            <h3>10,000+ Products Sold</h3>
                            <p>lebih dari 10.000 produk terjual.</p>
                        </div>
                    </div>
                </div>
                <!-- Employees -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <span class="bi-people-fill"></span>
                        <div>
                            <h3>100+ Employees</h3>
                            <p>Lebih dari 100 karyawan berdedikasi bekerja setiap hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="section sec-testimonial bg-light" id="testimonials">
	<div class="container">
		<div class="row mb-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<h2 class="heading text-primary">Testimonials</h2>
			</div>

		</div>


		<div class="testimonial-slider-wrap">
			<div class="testimonial-slider" id="testimonial-slider">
                <div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{ asset('beranda_assets/images/sodaqo2.jpg') }}')">

						</div>
						<div class="text">
							<blockquote>
								<p>Tempat belanja yg islami... Berbelanja sekaligus bersedekah dari apa yg kita belanjakan... Parkir yg nyaman dan pelayanan toko yg ramah...</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">hendro ryhs69</strong>
								<span>Customers</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{ asset('beranda_assets/images/sodaqo1.jpg') }}')">
						</div>
						<div class="text">
							<blockquote>
								<p>Tempat nya bagus, rapi, dan harganya 1000 lebih murah dari alfamart maupun Indomaret, harga di meja dgn di kasih juga cocok, pelayanan oke pokoknya mantap dah lebih baik belanja di sodakoh mart ketimbang belanja bumbu2 di alfamart maupun Indomaret, dan bila laper juga ada yg jual soto di dpn nya tambah kumplit......</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">game open world</strong>
								<span>Customers</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('{{ asset('beranda_assets/images/sodaqo3.jpg') }}')">

						</div>
						<div class="text">
							<blockquote>
								<p>Local small to mid. minimarket, with good vibes. They have local goods, and it is pretty cheap comparing to other known FnBs market. You wont see lots of famous product here, but SME's products are more likeable.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">M Gilang Toni Patmadiwiria</strong>
								<span>Customers</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="section sec-cta overlay" style="background-image: url('images/img-3.jpg')">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5" data-aos="fade-up" data-aos-delay="0">
				<h2 class="heading">Wanna Talk To Us?</h2>
				<p>Hubungi kami dan berkontribusi dalam kebaikan bersama Sodaqo Mart.</p>
			</div>
			<div class="col-lg-5 text-end" data-aos="fade-up" data-aos-delay="100">
				<a href="#" class="btn btn-outline-white-reverse" onclick="confirmWhatsApp()">Contact us</a>>
			</div>
		</div>
	</div>
</div>


<div class="section sec-team" id="team">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-7">
				<h2 class="heading text-primary">Our Team</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3">
				<div class="card post-entry">
					<img src="{{ asset('beranda_assets/images/fadli.jpg') }}" class="card-img-top" alt="Team Member 1">
					<div class="card-body text-center">
						<h5 class="card-title">Fadli Muhammad</h5>
						<p>Airlangga University</p>
                        <p>164221081</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card post-entry">
					<img src="{{ asset('beranda_assets/images/kyla.jpg') }}" class="card-img-top" alt="Team Member 2">
					<div class="card-body text-center">
						<h5 class="card-title">Kyla Belva Queena</h5>
						<p>Airlangga University</p>
                        <p>164221015</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card post-entry">
					<img src="{{ asset('beranda_assets/images/zidan.jpg') }}" class="card-img-top" alt="Team Member 3">
					<div class="card-body text-center">
						<h5 class="card-title">Zhiddan Aditya M.</h5>
						<p>Airlangga University</p>
                        <p>164221086</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card post-entry">
					<img src="{{ asset('beranda_assets/images/nadila.jpg') }}" class="card-img-top" alt="Team Member 4">
					<div class="card-body text-center">
						<h5 class="card-title">Nadila Fitri N.</h5>
						<p>Airlangga University</p>
                        <p>164221006</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="site-footer">
	<div class="container">

		<div class="row mt-5">
			<div class="col-12 text-center">
					<!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>

    <script>
        function confirmWhatsApp() {
            var result = confirm("Apakah Anda yakin ingin menghubungi kami melalui WhatsApp?");
            if (result) {
                window.location.href = "https://wa.me/6285892303290"; 
            }
        }
    </script>

    <script src="{{ asset('beranda_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('beranda_assets/js/tiny-slider.js') }}"></script>

    <script src="{{ asset('beranda_assets/js/flatpickr.min.js') }}"></script>

    <script src="{{ asset('beranda_assets/js/aos.js') }}"></script>
    <script src="{{ asset('beranda_assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('beranda_assets/js/navbar.js') }}"></script>
    <script src="{{ asset('beranda_assets/js/counter.js') }}"></script>
    <script src="{{ asset('beranda_assets/js/custom.js') }}"></script>

  </body>
  </html>
