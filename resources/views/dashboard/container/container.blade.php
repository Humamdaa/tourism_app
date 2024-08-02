<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('/Admin_dashboard/css/container_card/container_card.css')}}" />
    <title>Document</title>
</head>
<body>
<section class="section__containerA booking__containerA">
    <div class="card-containerA">
        <div class="cardA">
            <img
                src="{{asset('Admin_dashboard/assets/take_off.jpg')}}"
                alt="Take Off"
                class="card-imageA"
            />
            <div class="card-titleA">Go Flight</div>
            <a href="#" class="buttonA">Select</a>
        </div>

        <div class="cardA">
            <img src="{{asset('Admin_dashboard/assets/land.jpg')}}" alt="Land" class="card-imageA" />
            <div class="card-titleA">Go and Return Flight</div>
            <a href="#" class="buttonA">Select</a>
        </div>
    </div>
</section>
</body>
</html>
