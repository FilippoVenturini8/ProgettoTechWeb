/*CATEGORIE*/
INSERT INTO Categoria(Nome)
VALUES ("Indie"),
        ("Musica Classica"),
        ("Punk"),
        ("Reggae"),
        ("Rap"),
        ("Rock");

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
("The 12th Room", '2015-10-30', 26, null, 28.89, null, 'Ezio Bosso', 'Musica Classica'),
("Ahia", '2020-12-04', 26, null, 21.51, null, 'Pinguini Tattici Nucleari', 'Indie'),
("Gemelli", '2020-06-19', 26, null, 23.67, null, 'Ernia', 'Indie'),
("Regardez Moi", '2017-11-24', 26, null, 26.91, null, 'Frah Quintale', 'Indie'),
("Americana", '1998-11-17', 26, null, 25.23, null, 'The Offsprings', 'Punk'),
("American Idiot", '2004-09-20', 26, null, 31.29, null, 'Green Day', 'Punk'),
("California", '2016-07-01', 26, null, 25.99, null, 'Blink182', 'Punk'),
("Chuck", '2004-10-12', 26, null, 23.99, null, 'Sum41', 'Punk'),
("Freedom & Fyah", '2016-05-20', 26, null, 20.81, null, 'Alborosie', 'Reggae'),
("Legend", '1984-05-08', 26, null, 17.90, null, 'Bob Marley', 'Reggae'),
("Uprising", '1980-06-10', 26, null, 26.46, null, 'Bob Marley', 'Reggae'),
("Nothing Was The Same", '2013-09-24', 26, null, 29.99, null, 'Drake', 'Rap'),
("Playlist", '2018-11-09', 26, null, 29.99, null, 'Salmo', 'Rap'),
("Astroworld", '2018-08-03', 26, null, 25.72, null, 'Travis Scott', 'Rap'),
("Californication", '1999-06-08', 26, null, 35.22, null, 'Red Hot Chili Peppers', 'Rock'),
("Higway To Hell", '1979-08-27', 26, null, 23.49, null, 'ACDC', 'Rock'),
("Minutes To Midnite", '2007-09-14', 26, null, 25.68, null, 'Linkin Park', 'Rock'),
("The Dark Side Of The Moon", '1973-03-01', 26, null, 41.50, null, 'Pink Floyd', 'Rock');

INSERT INTO Account(Mail, Psw, Nome, Cognome, Cellulare, ImmagineProfilo)
VALUES("gigi@gmail.com", "GGGG", "Gigi", "Rossi", 2462742, NULL);

INSERT INTO Disco_in_carrello(CodiceDisco, MailAccount, Quantita)
VALUES (1, "gigi@gmail.com", 2),
(3, "gigi@gmail.com", 1);