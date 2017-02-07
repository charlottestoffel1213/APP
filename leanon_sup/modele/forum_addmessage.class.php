<?php 

class addmessage{
	private $name;
	private $message;
	private $bdd;

	public function __construct($name,$message) {
		$this->name = htmlspecialchars($name);
		$this->message = htmlspecialchars($message);
		include "connexion_bdd.php";
		$this->bdd = $bdd;
	}

	public function verif(){
		
			if (strlen($this->message)>0){ // Si on a bien un message
				return 'ok';
			}
			else { //si on a pas de contenu
				$erreur = 'Veuillez entrer le contenu du message';
				return $erreur;
			}
		
	}
	public function insert(){ //Insertion dans la bdd

		// recupere les infos du sujet dont on se situe car on veut l'id 
		$requete2 = $this->bdd->prepare('SELECT * FROM sujet_du_forum WHERE nom = :nom'); 
		$requete2->execute(array('nom'=>$this->name));
		$sujet = $requete2->fetch();

		// Créer une nouvelle entrée dans la tab message 
		$requete3 = $this->bdd->prepare('INSERT INTO messages(auteur,message,date,id_sujet_du_forum) VALUES (:auteur,:message,NOW(),:sujet)');
		$requete3->execute(array('auteur'=>$_SESSION['id'],'message'=>$this->message, 'sujet'=>$sujet['id']));
		return 1;
	}
}