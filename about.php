<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Rental Catalog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .footer {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
    <!-- this is header -->

    <header class="p-3 fixed-top text-bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a href="/" class="navbar-brand d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li class="nav-item"><a href="products.php" class="nav-link px-2 text-white">Products</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link px-2 text-secondary">About</a></li>
                    </ul>

                    <form class="d-flex mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="text-end " style="display: flex;" >

                        <?php 
                        if (isset($_SESSION['user_id'])) {  ?>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <?php echo $_SESSION['username']; ?>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">My Account</a></li>
                                  <li><a class="dropdown-item" href="#">Whishlist</a></li>
                                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                              </div>
                        <?php
                        }
                        else {
                        ?>

                        <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>

                        <?php  }  ?>


                        <a href="cart.php"><button type="button" class="btn btn-primary position-relative">Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+0<span class="visually-hidden">unread messages</span>
                            </span>
                        </button></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


      <!-- Main Content -->
      <main class="container mt-5 pt-5">
        <section class="row mb-5 mt-5">
            <div class="col-md-6">
                <h1 class="display-4 mb-3">About Ahmedabad Furniture Rental</h1>
                <p class="lead">Transforming spaces with style and convenience since 2010.</p>
                <p>Located in the heart of Ahmedabad, Gujarat, we've been serving our community with high-quality furniture rentals for over a decade. Our passion for design and commitment to customer satisfaction have made us a trusted name in the industry.</p>
            </div>
            <div class="col-md-6">
                <img src="https://media.istockphoto.com/id/1350859272/photo/luxury-furniture-goods.jpg?s=612x612&w=0&k=20&c=XOqf7YV73QzWE2civf53imMOqh96-dtf6okicqszRWQ=" alt="Our showroom" class="img-fluid rounded">
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4">Our Values</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <i class="fas fa-star fa-3x mb-3 text-primary"></i>
                        <h3>Quality</h3>
                        <p>We offer only the finest furniture pieces, ensuring durability and style.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <i class="fas fa-handshake fa-3x mb-3 text-primary"></i>
                        <h3>Customer Service</h3>
                        <p>Our team is dedicated to providing exceptional service at every step.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <i class="fas fa-leaf fa-3x mb-3 text-primary"></i>
                        <h3>Sustainability</h3>
                        <p>We're committed to eco-friendly practices in our operations.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4">Why Choose Us?</h2>
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Wide range of high-quality furniture</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Flexible rental terms</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Prompt delivery and setup</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Excellent customer support</li>
                    <li class="list-group-item"><i class="fas fa-check text-success me-2"></i>Competitive pricing</li>
                </ul>
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4">Our Team</h2>
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <img src="/api/placeholder/150/150" alt="Team Member 1" class="rounded-circle mb-3">
                        <h4>Amit Patel</h4>
                        <p class="text-muted">Founder & CEO</p>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <img src="/api/placeholder/150/150" alt="Team Member 2" class="rounded-circle mb-3">
                        <h4>Priya Sharma</h4>
                        <p class="text-muted">Design Consultant</p>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <img src="/api/placeholder/150/150" alt="Team Member 3" class="rounded-circle mb-3">
                        <h4>Rajesh Mehta</h4>
                        <p class="text-muted">Customer Relations Manager</p>
                    </div>
                </div>
            </div>
        </section>
    </main>


     <!-- this is footer -->

     <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">About Us</h5>
                    <p class="text-muted">We provide high-quality furniture rentals for homes and offices. Our mission is to make beautiful spaces accessible to everyone.</p>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Catalog</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">How It Works</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-4">
                    <h5 class="fw-bold mb-3">Support</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">FAQ</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Contact Us</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 text-muted"><i class="fas fa-map-marker-alt me-2"></i> 123 Furniture St, City, Country</li>
                        <li class="mb-2 text-muted"><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2 text-muted"><i class="fas fa-envelope me-2"></i> info@furniturerent.com</li>
                    </ul>
                    <div class="mt-3">
                        <a href="#" class="text-muted me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-muted me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-linkedin fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">&copy; 2024 Furniture Rental. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>