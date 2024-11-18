$(function() {
    var $body = $(document);
    $body.bind('scroll', function() {
        // "Desactivar" el scroll horizontal
        if ($body.scrollLeft() !== 0) {
            $body.scrollLeft(0);
        }
    });
}); 

//IMAGEN EDITADA

// Obtener referencia al input y a la imagen

const seleccionArchivos = document.querySelector("#edit_img"),
  imagenPrevisualizacion = document.querySelector("#img-p");

// Escuchar cuando cambie
seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  imagenPrevisualizacion.src = objectURL;
});