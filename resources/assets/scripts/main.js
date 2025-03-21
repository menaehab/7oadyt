var swiper = new Swiper(".books-slider", {
    loop: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

const swiper1 = new Swiper(".latest-slider", {
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 5200,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        450: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});

function loader() {
    document.querySelector(".loader-container").classList.add("active");
}

function fadeOut() {
    setTimeout(loader, 4000);
}

document.addEventListener("DOMContentLoaded", fadeOut);

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-form").forEach((button) => {
        button.addEventListener("click", function () {
            let slug = this.getAttribute("data-slug");

            Swal.fire({
                title: "هل أنت متأكد؟",
                text: "لن تتمكن من استعادة هذا العنصر!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "نعم، احذفه!",
                cancelButtonText: "إلغاء",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${slug}`).submit();
                }
            });
        });
    });
});
