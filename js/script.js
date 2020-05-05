$(function () {
    
    $('#contact-form').submit(function(e) {  // Va éxécuter tout le code suivant lorsqu'un fomulaire sera soumit.
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize(); // Permet de créer la data à envoyé au PHP.
        
        $.ajax({
            type: 'POST',
            url: 'admin/contact.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) // Exécution du code si le résultat de ma variable isSuccess est true pour l'envoie de mon formulaire.
                {
                    $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>"); // Me permet d'afficher mon message de remerciement.
                    $('#contact-form')[0].reset();// Me permet de remettre mes champs de mon formulaire à zéro.
                }
                else
                {
                    $('#firstname + .comments').html(json.firstnameError);
                    $('#name + .comments').html(json.nameError); // Permet d'afficher le message d'erreur correspondant au champ ciblé.
                    $('#email + .comments').html(json.emailError);
                    $('#phone + .comments').html(json.phoneError);
                    $('#message + .comments').html(json.messageError);
                }                
            }
        });
    });

})