
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('admin-login-form');

    form.addEventListener('submit', function(event) {
        const pseudo = document.getElementById('admin-pseudo').value;
        const password = document.getElementById('admin-password').value;
        
        if (!pseudo || !password) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            alert('Veuillez remplir tous les champs.');
        }
    });
});
