    document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.querySelectorAll('input[type="text"], input[type="number"]');

    // Add focus effect on input fields
    inputs.forEach(function(input) {
    input.addEventListener('focus', function() {
    input.style.boxShadow = '0 0 10px rgba(40, 167, 69, 0.8)';
});

    input.addEventListener('blur', function() {
    input.style.boxShadow = 'none';
});
});

    // Add animation to the form container on load
    var container = document.querySelector('.container');
    container.style.opacity = '0';
    container.style.transform = 'translateY(-20px)';
    container.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

    setTimeout(function() {
    container.style.opacity = '1';
    container.style.transform = 'translateY(0)';
}, 100);
});
