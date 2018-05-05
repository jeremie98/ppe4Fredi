<!-- Page de saisie de frais -->
<article id="saisirdemandeurs">
    
    <input type="button" value="Retour" onclick="history.go(-1)">
    
            <h2 class="major">Saisie Infos Demandeur</h2>   
                      
            <form method="post" action="#">  
                <label for="adressemail">Adresse mail</label><input type="email" placeholder="Adresse e-mail du demandeur" size="30" name="adressemail" id="demandeurmail" /><br/>    
                <label for="nom">Nom</label><input type="text" placeholder="Nom du demandeur" size="30" name="nom" id="demandeurnom" /><br/>
                <label for="prenom">Prénom</label><input type="text" placeholder="Prénom du demandeur" size="30" name="prenom" id="demandeurprenom"/><br/>
                <label for="adresse">Adresse</label><input type="text" placeholder="Rue, chemin, lotissement" size="50" name="adresse" id="demandeuradresse"/><br/>
                <label for="cp">Code Postal</label><input type="text" placeholder="Code postal de la ville" size="5" name="cp" id="demandeurcp"/><br/>
                <label for="ville">Ville</label><input type="text" placeholder="Ville de résidence du demandeur" size="30" name="ville" id="demandeurville"/><br/>
                
            <p>** Veuillez remplir tous les champs du formulaire ! **</p>
            <input type="submit" id="btnenvoidemandeurs" value="Envoi" class="special" />
            
            <div id = "message" ></div>
            
    </article>