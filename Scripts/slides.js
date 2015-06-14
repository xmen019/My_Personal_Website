$(function(){
    $(".carousel").carouFredSel({
        prev: ".prev",
        next: ".next",
        auto: {
            button: ".play",
            progress: ".timer",
            pauseOnEvent: "resume"
        },
        scroll: {
            fx: "fade"
        }
    });
});