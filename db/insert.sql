/*CATEGORIE*/
INSERT INTO Categoria(Nome,Copertina)
VALUES ("Indie",'categories/indie.png'),
        ("Musica Classica",'categories/classica.jpg'),
        ("Punk",'categories/punk.png'),
        ("Reggae",'categories/reggae.png'),
        ("Rap",'categories/rap.jpg'),
        ("Rock",'categories/rock.jpg');

/*ARTISTI*/
INSERT INTO Artista(Nome)
VALUES("Pink Floyd"),
        ("Salmo"),
        ("Dire Straits"),
        ("Nirvana"),
        ("Red Hot Chili Peppers"),
        ("ACDC"),
        ("Linkin Park"),
        ("U2"),
        ("Beethoven"),
        ("Ludovico Einaudi"),
        ("Mozart"),
        ("Ezio Bosso"),
        ("Vivaldi"),
        ("Pinguini Tattici Nucleari"),
        ("Ernia"),
        ("Frah Quintale"),
        ("Ariete"),
        ("The Offspring"),
        ("Green Day"),
        ("Blink182"),
        ("Sum41"),
        ("Alborosie"),
        ("Bob Marley"),
        ("Drake"),
        ("Travis Scott");

/*DISCHI*/
INSERT INTO Disco(Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria)
VALUES ("In a time lapse", '2013-01-21', 26, 'LP/classica/InATimeLapse-LudovicoEinaudi.png', 17.99, null, 'Ludovico Einaudi', 'Musica Classica'),
("The 12th Room", '2015-10-30', 26, 'LP/classica/The12thRoom-EzioBosso.png', 28.89, null, 'Ezio Bosso', 'Musica Classica'),
("Ahia", '2020-12-04', 26, 'LP/indie/Ahia-PinguiniTatticiNucleari.png', 21.51, null, 'Pinguini Tattici Nucleari', 'Indie'),
("Gemelli", '2020-06-19', 26, 'LP/indie/Gemelli-Ernia.png', 23.67, null, 'Ernia', 'Indie'),
("Regardez Moi", '2017-11-24', 26, 'LP/indie/RegardezMoi-FrahQuintale.png', 26.91, null, 'Frah Quintale', 'Indie'),
("Americana", '1998-11-17', 26, 'LP/punk/Americana-TheOffspring.png', 25.23, null, 'The Offsprings', 'Punk'),
("American Idiot", '2004-09-20', 26, 'LP/punk/AmericanIdiot-GreenDay.png', 31.29, null, 'Green Day', 'Punk'),
("California", '2016-07-01', 26, 'LP/punk/California-Blink182.png', 25.99, null, 'Blink182', 'Punk'),
("Chuck", '2004-10-12', 26, 'LP/punk/Chuck-Sum41.png', 23.99, null, 'Sum41', 'Punk'),
("Freedom & Fyah", '2016-05-20', 26, 'LP/raggae/Freedom&Fyah-Alborosie.jpg', 20.81, null, 'Alborosie', 'Reggae'),
("Legend", '1984-05-08', 26, 'LP/raggae/Legend-BobMarley.png', 17.90, null, 'Bob Marley', 'Reggae'),
("Uprising", '1980-06-10', 26, 'LP/raggae/Uprising-BobMarley.png', 26.46, null, 'Bob Marley', 'Reggae'),
("Nothing Was The Same", '2013-09-24', 26, 'LP/rap/NothingWasTheSame-Drake.jpg', 29.99, null, 'Drake', 'Rap'),
("Playlist", '2018-11-09', 26, 'LP/rap/Playlist-Salmo.jpg', 29.99, null, 'Salmo', 'Rap'),
("Astroworld", '2018-08-03', 26, 'LP/rap/AstroWorld-TravisScott.jpg', 25.72, null, 'Travis Scott', 'Rap'),
("Californication", '1999-06-08', 26, 'LP/rock/Californication-RedHotChiliPeppers.png', 35.22, null, 'Red Hot Chili Peppers', 'Rock'),
("Higway To Hell", '1979-08-27', 26, 'LP/rock/HighwayToHell-ACDC.jpg', 23.49, null, 'ACDC', 'Rock'),
("Minutes To Midnite", '2007-09-14', 26, 'LP/rock/MinutesToMidnight-LinkinPark.png', 25.68, null, 'Linkin Park', 'Rock'),
("The Dark Side Of The Moon", '1973-03-01', 26, 'LP/rock/TheDarkSideOfTheMoon-Pinkfloyd.jpg', 41.50, null, 'Pink Floyd', 'Rock');

/*ACCOUNT*/
INSERT INTO Account(Mail, Psw, Nome, Cognome, Cellulare, ImmagineProfilo, isAdmin)
VALUES("gigi@gmail.com", "GGGG", "Gigi", "Rossi", 2462742, NULL, 0),
("admin@gmail.com", "AdminPW", "Admin", "", 242245, NULL, 1);

/*CARTE DI CREDITO*/
INSERT INTO Carta_Di_Credito(CodiceCarta, DataScadenza, Cvv, MailAccount)
VALUES(1234567890123456, '2022-10-01', 123, "gigi@gmail.com");

/*DISCO IN CARRELLO*/
INSERT INTO Disco_in_carrello(CodiceDisco, MailAccount, Quantita)
VALUES (1, "gigi@gmail.com", 2),
(3, "gigi@gmail.com", 1);

/*ORDINI*/
INSERT INTO Ordine(CodicePagamento, DataOrdine, DataSpedizione, DataConsegna, MailAccount)
VALUES(NULL,'2007-09-14', NULL, NULL,"gigi@gmail.com"),
(NULL,'2018-08-03', NULL, NULL,"gigi@gmail.com"),
(NULL,'2018-08-03', NULL, NULL,"gigi@gmail.com"),
(NULL,'1999-06-08', '1999-06-10', NULL,"gigi@gmail.com"),
(NULL,'2020-10-26', '2020-10-26', '2020-10-30',"gigi@gmail.com");

/*DISCHI ORDINATI*/
INSERT INTO Disco_Ordinato(CodiceDisco, CodiceOrdine, Quantita, Voto)
VALUES(12,1,1,NULL),
(3,1,3,NULL),
(17,1,1,NULL),
(2,1,1,NULL),
(10,2,1,NULL),
(14,3,1,NULL),
(16,4,1,NULL),
(5,5,1,NULL),
(7,2,1,NULL),
(9,3,1,NULL),
(3,4,1,NULL);