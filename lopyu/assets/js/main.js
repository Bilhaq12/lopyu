window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    const sakuraContainer = document.getElementById('sakura-container');
    
    setTimeout(function() {
        preloader.style.display = 'none';
        document.body.classList.add('loaded');
        
        // Menampilkan sakura setelah preloader hilang
        sakuraContainer.classList.remove('hidden');
        console.log('Sakura container should be visible now');
    }, 2000);
});