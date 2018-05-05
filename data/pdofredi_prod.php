<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoFredi
 * @package default
 * @author JP
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoFredi{
    	 /*--------------------Version locale---------------------------------------- */
      private static $serveur='mysql:host=mysql.hostinger.fr';
      private static $bdd='dbname=u648095331_bdsi';   		
      private static $user='u648095331_jp' ;    		
      private static $mdp='jpelage' ;
      private static $monPdo;
      private static $monPdoFredi = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
            self::$monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
            self::$monPdo->query("SET CHARACTER SET utf8");
	}
        
	public function _destruct(){
            self::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoFredi = PdoFredi::getPdo();
 
 * @return l'unique objet de la classe PdoGsbRapports
 */
	public  static function getPdo(){
		if(self::$monPdoFredi == null){
			self::$monPdoFredi = new PdoFredi();
		}
		return self::$monPdoFredi;  
	}
        
        /**
         * Retourne les informations de l'adhérent
         * @param type $login
         * @param type $mdp
         * @return le tableau associatif ou null
         */
        public function getLeAdherent($login, $mdp){
            $req = "select numerolicence, adressemail, mdp, sexe, adherents.Nom, Prenom, ddnaissance, numligue, rue, cp, ville, "
                    . "ligues.Nom as ligueaffiliee from adherents, ligues where ligues.numeroligue=adherents.numligue and adressemail = :login and mdp = :mdp";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(':login', $login);
            $stm->bindParam(':mdp', $mdp);
            $stm->execute();
                $laLigne = $stm->fetch();
            if(count($laLigne)>1)
                return $laLigne;
            else
                return null;
        }
        
        /**
         * Insère les informations du nouvel adhérent
         * @param type $mail
         * @param type $mdp
         * @param type $nom
         * @param type $prenom
         * @param type $ddn
         * @param type $numlicence
         * @param type $numligue
         * @param type $rue
         * @param type $cp
         * @param type $ville
         * @return le résultat de la requête d'insertion
         */
        public function getInscription( $numlicence, $mail, $mdp, $sexe, $nom, $prenom, $ddn, $numligue, $rue, $cp, $ville){
            $req = "insert into adherents(numerolicence, adressemail, mdp, sexe, Nom, Prenom, ddnaissance, numligue, rue, cp, ville)"
                    . " values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(1, $numlicence);
            $stm->bindParam(2, $mail);
            $stm->bindParam(3, $mdp);
            $stm->bindParam(4, $sexe);
            $stm->bindParam(5, $nom);
            $stm->bindParam(6, $prenom);
            $stm->bindParam(7, $ddn);
            $stm->bindParam(8, $numligue);
            $stm->bindParam(9, $rue);
            $stm->bindParam(10, $cp);
            $stm->bindParam(11, $ville);
            
            $resultat = $stm->execute();
            
            return $resultat;
        }
        
        /**
         * Retourne l'id et le libellé des ligues 
         * @return le résultat du tableau associatif
         */
        public function getLiguesSportives(){
            $req = "select numeroligue, nom from ligues order by nom asc";
            $stm = self::$monPdo->prepare($req);
            $stm->execute();
            
            $lesLignes = $stm->fetchall();
            return $lesLignes;
        }
        
        /**
         * Retourne l'id et libellé des motifs
         * @return le résultat du tableau associatif
         */
        public function getMotifs(){
            $req = "select * from motifs order by motifs.libelle asc";
            $stm = self::$monPdo->prepare($req);
            $stm->execute();
            
            $lesLignes = $stm->fetchall();
            return $lesLignes;
        }
        
        /**
         * Insère les informations dans la table lignefrais
         * @param type $mail
         * @param type $date
         * @param type $motif
         * @param type $trajet
         * @param type $km
         * @param type $coutpeage
         * @param type $coutrepas
         * @param type $couthebergement
         * @return le résultat de la requête d'insertion
         */
        public function getSaisieFrais($mail, $date, $motif, $trajet, $km, $coutpeage, $coutrepas, $couthebergement){
            $req = "insert into lignesfrais(adressemail, date, motif, trajet, km, coutpeage, coutrepas, couthebergement, kmvalidé, peagevalidé, repasvalidé, hebergementvalidé)"
                    . " values(?, ?, ?, ?, ?, ?, ?, ?, null, null, null, null)";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(1, $mail);
            $stm->bindParam(2, $date);
            $stm->bindParam(3, $motif);
            $stm->bindParam(4, $trajet);
            $stm->bindParam(5, $km);
            $stm->bindParam(6, $coutpeage);
            $stm->bindParam(7, $coutrepas);
            $stm->bindParam(8, $couthebergement);
            
            $resultat = $stm->execute();
            
            return $resultat;
        }
        
        /**
         * Insère les informations dans la table lien
         * @param type $numlicence
         * @param type $mail
         * @return le résultat de la requête d'insertion
         */
        public function getLienFrais($datelien, $numlicence, $mail){
            $req = "insert into lien(datelien, numlicence, adressemail) values(?, ?, ?)";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(1, $datelien);
            $stm->bindParam(2, $numlicence);
            $stm->bindParam(3, $mail);
            
            $resultat = $stm->execute();
            
            return $resultat;
        }
        
        /**
         * Insère les informations dans la table demandeur
         * @param type $mail
         * @param type $nom
         * @param type $prenom
         * @param type $rue
         * @param type $cp
         * @param type $ville
         * @return le résultat de la requête d'insertion
         */
        public function getDemandeursFrais($mail, $nom, $prenom, $rue, $cp, $ville){
            $req = "insert into demandeurs(adressemail, nom, prenom, rue, cp, ville, numrecu) values(?, ?, ?, ?, ?, ?,null )";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(1, $mail);
            $stm->bindParam(2, $nom);
            $stm->bindParam(3, $prenom);
            $stm->bindParam(4, $rue);
            $stm->bindParam(5, $cp);
            $stm->bindParam(6, $ville);
            
            $resultat = $stm->execute();
            
            return $resultat;
        }
        
        public function getNoteDeFrais($numlicence){
            $req = "SELECT DISTINCT date, motifs.libelle as motif, trajet, km, coutpeage, coutrepas, couthebergement,"
                    . " demandeurs.prenom as prenomDemandeur, demandeurs.nom as nomDemandeur, demandeurs.rue as rueDemandeur, "
                    . "demandeurs.cp as cpDemandeur, demandeurs.ville as villeDemandeur "
                    . "FROM lignesfrais, demandeurs, adherents, lien, motifs "
                    . "WHERE lignesfrais.adressemail=demandeurs.adressemail and lignesfrais.motif=motifs.id_motif "
                    . "and lien.adressemail=demandeurs.adressemail and lien.numlicence= ? ";
            
            $stm = self::$monPdo->prepare($req);
            $stm->bindParam(1, $numlicence);           
            $stm->execute();
            
            $lesLignes = $stm->fetchall();
            return $lesLignes;
        }
}