document.addEventListener("DOMContentLoaded", function(){
    const backToTop = document.querySelector(".scroll-top");
    backToTop.style.display = "none";

    function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
    }

    window.setTimeout(fadeout, 500);

    window.onscroll = function () {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTop.style.display = "flex";
        } else {
            backToTop.style.display = "none";
        }
    };
});
