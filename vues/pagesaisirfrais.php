<!-- Page de saisie de frais -->
<article id="saisirfrais">
   
    <input type="button" value="Retour" onclick="history.go(-1)"><br/>
    
            <a href="#saisirdemandeurs" style="color: yellow">AVANT LA SAISIE D'UN FRAIS, VEUILLEZ ENTREZ LES INFORMATIONS DU DEMANDEUR SI VOUS NE L'AVEZ PAS ENCORE FAIT, EN CLIQUANT ICI !</a>

            <h2 class="major">Saisie de frais</h2>   
      
                <label for="adressemail">Adresse mail</label><input type="email" placeholder="Adresse e-mail du demandeur" size="30" name="adressemail" id="liendemandeur" /><br/>    
                <label for="numlicence">Numéro de licence (Exemple : 17 05 40 010 121)</label><input type="text" size="16" name="fraislicence" placeholder="Numéro de licence de l'adhérent concerné" id="fraisnumlicence"/><br/>
                <label for="motif">Motif</label>
                <select name="motif" id="fraismotif">
                    <!-- Remplissage dynamique avec les données issues de la bdd-->
                </select><br/>
                <label for="date">Date du frais</label><input type="text" placeholder="Date du frais" size="8" name="date" id="fraisdate" /><br/>      
                <label for="trajet">Trajet</label><input type="text" placeholder="Exemple : Nancy-Strasbourg" size="50" name="trajet" id="fraistrajet" /><br/>      
                <label for="km">Km</label><input type="text" placeholder="Nombre de kilomètres parcourus" size="5" name="km" id="fraiskm"/><br/>
                <label for="coutpeage">Coût Péage</label><input type="text" placeholder="Coût du péage" size="7" name="coutpeage" id="fraispeage"/><br/>
                <label for="coutrepas">Coût Repas</label><input type="text" placeholder="Coût du repas" size="7" name="coutrepas" id="fraisrepas"/><br/>
                <label for="couthebergement">Coût Hébergement</label><input type="text" placeholder="Coût de l'hébergement" size="7" name="couthebergement" id="fraishebergement"/><br/>

                <p>** Veuillez remplir tous les champs du formulaire ! **</p>
            <input type="submit" id="btnenvoifrais" value="Envoi frais" class="special" />
            <div id = "message" ></div>
            
    </article>