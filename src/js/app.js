document.addEventListener('DOMContentLoaded', function () {
    eventListeners();

    darkmode();
});

function darkmode() {

    const prefiereTemaClaro = window.matchMedia('(prefers-color-scheme: light)');
    if (prefiereTemaClaro.matches) {
        document.body.classList.remove('dark-mode');
    } else {
        document.body.classList.add('dark-mode');
    }

    prefiereTemaClaro.addEventListener('change', function () {
        if (prefiereTemaClaro.matches) {
            document.body.classList.remove('dark-mode');
        } else {
            document.body.classList.add('dark-mode');
        }
    });


    const botonDark = document.querySelector('.dark-mode-boton');


    botonDark.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
};

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // if (navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else{
    //     navegacion.classList.add('mostrar');
    // }
    navegacion.classList.toggle('mostrar'); /*forma corta de agregar y quitar una clase*/
}