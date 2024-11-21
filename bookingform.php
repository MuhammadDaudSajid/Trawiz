<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravWiz";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure hotel_id is set and valid
if (isset($_GET['hotel_id']) && is_numeric($_GET['hotel_id'])) {
    $hotelId = $_GET['hotel_id']; // Get hotel ID from the URL
} else {
    echo "Invalid hotel ID.";
    exit(); // Stop execution if no valid hotel ID is provided
}

// Fetch hotel details
$hotelSql = "SELECT * FROM hotels WHERE hotelid = ?";
$stmt = $conn->prepare($hotelSql);
$stmt->bind_param("i", $hotelId); // Bind hotel ID to the query
$stmt->execute();
$hotelResult = $stmt->get_result();

if ($hotelResult->num_rows > 0) {
    $hotelDetails = $hotelResult->fetch_assoc();
    $hotelName = $hotelDetails['hotel'];
    $hotelCost = $hotelDetails['cost'];
} else {
    echo "Hotel not found.";
    exit();
}

// Fetch city details (assuming the hotel is linked to a city)
$cityId = $hotelDetails['cityid']; // Get city ID from hotel details
$citySql = "SELECT city FROM cities WHERE cityid = ?";
$cityStmt = $conn->prepare($citySql);
$cityStmt->bind_param("i", $cityId); // Bind city ID to the query
$cityStmt->execute();
$cityResult = $cityStmt->get_result();

if ($cityResult->num_rows > 0) {
    $cityRow = $cityResult->fetch_assoc();
    $cityName = $cityRow['city'];
} else {
    echo "City not found.";
    exit();
}

// Calculate initial cost (you can modify this formula as needed)
$initialCost = $hotelCost * 5; // For example, 5 days for the journey

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/booking.css">
    <title>Booking Form</title>
</head>
<body>
    <div class="card-container">
        <div class="booking-details">
            <h2>Booking Details</h2>
            <p><strong>City Name:</strong> <?php echo $cityName; ?></p>
            <p><strong>Hotel Name:</strong> <?php echo $hotelName; ?></p>
        </div>

        <form method="post" action="payment.php">
            <h2>Booking Form</h2>
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="number" name="tourists" id="touristsInput" placeholder="Number of Tourists" required><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required><br>
            <input type="tel" name="contact" placeholder="Contact Number" required><br>

            <p>Cost: Rs. <span id="calculatedCost"><?php echo $initialCost; ?></span></p>

            <button type="submit" name="proceed" value="Proceed">Proceed for Payment</button>
        </form>
    </div>

    <script>
        // JavaScript to calculate cost based on tourists and days
        const touristsInput = document.getElementById("touristsInput");
        const calculatedCost = document.getElementById("calculatedCost");

        // Initial cost fetched from the server
        let initialCost = <?php echo $initialCost; ?>;
        calculatedCost.textContent = initialCost;

        touristsInput.addEventListener("input", calculateCost);

        function calculateCost() {
            const tourists = parseInt(touristsInput.value) || 0;
            const days = 5; // You can modify this as per your requirements

            const totalCost = initialCost * tourists * days;
            calculatedCost.textContent = totalCost;
        }
    </script>
</body>
</html>
