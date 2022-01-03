/*CATEGORIE*/
INSERT INTO Categoria(Nome,Copertina)
VALUES ("Blues",'categories/blues.png'),
        ("Indie",'categories/indie.png'),
        ("Jazz",'categories/jazz.png'),
        ("MusicaClassica",'categories/classica.png'),
        ("Punk",'categories/punk.png'),
        ("Reggae",'categories/reggae.png'),
        ("Rap",'categories/rap2.png'),
        ("Rock",'categories/rock.png');

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
INSERT INTO Disco(Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, Artista, Categoria)
VALUES ("In a time lapse", '2013-01-21', 26, 'LP/MusicaClassica/InATimeLapse-LudovicoEinaudi.png', 17.99, 'Ludovico Einaudi', 'MusicaClassica'),
("The 12th Room", '2015-10-30', 26, 'LP/MusicaClassica/The12thRoom-EzioBosso.png', 28.89, 'Ezio Bosso', 'MusicaClassica'),
("The Best Of Mozart", '1982-05-28', 26, 'LP/MusicaClassica/TheBestOfMozart-Mozart.jpg', 20.99, 'Mozart', 'MusicaClassica'),
("Requiem", '1978-12-10', 26, 'LP/MusicaClassica/Requiem-Mozart.jpg', 27.55, 'Mozart', 'MusicaClassica'),
("The Best Of Beethoven", '1980-10-08', 26, 'LP/MusicaClassica/TheBestOfBeethoven-Beethoven.jpg', 17.55, 'Beethoven', 'MusicaClassica'),
("Le Quattro Stagioni", '1972-05-18', 26, 'LP/MusicaClassica/LeQuattroStagioni-Vivaldi.jpg', 15.55, 'Vivaldi', 'MusicaClassica'),
("Seven Days Walking", '2019-11-22', 26, 'LP/MusicaClassica/SevenDaysWalking-LudovicoEinaudi.jpg', 23.99, 'Ludovico Einaudi', 'MusicaClassica'),
("Ahia", '2020-12-04', 26, 'LP/indie/Ahia-PinguiniTatticiNucleari.png', 21.51, 'Pinguini Tattici Nucleari', 'Indie'),
("Gemelli", '2020-06-19', 26, 'LP/indie/Gemelli-Ernia.png', 23.67, 'Ernia', 'Indie'),
("Love", '2018-09-21', 26, 'LP/indie/Love-TheGiornalisti.jpg', 30.33, 'The Giornalisti', 'Indie'),
("Natura Molta", '2019-10-21', 26, 'LP/indie/NaturaMolta-GioEvans.jpg', 20.61, 'Gio Evans', 'Indie'),
("Solo Cose Belle", '2021-06-04', 26, 'LP/indie/SoloCoseBelle-Comete.jpeg', 25.51, 'Comete', 'Indie'),
("Regardez Moi", '2017-11-24', 26, 'LP/indie/RegardezMoi-FrahQuintale.png', 26.91, 'Frah Quintale', 'Indie'),
("Spazio", '2020-05-15', 26, 'LP/indie/Spazio-Ariete.png', 26.50, 'Ariete', 'Indie'),
("Americana", '1998-11-17', 26, 'LP/punk/Americana-TheOffspring.png', 25.23, 'The Offsprings', 'Punk'),
("American Idiot", '2004-09-20', 26, 'LP/punk/AmericanIdiot-GreenDay.png', 31.29, 'Green Day', 'Punk'),
("California", '2016-07-01', 26, 'LP/punk/California-Blink182.png', 25.99, 'Blink182', 'Punk'),
("Chuck", '2004-10-12', 26, 'LP/punk/Chuck-Sum41.png', 23.99, 'Sum41', 'Punk'),
("Bloom", '2017-05-17', 26, 'LP/punk/Bloom-MachineGunKelly.jpg', 30.99, 'Machine Gun Kelly', 'Punk'),
("Order In Decline", '2019-07-19', 26, 'LP/punk/OrderInDecline-Sum41.jpg', 25.99, 'Sum41', 'Punk'),
("Appeal To Reason", '2008-10-07', 26, 'LP/punk/AppealToReason-RiseAgainst.jpg', 23.99, 'Rise Against', 'Punk'),
("Freedom & Fyah", '2016-05-20', 26, 'LP/reggae/Freedom&Fyah-Alborosie.jpg', 20.81, 'Alborosie', 'Reggae'),
("Legend", '1984-05-08', 26, 'LP/reggae/Legend-BobMarley.png', 17.90, 'Bob Marley', 'Reggae'),
("Uprising", '1980-06-10', 26, 'LP/reggae/Uprising-BobMarley.png', 26.46, 'Bob Marley', 'Reggae'),
("Riding The Roots Chariot", '1998-05-25', 26, 'LP/reggae/RidingTheRootsChariot-BigYouth.jpg', 17.50, 'Big Youth', 'Reggae'),
("Ball Of Fire", '1997-10-20', 26, 'LP/reggae/BallOfFire-TheSkatalites.jpg', 15.50, 'The Skatalites', 'Reggae'),
("Beat Down Babylon", '2020-10-02', 26, 'LP/reggae/BeatDownBabylon-JuniorByles.png', 20.99, 'Junior Byles', 'Reggae'),
("Soul Pirate", '2008-11-12', 26, 'LP/reggae/SoulPirate-Alborosie.jpg', 25.99, 'Alborosie', 'Reggae'),
("Nothing Was The Same", '2013-09-24', 26, 'LP/rap/NothingWasTheSame-Drake.jpg', 29.99, 'Drake', 'Rap'),
("Curtain Call", '2005-12-06', 26, 'LP/rap/CurtainCall-Eminem.jpg', 43.81, 'Eminem', 'Rap'),
("The Eminem Show", '2002-05-26', 26, 'LP/rap/TheEminemShow-Eminem.jpg', 31.36, 'Eminem', 'Rap'),
("Deca Dance", '2009-06-11', 26, 'LP/rap/DecaDance-Jax.jpg', 29.47, 'J-Ax', 'Rap'),
("Playlist", '2018-11-09', 26, 'LP/rap/Playlist-Salmo.jpg', 29.99, 'Salmo', 'Rap'),
("Davide", '2018-04-20', 26, 'LP/rap/Davide-Gemitaiz.jpg', 25.99, 'Gemitaiz', 'Rap'),
("Astroworld", '2018-08-03', 26, 'LP/rap/AstroWorld-TravisScott.jpg', 25.72, 'Travis Scott', 'Rap'),
("Californication", '1999-06-08', 26, 'LP/rock/Californication-RedHotChiliPeppers.png', 35.22, 'Red Hot Chili Peppers', 'Rock'),
("Higway To Hell", '1979-08-27', 26, 'LP/rock/HighwayToHell-ACDC.jpg', 23.49, 'ACDC', 'Rock'),
("Minutes To Midnite", '2007-09-14', 26, 'LP/rock/MinutesToMidnight-LinkinPark.png', 25.68, 'Linkin Park', 'Rock'),
("The Dark Side Of The Moon", '1973-03-01', 26, 'LP/rock/TheDarkSideOfTheMoon-Pinkfloyd.jpg', 41.50, 'Pink Floyd', 'Rock'),
("Hybrid Theory", '2000-10-24', 26, 'LP/rock/HybridTheory-LinkinPark.jpg', 29.55, 'Linkin Park', 'Rock'),
("Ultimate Survivor", '1982-06-08', 26, 'LP/rock/UltimateSurvivor-Survivor.jpg', 23.55, 'Survivor', 'Rock'),
("Apetite For Destruction", '1986-06-21', 26, 'LP/rock/ApetiteForDestruction-GunsNRoses.jpg', 20.79, 'Guns n Roses', 'Rock'),
("Easy Blues", '2000-04-27', 26, 'LP/blues/EasyBlues-LafayetteLeake.jpg', 30.99, 'Lafayette Leake', 'Blues'),
("The BB King Story", '1980-02-13', 26, 'LP/blues/TheBBKingStory-BBKing.jpg', 20.99, 'BB King', 'Blues'),
("Indianola Mississippi Seeds", '1970-10-27', 26, 'LP/blues/IndianolaMississippiSeeds-BBKing.jpg', 20.99, 'BB King', 'Blues'),
("Calling All Blues", '2000-09-17', 26, 'LP/blues/CallingAllBlues-JuniorWells.jpg', 20.99, 'Junior Wells', 'Blues'),
("I Was Walking Through the Woods", '1970-07-01', 26, 'LP/blues/IWasWalking-BuddyGuy.jpg', 18.35, 'Buddy Guy', 'Blues'),
("My Feeling For the Blues", '1969-12-15', 26, 'LP/blues/MyFeelingFortheBlues-FreddieKing.jpg', 19.99, 'Freddie King', 'Blues'),
("T-Bone Blues", '1959-11-26', 26, 'LP/blues/TBoneBlues-TBoneWalker.jpg', 22.99, 'T-Bone Walker', 'Blues'),
("My Way", '1969-03-15', 26, 'LP/jazz/MyWay-FrankSinatra.jpg', 22.99, 'Frank Sinatra', 'Jazz'),
("Crystal Silence", '1973-05-20', 26, 'LP/jazz/CrystalSilence-GaryBurton.jpg', 27.50, 'Gary Burton', 'Jazz'),
("I Put A Spell On You", '1965-06-01', 26, 'LP/jazz/IPutASpellOnYou-NinaSimone.jpg', 25.99, 'Nina Simone', 'Jazz'),
("Time Out", '1959-12-14', 26, 'LP/jazz/TimeOut-DaveBrubeck.jpg', 20.99, 'Dave Brubeck', 'Jazz'),
("Sonny Crib", '1998-02-10', 26, 'LP/jazz/SonnyCrib-SonnyClark.jpg', 30.99, 'Sonny Clark', 'Jazz'),
("Lady In Satin", '1958-06-13', 26, 'LP/jazz/LadyInSatin-BillieHoliday.jpg', 30.99, 'Billie Holiday', 'Jazz'),
("What A Wonderful World", '1968-11-01', 26, 'LP/jazz/WhatAWonderfulWorld-LouisArmstrong.jpg', 22.50, 'Louis Armstrong', 'Jazz');

/*ACCOUNT*/
INSERT INTO Account(Mail, Psw, Nome, Cognome, Cellulare, ImmagineProfilo, isAdmin)
VALUES ("lpshop@gmail.com", "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", "LP Shop", "", '0987654321', "manager.png", 1),
("federico@gmail.com", "93ccf25b78706fdc6a82f98b6b7a1ca441de9d5522fd27d7ed7913c19b6fb944", "Federico", "Minotti", '1234567890', NULL, 0);


/*ORDINI*/
INSERT INTO Ordine(DataOrdine, DataSpedizione, DataConsegna, MailAccount)
VALUES('2018-06-22', '2018-06-23', '2018-06-25',"federico@gmail.com"),
('2019-04-01', '2019-04-04', '2019-04-10',"federico@gmail.com"),
('2019-07-01', '2019-07-02', '2019-07-03',"federico@gmail.com"),
('2019-10-10', '2019-10-12', '2019-10-15',"federico@gmail.com"),
('2020-10-10', '2020-10-13', '2020-10-20',"federico@gmail.com"),
('2020-10-26', '2020-10-26', '2020-10-30',"federico@gmail.com"),
('2021-10-03','2021-10-05','2021-10-09',"toni@gmail.com"),
('2021-11-03','2021-11-05','2021-11-09',"toni@gmail.com"),
('2021-10-13','2021-10-15','2021-10-19',"toni@gmail.com"),
('2021-10-23','2021-10-25','2021-10-29',"toni@gmail.com"),
('2021-01-03','2021-01-05','2021-01-09',"toni@gmail.com"),
('2021-03-08','2021-03-10','2021-03-11',"toni@gmail.com"),
('2021-03-03','2021-03-05','2021-03-09',"toni@gmail.com"),
('2021-04-10','2021-04-13','2021-04-14',"toni@gmail.com"),
('2021-04-16','2021-04-15','2021-04-18',"toni@gmail.com");


/*DISCHI ORDINATI*/
INSERT INTO Disco_Ordinato(CodiceDisco, CodiceOrdine, Quantita, Voto)
VALUES(12,1,1,4),
(17,1,1,5),
(3,1,1,1),
(2,1,1,2),
(10,2,1,1),
(5,2,1,3),
(7,2,1,3),
(9,3,1,4),
(10,3,2,4),
(14,3,1,3),
(16,4,1,2),
(15,4,3,5),
(5,5,1,3),
(20,5,3,5),
(17,6,3,4),
(15,7,1,4), 
(25,8,3,2),
(17,9,2,4), 
(18,10,1,4), 
(23,11,7,5), 
(20,12,4,4), 
(21,13,2,3), 
(22,14,1,2), 
(24,15,3,5);