<?php 

class addsuj{
	private $name;
	private $sujet;
	private $categorie;
	private $bdd;

	public function __construct($name,$sujet,$categorie) {
		$this->name = htmlspecialchars($name);
		$this->sujet = htmlspecialchars($sujet);
		$this->categorie = htmlspecialchars($categorie);
		include "connexion_bdd.php";
		$this->bdd = $bdd;
	}

	public function verif(){ // verifie que le titre du sujet est entre 5 et 70 caractères et qu'il existe un premier message
		if(strlen($this->name)>5 AND strlen($this->name)<70) {
			if (strlen($this->sujet)>0){
				return 'ok';
			}
			else {
				$erreur = 'Veuillez entrer le contenu du sujet';
				return $erreur;
			}
		}
		else {
			$erreur = 'Le nom su sujet doit contenir entre 5 et 70 caractères';
			return $erreur;
		}
	}
	public function insert(){ //créer des entrées dans la bdd

		 // Selectionne les infos dans la bdd sur la catégorie selectionnée car on veut l'id 
		$requete=$this->bdd->prepare('SELECT * FROM categorie_forum WHERE nom_forum = :nom');
		$requete->execute(array('nom'=>$this->categorie));
		$categorie = $requete->fetch();

		// On insert les informations dans une nouvelle entrée dans la tab sujet 
		$requete2 = $this->bdd->prepare('INSERT INTO sujet_du_forum(nom,auteur_du_sujet,id_categorie) VALUES (:name,:auteur,:id)');
		$requete2->execute(array('name'=>$this->name,'auteur'=>$_SESSION['id'],'id'=>$categorie['id']));

		// recupere les infos du sujet qui vient d'etre créer car on veut l'id
		$requete3 = $this->bdd->prepare('SELECT * FROM sujet_du_forum WHERE nom = :nom'); 
		$requete3->execute(array('nom'=>$this->name));
		$sujet = $requete3->fetch();

		// On insert les info dans une nouvelle entrée dans la tab message 
		$requete4 = $this->bdd->prepare('INSERT INTO messages(auteur,message,date,id_sujet_du_forum) VALUES (:auteur,:message,NOW(),:sujet)');
		$requete4->execute(array('auteur'=>$_SESSION['id'],'message'=>$this->sujet, 'sujet'=>$sujet['id']));
		return 1;
	}
}