document.addEventListener("DOMContentLoaded", function () {
    const currentLocation = window.location.href;
    const navLinks = document.querySelectorAll('.sidebar-link');
    
    navLinks.forEach(function (link) {
        link.classList.remove('active'); // Remove 'active' class from all links

        if (link.href === currentLocation) {
            link.classList.add('active'); // Add 'active' class to the current link
        }
    });
});

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('expand');
}