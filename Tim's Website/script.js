document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('menuButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
  
    menuButton.addEventListener('click', function() {
      dropdownMenu.classList.toggle('show');
    });
  });
  