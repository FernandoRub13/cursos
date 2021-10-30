//Funcionalidad para crear el slug del titulo del curso
let sluger = (strinToSlug)=>{
  // trim the string          
  strinToSlug = strinToSlug.replace(/^\s+|\s+$/g, ''); 
  //remove extra white spaces between words
  strinToSlug = strinToSlug.replace(/\s+/g, '-');
  // remove invalid chars
  strinToSlug = strinToSlug.replace(/[^a-z0-9\-]/gi, ""); 
  //remove extra dashes between words
  strinToSlug = strinToSlug.replace(/\-+/g, '-');
  //remove extra dashes in the sides of the words
  strinToSlug = strinToSlug.replace(/^\-+|\-+$/g, '');
  // strign to lower case
  return strinToSlug.toLowerCase();
}
let slug = document.getElementById('slug');
document.addEventListener('keyup', (event)=>{
  if (event.target.matches('#title')) {
   slug.value = sluger(event.target.value);
  }
})
// Inicializamos el editor de texto
tinymce.init({
  selector: 'textarea#description',
});
 //funcionalidad para convertir la imagen a base 64
let file = document.getElementById('file');
let image = document.getElementById('picture');
file.addEventListener('change', (event)=>{
  let file = event.target.files[0];
  let reader = new FileReader();
  reader.onload = (event)=>{
    image.src = event.target.result;
  }
  reader.readAsDataURL(file);
})