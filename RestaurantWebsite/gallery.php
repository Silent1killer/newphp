<?php
$page_title = "Gallery";
include 'includes/header.php';
?>

<!-- Gallery Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Our Gallery</h1>
                <p class="lead">Explore our restaurant atmosphere and culinary creations</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Filter -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="gallery-filter">
                    <ul class="nav nav-pills justify-content-center filter-tabs">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-filter="*">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-filter=".restaurant">Restaurant</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-filter=".food">Food</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-filter=".events">Events</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 gallery-grid">
            <!-- Instead of actual images, we're using colored SVG placeholders -->
            <!-- Restaurant Images -->
            <div class="col-md-6 col-lg-4 gallery-item restaurant">
                <div class="gallery-image-container">
                    <div class="gallery-image restaurant-1">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Elegant Dining Area</h3>
                                <p class="overlay-category">Restaurant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item restaurant">
                <div class="gallery-image-container">
                    <div class="gallery-image restaurant-2">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Private Dining Room</h3>
                                <p class="overlay-category">Restaurant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item restaurant">
                <div class="gallery-image-container">
                    <div class="gallery-image restaurant-3">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Bar Area</h3>
                                <p class="overlay-category">Restaurant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Food Images -->
            <div class="col-md-6 col-lg-4 gallery-item food">
                <div class="gallery-image-container">
                    <div class="gallery-image food-1">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Signature Beef Wellington</h3>
                                <p class="overlay-category">Food</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item food">
                <div class="gallery-image-container">
                    <div class="gallery-image food-2">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Seafood Platter</h3>
                                <p class="overlay-category">Food</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item food">
                <div class="gallery-image-container">
                    <div class="gallery-image food-3">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Dessert Collection</h3>
                                <p class="overlay-category">Food</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Images -->
            <div class="col-md-6 col-lg-4 gallery-item events">
                <div class="gallery-image-container">
                    <div class="gallery-image events-1">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Private Dinner Party</h3>
                                <p class="overlay-category">Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item events">
                <div class="gallery-image-container">
                    <div class="gallery-image events-2">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Wine Tasting Event</h3>
                                <p class="overlay-category">Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 gallery-item events">
                <div class="gallery-image-container">
                    <div class="gallery-image events-3">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-title">Chef's Table Experience</h3>
                                <p class="overlay-category">Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Feed Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="section-title">Follow Us on Instagram</h2>
                <p class="section-subtitle">@The Desiresrestaurant</p>
            </div>
        </div>
        <div class="row g-3 instagram-feed">
            <!-- Instagram feed placeholders -->
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-1">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-2">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-3">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-4">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-5">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="instagram-item">
                    <div class="instagram-image insta-6">
                        <div class="image-overlay">
                            <a href="https://instagram.com" target="_blank" class="overlay-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="https://instagram.com" target="_blank" class="btn btn-outline-primary">View More on Instagram</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
