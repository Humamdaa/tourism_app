const sliderImgs = ["Paris.jpg", "Damascus.jpg","LosAngeles.jpg","NewYork.jpg"];
let sliderImage = document.querySelector('.background-image');
let sliderGrids = [...document.querySelectorAll('.grid-item')];

let currentImage = 0;

setInterval(() => {
    changeSliderImage();
}, 5000);

const changeSliderImage = () => {
    sliderGrids.map((gridItem, index) => {
        setTimeout(() => {
            gridItem.classList.remove('hide');

            setTimeout(() => {

                if(index === sliderGrids.length - 1){
                    if(currentImage >= sliderImgs.length - 1){
                        currentImage = 0;
                    } else{
                        currentImage++;
                    }

                    sliderImage.src = `Admin_dashboard/assets/cities/${sliderImgs[currentImage]}`;

                    sliderGrids.map((item, i) => {
                        setTimeout(() => {
                            item.classList.add('hide')
                        }, i * 100);
                    })

                }

            }, 100);

        }, index * 100);
    })
}

//to appeare the message for 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    var notification = document.querySelector('.notification');
    if (notification) {
        notification.style.display = 'block'; // إظهار الرسالة

        setTimeout(function() {
            notification.style.display = 'none'; // إخفاء الرسالة بعد 5 ثوانٍ
        }, 5000);
    }
});
