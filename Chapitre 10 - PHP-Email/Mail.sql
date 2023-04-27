#
# Création d'une table pour stocker des e-mails
#

CREATE TABLE Mail (id_mail INT AUTO_INCREMENT NOT NULL,
                   destinataire VARCHAR(40) NOT NULL,
                   sujet VARCHAR(40) NOT NULL,
                    message TEXT NOT NULL,
                    date_envoi DATETIME,
                    PRIMARY KEY (id_mail));
