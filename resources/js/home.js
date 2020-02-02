class Home {
    constructor(elClass = '.top-search') {
        this.images = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg'];
        this.size = this.images.length;
        this.elClass = elClass;
    }

    randomImage(){
        $(this.elClass)
            .css({'background-image': 'url(/img/carousel/' + this.images[Math.floor(Math.random() * this.size)] + ')'});
        $(this.elClass).fadeIn("slow")
    }
    init(){
        this.randomImage();
    }
}



$( document ).ready(function() {
    let home = new Home('.top-search');
    home.init();
});
