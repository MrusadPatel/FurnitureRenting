

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .footer {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    
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



<!-- main content -->
<div class="container mt-5  pt-5">
        <h1 class="mb-4 mt-3">Shopping Cart</h1>
        
        <div class="row">
            <!-- Left side: Product list -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/api/placeholder/200/200" class="img-fluid rounded-start" alt="Product 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product 1</h5>
                                <p class="card-text">Description of Product 1</p>
                                <p class="card-text"><strong>Price: $19.99</strong></p>
                                <div class="d-flex align-items-center">
                                    <label for="quantity1" class="me-2">Quantity:</label>
                                    <input type="number" id="quantity1" class="form-control w-25" value="1" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/api/placeholder/200/200" class="img-fluid rounded-start" alt="Product 2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product 2</h5>
                                <p class="card-text">Description of Product 2</p>
                                <p class="card-text"><strong>Price: $29.99</strong></p>
                                <div class="d-flex align-items-center">
                                    <label for="quantity2" class="me-2">Quantity:</label>
                                    <input type="number" id="quantity2" class="form-control w-25" value="1" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right side: Order summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>$49.98</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <strong>$5.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax</span>
                                <strong>$4.50</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>$59.48</strong>
                            </li>
                        </ul>
                        <a href="checkout.php"><button class="btn btn-primary w-100">Proceed to Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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