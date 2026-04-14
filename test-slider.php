<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Slider</title>
    <style>
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 700px;
            margin: auto;
            overflow: hidden;
            background: #f8f9fa;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 300%;
        }

        .slider-wrapper img {
            width: 100%;
            height: 400px;
            flex-shrink: 0;
            object-fit: cover;
            background-color: #eee;
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            z-index: 5;
        }

        .slider-arrow.prev {
            left: 10px;
        }

        .slider-arrow.next {
            right: 10px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center">Test Slider</h2>

<div class="slider-container">
    <div class="slider-wrapper" id="sliderImages">
        <img src="images/isb1.jpg" alt="Image 1">
        <img src="images/isb2.jpg" alt="Image 2">
        <img src="images/isb3.jpg" alt="Image 3">
    </div>
    <button class="slider-arrow prev" onclick="prevSlide()">&#10094;</button>
    <button class="slider-arrow next" onclick="nextSlide()">&#10095;</button>
</div>

<script>
    let currentIndex = 0;
    const totalSlides = 3;
    const slider = document.getElementById('sliderImages');

    function showSlide(index) {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        showSlide(currentIndex);
    }

    // Show the first slide on load
    showSlide(currentIndex);
</script>

</body>
</html>
