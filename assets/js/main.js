document.addEventListener("DOMContentLoaded", function () {
    let iconOpen = document.getElementById("iconOpen");
    let iconClose = document.getElementById("iconClose");
    let text1 = document.getElementById("text1");
    let menuOpen = false;

    iconOpen.addEventListener("click", function () {
        if (!menuOpen) {
            text1.style.display = "flex";
            iconOpen.style.display = "none";
            iconClose.style.display = "flex";
            text1.style.animation = "animationburgerbyHugo 0.3s forwards";
            menuOpen = true;
        }
    });

    iconClose.addEventListener("click", function () {
        if (menuOpen) {
            text1.style.animation = "animationburgerbyHugoClose 0.3s forwards";
            iconOpen.style.display = "flex";
            iconClose.style.display = "none";
            menuOpen = false;

            setTimeout(function () {
                text1.style.display = "none";
            }, 300); 
        }
    });
});