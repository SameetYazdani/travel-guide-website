// -----------Swipper------------------------------------------------------
 
  document.addEventListener('DOMContentLoaded', function () {
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // Optional: advance to next slide on click
  document.querySelector('.testimonials').addEventListener('click', () => {
    swiper.slideNext();
  });
});

//-----------Search Bar--------------------------------------------------------------------------
 document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('keyup', function() {
    filterDestinations();
  });
});

function filterDestinations() {
  let input = document.getElementById('searchInput').value.toLowerCase();
  let cards = document.querySelectorAll('.destination-card');
  let found = false;

  cards.forEach(card => {
    let title = card.querySelector('h3').textContent.toLowerCase();
    if (title.includes(input)) {
      card.style.display = 'block';
      found = true;
    } else {
      card.style.display = 'none';
    }
  });

  document.getElementById('noResults').style.display = found ? 'none' : 'block';
}

//----------------Slider--------------------------------------------------------------------------------
let currentIndex = 0;
    const slider = document.getElementById('sliderImages');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = 3;

    function showSlide(index) {
        currentIndex = index;
        slider.style.transform = `translateX(-${index * 700}px)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        showSlide(currentIndex);
    }

    function goToSlide(index) {
        showSlide(index);
    }

//-----------------------------Booking Form-----------------------------------------------------------------------
 
function openBookingForm() {
    const btn = document.querySelector('[onclick="openBookingForm()"]');
    const isLoggedIn = btn.dataset.loggedin === "1";

    if (isLoggedIn) {
        // Show the booking modal form
  
        document.getElementById('bookingModal').style.display = 'block';

    } else {
        alert("Please login first to book a trip.");
    }
}


function closeBookingForm() {
    document.getElementById('bookingModal').style.display = 'none';
}

//------------------------------- Book Now Button-------------------------------------------

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault(); // prevent form from submitting normally

        const form = e.target;
        const formData = new FormData(form);

        fetch('process_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('bookingMessage').textContent = 'Booking successful!';
                form.reset(); // reset form inputs
            })
            .catch(error => {
                document.getElementById('bookingMessage').textContent = 'Error submitting booking.';
                console.error('Error:', error);
            });
    });

//------------------------------ Feedback and rating


    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('#starRating span');
        const ratingInput = document.getElementById('ratingValue');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;

                stars.forEach(s => s.classList.remove('selected'));
                for (let i = 0; i < rating; i++) {
                    stars[i].classList.add('selected');
                }
            });
        });

        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('submit_feedback.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.text())
                .then(msg => {
                    const messageBox = document.getElementById('feedbackMessage');
                    messageBox.textContent = msg;
                    messageBox.style.color = msg.includes("Thank") ? "green" : "red";

                    if (msg.includes("Thank")) {
                        this.reset();
                        stars.forEach(s => s.classList.remove('selected'));
                        ratingInput.value = 0;
                    }
                })
                .catch(() => {
                    document.getElementById('feedbackMessage').textContent = "Error submitting feedback.";
                    document.getElementById('feedbackMessage').style.color = "red";
                });
        });
    });



 
//-----------------Pagination-------------------------------
 

function loadComments(page = 1) {
    const destination = document.getElementById('destinationContainer').dataset.destination;

    $.ajax({
        url: 'fetch_feedback.php',
        type: 'GET',
        data: { destination: destination, page: page },
        dataType: 'json',
        success: function(data) {
            $('#commentsList').html(data.comments);
            $('#pagination').html(data.pagination);

            // Rebind click event on pagination
            $('.page-box').off('click').on('click', function() {
                const selectedPage = $(this).data('page');
                loadComments(selectedPage);
            });
        },
        error: function() {
            $('#commentsList').html('<p>Error loading comments.</p>');
        }
    });
}

$(document).ready(function () {
    loadComments();
});

