DROP TABLE if exists clients;
DROP TABLE if exists categories;
DROP TABLE if exists produits;
DROP TABLE if exists panier;
DROP TABLE if exists achat;
DROP TABLE if exists commandes;
DROP TABLE if exists detail_commande;
DROP TABLE if exists suivi_commande;
DROP TABLE if exists paiement;

CREATE TABLE clients ( 
    id_client int AUTO_INCREMENT NOT NULL,
    login varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    nom varchar(255) NOT NULL,
    prenom varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    ville varchar(255) NOT NULL,
    code_postal varchar(5) NOT NULL,
    adresse varchar(255) NOT NULL,
    PRIMARY KEY (id_client)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE categories ( 
    id_categorie int AUTO_INCREMENT NOT NULL,
    nom varchar(255) NOT NULL,
    PRIMARY KEY (id_categorie)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE produits ( 
    id_produit int AUTO_INCREMENT NOT NULL,
    nom varchar(255) NOT NULL,
    prix float NOT NULL,
    description text NOT NULL,
    dimensions float NOT NULL,
    quantite int NOT NULL,
    id_categorie int NOT NULL,
    PRIMARY KEY (id_produit)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE panier ( 
    id_panier int AUTO_INCREMENT NOT NULL,
    PRIMARY KEY (id_panier)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE achats (
    id_achat int AUTO_INCREMENT NOT NULL,
    quantite int NOT NULL,
    id_produit int NOT NULL,
    id_client int NOT NULL,
    id_panier int NOT NULL,
    PRIMARY KEY (id_achat)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE commandes ( 
    id_commande int AUTO_INCREMENT NOT NULL,
    date_commande date NOT NULL,
    id_achat int NOT NULL,
    PRIMARY KEY (id_commande)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE detail_commande (
    id_detail_commande int AUTO_INCREMENT NOT NULL,
    prix float NOT NULL,
    id_commande int NOT NULL,
    PRIMARY KEY (id_detail_commande)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE suivi_commande (
    id_suivi_commande int AUTO_INCREMENT NOT NULL,
    avancement_livraison varchar(255) NOT NULL,
    code_suivi varchar(255) NOT NULL,
    id_commande int NOT NULL,
    PRIMARY KEY (id_suivi_commande)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE paiement (
    id_paiement int AUTO_INCREMENT NOT NULL,
    date_paiement date NOT NULL,
    id_commande int NOT NULL,
    PRIMARY KEY (id_paiement)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;

ALTER TABLE produit
    ADD CONSTRAINT fk_produit_categorie
    ADD FOREIGN KEY (id_categorie) 
    REFERENCES categories(id_categorie);
    
ALTER TABLE achats
    ADD CONSTRAINT fk_achat_produit
    ADD FOREIGN KEY (id_produit) 
    REFERENCES produits(id_produit);
    
ALTER TABLE achats
    ADD CONSTRAINT fk_achat_client
    ADD FOREIGN KEY (id_client) 
    REFERENCES clients(id_client);
    
ALTER TABLE achats
    ADD CONSTRAINT fk_achat_panier
    ADD FOREIGN KEY (id_panier) 
    REFERENCES panier(id_panier);
    
ALTER TABLE commandes
    ADD CONSTRAINT fk_commande_achat
    ADD FOREIGN KEY (id_achat) 
    REFERENCES achats(id_achat);
    
ALTER TABLE detail_commande
    ADD CONSTRAINT fk_detail_commande_commande
    ADD FOREIGN KEY (id_commande) 
    REFERENCES commandes(id_commande);
    
ALTER TABLE suivi_commande
    ADD CONSTRAINT fk_suivi_commande_commande
    ADD FOREIGN KEY (id_commande) 
    REFERENCES commandes(id_commande);
    
ALTER TABLE paiement
    ADD CONSTRAINT fk_paiement_commande
    ADD FOREIGN KEY (id_commande)
    REFERENCES commandes(id_commande);
    
INSERT INTO clients VALUES (1,'toto',md5('test'),'Maurin','Bastien','baloudu04@skyblog.com','Corbieres','04000','rue du sale');

INSERT INTO categories VALUES (1,'longboard');
INSERT INTO categories VALUES (2,'skateboard');
INSERT INTO categories VALUES (3,'penny');

INSERT INTO produits VALUES (1,'eva',120.50,'skate qui roule très bien',80,15,1);