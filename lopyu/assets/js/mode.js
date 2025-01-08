document.addEventListener('DOMContentLoaded', function() {
    const nightModeToggle = document.getElementById('nightModeToggle');
    const body = document.body;

    // Check if night mode preference is stored
    const isNightMode = localStorage.getItem('nightMode') === 'true';

    // Set initial mode
    if (isNightMode) {
        body.classList.add('night-mode');
        nightModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    }

    nightModeToggle.addEventListener('click', function() {
        body.classList.toggle('night-mode');
        const isNightModeNow = body.classList.contains('night-mode');

        // Save preference
        localStorage.setItem('nightMode', isNightModeNow);

        // Change icon
        if (isNightModeNow) {
            nightModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            nightModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
    });
});