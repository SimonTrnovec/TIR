<script>
var mojModal = document.getElementById('idModalzrus');
mojModal.addEventListener("show.bs.modal', function(event) {
// ktoré tlačítko vyvolalo modal (show.bs.modal)
let tlacitko = event.relatedTarget;
// prečitanie atributu data-bs-*
let dataText = tlacitko.getAttribute('data-bs-mojedata');
dataPole = dataText.split("::");
// vloženie údajov - meno, datum tlacitko
// document.getElementById("idobsah').getElementsByTagName("b")[0].innerHTML = datapole[1]; // postupné vyhladanie
// alebo presné id
document.querySelector('#idobsah b').innerHTML = datapole[1]; // vyhladanie css selektor
datum = new Date(dataPole[2]);
volby = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
document.querySelector('#idobsah i').innerHTML = datum.toLocalestring('sk-SK', volby);
document.getElementById("idBtnZmazatPHP').href
=
'cms/zmazatBlog.php?id=' + dataPole[@];
})
/*document.getElementById("idBtnZmazatJS").addEventListener('click", function() {
Let modal = bootstrap.Modal.getInstance (mojmodal);
modal.hide();
})*
I
</script>