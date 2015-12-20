#STI labo 1
##Installation du projet
<span style="color:red">Il vous faut obligatoirement être sur la VM fournie en cours.</span>

1.	Dans un terminal, se rendre dans son home : cd ~
2.	A l’aide de git, télécharger le repo du projet : git clone https://github.com/marom17/STI-labo01
3.	Se rendre dans le dossier du projet : cd STI-labo01
4.	Si install.sh **n’a pas les droits d’exécution**, le rendre exécutable : chmod +x install.sh
5.	Puis lancer le script d’installation en root ou avec sudo : sudo ./install.sh
6.	Lancer le serveur Apache s’il n’est pas encore activé : sudo systemctl start httpd
7.	Vous pouvez maintenant accéder au site : http://localhost/index.php

**Remarque** : si vous mettez la database à un autre endroit que celui par défaut, il vous faut modifier le  fichier include/fonction.php et mettre le lien vers le nouvel endroit.

##Utilisation du projet
Administrateur : User : rom ; Pass : kore

Users : User : fa ; Pass : do

L’onglet home vous permet de voir le mail que vous avez reçu, vous pouvez les lire, y répondre ou le suprimer

L’onglet New Mail permet d’envoyer un mail à un utilisateur du système

Change password permet de changer son mot de passe

Administration n’apparait que pour un utilisateur administrateur. Il permet d’éditer, de supprimer ou de créer un nouvel utilisateur

Logout permet de se délogger
