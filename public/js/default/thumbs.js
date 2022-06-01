let thumbnail = document.getElementById('thumb').getElementsByTagName('a'),
    frontPic = document.getElementById('main');

    thumbnail.onclick = function() {
        frontPic.src = this.getAttribute("href");



}