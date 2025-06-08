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

//// NAVBAR SCROLL BIASA, ALWAYS VISIBLE
// window.addEventListener("scroll", function () {
//     const navbar = document.getElementById("navbar");
//     if (window.scrollY > 10) {
//         navbar.classList.add("scrolled");
//     } else {
//         navbar.classList.remove("scrolled");
//     }
// });

//// NAVBAR SCROLL TOP HIDDEN, DEFAULT VISIBLE
let lastScrollTop = 0;

window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");
    const currentScroll = window.scrollY;

    if (currentScroll === 0) {
        // Sudah sampai paling atas, aktifkan navbar lagi
        navbar.classList.remove("scrolled");
        navbar.style.pointerEvents = "auto";
        navbar.style.opacity = "1";
        return;
    }

    if (currentScroll > lastScrollTop) {
        // Scroll ke bawah → aktifkan navbar
        navbar.classList.add("scrolled");
        navbar.style.pointerEvents = "auto";
        navbar.style.opacity = "1";
    } else {
        // Scroll ke atas → nonaktifkan navbar
        navbar.classList.remove("scrolled");
        navbar.style.pointerEvents = "none";
        navbar.style.opacity = "0";
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});

AOS.init();

////MODAL JS
$(document).ready(function () {
    $(".open-modal").on("click", function () {
        const nama = $(this).data("nama");
        const harga = $(this).data("harga");
        const desk = $(this).data("desk");

        $("#modal-nama").text(nama);
        $("#modal-desk").text(desk);
        $("#modal-harga").text("Rp " + harga);
        $("#modal-satuan").text("per hari");
        $("#global-modal").addClass("show");
    });

    $(".close-modal").on("click", function () {
        $("#global-modal").removeClass("show");
    });

    // Modal for Check Signature Step 1
    $(".open-check-signature-modal").on("click", function () {
        $("#check-signature-step1-modal").addClass("show");
        $("#check-signature-step2-success-modal").removeClass("show");
        $("#check-signature-step2-fail-modal").removeClass("show");
        $("#signature-code-input").val("");
    });
    $(".close-modal-step1").on("click", function () {
        $("#check-signature-step1-modal").removeClass("show");
    });
    $(".close-modal-step2").on("click", function () {
        $("#check-signature-step2-success-modal").removeClass("show");
        $("#check-signature-step2-fail-modal").removeClass("show");
    });
    $("#check-signature-btn").on("click", function () {
        const code = $("#signature-code-input").val();
        $("#check-signature-step1-modal").removeClass("show");
        if (code === "VALID123") {
            $("#check-signature-step2-success-modal").addClass("show");
        } else {
            $("#check-signature-step2-fail-modal").addClass("show");
        }
    });
});

////PENDAPAT SWIPE MENGGUNAKAN ALPHINE JS
