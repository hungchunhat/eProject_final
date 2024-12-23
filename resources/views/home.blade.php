<x-layout>
    @auth
        <div style="background-color: #e03a3c;color: white;text-align: center">Hello {{Auth::user()->name}}</div>
    @endauth
    {{--        <div id="realtime-users" class="bg-black">--}}
    {{--            Viewer count: <span id="page-views-count">{{$views}}</span>--}}
    {{--        </div>--}}
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <img src="storage/images/TheCreationofAdam.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 data-aos="fade-up" data-aos-delay="100">
                        Bettter digital experience with BidSpirit
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200">
                        Join the leading platform for seamless and efficient e-auctions worldwide.
                    </p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="/auctions" class="btn-get-started">Explore Auctions</a>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- About us Section -->
    <section id="about" class="about section ">
        <div class="container position-relative">
            <div class="row gy-5">
                <div
                    class="content col-xl-5 d-flex flex-column"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <h3>About Us</h3>
                    <p>
                        We are a leading online auction platform connecting collectors, art
                        enthusiasts, and experts worldwide. With a mission to foster the
                        growth of the art auction market, we provide a trustworthy and
                        inspiring experience for buying and selling unique items.
                    </p>
                    <a href="#" class="about-btn align-self-center align-self-xl-start"
                    ><span>About us</span> <i class="bi bi-chevron-right"></i
                        ></a>
                </div>

                <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-binoculars"></i>
                            <h4>
                                <a href="" class="stretched-link">Our Vision and Mission</a>
                            </h4>
                            <p>
                                To become a reliable bridge linking collectors with unique
                                and valuable items globally.
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-gift"></i>
                            <h4>
                                <a href="" class="stretched-link">What We Offer</a>
                            </h4>
                            <p>
                                Diverse Categories: Art, antiques, furniture, collectibles,
                                and many other special categories
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-shield-check"></i>
                            <h4>
                                <a href="" class="stretched-link">Our Commitments</a>
                            </h4>
                            <p>
                                All items are verified and displayed with detailed
                                information. We prioritize the interests of our customers
                                and the art community.
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-map"></i>
                            <h4>
                                <a href="" class="stretched-link"
                                >Your Journey, Our Values</a
                                >
                            </h4>
                            <p>
                                We believe that every item is not just a product but a
                                story, a cultural, and a spiritual value. Join us to
                                explore, participate in auctions, and create memorable
                                moments in your collecting journey.
                            </p>
                        </div>
                        <!-- Icon-Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="services section section-bg dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Our service</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-clock icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"
                                >Real-Time Auctions</a
                                >
                            </h4>
                            <p class="description">
                                Experience dynamic, real-time bidding on an advanced
                                platform that ensures fairness and transparency.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-box-seam icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"></a>
                                Diverse Collections</a
                                >
                            </h4>
                            <p class="description">
                                Explore a wide variety of items, including art, antiques,
                                furniture, and unique collectibles.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-layout-text-sidebar icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"
                                >User-Friendly Interface</a
                                >
                            </h4>
                            <p class="description">
                                Navigate with ease using our intuitive platform designed for both beginners and
                                experienced users
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-check-circle icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"
                                >Expert Authentication</a
                                >
                            </h4>
                            <p class="description">
                                All items are verified by our team of experts to ensure authenticity and quality.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-globe icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"
                                >Global Accessibility</a
                                >
                            </h4>
                            <p class="description">
                                Join auctions from anywhere in the world, connecting with collectors and sellers
                                globally.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-headset icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">
                                <a href="service-details.html" class="stretched-link"
                                >Customer Support</a
                                >
                            </h4>
                            <p class="description">
                                Our dedicated support team is available to assist you with any inquiries or issues.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
            </div>
        </div>
    </section>
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>
                Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
                velit
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div
                class="isotope-layout"
                data-default-filter="*"
                data-layout="masonry"
                data-sort="original-order"
            >
                <ul
                    class="portfolio-filters isotope-filters"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Products</li>
                    <li data-filter=".filter-product">Auction</li>
                </ul>
                <!-- End Portfolio Filters -->

                <div
                    class="row gy-4 isotope-container"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique1.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique1.png"
                                    title="App 1"
                                    data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique2.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Product 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique2.png"
                                    title="Product 1"
                                    data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique3.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Branding 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique3.png"
                                    title="Branding 1"
                                    data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique4.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Books 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique4.png"
                                    title="Branding 1"
                                    data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique5.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique5.png"
                                    title="App 2"
                                    data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique6.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Product 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique6.png"
                                    title="Product 2"
                                    data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique7.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Branding 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique7.png"
                                    title="Branding 2"
                                    data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/antique/antique8.png"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Books 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/antique/antique8.png"
                                    title="Branding 2"
                                    data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="#"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/portfolio/app-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/portfolio/app-3.jpg"
                                    title="App 3"
                                    data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="portfolio-details.html"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/portfolio/product-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Product 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/portfolio/product-3.jpg"
                                    title="Product 3"
                                    data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="portfolio-details.html"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding"
                    >
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/portfolio/branding-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Branding 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/portfolio/branding-3.jpg"
                                    title="Branding 2"
                                    data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="portfolio-details.html"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img
                                src="assets/img/portfolio/books-3.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Books 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a
                                    href="assets/img/portfolio/books-3.jpg"
                                    title="Branding 3"
                                    data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"
                                ><i class="bi bi-zoom-in"></i
                                    ></a>
                                <a
                                    href="portfolio-details.html"
                                    title="More Details"
                                    class="details-link"
                                ><i class="bi bi-link-45deg"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                </div>
                <!-- End Portfolio Container -->
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="team" class="team section section-bg dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>
                Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
                velit
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div
                    class="col-lg-3 col-md-6 d-flex align-items-stretch"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="assets/img/hung.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="member-info">
                            <h4>Nguyen Thai Hung</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div
                    class="col-lg-3 col-md-6 d-flex align-items-stretch"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="assets/img/dong.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="member-info">
                            <h4>Nguyen Duy Dong</h4>
                            <span>Developer</span>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div
                    class="col-lg-3 col-md-6 d-flex align-items-stretch"
                    data-aos="fade-up"
                    data-aos-delay="300"
                >
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="assets/img/tien.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="member-info">
                            <h4>Duong Minh Tien</h4>
                            <span>Water bringer</span>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div
                    class="col-lg-3 col-md-6 d-flex align-items-stretch"
                    data-aos="fade-up"
                    data-aos-delay="400"
                >
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="assets/img/hoang.jpg"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="member-info">
                            <h4>Nguyen Viet Hoang</h4>
                            <span>Orange cutter</span>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->
            </div>
        </div>
    </section><!-- /Team Section -->
    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>
                Leave your feedback and we will get back to you as soon as possible.
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <div
                                class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up"
                                data-aos-delay="200"
                            >
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>88/48 Ngo Gia Tu Stress, Viet Hung, Long Bien, Ha Noi</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="col-md-6">
                            <div
                                class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up"
                                data-aos-delay="300"
                            >
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+84 828.801.306</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="col-md-6">
                            <div
                                class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up"
                                data-aos-delay="400"
                            >
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>hung.nt.130601@gmail.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <form
                        action=""
                        method="post"
                        class="php-email-form"
                        data-aos="fade-up"
                        data-aos-delay="500"
                    >
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your Name"
                                    required=""
                                />
                            </div>

                            <div class="col-md-6">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Your Email"
                                    required=""
                                />
                            </div>

                            <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    placeholder="Subject"
                                    required=""
                                />
                            </div>

                            <div class="col-md-12">
                                        <textarea
                                            class="form-control"
                                            name="message"
                                            rows="4"
                                            placeholder="Message"
                                            required=""
                                        ></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>

                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section><!-- /Contact Section -->
    {{--    <x-slot:script>--}}
    {{--        <script type="module">--}}
    {{--            Echo.channel('page-views')--}}
    {{--                .listen('PageViewUpdated', (data) => {--}}
    {{--                    if (data.page === window.location.pathname) {--}}
    {{--                        document.getElementById('page-views-count').innerText = data.views;--}}
    {{--                    }--}}
    {{--                });--}}
    {{--        </script>--}}
    {{--    </x-slot:script>--}}
    <div id="ticker" class="ticker">
        <p id="ticker-content">Loading...</p>
    </div>
</x-layout>
