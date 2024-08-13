//to import continer card
fetch("container_of_card/container_card.html")
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("container_cardA").innerHTML = data;
  })
  .catch((error) => console.error("Error loading container:", error));


  //to import nav bar
  fetch('/dashboard/nav')
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("nav_bar").innerHTML = data;
  })
  .catch((error) => console.error("Error loading container:", error));

