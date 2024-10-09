<?php
// Start output buffering
ob_start();
include("db.php");

// Fetch the About Us information from the database
$sql = "SELECT * FROM aboutus WHERE id = 1"; // Adjust to match your specific ID or condition
$result = $conn->query($sql);

$about = $mission = $location = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about = htmlspecialchars($row['about']);
    $mission = htmlspecialchars($row['mission']);
    $location = htmlspecialchars($row['location']);
}

// Close the database connection
$conn->close();
?>

<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="fashion.html">Fashion</a></li>
                <li><a href="travel.html">Travel</a></li>
                <li class="colorlib-active"><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>

        <div class="colorlib-footer">
            <h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
            <div class="mb-4">
                <h3>Subscribe for newsletter</h3>
                <form action="#" class="colorlib-subscribe-form">
                    <div class="form-group d-flex">
                        <div class="icon"><span class="icon-paper-plane"></span></div>
                        <input type="text" class="form-control" placeholder="Enter Email Address">
                    </div>
                </form>
            </div>
            <p class="pfooter">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
        </div>
    </aside> <!-- END COLORLIB-ASIDE -->

    <!-- Content -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8">
            <h2 class="text-center mb-4">About Us</h2>

            <!-- Displaying the About Us Information -->
            <div class="about-section">
                <h3>About Us</h3>
                <p><?php echo nl2br($about); ?></p>
            </div>

            <div class="mission-section mt-4">
                <h3>Our Mission</h3>
                <p><?php echo nl2br($mission); ?></p>
            </div>

            <div class="location-section mt-4">
                <h3>Where to Find Us</h3>
                <p><?php echo nl2br($location); ?></p>
            </div>
        </div>
    </div>

<?php
// Clean output buffer and include layout
$content = ob_get_clean();
include("layout.php");
?>
