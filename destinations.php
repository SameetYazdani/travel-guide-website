<?php include('includes/header.php');
$search = isset($_GET['search']) ? trim($_GET['search']) : ''; ?>
<?php include 'db.php'; ?>



<style>
    .destination-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        justify-content: center;
        padding: 30px;
    }

    .destination-card {
        width: 30%;

        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .destination-card:hover {
        transform: scale(1.05);
    }

    .destination-card a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .destination-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .destination-card h3 {
        margin: 15px 0;
        padding: 0 10px;
        font-size: 1.5rem;
    }
</style>

<!-- Simple Search Bar -->
 <div class="container mt-4 mb-3">
  <input type="text" id="searchInput" class="form-control" placeholder="Search destinations..." onkeyup="filterDestinations()">
  <p id="noResults" class="text-danger mt-2" style="display: none;">No destinations found.</p>
</div>

<!-- Destination Grid -->
<div class="container">
    <h2 class="text-center my-5">Explore Destinations</h2>

    <div class="destination-grid">
        <?php
        $query = "SELECT * FROM destinations";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = htmlspecialchars($row['name']);
                $image = htmlspecialchars($row['image1']);

                echo "
                <div class='destination-card'>
                    <a href='destination_details.php?name=" . urlencode(strtolower($name)) . "'>
                        <img src='images/$image' alt='$name'>
                        <h3>$name</h3>
                    </a>
                </div>
                ";
            }
        } else {
            echo "<p>No destinations found.</p>";
        }
        ?>
    </div>
</div>

 

<?php include('includes/footer.php'); ?>