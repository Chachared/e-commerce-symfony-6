
    thumb = document.getElementById('thumb').getElementsByTagName('img'),
    main = document.getElementById('main');
    setClickFunction();

function setClickFunction() {
    thumb.onclick = function() {
        main.src = thumb.src;
    };
}