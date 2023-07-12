let loginButton = document.querySelector("#login");
// Récupérer le bouton de connexion et écouter l'événement de clic
loginButton.addEventListener("click", function (e) {
    e.preventDefault();
    // Récupérer les valeurs des champs email et mot de passe
    let email = document.querySelector("#loginEmail").value;
    let password = document.querySelector("#loginPassword").value;

    // Récupérer l'élément HTML pour afficher les erreurs
    let errorEmail = document.querySelector('#formErrorsEmail');
    
    // Vérifier que les champs email et mot de passe ne sont pas vides
    if (!email || !password) {
        errorEmail.style.color = 'red';
        errorEmail.innerHTML = `<p>Veuillez remplir tous les champs</p>`;
    }
    // Créer une nouvelle requête AJAX
    let xhr = new XMLHttpRequest();
    
    // Définir la fonction de rappel qui sera appelée lorsque la réponse sera reçue
    xhr.onreadystatechange = function () {
        console.log(this.responseText);
        // Vérifier si la réponse est prête et a été récupérée avec succès
        if (this.readyState == 4 && this.status == 200) {
            // Analyser la réponse JSON renvoyée par le serveur
            let response = xhr.response;
            
            // Vérifier si l'utilisateur est connecté ou non
            if (response && Object.keys(response).length == 0) {
                // Si l'utilisateur n'est pas connecté, afficher un message d'erreur
                errorEmail.style.color = 'red';
                errorEmail.innerHTML = `<p>Nom d'utilisateur ou mot de passe incorrect</p>`;
            } 

/*             if (response.length == 0) {
                window.location.reload();
            } */
        }
    };
    // Configurer la requête et envoyer la requête GET avec les données du formulaire en tant que paramètres d'URL
    xhr.open("GET", "./controllers/user/loginController.php?loginEmail=" + email + "&loginPassword=" + password, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
});
