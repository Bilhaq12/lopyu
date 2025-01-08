document.addEventListener('DOMContentLoaded', function() {
    const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    if (currentUser) {
        document.getElementById('profileUsername').textContent = currentUser.username;
        document.getElementById('profileEmail').textContent = currentUser.email;
        
        // Simulasi data bacaan
        document.getElementById('mangaCount').textContent = Math.floor(Math.random() * 100);
        document.getElementById('novelCount').textContent = Math.floor(Math.random() * 50);

        const genres = ['Action', 'Romance', 'Fantasy', 'Sci-Fi', 'Horror'];
        const favoriteGenres = genres.sort(() => 0.5 - Math.random()).slice(0, 3);
        const genreList = document.getElementById('favoriteGenres');
        favoriteGenres.forEach(genre => {
            const li = document.createElement('li');
            li.textContent = genre;
            genreList.appendChild(li);
        });
    } else {
        window.location.href = 'index.html';
    }
});