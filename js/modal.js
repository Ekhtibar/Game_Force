

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    var overlay = document.getElementById("overlay");
    if (modal && overlay) {
      modal.style.display = "none";
      overlay.style.display = "none";
      document.body.style.overflow = "auto"; // Восстановление прокрутки страницы
    }
  }
  
  function openModal(modalId) {
    var modal = document.getElementById(modalId);
    var overlay = document.getElementById("overlay");
    if (modal && overlay) {
      modal.style.display = "block";
      overlay.style.display = "block";
      document.body.style.overflow = "hidden"; // Запрет прокрутки страницы
    }
  }
  
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("modal")) {
      closeModal('myModal');
    }
  });
  
  document.querySelectorAll(".modal-content").forEach(function (content) {
    content.addEventListener("click", function (event) {
      event.stopPropagation();
    });
  });