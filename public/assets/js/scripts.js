/* =====================================
   CoreX Homepage Scripts
   ===================================== */

// Dark Mode Toggle
document.addEventListener("DOMContentLoaded", function () {
    let darkModeToggle = document.getElementById("dark-mode-toggle");
    if (darkModeToggle) {
        darkModeToggle.addEventListener("click", function () {
            document.body.classList.toggle("dark-mode");
            localStorage.setItem("darkMode", document.body.classList.contains("dark-mode"));
        });

        if (localStorage.getItem("darkMode") === "true") {
            document.body.classList.add("dark-mode");
        }
    }
});

// Smooth Scroll to Anchor Links
document.addEventListener("DOMContentLoaded", function () {
    let anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let targetId = link.getAttribute("href").substring(1);
            let targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 60,
                    behavior: "smooth"
                });
            }
        });
    });
});
