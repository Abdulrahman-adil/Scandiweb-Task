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
