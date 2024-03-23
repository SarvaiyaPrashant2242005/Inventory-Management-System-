// Function to show the form for adding components
function showForm() {
    var form = document.getElementById("componentForm");
    form.style.display = "block";
}

// Event listener for the button to add components
document.getElementById("addComponentButton").addEventListener("click", function() {
    showForm();
});

// Function to add a new component
function addComponent(componentName) {
    // Create a new checkbox element
    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.className = "Components";
    checkbox.id = componentName.replace(/\s+/g, '_'); // Replace spaces with underscores for ID

    // Create a label for the checkbox
    var label = document.createElement("label");
    label.htmlFor = checkbox.id;
    label.appendChild(document.createTextNode(componentName));

    // Create a div to hold the checkbox and label
    var div = document.createElement("div");
    div.appendChild(checkbox);
    div.appendChild(label);

    // Append the div to the container
    var container = document.getElementById("checkboxContainer");
    container.appendChild(div);
}

// Event listener for form submission (adding a new component)
document.getElementById("componentForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Get the component name from the form
    var componentName = document.getElementById("componentName").value;

    // Add the component
    addComponent(componentName);

    // Clear the form field
    document.getElementById("componentForm").reset();
});

// Function to show the form for entering quantities
function showQuantityForm() {
    var form = document.getElementById("quantityForm");
    form.style.display = "block";
    addQuantityInputs(); // Call the function to add quantity inputs for checked checkboxes
}

// Function to add quantity inputs for checked checkboxes
function addQuantityInputs() {
    var container = document.getElementById("quantityForm");
    container.innerHTML = ""; // Clear existing quantity inputs
    
    // Loop through all checkboxes
    var checkboxes = document.querySelectorAll('.Components');
    checkboxes.forEach(function(checkbox) {
        // If checkbox is checked, add its label and input field for quantity
        if (checkbox.checked) {
            var label = checkbox.nextElementSibling.textContent;
            var quantityInput = document.createElement("input");
            quantityInput.type = "number";
            quantityInput.name = label.replace(/\s+/g, '_') + "Quantity"; // Name for quantity input
            quantityInput.placeholder = "Enter quantity for " + label;
            quantityInput.required = true;
            quantityInput.min = 0;
            quantityInput.style.display = "block"; // Display the quantity input
            container.appendChild(quantityInput);
        }
    });
}

// Event listener for the button to enter quantities
document.getElementById("quantityButton").addEventListener("click", function() {
    showQuantityForm();
});

// Event listener for form submission (entering quantities)
document.getElementById("quantityForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Get quantities from the form
    var quantities = {};
    var quantityInputs = document.querySelectorAll('#quantityForm input[type="number"]');
    quantityInputs.forEach(function(input) {
        quantities[input.name] = input.value;
    });

    // Do something with the quantities, for example, display them
    var quantitiesString = Object.keys(quantities).map(function(key) {
        return key.replace("Quantity", "") + ": " + quantities[key];
    }).join("\n");
    alert(quantitiesString);
});