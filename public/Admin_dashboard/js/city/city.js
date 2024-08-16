let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');


// config param
let countItem = items.length;
let itemActive = 0;
// event next click
next.onclick = function(){
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
        itemActive = 0;
    }
    showSlider();
}
//event prev click
prev.onclick = function(){
    itemActive = itemActive - 1;
    if(itemActive < 0){
        itemActive = countItem - 1;
    }
    showSlider();
}
// auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 5000)
function showSlider(){
    // remove item active old
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');

    // active new item
    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');

    // clear auto time run slider
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 5000)
}

// click thumbnail
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive = index;
        showSlider();
    })
})

//add timer to remove success message
document.addEventListener('DOMContentLoaded', function() {
    var successMessage = document.getElementById('successMessage');
    var timerElement = document.getElementById('timer');
    var countdown = 5; // 5 seconds

    if (successMessage && timerElement) {
        // Update the timer every second
        var interval = setInterval(function() {
            countdown--;
            timerElement.textContent = '(' + countdown + ' seconds)';

            // When countdown reaches zero, fade out the message
            if (countdown <= 0) {
                //This stops the interval function from running any further.
                // Since the countdown has reached 0, we no longer need the interval to continue.
                clearInterval(interval);

                successMessage.style.transition = 'opacity 0.5s ease-out';
                successMessage.style.opacity = '0';

                setTimeout(function() {
                    successMessage.remove();
                }, 500); // Matches the transition duration
            }
        }, 1000); // 1000ms = 1 second
    }
});

function getCookie(name) {
    // Retrieve the cookie string and split it into an array
    const cookies = document.cookie.split('; ');

    // Find the cookie that matches the name provided
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].split('=');
        if (cookie[0] === name) {
            return decodeURIComponent(cookie[1]);
        }
    }

    // If the cookie wasn't found, return null or undefined
    return null;
}

// Usage
const myCookie = getCookie('token');
console.log(myCookie); // Outputs the value of the cookie

