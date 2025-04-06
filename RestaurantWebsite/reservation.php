<?php
$page_title = "Reservations";
include 'includes/header.php';

// Initialize variables for form processing
$name = $email = $phone = $date = $time = $guests = $special_requests = "";
$name_err = $email_err = $phone_err = $date_err = $time_err = $guests_err = "";
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
    
    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }
    
    // Validate date
    if (empty(trim($_POST["date"]))) {
        $date_err = "Please select a date.";
    } else {
        $date = trim($_POST["date"]);
        
        // Check if date is not in the past
        $current_date = date("Y-m-d");
        if ($date < $current_date) {
            $date_err = "Please select a future date.";
        }
    }
    
    // Validate time
    if (empty(trim($_POST["time"]))) {
        $time_err = "Please select a time.";
    } else {
        $time = trim($_POST["time"]);
    }
    
    // Validate guests
    if (empty(trim($_POST["guests"]))) {
        $guests_err = "Please select the number of guests.";
    } else {
        $guests = trim($_POST["guests"]);
        
        // Check if guests is within allowed range (1-10)
        if ($guests < 1 || $guests > 10) {
            $guests_err = "Please select between 1 and 10 guests.";
        }
    }
    
    // Get special requests (optional)
    $special_requests = trim($_POST["special_requests"]);
    
    // If there are no errors, process the form
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($date_err) && empty($time_err) && empty($guests_err)) {
        // Process the form using the included file
        include 'includes/process_reservation.php';
    }
}
?>

<!-- Reservation Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Make a Reservation</h1>
                <p class="lead">Book your table for an unforgettable dining experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Reservation Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Reservation Form -->
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="reservation-form-wrapper p-4">
                    <h2 class="section-title mb-4">Reserve Your Table</h2>
                    
                    <?php if (!empty($success_message)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="reservationForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
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
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                            <div class="invalid-feedback"><?php echo $phone_err; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" id="date" name="date" value="<?php echo $date; ?>" min="<?php echo date('Y-m-d'); ?>" required>
                                <div class="invalid-feedback"><?php echo $date_err; ?></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="time" class="form-label">Time <span class="text-danger">*</span></label>
                                <select class="form-select <?php echo (!empty($time_err)) ? 'is-invalid' : ''; ?>" id="time" name="time" required>
                                    <option value="" selected disabled>Select time</option>
                                    <option value="17:00" <?php if ($time == "17:00") echo "selected"; ?>>5:00 PM</option>
                                    <option value="17:30" <?php if ($time == "17:30") echo "selected"; ?>>5:30 PM</option>
                                    <option value="18:00" <?php if ($time == "18:00") echo "selected"; ?>>6:00 PM</option>
                                    <option value="18:30" <?php if ($time == "18:30") echo "selected"; ?>>6:30 PM</option>
                                    <option value="19:00" <?php if ($time == "19:00") echo "selected"; ?>>7:00 PM</option>
                                    <option value="19:30" <?php if ($time == "19:30") echo "selected"; ?>>7:30 PM</option>
                                    <option value="20:00" <?php if ($time == "20:00") echo "selected"; ?>>8:00 PM</option>
                                    <option value="20:30" <?php if ($time == "20:30") echo "selected"; ?>>8:30 PM</option>
                                    <option value="21:00" <?php if ($time == "21:00") echo "selected"; ?>>9:00 PM</option>
                                </select>
                                <div class="invalid-feedback"><?php echo $time_err; ?></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="guests" class="form-label">Number of Guests <span class="text-danger">*</span></label>
                                <select class="form-select <?php echo (!empty($guests_err)) ? 'is-invalid' : ''; ?>" id="guests" name="guests" required>
                                    <option value="" selected disabled>Select guests</option>
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?php echo $i; ?>" <?php if ($guests == $i) echo "selected"; ?>><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-feedback"><?php echo $guests_err; ?></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="special_requests" class="form-label">Special Requests</label>
                            <textarea class="form-control" id="special_requests" name="special_requests" rows="3"><?php echo $special_requests; ?></textarea>
                            <div class="form-text">Please let us know about any dietary restrictions, allergies, or special occasions.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Reserve Now</button>
                    </form>
                </div>
            </div>
            
            <!-- Reservation Information -->
            <div class="col-lg-4">
                <div class="reservation-info-wrapper p-4 h-100">
                    <h3 class="h5 mb-4">Reservation Information</h3>
                    
                    <div class="info-item mb-3">
                        <h4 class="h6 mb-2"><i class="fas fa-clock me-2"></i> Hours of Operation</h4>
                        <p class="mb-0">
                            Monday - Thursday: 5:00 PM - 10:00 PM<br>
                            Friday - Saturday: 5:00 PM - 11:00 PM<br>
                            Sunday: 4:00 PM - 9:00 PM
                        </p>
                    </div>
                    
                    <div class="info-item mb-3">
                        <h4 class="h6 mb-2"><i class="fas fa-info-circle me-2"></i> Important Notes</h4>
                        <ul class="mb-0 ps-3">
                            <li>Reservations are held for 15 minutes past the reservation time</li>
                            <li>For parties larger than 10, please call us directly</li>
                            <li>We require a credit card for reservations on weekends and holidays</li>
                            <li>Cancellations must be made at least 24 hours in advance</li>
                        </ul>
                    </div>
                    
                    <div class="info-item">
                        <h4 class="h6 mb-2"><i class="fas fa-phone-alt me-2"></i> Need Help?</h4>
                        <p class="mb-0">For assistance with reservations, please call us at <strong>(555) 123-4567</strong> during business hours.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Private Events Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="private-events-image">
                    <!-- Using SVG placeholder instead of actual photo -->
                    <div class="event-image"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="private-events-content">
                    <h2 class="section-title mb-4">Private Events</h2>
                    <p class="mb-4">The Desires offers elegant private dining spaces for special occasions, corporate events, and celebrations. Our dedicated events team will work with you to create a personalized experience that exceeds your expectations.</p>
                    <p class="mb-4">We can accommodate groups of various sizes, from intimate gatherings to larger celebrations.</p>
                    <a href="contact.php" class="btn btn-outline-primary">Inquire About Private Events</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
