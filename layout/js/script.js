function submitForm() {
    document.getElementById("product-form").submit();
}

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

    document.addEventListener('DOMContentLoaded', () => {
        // Get the delete button
        const deleteBtn = document.querySelector('.delete-btn');
        console.log(deleteBtn);

        // Add event listener to the delete button
        deleteBtn.addEventListener('click', () => {
            // Get all checked checkboxes
            const checkboxes = document.querySelectorAll('.form-check-input:checked');
    
            // Get the product IDs from the checkboxes
            const productIds = Array.from(checkboxes).map((checkbox) => {
                return checkbox.id.split('-')[1];
            });
    
            // Make an AJAX request to delete the products
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'home.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // Reload the page to show the updated product list
                    location.reload();
                } else {
                    console.error(xhr.statusText);
                }
            };
            xhr.onerror = () => {
                console.error(xhr.statusText);
            };
            xhr.send(`delete&id=${productIds.join(',')}`);
        });
    
        // Get all checkboxes
        const checkboxes = document.querySelectorAll('.form-check-input');
    
        // Add event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                // Get the parent card element
                const card = event.target.closest('.card');
    
                // Get the product ID from the checkbox ID
                const productId = event.target.id.split('-')[1];
    
                // Make an AJAX request to delete the product from the database
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'home.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        // Remove the card element from the DOM
                        location.reload();
                    } else {
                        console.error(xhr.statusText);
                    }
                };
                xhr.onerror = () => {
                    console.error(xhr.statusText);
                };
                xhr.send(`delete&id=${productId.join(',')}`);
            });
        });
    });