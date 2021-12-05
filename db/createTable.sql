create database lpshop;
use lpshop;

create table ACCOUNT (
     Mail varchar(30) not null,
     Psw varchar(256) not null,
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Cellulare int not null,
     ImmagineProfilo varchar(40),
     isAdmin boolean not null,
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
     Link varchar(30),
     Visualizzata varchar(1) not null,
     MailAccount varchar(30) REFERENCES Account(Mail),
     constraint ID_NOTIFICA_ID primary key (Codice));

create table ORDINE (
     Codice int not null AUTO_INCREMENT,
     CodicePagamento int REFERENCES Pagamento(Codice),
     DataOrdine date not null,
     DataSpedizione date,
     DataConsegna date,
     MailAccount varchar(30) REFERENCES Account(Mail),
     constraint ID_ORDINE_ID primary key (Codice),
     constraint SID_ORDIN_PAGAM_ID unique (CodicePagamento));

create table PAGAMENTO (
     Codice int not null AUTO_INCREMENT,
     Importo float not null,
     constraint ID_PAGAMENTO_ID primary key (Codice));
