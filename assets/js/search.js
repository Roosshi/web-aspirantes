function buscarAspirante(nombre) {
    /**
     * funcion que toma un string, lo busca en la columna
     * Nombre(s) de la tabla y muestra solo los resultados.
     */

    let nombre_aspirante = nombre.toLowerCase();
    let nombre_fila = '';
    let filas = document.getElementsByTagName('tr');

    //empieza desde 1 porque 0 es el head de la tabla.
    //cells[2] porque esa es la columna de Nombres.
    for (let indice = 1; indice < filas.length; indice++) {
        nombre_fila = filas[indice].cells[2].innerText.toLowerCase();
        if (nombre_fila.indexOf(nombre_aspirante) > -1) {
            filas[indice].style.display = '';
        } else {
            filas[indice].style.display = 'none';
        }
    }
}
