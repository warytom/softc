require('./bootstrap');

document.querySelector('#xml').addEventListener('change', function (){
    var val = this.value.toLowerCase();
    var regex = new RegExp("(.*?)\.(xml)$");
    if(!(regex.test(val))) {
        this.value = "";
        alert('Csak xml fájl formátum tölthető fel!');
        return false;
    }
})







