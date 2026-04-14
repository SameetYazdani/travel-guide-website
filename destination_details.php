<?php include('includes/header.php'); ?>
<?php include('db.php'); // your DB connection file 
?>

<?php
$loggedIn = isset($_SESSION['username']) && isset($_SESSION['email']);
$username = $_SESSION['username'] ?? '';
$userEmail = $_SESSION['email'] ?? '';
?>



<?php
// Get destination name from URL
$name = isset($_GET['name']) ? strtolower($_GET['name']) : '';

$sql = "SELECT * FROM destinations WHERE LOWER(name) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<div class='container text-center py-5'><h2>Destination not found</h2></div>";
    include('includes/footer.php');
    exit;
}

$row = $result->fetch_assoc();
?>

<style>
    .slider-container {
        position: relative;
        max-width: 700px;
        margin: auto;
        overflow: hidden;
    }

    .slider-images {
        display: flex;
        transition: transform 0.5s ease-in-out;
        width: 100%;
    }

    .slider-images img {
        width: 700px;
        height: 400px;
        object-fit: cover;
        flex-shrink: 0;
        display: block;
    }

    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        background: rgba(255, 255, 255, 0.7);
        border: none;
        cursor: pointer;
        z-index: 10;
        padding: 0 10px;
    }

    .prev {
        left: 0;
    }

    .next {
        right: 0;
    }

    .dots {
        text-align: center;
        margin-top: 10px;
    }

    .dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        margin: 0 5px;
        background-color: #bbb;
        border-radius: 50%;
        cursor: pointer;
    }

    .dot.active {
        background-color: #333;
    }

    .description-box {
        text-align: left;
        font-size: 1.3rem;
    }



    .rating-stars {
        direction: ltr;
        display: inline-flex;
        font-size: 30px;
        cursor: pointer;
        user-select: none;
    }

    .rating-stars span {
        color: #ccc;
        padding: 0;
        transition: color 0.2s;
    }

    .rating-stars span.selected {
        color: gold;
    }

    #feedbackMessage {
        margin-top: 10px;
        font-weight: bold;
    }
</style>



<!-- Image Slider -->
<div class="container text-center my-5">
    <h2 class="mb-4 text-capitalize"><?php echo htmlspecialchars($row['name']); ?></h2>

    <div class="slider-container">
        <button class="slider-arrow prev" onclick="prevSlide()">&#10094;</button>
        <div class="slider-images" id="sliderImages">
            <img src="images/<?php echo htmlspecialchars($row['image1']); ?>" alt="">
            <img src="images/<?php echo htmlspecialchars($row['image2']); ?>" alt="">
            <img src="images/<?php echo htmlspecialchars($row['image3']); ?>" alt="">
        </div>
        <button class="slider-arrow next" onclick="nextSlide()">&#10095;</button>
    </div>

    <div class="dots" id="dots">
        <span class="dot active" onclick="goToSlide(0)"></span>
        <span class="dot" onclick="goToSlide(1)"></span>
        <span class="dot" onclick="goToSlide(2)"></span>
    </div>

    <div class="description-box mt-5">
        <p><strong>Price:</strong> Rs. <?php echo htmlspecialchars($row['price']); ?></p>
        <p><strong>Description:</strong><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
        <p><strong>Duration: </strong><?php echo nl2br(htmlspecialchars($row['duration_days'])); ?> Days</p>
    </div>
    <!-- Map -->
    <div>
        <iframe
            src="https://www.google.com/maps?q=<?php echo urlencode($name); ?>&output=embed"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

  
<!-- Book Now button -->
 <button onclick="openBookingForm()" id="bookNowBtn"
        class="btn btn-success mt-5" 
        style="font-size:1.5rem"
        data-loggedin="<?= isset($_SESSION['username']) ? '1' : '0' ?>" 
        data-username="<?= $_SESSION['username'] ?? '' ?>" 
        data-email="<?= $_SESSION['email'] ?? '' ?>">
    Book Now
</button>

     
</div>

<!-- Booking Form Modal -->



<div id="bookingModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999;">
    <div style="background:#fff; max-width:500px; margin:100px auto; padding:20px; border-radius:10px; position:relative;">
        <div id="bookingMessage" class="text-success text-center mb-2"></div>
    <h3 class="mb-3">Book Your Trip</h3>
        <form id="bookingForm" method="post">


            <input type="hidden" name="destination" value="<?php echo htmlspecialchars($name); ?>">

            <div class="mb-3">
                <label>Your Name</label>
                <input type="text" name="name" class="form-control" required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">


            </div>

            <div class="mb-3">
                <label>Email</label> 
                <input type="email" name="email" class="form-control" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label>Number of Persons</label>
                <input type="number" name="persons" class="form-control" required min="1">
            </div>


            <div class="mb-3">
                <label>Travel Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" onclick="closeBookingForm()">Close</button>
            </div>
        </form>
        <div id="bookingMessage" style="margin-top:10px; color:green;"></div>

    </div>
</div>
 

 
 
 

<!-- Feedback and ratings -->

<div class="container" style="margin-top: 100px;">
    <h3>Feedback and Ratings</h3>
    <?php


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        $username = "Guest";
    }
    ?>
    <form id="feedbackForm">
        <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <input type="hidden" name="destination" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="rating" id="ratingValue" value="0">



        <div class="mb-3 mt-4">
            <h5>Your Feedback:</h5>
            <textarea name="comment" class="form-control" required></textarea>
        </div>

        <div class="mb-3">

            <div class="rating-stars" id="starRating">
                <span data-value="1">★</span>
                <span data-value="2">★</span>
                <span data-value="3">★</span>
                <span data-value="4">★</span>
                <span data-value="5">★</span>
            </div>
        </div>

        <div class="mb-5 text-start">
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </div>
    </form>

    <!-- Show Comment -->
    <div class="container" style="margin-top:100px ; margin-bottom: 100px;">
        <h3 class="mb-5">Users Feedback</h3>
        <div id="destinationContainer" data-destination="<?php echo htmlspecialchars($name); ?>"></div>
        <div id="feedbackMessage"></div>
        <div id="commentsList"></div>
        <div id="pagination" style="text-align:center; margin-top: 20px;"></div>



    </div>


</div>


<?php include('includes/footer.php'); ?>