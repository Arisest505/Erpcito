
    function toggleSideMenu() {
        var sideMenu = document.getElementById('sideMenu');
        var menuToggle = document.querySelector('.menu-toggle');
        var mainContent = document.querySelector('.main-content');

        // Verifica la posición del menú
        var sideMenuLeft = parseInt(window.getComputedStyle(sideMenu).left);

        if (sideMenuLeft === -250) {
            sideMenu.style.left = '0';
            menuToggle.innerHTML = '&#10005;'; // Cambia el icono a una X (cerrar)
            mainContent.classList.add('menu-open');
        } else {
            sideMenu.style.left = '-250px';
            menuToggle.innerHTML = '&#9776;'; // Cambia el icono a las barras (hamburguesa)
            mainContent.classList.remove('menu-open');
        }
    }

    // Control de los botones desplegables
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownBtns = document.querySelectorAll('.dropdown-btn');
        dropdownBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var dropdownContent = this.nextElementSibling;
                dropdownContent.classList.toggle('show');
            });
        });
    });
