
"# wordpress" 

# Projet CMS - Site e-commerce avec WordPress et WooCommerce

## Description
Ce projet consiste en la création d'un site e-commerce complet en utilisant WordPress et WooCommerce. Le site propose une expérience d'achat fluide et professionnelle, avec un design moderne et des fonctionnalités avancées.

---

## Instructions d'installation

### Prérequis
- Serveur local : [XAMPP](https://www.apachefriends.org/) 
- Dernière version de [WordPress](https://wordpress.org/)
- Thème compatible WooCommerce : (home decor shop)
- Extension WooCommerce

### Étapes d'installation
1. **Installation du serveur local** :
   - Téléchargez et installez XAMPP .
   - Lancez le serveur Apache et MySQL.

2. **Configuration de la base de données** :
   - Accédez à [phpMyAdmin](http://localhost/phpmyadmin).
   - Créez une nouvelle base de données nommée `online_store`.

3. **Installation de WordPress** :
   - Téléchargez la dernière version de WordPress depuis [WordPress.org](https://wordpress.org/).
   - Extrayez les fichiers dans le répertoire `htdocs/Yoka`.
   - Accédez à [http://localhost/Yoka](http://localhost/Yoka) pour lancer l'installation.
   - Renseignez les informations demandées :
     - Nom de la base de données : `online_store`
     - Identifiant : `root`
     - Mot de passe : *(laissez vide )*

4. **Installation des extensions et thèmes** :
   - Connectez-vous au tableau de bord WordPress (`http://localhost/Yoka/wp-admin`).
   - Installez et activez le thème choisi (home decor shop).
   - Installez et configurez WooCommerce via le menu Extensions.

5. **Importation des fichiers** :
   - Clonez le dépôt GitHub avec le code source :
     ```bash
     git clone https://github.com/ambiciosa02/Wordpress.git
     ```
   - Importez les fichiers et la base de données exportée depuis le dossier `Base de donnée`.

6. **Configuration finale** :
   - Accédez à la section WooCommerce pour configurer les paramètres de livraison, paiement, etc.
   - Vérifiez la structure du catalogue et ajoutez les produits si nécessaire.

---

## Identifiants administrateur principal

| Rôle          | Nom d'utilisateur | Mot de passe      |
| --------------| ------------------ | ----------------- |
| Administrateur| `vistara`           | `vistara2024@&&&`  |





