document.getElementById("add_rt").addEventListener("click", function() {
    var route = document.getElementById("route");
    if (route.style.display === "block") {
      route.style.display = "none";
    } else {
      route.style.display = "block";
    }
});
var counter = 0; // Counter to track IDs

  // document.getElementById("addPickup").addEventListener("click", function() {
  //   event.preventDefault();
  //   var pickup = document.getElementById("pickup");
  //   var newpickup = document.createElement("input");
  //   newpickup.type = "text";
  //   newpickup.classList.add("added-text-field");
  //   newpickup.id = "pickup" + counter; // Assign unique ID
  //   pickup.appendChild(newpickup);

  //   // Create remove button for each added text field
  //   var removeButton = document.createElement("button");
  //   removeButton.textContent = "Remove";
  //   pickup.appendChild(removeButton);
  //   // removeButton.classList.add("removeTextFieldBtn");
  //   removeButton.addEventListener("click", function() {
  //     pickup.removeChild(newpickup);
  //     pickup.removeChild(removeButton);
  //   });
  //   pickup.appendChild(document.createElement("br"));

  //   counter++; // Increment counter for the next text field
  // });

//   document.getElementById("addPickup").addEventListener("click", function(event) {
//     event.preventDefault();
//     var pickup = document.getElementById("pickup");
//     var newpickup = document.createElement("input");
//     newpickup.type = "text";
//     newpickup.classList.add("added-text-field");
//     newpickup.id = "pickup" + counter; // Assign unique ID
//     pickup.appendChild(newpickup);

//     // Create remove button for each added text field
//     var removeButton = document.createElement("button");
//     removeButton.textContent = "Remove";
//     pickup.appendChild(removeButton);

//     removeButton.addEventListener("click", function() {
//         pickup.removeChild(newpickup);
//         pickup.removeChild(removeButton);
//         pickup.removeChild(document.createElement("br")); // Remove the line break

//         // Reassign IDs to remaining text fields
//         var textFields = document.getElementsByClassName("added-text-field");
//         for (var i = 0; i < textFields.length; i++) {
//             textFields[i].id = "pickup" + i;
//         }
//         counter--; // Decrement counter as we're removing a text field
//     });

//     pickup.appendChild(document.createElement("br"));

//     counter++; // Increment counter for the next text field
// });


document.getElementById("update_rt").addEventListener("click", function() {
    var update = document.getElementById("update");
    if (update.style.display === "block") {
      update.style.display = "none";
    } else {
      update.style.display = "block";
    }
});