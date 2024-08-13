let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("mySlides");
    const circles = document.getElementsByClassName("circle");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    console.log("length: " + circles.length);
    for (i = 0; i < circles.length; i++) {
        circles[i].className = circles[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    circles[slideIndex - 1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function currentSlide(n) {
    showSlides((slideIndex = n));
}

