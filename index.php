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
                        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                        <li class="nav-item"><a href="products.php" class="nav-link px-2 text-white">Products</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link px-2 text-white">About</a></li>
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


    <!-- this is main corousel -->
<main class="mt-1">
    
<div id="myCarousel" class="carousel slide mb-6 mt-2 " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item">
    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZnVybml0dXJlfGVufDB8fDB8fHww" style="height: 600px;" class="d-block  w-100" alt="...">
      <div class="container">
        <div class="carousel-caption text-start">
          <h1>Example headline.</h1>
          <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
          <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZnVybml0dXJlfGVufDB8fDB8fHww" style="height: 600px;" class="d-block w-100" alt="...">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
          <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item active">
    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZnVybml0dXJlfGVufDB8fDB8fHww" style="height: 600px;" class="d-block w-100" alt="...">
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>One more for good measure.</h1>
          <p>Some representative placeholder content for the third slide of this carousel.</p>
          <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
</main>



    <!-- featured product section -->

    <div class="container my-5">
        <h1 class="text-center mb-5">Popular Products</h1>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Furniture Item 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Modern Sofa">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Modern Sofa</h5>
                        <p class="card-text">Sleek and comfortable 3-seater sofa, perfect for contemporary living rooms.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $50/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Dining Table Set">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dining Table Set</h5>
                        <p class="card-text">Elegant wooden dining table with 6 chairs, suitable for family dinners.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $75/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-warning text-dark">Limited Availability</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Office Desk">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Office Desk</h5>
                        <p class="card-text">Spacious office desk with drawers, ideal for home office setups.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $40/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-danger">Out of Stock</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 4 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Bookshelf">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bookshelf</h5>
                        <p class="card-text">Tall bookshelf with adjustable shelves, perfect for organizing books and decor.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $30/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- sale product section -->

    <div class="container my-5">
        <h1 class="text-center mb-5">Currently On Sale</h1>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Furniture Item 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Modern Sofa">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Modern Sofa</h5>
                        <p class="card-text">Sleek and comfortable 3-seater sofa, perfect for contemporary living rooms.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $50/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Dining Table Set">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Dining Table Set</h5>
                        <p class="card-text">Elegant wooden dining table with 6 chairs, suitable for family dinners.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $75/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-warning text-dark">Limited Availability</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Office Desk">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Office Desk</h5>
                        <p class="card-text">Spacious office desk with drawers, ideal for home office setups.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $40/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-danger">Out of Stock</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
            
            <!-- Furniture Item 4 -->
            <div class="col">
                <div class="card h-100">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Bookshelf">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Bookshelf</h5>
                        <p class="card-text">Tall bookshelf with adjustable shelves, perfect for organizing books and decor.</p>
                        <p class="card-text"><strong>Rental Price:</strong> $30/month</p>
                        <p class="card-text"><strong>Status:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="product1.php"><button class="btn btn-primary mt-auto"  >Open Listing</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- promises section -->
    <section class="my-lg-14 my-8 mt-5 mb-5">
            <div class="container">
               <div class="row">
                 
                  <div class="col-md-4 col-lg-4">
                     <div class="mb-8 mb-xl-0">
                        <div class="mb-6"><img src="assets/images/icons/gift.svg" alt=""></div>
                        <h3 class="h5 mb-3">Best Prices &amp; Offers</h3>
                        <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best pricess &amp; offers.</p>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                     <div class="mb-8 mb-xl-0">
                        <div class="mb-6"><img src="assets/images/icons/package.svg" alt=""></div>
                        <h3 class="h5 mb-3">Wide Assortment</h3>
                        <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg &amp; other categories.</p>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4">
                     <div class="mb-8 mb-xl-0">
                        <div class="mb-6"><img src="assets/images/icons/refresh-cw.svg" alt=""></div>
                        <h3 class="h5 mb-3">Easy Returns</h3>
                        <p>
                           Not satisfied with a product? Return it at the doorstep &amp; get a refund within hours. No questions asked
                           <a href="#!">policy</a>
                           .
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </section>


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