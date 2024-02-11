document.addEventListener("DOMContentLoaded", function () {
    const progressbar = document.querySelector('.progressbar');
    const body = document.querySelector('body');

    const animateProgressBar = () => {
        let scrollDistance = -(body.getBoundingClientRect().top);
        let progressWidth = (scrollDistance / (body.getBoundingClientRect().height)) * 110;
        console.log(progressWidth);
        let value = Math.floor(progressWidth);
        progressbar.style.width = value + "%";
    }

    window.addEventListener('scroll', animateProgressBar);
});
