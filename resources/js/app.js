import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";
import $ from "jquery";

document.addEventListener("DOMContentLoaded", () => {
    $(".slider-img").on("click", function () {
        $(".slider-img").removeClass("active");
        $(this).addClass("active");
    });
});

AOS.init();
