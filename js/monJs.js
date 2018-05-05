$(function(){
    /*-------------------Page connexion----------------------*/
    $('#connexion #btnconnexion').click(fonctionConnexion);
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
            window.numlicence=data['numerolicence'];
            console.log("connexion ok ! ");
            document.location.href="#tableaudebord";
        }
        else{
            $("#connexion #message").css({color:'red'});
            $("#connexion #message").html("erreur de login et/ou mdp");
        }
    }
    
    /*-------------------Page inscription ----------------------*/
    $('#liinscription').click(maFonctionListeLigues);
    function maFonctionListeLigues(){
        $.post("ajax/traiterligues.php",{
            
        }, foncRetourLigues, "json");
    }
    
    function foncRetourLigues(lesLigues){
        
        var ligues="";
        $('#inscription #inscriptionliguesp').html(ligues);
        
        for(i=0; i<lesLigues.length; i++){
            var uneLigue=lesLigues[i];
            var idLigue=uneLigue['numeroligue'];
            var nomLigue=uneLigue['nom'];
            
            ligues="<option value="+idLigue+">"+nomLigue+"</option>";
            $('#inscription #inscriptionliguesp').append(ligues);
        }
       
    }
    
    $('#inscription #btninscription').click(fonctionInscription);
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
        
        if(motdepasse == confirmmdp){
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
            $("#inscription #message").html("Veuillez confirmez votre mot de passe !");
        }
    };
    
    function foncRetourInscription(data){
        if(data == true){
            document.location.href="#connexion";
            $("#connexion #message").css({color:'green'});
            $("#connexion #message").html("Vous avez bien été enregistré, vous pouvez vous connecter !");
        }
        else{
            $("#inscription #message").css({color:'red'});
            $("#inscription #message").html("Erreur lors de l'inscription veuillez réessayez ...! ");
        }
    }
    
    /*-------------------Page Mes informations ----------------------*/
    $('#btnmesinformations').click(maFonctionInformations);
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
        var ligue = lesinfos['ligueaffiliee'];
        var nom = lesinfos['Nom'];
        var prenom = lesinfos['Prenom'];
        var ddn = lesinfos['ddnaissance'];
        var sexe = lesinfos['sexe'];
        var mail = lesinfos['adressemail'];
        
        var rue = lesinfos['rue'];
        var cp = lesinfos['cp'];
        var ville = lesinfos['ville'];
        
        
        infos="<p><b>Numéro licence : </b>"+licence+"</p>";
        infos+="<p><b>Ligue d'affiliation : </b>"+ligue+"</p>";
        infos+="<p><b>Nom : </b>"+nom+"</p>";
        infos+="<p><b>Prénom : </b>"+prenom+"</p>";
        infos+="<p><b>Date de naissance (jj/mm/aaaa) : </b>"+ddn+"</p>";
        infos+="<p><b>Sexe : </b>"+sexe+"</p>";
        infos+="<p><b>Adresse e-mail : </b>"+mail+"</p>";
        infos+="<p><b>Adresse : </b>"+rue+", "+ville+", "+cp+"</p>";

        $('#mesinformations #mesinfos').html(infos);     
    }
    
    /*-------------------Page Saisir frais ----------------------*/
    $('#btnsaisirfrais').click(maFonctionListeMotifs);
    function maFonctionListeMotifs(){
        $.post("ajax/traitermotifs.php",{
            
        }, foncRetourMotifs, "json");
    }
    
    function foncRetourMotifs(lesMotifs){
        
        var motifs="";
        $('#saisirfrais #fraismotif').html(motifs);
        
        for(i=0; i<lesMotifs.length; i++){
            var unMotif=lesMotifs[i];
            var idMotif=unMotif['id_motif'];
            var libelleMotif=unMotif['libelle'];
            
            motifs="<option value="+idMotif+">"+libelleMotif+"</option>";
            $('#saisirfrais #fraismotif').append(motifs);
        }
        
    }
    
    $('#btnenvoifrais').click(fonctionSaisieFrais);
    function fonctionSaisieFrais(e){
        e.preventDefault();
        
        var demandeurmail = $("#saisirfrais #liendemandeur").val();
        var fraisnumlicence = $("#saisirfrais #fraisnumlicence").val();   
        var fraisdate = $("#saisirfrais #fraisdate").val();
        var fraismotif = $("#saisirfrais #fraismotif").val();
        var fraistrajet = $("#saisirfrais #fraistrajet").val();
        var fraiskm = $("#saisirfrais #fraiskm").val();
        var fraispeage = $("#saisirfrais #fraispeage").val();
        var fraisrepas = $("#saisirfrais #fraisrepas").val();
        var fraishebergement = $("#saisirfrais #fraishebergement").val();
        
        if(fraisnumlicence != "" & fraisdate != "" & fraismotif != "" & fraistrajet != "" & fraiskm != "" & fraispeage != "" & fraisrepas != "" & fraishebergement != ""){

            $.post("ajax/traitersaisiefrais.php",{
               "demandeurmail" : demandeurmail,
               "fraisdate" : fraisdate,
               "fraismotif" : fraismotif, 
               "fraistrajet" : fraistrajet,
               "fraiskm" : fraiskm,
               "fraispeage" : fraispeage, 
               "fraisrepas" : fraisrepas,
               "fraishebergement" : fraishebergement},
            foncRetourSaisieFrais, "json");
            
            $.post("ajax/traiterlienfrais.php",{
              "demandeurmail" : demandeurmail,
              "fraisnumlicence" : fraisnumlicence}, "json");
            
        } else{
            $("#saisirfrais #message").css({color:'red'});
            $("#saisirfrais #message").html("Erreur veuillez remplir tous les champs et vérifiez que votre adresse email est correcte..! ");
        }  
        
    }
    
    function foncRetourSaisieFrais(data){
        if(data == true){
            document.location.href="#monbordereau";
            $("#monbordereau #message").css({color:'green'});
            $("#monbordereau #message").html("Frais bien enregistré, vous pouvez le consulter à tout moment en cliquant sur \"Afficher lignes de frais\" !");
            
        }else{
            $("#saisirfrais #message").css({color:'red'});
            $("#saisirfrais #message").html("Informations concernant les frais invalides..! ");
        }
    }
    
    /*-------------------Page Saisir Demandeurs ----------------------*/
    $('#btnenvoidemandeurs').click(maFonctionEnvoiDemandeurs);
    function maFonctionEnvoiDemandeurs(e){
        e.preventDefault();
        var demandeurmail = $("#saisirdemandeurs #demandeurmail").val();
        var demandeurnom = $("#saisirdemandeurs #demandeurnom").val();
        var demandeurprenom = $("#saisirdemandeurs #demandeurprenom").val();
        var demandeuradresse = $("#saisirdemandeurs #demandeuradresse").val();
        var demandeurcp = $("#saisirdemandeurs #demandeurcp").val();
        var demandeurville = $("#saisirdemandeurs #demandeurville").val();
        
        if(demandeurmail != "" & demandeurnom != "" & demandeurprenom != "" & demandeuradresse != "" & demandeurcp != "" & demandeurville != ""){
            $.post("ajax/traiterdemandeursfrais.php",{
            "demandeurmail" : demandeurmail,
            "demandeurnom" : demandeurnom,
            "demandeurprenom" : demandeurprenom,
            "demandeuradresse" : demandeuradresse,
            "demandeurcp" : demandeurcp,
            "demandeurville" : demandeurville},
            foncRetourDemandeursFrais, "json");
        }else{
            $("#saisirdemandeurs #message").css({color:'red'});
            $("#saisirdemandeurs #message").html("Veuillez remplir tous les champs ! ");
        }
        
        function foncRetourDemandeursFrais(data){
            if(data == false){
                $("#saisirdemandeurs #message").css({color:'red'});
                $("#saisirdemandeurs #message").html("Erreur : votre adresse e-mail existe deja dans la base de données ! ");
            }else{
                document.location.href="#saisirfrais";
            }
    }
    }
    
    /*-------------------Page Afficher Frais ----------------------*/
    $('#btnafficherfrais').click(maFonctionListeFrais);
    function maFonctionListeFrais(){
        $.post("ajax/traiternotedefrais.php",{
               "numlicence" : window.numlicence
           },
           foncRetourListeFrais, "json");
    }
    
    function foncRetourListeFrais(lesnotesdefrais){     
        // frais kilométrique appliqué pour le remboursement
        var fraiskilometrique = 0.28;
        // montant total des notes de frais
        var montanttotal=0;
        
        var lbl_frais="<p><b>Frais de déplacement</b></p><tr><th>Date</th><th>Motif</th><th>Trajet</th>";
        lbl_frais+="<th>Kms parcourus</th><th>Coût Trajet</th><th>Péages</th><th>Repas</th><th>Hébergement</th><th>Total</th></tr>";
        $('#afficherfrais #tbfrais').html(lbl_frais);
              
        for(i=0; i<lesnotesdefrais.length; i++){
            var unFrais=lesnotesdefrais[i];
            var date=unFrais['date'];
            var motif=unFrais['motif'];
            var trajet=unFrais['trajet'];
            var km=unFrais['km'];
            var peage=unFrais['coutpeage'];
            var repas=unFrais['coutrepas'];
            var hebergement=unFrais['couthebergement'];
            var prenomDemandeur=unFrais['prenomDemandeur'];
            var nomDemandeur=unFrais['nomDemandeur'];
            var rueDemandeur=unFrais['rueDemandeur'];
            var cpDemandeur=unFrais['cpDemandeur'];
            var villeDemandeur=unFrais['villeDemandeur'];
            
            // cout du trajet calculé grâce au nb de km parcouris et des frais kilométriques
            var couttrajet=(km*fraiskilometrique).toFixed(2);
            // cout total pour une saisie de frais
            var montant=(parseFloat(couttrajet)+parseFloat(peage)+parseFloat(repas)+parseFloat(hebergement));
            
            //ajout des montants à la valeur total
            montanttotal+=montant;
            
            var lesfrais="<tr><td>"+date+"</td><td>"+motif+"</td><td>"+trajet+"</td><td>"+km+"</td><td>"+couttrajet+"</td><td>"+peage+"</td><td>"+repas+"</td><td>"+hebergement+"</td><td>"+montant+"</td></tr>";           
            $('#afficherfrais #tbfrais').append(lesfrais);    
        }    
        
        var montantfrais="<tr><td colspan=\"8\"><center><b>Montant total des frais de déplacement</b></center></td><td>"+montanttotal+"</td></tr>";
        $('#afficherfrais #tbfrais').append(montantfrais);    
        
        // affichage identité du demandeur
        var identited="<p><b>Demandeur : </b>"+prenomDemandeur+" "+nomDemandeur+"</p>";
        identited+="<p><b>Adresse demandeur : </b>"+rueDemandeur+", "+cpDemandeur+" "+villeDemandeur+"</p>";
        $('#afficherfrais #identitedemandeur').html(identited);
        
        // affichage des informations sur les adhérents concernés
        
        
        // affichage montant total des dons
        var totaldons = "<p><b>Montant total des dons : </b>"+montanttotal+"€</p>";
        $('#afficherfrais #totaldons').html(totaldons);

         
    }
       
});