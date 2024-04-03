document.getElementById("add_rt").addEventListener("click", function() {
    var route = document.getElementById("route");
    if (route.style.display === "none") {
      route.style.display = "block";
    } else {
      route.style.display = "none";
    }
});
var counter = 0; // Counter to track IDs

  document.getElementById("addPickup").addEventListener("click", function() {
    event.preventDefault();
    var pickup = document.getElementById("pickup");
    var newpickup = document.createElement("input");
    newpickup.type = "text";
    newpickup.classList.add("added-text-field");
    newpickup.id = "pickup" + counter; // Assign unique ID
    pickup.appendChild(newpickup);

    // Create remove button for each added text field
    var removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.classList.add("removeTextFieldBtn");
    removeButton.addEventListener("click", function() {
      pickup.removeChild(newpickup);
      pickup.removeChild(removeButton);
    });
    pickup.appendChild(removeButton);
    pickup.appendChild(document.createElement("br"));

    counter++; // Increment counter for the next text field
  });