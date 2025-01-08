document.addEventListener('DOMContentLoaded', function() {
    const profilePicture = document.getElementById('profilePicture');
    const profilePreview = document.getElementById('profilePreview');
    const settingsForm = document.getElementById('settingsForm');

    profilePicture.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    settingsForm.addEventListener('submit', async function(event) {
        event.preventDefault();
        
        const formData = new FormData();
        formData.append('username', document.getElementById('settingsUsername').value);
        formData.append('email', document.getElementById('settingsEmail').value);
        formData.append('newPassword', document.getElementById('settingsNewPassword').value);
        formData.append('profilePicture', profilePicture.files[0]);

        try {
            const response = await fetch('https://lopyumanga.site/api/user/settings', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            console.log('Settings saved:', data);
            alert('Settings saved successfully!');
        } catch (error) {
            console.error('Error saving settings:', error);
            alert('Error saving settings. Please try again.');
        }
    });
});