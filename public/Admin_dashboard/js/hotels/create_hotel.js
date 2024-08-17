// Add dynamic rooms
// let roomCount = 1;
// document.getElementById('add-room').addEventListener('click', function() {
//     roomCount++;
//     const roomContainer = document.getElementById('rooms-container');
//     const newRoomDiv = document.createElement('div');
//     newRoomDiv.classList.add('form-group');
//     newRoomDiv.innerHTML = `
//             <label for="room_${roomCount}_person_num">Room ${roomCount} - Capacity (Persons)</label>
//             <input type="number" class="form-control" id="room_${roomCount}_person_num" name="rooms[${roomCount - 1}][person_num]" required>
//         `;
//     roomContainer.appendChild(newRoomDiv);
// });
//
// // Add dynamic services
// let serviceCount = 1;
// document.getElementById('add-service').addEventListener('click', function() {
//     serviceCount++;
//     const servicesContainer = document.getElementById('services-container');
//     const newServiceDiv = document.createElement('div');
//     newServiceDiv.classList.add('form-group');
//     newServiceDiv.innerHTML = `
//             <label for="service_${serviceCount}_name">Service ${serviceCount}</label>
//             <input type="text" class="form-control" id="service_${serviceCount}_name" name="services[]" required>
//         `;
//     servicesContainer.appendChild(newServiceDiv);
// });
////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', function () {
    let roomCount = 1;
    let serviceCount = 1;

    // Add Room
    document.getElementById('add-room').addEventListener('click', function () {
        roomCount++;
        const roomContainer = document.getElementById('rooms-container');
        const roomDiv = document.createElement('div');
        roomDiv.classList.add('form-group', 'room-field');
        roomDiv.innerHTML = `
            <label for="room_${roomCount}_person_num">Room ${roomCount} - Capacity (Persons)</label>
            <input type="number" class="form-control" id="room_${roomCount}_person_num" name="rooms[${roomCount - 1}][person_num]" required>
            <button type="button" class="btn btn-danger remove-room">Remove</button>
        `;
        roomContainer.appendChild(roomDiv);
    });

    // Add Service
    document.getElementById('add-service').addEventListener('click', function () {
        serviceCount++;
        const serviceContainer = document.getElementById('services-container');
        const serviceDiv = document.createElement('div');
        serviceDiv.classList.add('form-group', 'service-field');
        serviceDiv.innerHTML = `
            <label for="service_${serviceCount}_name">Service ${serviceCount}</label>
            <input type="text" class="form-control" id="service_${serviceCount}_name" name="services[]" required>
            <button type="button" class="btn btn-danger remove-service">Remove</button>
        `;
        serviceContainer.appendChild(serviceDiv);
    });

    // Remove Room
    document.getElementById('rooms-container').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-room')) {
            const roomField = event.target.closest('.room-field');
            const roomFields = document.querySelectorAll('.room-field');
            if (roomFields.length > 1) { // Check if there's more than one room field
                roomField.remove();
            } else {
                alert('You must have at least one room.');
            }
        }
    });

    // Remove Service
    document.getElementById('services-container').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-service')) {
            const serviceField = event.target.closest('.service-field');
            const serviceFields = document.querySelectorAll('.service-field');
            if (serviceFields.length > 1) { // Check if there's more than one service field
                serviceField.remove();
            } else {
                alert('You must have at least one service.');
            }
        }
    });
});







/////////////////////////////////////////////
//for rate field , to be (1,2,3,4,5) just
function validateRate() {
    let input = document.getElementById('rate');
    let value = parseInt(input.value);
    if (isNaN(value) || value < 1 || value > 5) {
        input.value = '';
    } else {
        input.value = value;
    }
}

//to remove error message after 4 second

// Wait for the DOM to be fully loaded
// document.addEventListener('DOMContentLoaded', function() {
//     // Find the error message element
//     const errorMessage = document.querySelector('.error-message');
//
//     if (errorMessage) {
//         // Set a timeout to remove the error message after 4 seconds
//         setTimeout(function() {
//             errorMessage.style.animation = 'fadeOut 0.5s ease-in-out';
//             setTimeout(function() {
//                 errorMessage.remove();
//             }, 500); // Wait for the fadeOut animation to complete
//         }, 3000); // 4 seconds delay before starting fadeOut
//     }
// });

