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
    $('#liinscription').bind("click", maFonctionLigue);
    function maFonctionLigue(){
        $.post("ajax/traiterligues.php",{
            
        }, foncRetourLigues, "json");
    }
    
    function foncRetourLigues(lesLigues){
        for(i=0; i<lesLigues.length; i++){
            var uneLigue=lesLigues[i];
            var idLigue=uneLigue['numeroligue'];
            var nomLigue=uneLigue['nom'];
            
            html="<option value="+idLigue+">"+nomLigue+"</option>";
            $('#inscription #inscriptionliguesp').append(html);
        }
    }
    
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
    
    /*-------------------Page Mes informations ----------------------*/
    $('#btnmesinformations').bind("click", maFonctionLigueAffiliee);
    function maFonctionLigueAffiliee(){
        var login = $("#connexion #login").val();
        
        $.post("ajax/traiterligueaffiliee.php",{
            "login" : login},
        foncRetourLigueAffiliee, "json");
    }
    
    var ligueAffiliee;
    
    function foncRetourLigueAffiliee(ligueaff){
        ligueAffiliee = ligueaff['Nom'];
    }
    
    $('#btnmesinformations').bind("click", maFonctionInformations);
    function maFonctionInformations(){
        var login = $("#connexion #login").val();
        var motdepasse = $("#connexion #motdepasse").val();
        
        $.post("ajax/traitermesinformations.php",{
            "login" : login,
            "motdepasse" : motdepasse},
        foncRetourInfos, "json");
    }
    
    function foncRetourInfos(lesinfos){
        var licence = lesinfos['numerolicence'];
        var ligue = ligueAffiliee;
        var nom = lesinfos['Nom'];
        var prenom = lesinfos['Prenom'];
        var ddn = lesinfos['ddnaissance'];
        var sexe = lesinfos['sexe'];
        var mail = lesinfos['adressemail'];
        
        var rue = lesinfos['rue'];
        var cp = lesinfos['cp'];
        var ville = lesinfos['ville'];
        
        
        html="<p><b>Numéro licence : </b>"+licence+"</p>";
        html+="<p><b>Ligue d'affiliation : </b>"+ligue+"</p>";
        html+="<p><b>Nom : </b>"+nom+"</p>";
        html+="<p><b>Prénom : </b>"+prenom+"</p>";
        html+="<p><b>Date de naissance (jj/mm/aaaa) : </b>"+ddn+"</p>";
        html+="<p><b>Sexe : </b>"+sexe+"</p>";
        html+="<p><b>Adresse e-mail : </b>"+mail+"</p>";
        html+="<p><b>Adresse : </b>"+rue+", "+ville+", "+cp+"</p>";

        $('#mesinformations #mesinfos').append(html);        
    }
    

})