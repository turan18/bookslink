let viewer;
const previewCanvas = document.querySelector('#viewerCanvas');
const close_preview = document.querySelector('#closeCanvas');


google.books.load();
google.books.setOnLoadCallback(initialize);

function initialize() {
    viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
}
function embedFailed(){
    const read_button = document.querySelector('#readButton');
    read_button.disabled = true;
    read_button.setAttribute('title','Book could not be embedded.');
}
function loadBook(isbn) {
    initialize();
    viewer.load(`ISBN:${isbn}`, embedFailed);
    openPreview();
}


function openPreview(){

    let wrapper = document.querySelector('#wrapper');

    document.body.scrollTop = document.documentElement.scrollTop = 0;
    wrapper.classList.add('opacity-30');
    previewCanvas.classList.remove('invisible');
    close_preview.classList.remove('invisible');



}

function closePreview(){

    let wrapper = document.querySelector('#wrapper');

    wrapper.classList.remove('opacity-30');
    close_preview.classList.add('invisible');
    previewCanvas.classList.add('invisible');


}
