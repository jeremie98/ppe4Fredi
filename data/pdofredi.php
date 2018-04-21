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
      private static $serveur='mysql:host=localhost';
      private static $bdd='dbname=bd_fredi';   		
      private static $user='root' ;    		
      private static $mdp='' ;
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
            $req = "select * from adherents where adressemail = :login and mdp = :mdp";
            
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
}