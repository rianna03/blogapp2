<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Buffering
ob_start();
include("db.php");

// Handle form submission to create About Us information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about = $conn->real_escape_string(trim($_POST['about']));
    $mission = $conn->real_escape_string(trim($_POST['mission']));
    $location = $conn->real_escape_string(trim($_POST['location']));

    // SQL query to insert into the aboutus table
    $sql = "INSERT INTO aboutus (about, mission, location) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $about, $mission, $location);

    if ($stmt->execute()) {
        $message = "About Us information created successfully!";
    } else {
        $message = "Error creating information: " . $conn->error;
    }
}

// Fetch the current About Us information from the database
$sql = "SELECT * FROM aboutus WHERE id = 1"; // Adjust this to match your needs
$result = $conn->query($sql);

$about = $mission = $location = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about = htmlspecialchars($row['about']);
    $mission = htmlspecialchars($row['mission']);
    $location = htmlspecialchars($row['location']);
}

$conn->close();
?>

<div class="container mt-4">
    <h2 class="text-center">Edit About Us Section</h2>

    <?php if (isset($message)): ?>
        <div class="alert alert-info text-center"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="adminabout.php" method="POST">
        <div class="form-group">
            <label for="about">About us</label>
            <textarea class="form-control" id="about" name="about" rows="4" required><?php echo $about; ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="mission">Our Mission</label>
            <textarea class="form-control" id="mission" name="mission" rows="4" required><?php echo $mission; ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="location">Where to Find Us</label>
            <textarea class="form-control" id="location" name="location" rows="4" required><?php echo $location; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Create About Us</button>
    </form>
</div>

<?php
// Clean output buffer and include layout
$content = ob_get_clean();
include("layout.php");
?>
