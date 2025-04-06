<?php
$page_title = "Contact Us";
include 'includes/header.php';

// Initialize variables for form processing
$name = $email = $subject = $message = "";
$name_err = $email_err = $message_err = "";
$success_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Validate subject (optional)
    $subject = trim($_POST["subject"]);
    
    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }
    
    // If there are no errors, process the form
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        // Process the form using the included file
        include 'includes/process_contact.php';
    }
}
?>

<!-- Contact Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Contact Us</h1>
                <p class="lead">We'd love to hear from you</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="contact-info-wrapper p-4 h-100">
                    <h2 class="section-title mb-4">Get in Touch</h2>
                    <p class="mb-4">Have questions, feedback, or special requests? We're here to help. Reach out to us using any of the methods below or fill out the contact form.</p>
                    
                    <div class="contact-item d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h5 class="mb-0">Address</h5>
                            <p class="mb-0">123 Culinary Boulevard<br>Gourmet City, GC 12345</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h5 class="mb-0">Phone</h5>
                            <p class="mb-0">(555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h5 class="mb-0">Email</h5>
                            <p class="mb-0">info@The Desiresrestaurant.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon me-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            <h5 class="mb-0">Hours</h5>
                            <p class="mb-0">
                                Monday - Thursday: 5:00 PM - 10:00 PM<br>
                                Friday - Saturday: 5:00 PM - 11:00 PM<br>
                                Sunday: 4:00 PM - 9:00 PM
                            </p>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <h5 class="mb-3">Follow Us</h5>
                        <a href="#" class="social-link me-2" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link me-2" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link me-2" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link" title="TripAdvisor"><i class="fab fa-tripadvisor"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="contact-form-wrapper p-4">
                    <h2 class="section-title mb-4">Send Us a Message</h2>
                    
                    <?php if (!empty($success_message)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo $name; ?>" required>
                                <div class="invalid-feedback"><?php echo $name_err; ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>" required>
                                <div class="invalid-feedback"><?php echo $email_err; ?></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" id="message" name="message" rows="5" required><?php echo $message; ?></textarea>
                            <div class="invalid-feedback"><?php echo $message_err; ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="section-title">Find Us</h2>
                <p class="section-subtitle">Conveniently located in the heart of the city</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="map-container">
                    <!-- Insert Google Maps iframe here -->
                    <div id="map" class="w-100" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Google Maps API script -->
<script>
    function initMap() {
        // Use a generic location for the map (would be replaced with actual restaurant coordinates)
        const restaurantLocation = { lat: 40.7128, lng: -74.0060 };
        
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: restaurantLocation,
        });
        
        const marker = new google.maps.Marker({
            position: restaurantLocation,
            map: map,
            title: "The Desires Restaurant",
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

<?php include 'includes/footer.php'; ?>
