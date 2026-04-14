<?php include('includes/header.php'); ?>


<div class="background-decore"></div>

<!-- Hero Section -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <p class="text-danger" style="font-size: 2.5rem;">BEST DESTINATIONS AROUND THE WORLD</p>
        <h1 class="mt-3">Travel, enjoy<br>and live a new<br>and full life</h1>
        <p class="mt-3">Built Wicket longer admire do barton vanity itself do in it. Preferred to sportsmen it engrossed listening. Park gate sell they west hard for the.</p>
        <a href="about.php" class="btn btn-warning rounded-pill px-4 py-2 mt-3">Find out more</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/plane.png" class="img-fluid mb-3" style="height: 70px; width: 128px;" />
        <img src="images/Traveller 1.png" alt="Traveler" class="img-fluid traveller-img" />
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <p style="font-size: 18px;color:gray; font-weight: 500;">CATEGORY</p>
    <h3>We Offer Best Services</h3>
    <div class="row mt-5">
      <div class="col-md-3">
        <img src="images/Group 48.png" class="img-fluid mb-3" style="width: 92px; height: 75px;">
        <h5>Calculated Weather</h5>
        <p>Built Wicket longer admire do barton vanity itself do in it.</p>
      </div>
      <div class="col-md-3">
        <img src="images/plane.png" class="img-fluid mb-3" style="width: 137px; height: 75px;">
        <h5>Best Flights</h5>
        <p>Engrossed listening. Park gate sell they west hard for the.</p>
      </div>
      <div class="col-md-3">
        <img src="images/Group 50.png" class="img-fluid mb-3" style="width: 67px; height: 75px;">
        <h5>Local Events</h5>
        <p>Barton vanity itself do in it. Preferd to men it engrossed listening.</p>
      </div>
      <div class="col-md-3">
        <img src="images/Group 49.png" class="img-fluid mb-3" style="width: 77px; height: 66px;">
        <h5>Customization</h5>
        <p>We deliver outsourced aviation services for military customers</p>
      </div>
    </div>
  </div>
</section>

 <!-- Top Destinations -->
<section class="py-5 bg-white top-destination">
  <div class="container text-center">
    <p style="font-size: 18px; color:gray; font-weight: 500;">Top Selling</p>
    <h3>Top Destinations</h3>
    <div class="row mt-4">

      <!-- Islamabad -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <a href="destination_details.php?name=islamabad">
            <img src="images/isb1.jpg" class="card-img-top destination-img" alt="Islamabad">
          </a>
          <div class="card-body text-start">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <h5>Islamabad, Pakistan</h5>
               
            </div>
             
            <p>Capital of Pakistan, known for greenery, Margalla Hills, and modern city layout.</p>
          </div>
        </div>
      </div>

      <!-- Lahore -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
           <a href="destination_details.php?name=lahore">
            <img src="images/lhr1.jpg" class="card-img-top destination-img" alt="Lahore">
          </a>
          <div class="card-body text-start">
            <div class="d-flex justify-content-between align-items-center mb-1">
               <h5>Lahore, Pakistan</h5> 
              
            </div>
            
            <p>Culture capital with historical sites, food streets, and Mughal architecture.</p>
          </div>
        </div>
      </div>

      <!-- Karachi -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <a href="destination_details.php?name=karachi">
            <img src="images/kar2.jpg" class="card-img-top destination-img" alt="Karachi">
          </a>
          <div class="card-body text-start">
            <div class="d-flex justify-content-between align-items-center mb-1">
               <h5>Karachi, Pakistan</h5>
               
            </div>
            
            <p>Largest city offering sea views, shopping centers, and cultural diversity.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Image size control -->
<style>
  .destination-img {
    height: 320px;
    object-fit: cover;
    width: 100%;
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem;
  }
</style>


<!-- Testimonials Section -->
<section class="testimonials py-5" style="background-color: #f9f9f9;">
  <div class="container text-center">
    <p style="font-size: 18px; color:gray; font-weight: 500;">Testimonials</p>
    <h3 style="font-weight: bold;">What People Say About Us</h3>

    <div class="swiper mySwiper mt-4">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide p-4 bg-white rounded shadow-sm">
          <img src="https://randomuser.me/api/portraits/men/10.jpg" alt="Mike" class="rounded-circle mb-3" width="60">
          <p>“Their travel support is amazing. I felt safe, comfortable, and guided throughout my trip!”</p>
          <h5 class="fw-bold mt-3 mb-0">Mike Taylor</h5>
          <small>Lahore, Pakistan</small>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide p-4 bg-white rounded shadow-sm">
          <img src="https://randomuser.me/api/portraits/women/20.jpg" alt="Ayesha" class="rounded-circle mb-3" width="60">
          <p>“One of the best experiences I've had — hotel, flight, and food, all arranged perfectly!”</p>
          <h5 class="fw-bold mt-3 mb-0">Ayesha Khan</h5>
          <small>Karachi, Pakistan</small>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide p-4 bg-white rounded shadow-sm">
          <img src="https://randomuser.me/api/portraits/men/30.jpg" alt="Ali" class="rounded-circle mb-3" width="60">
          <p>“Highly recommended. Their partnerships with local hotels saved me a lot of money.”</p>
          <h5 class="fw-bold mt-3 mb-0">Ali Raza</h5>
          <small>Islamabad, Pakistan</small>
        </div>

      </div>
      <div class="swiper-pagination mt-3"></div>
    </div>
  </div>
</section>




<!-- Our Partners Section -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <p style="font-size: 18px; color:gray; font-weight: 500;">OUR SERVICE PARTNERS</p>
    <h3 class="mb-4">Trusted By Leading Companies</h3>
    <div class="row justify-content-center align-items-center">
      <div class="col-4 col-md-2 mb-3">
        <img src="images/serena hotels.png" class="img-fluid" alt="Serena Hotels">
      </div>
      <div class="col-4 col-md-2 mb-3">
        <img src="images/pia.png" class="img-fluid" alt="PIA Airlines">
      </div>
      <div class="col-4 col-md-2 mb-3">
        <img src="images/careem.png" class="img-fluid" alt="Careem Pakistan">
      </div>

    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>