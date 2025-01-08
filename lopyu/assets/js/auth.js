document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }

    function validatePassword(password) {
        // Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka
        const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return re.test(password);
    }

    function showError(formId, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger mt-3';
        errorDiv.textContent = message;
        document.getElementById(formId).appendChild(errorDiv);
        setTimeout(() => errorDiv.remove(), 3000);
    }

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        
        if (!validateEmail(email)) {
            showError('loginForm', 'Please enter a valid email address.');
            return;
        }

        // Simulasi login
        const users = JSON.parse(localStorage.getItem('users') || '[]');
        const user = users.find(u => u.email === email && u.password === password);
        
        if (user) {
            alert('Login successful!');
            localStorage.setItem('currentUser', JSON.stringify(user));
            loginModal.hide();
            updateUIAfterAuth();
        } else {
            showError('loginForm', 'Invalid email or password.');
        }
    });

    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('signupUsername').value;
        const email = document.getElementById('signupEmail').value;
        const password = document.getElementById('signupPassword').value;
        const confirmPassword = document.getElementById('signupConfirmPassword').value;

        if (!validateEmail(email)) {
            showError('signupForm', 'Please enter a valid email address.');
            return;
        }

        if (!validatePassword(password)) {
            showError('signupForm', 'Password must be at least 8 characters long and contain uppercase, lowercase, and numbers.');
            return;
        }

        if (password !== confirmPassword) {
            showError('signupForm', 'Passwords do not match!');
            return;
        }

        // Simulasi sign up
        const users = JSON.parse(localStorage.getItem('users') || '[]');
        if (users.some(u => u.email === email)) {
            showError('signupForm', 'This email is already registered.');
            return;
        }

        users.push({ username, email, password });
        localStorage.setItem('users', JSON.stringify(users));
        alert('Sign up successful! You can now log in.');
        signupModal.hide();
    });

    function updateUIAfterAuth() {
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (currentUser) {
            // Update UI untuk user yang sudah login
            document.querySelector('.ms-3').innerHTML = `
                <span class="text-light me-2">Welcome, ${currentUser.username}!</span>
                <button id="logoutBtn" class="btn btn-outline-light">Logout</button>
            `;
            document.getElementById('logoutBtn').addEventListener('click', logout);
        }
    }

    function logout() {
        localStorage.removeItem('currentUser');
        location.reload(); // Reload halaman untuk mereset UI
    }

    // Check jika user sudah login saat halaman dimuat
    updateUIAfterAuth();

    function updateUIAfterAuth() {
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (currentUser) {
            document.getElementById('authSection').classList.add('d-none');
            document.getElementById('userDropdown').classList.remove('d-none');
            document.getElementById('username').textContent = currentUser.username;
        } else {
            document.getElementById('authSection').classList.remove('d-none');
            document.getElementById('userDropdown').classList.add('d-none');
        }
    }
    
    function logout() {
        localStorage.removeItem('currentUser');
        location.reload();
    }
    
    document.getElementById('logoutBtn').addEventListener('click', logout);
    
    document.getElementById('settingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const currentUser = JSON.parse(localStorage.getItem('currentUser'));
        const newUsername = document.getElementById('settingsUsername').value;
        const newEmail = document.getElementById('settingsEmail').value;
        const newPassword = document.getElementById('settingsNewPassword').value;
    
        if (newUsername) currentUser.username = newUsername;
        if (newEmail) currentUser.email = newEmail;
        if (newPassword) currentUser.password = newPassword;
    
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        alert('Settings updated successfully!');
        updateUIAfterAuth();
    });
    
    // Call this function when the page loads
    updateUIAfterAuth();
    
});