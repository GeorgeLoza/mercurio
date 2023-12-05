
/* Modo Oscuro */

document.addEventListener('DOMContentLoaded', function () {
    const darkToggle = document.querySelector('#darkToggle');

    // Función para cambiar el tema
    function toggleDarkMode() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

    // Verificar si el tema oscuro está activado y actualizar el toggle
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        darkToggle.checked = true;
    }

    // Event listener para el toggle
    darkToggle.addEventListener('change', function () {
        toggleDarkMode();
    });
});
