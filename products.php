<?php
    session_start();
?>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($conn,"SELECT * FROM products WHERE code='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$category = $row['category'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
    'category'=>$category,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
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
                        <li class="nav-item"><a href="products.php" class="nav-link px-2 text-secondary">Products</a></li>
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
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+2 <span class="visually-hidden">unread messages</span>
                            </span>
                        </button></a>
                        
                    </div>
                </div>
            </nav>
        </div>
    </header>


      <!-- Main Content -->
      <main class="container mt-5 mb-5 pt-5">
        <h1 class="mb-4 mt-4">Our Furniture Collection</h1>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <select id="sortSelect" class="form-select">
                    <option value="">Sort by</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="name-asc">Name: A to Z</option>
                    <option value="name-desc">Name: Z to A</option>
                </select>
            </div>
            <div class="col-md-4">
                <select id="categoryFilter" class="form-select">
                    <option value="">All Categories</option>
                    <option value="living-room">Living Room</option>
                    <option value="bedroom">Bedroom</option>
                    <option value="dining-room">Dining Room</option>
                    <option value="office">Office</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
                    <button class="btn btn-outline-secondary" type="button" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>


        <div id="productList" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Product cards will be dynamically inserted here -->
        </div>
    </main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample product data

            const products = [
                <?php

            $result = mysqli_query($conn,"SELECT * FROM products");
            while($row = mysqli_fetch_assoc($result)){ ?>

                { id: <?php echo $row['id'] ?>, name: "<?php echo $row['name'] ?>", code: <?php echo $row['code'] ?>, price: <?php echo $row['price'] ?>, category: "<?php echo $row['category'] ?>", image: "<?php echo $row['image'] ?>" }, 
                
                <?php } ?>

                
            ];

        // const products = [
        //     { id: 1, name: "Modern Sofa", price: 50, category: "living-room", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 2, name: "Dining Table Set", price: 75, category: "dining-room", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 3, name: "Office Desk", price: 40, category: "office", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 4, name: "Queen Size Bed", price: 60, category: "bedroom", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 5, name: "Bookshelf", price: 30, category: "living-room", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 6, name: "Wardrobe", price: 55, category: "bedroom", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 7, name: "Coffee Table", price: 25, category: "living-room", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        //     { id: 8, name: "Office Chair", price: 35, category: "office", image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fHww" },
        // ];

        function renderProducts(productsToRender) {
            const productList = document.getElementById('productList');
            productList.innerHTML = '';
            productsToRender.forEach(product => {
                const productCard = `
                    <div class="col">
                        <div class="card h-100">
                            <img src="${product.image}" class="card-img-top" alt="${product.name}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">Category: ${product.category}</p>
                                <p class="card-text"><strong>Rental Price:</strong> $${product.price}/month</p>
                                <form class="inline-block">
                                <input type='hidden' name='code' value='${product.code}' />
                                <a href="product1.php"><button class="btn btn-primary mt-auto me-4"  >Open Listing</button></a>
                                
                                <a href="cart.php"><button type="submit"  class="btn btn-primary mt-auto my-auto"  >Add To Cart</button></a>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                productList.innerHTML += productCard;
            });
        }

        function filterAndSortProducts() {
            let filteredProducts = [...products];
            const categoryFilter = document.getElementById('categoryFilter').value;
            const sortOption = document.getElementById('sortSelect').value;
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();

            if (categoryFilter) {
                filteredProducts = filteredProducts.filter(product => product.category === categoryFilter);
            }

            if (searchTerm) {
                filteredProducts = filteredProducts.filter(product => 
                    product.name.toLowerCase().includes(searchTerm) || 
                    product.category.toLowerCase().includes(searchTerm)
                );
            }

            switch (sortOption) {
                case 'price-asc':
                    filteredProducts.sort((a, b) => a.price - b.price);
                    break;
                case 'price-desc':
                    filteredProducts.sort((a, b) => b.price - a.price);
                    break;
                case 'name-asc':
                    filteredProducts.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                case 'name-desc':
                    filteredProducts.sort((a, b) => b.name.localeCompare(a.name));
                    break;
            }

            renderProducts(filteredProducts);
        }

        // Event listeners
        document.getElementById('sortSelect').addEventListener('change', filterAndSortProducts);
        document.getElementById('categoryFilter').addEventListener('change', filterAndSortProducts);
        document.getElementById('searchButton').addEventListener('click', filterAndSortProducts);
        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                filterAndSortProducts();
            }
        });

        // Initial render
        renderProducts(products);
    </script>



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