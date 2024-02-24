//Initialize the bot on first load
const redirect_button = document.querySelector('.next-arrow');
window.addEventListener("DOMContentLoaded", (event) => {
    redirect_button.addEventListener('click', btnclick);

    function btnclick() {
        redirect_button.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        var audio = new Audio('assets/sounds/welcome.mp3');
        audio.play();
        setTimeout(function () {
            window.location.href = "login.html";
        }, 5000);
    }
});
