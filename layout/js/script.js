// submit
function submitForm() {
    document.getElementById("product-form").submit();
}

    function submitForm() {
        console.log("Submit button clicked"); // Add this line

        var form = document.getElementById("product-form");
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
    }
// this for form -- display options
    var typeField = document.getElementById("ProductType");
    var sizeField = document.getElementById("size-field");
    var weightField = document.getElementById("weight-field");
    var dimensionsField = document.getElementById("dimensions-field");

    typeField.addEventListener("change", function() {
        if (typeField.value == "DVD-disc") {
            sizeField.style.display = "block";
            weightField.style.display = "none";
            dimensionsField.style.display = "none";
        } else if (typeField.value == "Book") {
            sizeField.style.display = "none";
            weightField.style.display = "block";
            dimensionsField.style.display = "none";
        } else if (typeField.value == "Furniture") {
            sizeField.style.display = "none";
            weightField.style.display = "none";
            dimensionsField.style.display = "block";
        } else {
            sizeField.style.display = "none";
            weightField.style.display = "none";
            dimensionsField.style.display = "none";
        }
    });
      
// All Field Are Mandatory
 // Get the form element
 const form = document.querySelector('.add_page');

 form.addEventListener('submit', function(event) {
    // Check if all required fields are filled in
    if (!form.checkValidity()) {
        // Prevent form submission
        event.preventDefault();
        event.stopPropagation();

        // Display validation errors
        const validationErrors = document.querySelectorAll('.invalid-feedback');
        validationErrors.forEach(function(element) {
            const inputField = element.previousElementSibling;
            if (!inputField.checkValidity()) {
                if (inputField.getAttribute('data-type') && inputField.getAttribute('data-type') !== inputField.type) {
                    element.style.display = 'block';
                    element.innerHTML = 'Please provide the data of indicated type.';
                } else {
                    element.style.display = 'block';
                    element.innerHTML = inputField.getAttribute('data-error');
                }
            } else {
                element.style.display = 'none';
            }
        });
    }
});

