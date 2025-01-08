document.addEventListener('DOMContentLoaded', function() {
    const sakuraToggle = document.getElementById('sakuraToggle');
    const sakuraContainer = document.getElementById('sakura-container');

    // Check if sakura preference is stored
    const isSakuraActive = localStorage.getItem('sakuraActive') !== 'false';

    // Set initial state
    if (!isSakuraActive) {
        sakuraContainer.classList.add('hidden');
    }

    sakuraToggle.addEventListener('click', function() {
        sakuraContainer.classList.toggle('hidden');
        const isSakuraActiveNow = !sakuraContainer.classList.contains('hidden');

        // Save preference
        localStorage.setItem('sakuraActive', isSakuraActiveNow);

        // Update button text
        updateButtonText();
    });

    function updateButtonText() {
        const isSakuraActiveNow = !sakuraContainer.classList.contains('hidden');
        sakuraToggle.innerHTML = isSakuraActiveNow 
            ? '<i class="fas fa-cherry-blossom"></i> Disable Sakura'
            : '<i class="fas fa-cherry-blossom"></i> Enable Sakura';
    }

    // Set initial button text
    updateButtonText();
});