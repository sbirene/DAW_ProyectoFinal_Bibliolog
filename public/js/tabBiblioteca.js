function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // Oculta todos los elementos con class="tabcontent"
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Elimina la clase "active" de todos los botones
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Muestra el tab actual y agrega la clase "active" al botón que lo abrió
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}