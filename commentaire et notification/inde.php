<Php>


< html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Entreprise</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Notifications et Commentaires</h1>

        <!-- Notifications -->
        <div id="notifications" class="mt-5">
            <h2>Notifications</h2>
            <div class="list-group" id="notification-list">
                <!-- Les notifications seront chargées ici -->
            </div>
        </div>

        <!-- Commentaires -->
        <div id="comments" class="mt-5">
            <h2>Commentaires</h2>
            <div id="comment-form" class="mb-4">
                <div class="form-group">
                    <textarea id="comment-content" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                </div>
                <button id="submit-comment" class="btn btn-primary">Envoyer</button>
            </div>
            <div class="list-group" id="comment-list">
                <!-- Les commentaires seront chargés ici -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fonction pour obtenir les paramètres de l'URL
        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }

        var id_tache = getParameterByName('id_tache');
        var id_projet = getParameterByName('id_projet');

        // Fonction pour charger les notifications
        function loadNotifications() {
            fetch('/gestion_entreprise/api/get_notifications.php')
                .then(response => response.json())
                .then(data => {
                    let notificationsDiv = document.getElementById('notification-list');
                    notificationsDiv.innerHTML = '';
                    data.forEach(notification => {
                        notificationsDiv.innerHTML += `<a href="#" class="list-group-item list-group-item-action">${notification.description}</a>`;
                    });
                })
                .catch(error => console.error('Erreur lors du chargement des notifications:', error));
        }

        // Fonction pour charger les commentaires
        function loadComments(id_tache, id_projet) {
            fetch(`/gestion_entreprise/api/get_comments.php?id_tache=${id_tache}&id_projet=${id_projet}`)
                .then(response => response.json())
                .then(data => {
                    let commentsDiv = document.getElementById('comment-list');
                    commentsDiv.innerHTML = '';
                    data.forEach(comment => {
                        commentsDiv.innerHTML += `<div class="list-group-item">${comment.nom} ${comment.prenom}: ${comment.description}</div>`;
                    });
                })
                .catch(error => console.error('Erreur lors du chargement des commentaires:', error));
        }

        // Fonction pour ajouter un commentaire
        function addComment(description, id_tache, id_projet) {
            fetch('/gestion_entreprise/api/add_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ description, id_tache: id_tache, id_projet: id_projet }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    loadComments(id_tache, id_projet);
                } else {
                    console.error('Erreur lors de l\'ajout du commentaire:', data);
                }
            })
            .catch(error => console.error('Erreur lors de l\'ajout du commentaire:', error));
        }

        // Événement pour envoyer un commentaire
        document.getElementById('submit-comment').addEventListener('click', function() {
            let content = document.getElementById('comment-content').value;
            if (content) {
                addComment(content, id_tache, id_projet);
                document.getElementById('comment-content').value = '';
            } else {
                alert('Veuillez entrer un commentaire.');
            }
        });

        // Charger les notifications et commentaires initiaux
        if (id_tache && id_projet) {
            loadNotifications();
            loadComments(id_tache, id_projet);
        } else {
            console.error('Les identifiants de tâche et de projet sont requis.');
        }
    </script>
</body>
</html>


