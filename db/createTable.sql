create database lpshop;
use lpshop;

create table ACCOUNT (
     Mail varchar(30) not null,
     Psw varchar(256) not null,
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Cellulare varchar(10) not null,
     ImmagineProfilo varchar(40),
     isAdmin boolean not null,
     LastLogin date DEFAULT NOW(),
     constraint ID_ACCOUNT_ID primary key (Mail));

create table ARTISTA (
     Nome varchar(30) not null,
     constraint ID_ARTISTA_ID primary key (Nome));

create table CATEGORIA (
     Nome varchar(15) not null,
     Copertina varchar(70),
     constraint ID_CATEGORIA_ID primary key (Nome));

create table DISCO (
     Codice int not null AUTO_INCREMENT,
     Titolo varchar(30) not null,
     DataPubblicazione date not null,
     QuantitaDisponibile int not null,
     Copertina varchar(70),
     Prezzo float not null,
     VotoMedio int,
     Artista varchar(30) REFERENCES Artista(Nome),
     Categoria varchar(15) REFERENCES Categoria(Nome),
     Eliminato boolean not null DEFAULT 0,
     constraint ID_DISCO_ID primary key (Codice));

create table DISCO_ORDINATO (
     CodiceDisco int REFERENCES Disco(Codice),
     CodiceOrdine int REFERENCES Ordine(Codice),
     Quantita int not null,
     Voto int,
     constraint ID_DISCO_ORDINATO_ID primary key (CodiceDisco, CodiceOrdine));

create table DISCO_IN_CARRELLO (
     CodiceDisco int REFERENCES Disco(Codice),
     Quantita int not null,
     MailAccount varchar(30) REFERENCES Account(Mail),
     constraint ID_DISCO_IN_CARRELLO_ID primary key (MailAccount, CodiceDisco));

create table NOTIFICA (
     Codice int not null AUTO_INCREMENT,
     Testo varchar(256) not null,
     Titolo varchar(100) not null,
     Link varchar(100),
     Visualizzata boolean not null DEFAULT 0,
     DataNotifica datetime,
     MailAccount varchar(30) REFERENCES Account(Mail),
     constraint ID_NOTIFICA_ID primary key (Codice));

create table ORDINE (
     Codice int not null AUTO_INCREMENT,
     DataOrdine date not null,
     DataSpedizione date,
     DataConsegna date,
     MailAccount varchar(30) REFERENCES Account(Mail),
     constraint ID_ORDINE_ID primary key (Codice));
