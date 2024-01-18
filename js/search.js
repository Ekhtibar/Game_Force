// ... (ваш существующий код) ...

let input = document.getElementById("searchInput");
let list = document.querySelector(".list");

// Execute function on input event
input.addEventListener("input", (e) => {
    // Clear previous results
    removeElements();
    
    // Get input value
    let inputValue = input.value.toLowerCase();

    // Loop through the keywords array
    for (let i of keywords) {
        // Convert keyword to lowercase
        let keyword = i.toLowerCase();

        // Check if keyword includes the input value
        if (keyword.includes(inputValue) && inputValue !== "") {
            // Create li element
            let listItem = document.createElement("li");
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('" + i + "')");

            // Display matched part in bold
            let index = keyword.indexOf(inputValue);
            let word = keyword.substring(0, index) + "<b>" + keyword.substring(index, index + inputValue.length) + "</b>" + keyword.substring(index + inputValue.length);

            // Display the value in array
            listItem.innerHTML = word;
            list.appendChild(listItem);
        }
    }
});

// ... (ваш существующий код) ...

function removeElements() {
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }
}
