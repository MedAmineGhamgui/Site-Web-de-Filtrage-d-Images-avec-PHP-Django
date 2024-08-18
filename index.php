<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image-Uploader</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;

        }

        h1 {
            font-family: Satisfy;
            font-size: 50px;
            text-align: center;
            color: black;
            padding: 1%;
        }

        #gallery {
            -webkit-column-count: 4;
            -moz-column-count: 4;
            column-count: 4;

            -webkit-column-gap: 20px;
            -moz-column-gap: 20px;
            column-gap: 20px;
        }

        @media (max-width:1200px) {
            #gallery {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;

                -webkit-column-gap: 20px;
                -moz-column-gap: 20px;
                column-gap: 20px;
            }
        }

        @media (max-width:800px) {
            #gallery {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;

                -webkit-column-gap: 20px;
                -moz-column-gap: 20px;
                column-gap: 20px;
            }
        }

        @media (max-width:600px) {
            #gallery {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }

        #gallery img,
        #gallery video {
            width: 100%;
            height: auto;
            margin: 4% auto;
            box-shadow: -3px 5px 15px #000;
            cursor: pointer;
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        .modal-img,
        .model-vid {
            width: 100%;
            height: auto;
        }

        .modal-body {
            padding: 0px;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Image-Uploader</h1>
        </a>


        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
            </div>
            <a href="index.html" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">
                    <Image-Uploader></Image-Uploader>
                </h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <a href="project.html" class="nav-item nav-link">Projects</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->

    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h3 class="text-primary text-uppercase mb-2 animated slideInDown">Welcome To Image-Uploader</h3>
                    <p>Your images have never looked better</p>


                    <div class="d-flex align-items-center pt-4 animated slideInDown">

                        <?php if (isset($_GET['error'])) : ?>
                            <p><?php echo $_GET['error']; ?></p>
                        <?php endif ?>
                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="my_image">
                            <input type="submit" name="submit" value="Upload">

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="img/lion.jpg" alt="">

                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="img/hero-4.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->

    <!-- Video Modal End -->


    <!-- About Start -->

    <!-- About End -->


    <!-- Facts Start -->

    <!-- Facts End -->


    <!-- Service Start -->
    <!-- Service End -->



    <!-- hnnnaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <p class="text-primary text-uppercase mb-2">voici notre</p>
        <h1 class="display-6 mb-0">Gallerie</h1>
    </div>
    <hr>

    <div id="gallery" class="container-fluid">
        <?php

        include 'connection.php';
        $cart = array();
        $sql = "SELECT * FROM `images` WHERE 1 ORDER by id DESC";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {
                array_push($cart, $images);

        ?>
                <a href="test100.php">
                    <img onclick="aa(<?= $images['id'] ?>)" src="TestWebApi/api/images/<?= $images['image_url'] ?>" class="img-responsive">

                </a>


        <?php }
        } ?>

    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                </div>
            </div>

        </div>
    </div>

    <!-- Project End -->


    <!-- Team Start -->

    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 mt-5 py-5 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row g-5 py-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="display-5 text-primary">Image-Uploader</h1>

                </a>
                <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam sed clita dolore eos dolores magna erat dolore sed stet justo et dolor.</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Our Services</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">Popular Links</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Our Services</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="text-light mb-4">Newsletter</h4>
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 bg-secondary" style="padding: 20px 30px;" placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">

            </div>
            <div class="py-4 px-5 bg-secondary footer-shape position-relative text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->

            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="main.js"></script>
</body>



</html>


<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
    function aa(a) {
        //alert(a)
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: {
                text1: a
            },
            success: function(response) {
                $('#result').html(response);
                console.log(response)
            }
        });
    }

    $(document).ready(function() {
        $("img").click(function() {
            var t = $(this).attr("src");
            $(".modal-body").html("<img src='" + t + "' class='modal-img'>");
            $("#myModal").modal();
        });

        $("video").click(function() {
            var v = $("video > source");
            var t = v.attr("src");
            $(".modal-body").html("<video class='model-vid' controls><source src='" + t + "' type='video/mp4'></source></video>");
            $("#myModal").modal();
        });
    }); //EOF Document.ready
</script>