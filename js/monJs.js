$(function(){
    /*-------------------Page connexion----------------------*/
    $('#connexion #btnconnexion').bind("click", fonctionConnexion);
    function fonctionConnexion(e){
        e.preventDefault();
        var login = $("#connexion #login").val();
        var motdepasse = $("#connexion #motdepasse").val();
        $.post("ajax/traiterconnexion.php",{
            "login" : login,
            "motdepasse" : motdepasse},
            foncRetourConnexion,"json");       
    };
    
    function foncRetourConnexion(data){
        if(data != null){
            console.log("connexion ok ! ");
            document.location.href="#tableaudebord";
        }
        else{
            $("#connexion #message").css({color:'red'});
            $("#connexion #message").html("erreur de login et/ou mdp");
        }
    }
    
    /*-------------------Page inscription ----------------------*/
    $('#inscription #btninscription').bind("click", fonctionInscription);
    function fonctionInscription(e){
        e.preventDefault();
        var login = $("#inscription #inscriptionlogin").val();
        var motdepasse = $("#inscription #inscriptionmotdepasse").val();
        var confirmmdp = $("#inscription #cmotdepasse").val();
        var nom = $("#inscription #inscriptionnom").val();
        var prenom = $("#inscription #inscriptionprenom").val();
        var ddn = $("#inscription #inscriptionddn").val();
        var sexe = $("#inscription #inscriptionsexe").val();
        var liguesp = $("#inscription #inscriptionliguesp").val();
        var numlicence = $("#inscription #inscriptionnumlicence").val();
        var rue = $("#inscription #inscriptionadresse").val();
        var cp = $("#inscription #inscriptioncp").val();
        var ville = $("#inscription #inscriptionville").val();
        
        if(login != "" & motdepasse != "" & confirmmdp != "" & numlicence != "" & liguesp != "" & motdepasse == confirmmdp){
            $.post("ajax/traiterinscription.php",{
            "login" : login,
            "motdepasse" : motdepasse,
            "nom" : nom,
            "prenom" : prenom,
            "ddn" : ddn,
            "sexe" : sexe, 
            "liguesp" : liguesp,
            "numlicence" : numlicence, 
            "rue" : rue,
            "cp" : cp, 
            "ville" : ville},
            foncRetourInscription, "json");
        }  
        else{
            $("#inscription #message").css({color:'red'});
            $("#inscription #message").html("Erreur lors de l'inscription.. Rééssayez !");
        }
    };
    
    function foncRetourInscription(data){
        if(data = true){
            console.log("inscription ok !");
            document.location.href="#connexion";
            $("#connexion #message").css({color:'green'});
            $("#connexion #message").html("Vous avez bien été enregistré, vous pouvez vous connecter !");
        }    
    }
    

})