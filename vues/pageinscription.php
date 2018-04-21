<!-- Inscription -->
<article id="inscription">
        <h2 class="major">Inscription</h2>
        <span class="image main"><img src="images/pic02.jpg" alt="" /></span>
        <form method="post" action="#">
            <label for="login">Adresse e-mail*</label><input type="text" placeholder="Entrez une adresse e-mail" size="30" name="login" id="inscriptionlogin"/><br/>
            <label for="motdepasse">Mot de passe*</label><input type="password" size="30" name="motdepasse" id="inscriptionmotdepasse"/><br/>
            <label for="cmotdepasse">Confirmation mot de passe*</label><input type="password" size="30" name="cmotdepasse" id="cmotdepasse"/><br/>
            <label for="numlicence">Numéro de licence* (Exemple : 17 05 40 010 121)</label><input type="text" size="16" name="numlicence" placeholder="Entrez votre n° de licence fournit par votre club" id="inscriptionnumlicence"/><br/>

            <label for="liguesp">Ligue sportive*</label>
            <select name="liguesp" id="inscriptionliguesp">
                <option value="1">Ligue de Tennis</option>
            </select><br/>
            
            <label for="nom">Nom</label><input type="text" size="30" name="nom" id="inscriptionnom"/><br/>
            <label for="prenom">Prénom</label><input type="text" size="30" name="prenom" id="inscriptionprenom"/><br/>
            <label for="ddn">Date de naissance(jj/mm/aaaa)</label><input type="text" name="ddn" id="inscriptionddn"/><br/>
            <label for="sexe">Sexe</label>
            <select name="sexe" id="inscriptionsexe">
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select><br/>

            <p>Vos coordonnées</p>
            <label for="adresse">Adresse</label><input type="text" size="50" name="adresse" id="inscriptionadresse"/><br/>
            <label for="cp">Code Postal</label><input type="text" size="5" name="cp" id="inscriptioncp"/><br/>
            <label for="ville">Ville</label><input type="text" size="30" name="ville" id="inscriptionville"/><br/>

            <p>(*) Les champs obligatoires</p>
            <input type="submit" id="btninscription" value="Inscription" class="special" />
            <div id = "message" ></div>

        </form>
</article>