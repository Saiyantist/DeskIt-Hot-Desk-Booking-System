
document.addEventListener("DOMContentLoaded", function () {
    const currentLocation = window.location.href;
    const navLinks = document.querySelectorAll('#btn .nav-link');
    
    navLinks.forEach(function (link) {
        link.classList.remove('active'); // Remove 'active' class from all links

        if (link.href === currentLocation) {
            link.classList.add('active'); // Add 'active' class to the current link
        }
    });
});
    