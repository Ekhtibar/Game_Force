// Закрытие модального окна по его ID
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";
    }
}

// Функция открытия модального окна по его ID
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "block";
    }
}

// Закрытие модального окна при клике вне его области
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("modal-page")) {
        event.target.style.display = "none";
    }
});

// Отмена закрытия модального окна при клике внутри его содержимого
document.querySelectorAll(".modal-content").forEach(function (content) {
    content.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});

