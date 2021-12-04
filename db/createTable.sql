create database lpshop;
use lpshop;

create table ACCOUNT (
     CodiceAccount int not null AUTO_INCREMENT,
     Mail varchar(30) not null,
     Psw varchar(256) not null,
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Cellulare int not null,
     ImmagineProfilo varchar(40),
     constraint ID_ACCOUNT_ID primary key (CodiceAccount));

create table ARTISTA (
     CodiceArtista int not null AUTO_INCREMENT,
     Nome varchar(30) not null,
     constraint ID_ARTISTA_ID primary key (CodiceArtista));

create table CATEGORIA (
     CodiceCategoria int not null AUTO_INCREMENT,
     Nome varchar(15) not null,
     constraint ID_CATEGORIA_ID primary key (CodiceCategoria));

create table DISCO (
     CodiceDisco int not null AUTO_INCREMENT,
     Titolo varchar(30) not null,
     DataPubblicazione date not null,
     QuantitaDisponibile int not null,
     Copertina varchar(70),
     Prezzo float not null,
     VotoMedio int,
     CodiceArtista varchar(30) REFERENCES Artista(CodiceArtista),
     CodiceCategoria varchar(15) REFERENCES Categoria(CodiceCategoria),
     constraint ID_DISCO_ID primary key (CodiceDisco));

create table DISCO_ORDINATO (
     CodiceDisco int REFERENCES Disco(CodiceDisco),
     CodiceOrdine int REFERENCES Ordine(CodiceOrdine),
     Quantita int not null,
     Voto int,
     constraint ID_DISCO_ORDINATO_ID primary key (CodiceDisco, CodiceOrdine));

create table DISCO_IN_CARRELLO (
     CodiceDisco int REFERENCES Disco(CodiceDisco),
     CodiceAccount int REFERENCES Disco(CodiceAccount),
     Quantita int not null,
     constraint ID_DISCO_IN_CARRELLO_ID primary key (CodiceAccount, CodiceDisco));

create table NOTIFICA (
     CodiceNotifica int not null AUTO_INCREMENT,
     Testo varchar(256) not null,
     Link varchar(30),
     Visualizzata varchar(1) not null,
     CodiceAccount int REFERENCES Disco(CodiceAccount),
     constraint ID_NOTIFICA_ID primary key (CodiceNotifica));

create table ORDINE (
     CodiceOrdine int not null AUTO_INCREMENT,
     CodicePagamento int REFERENCES Pagamento(CodicePagamento),
     DataOrdine date not null,
     DataSpedizione date,
     DataConsegna date,
     Stato varchar(1) not null,
     CodiceAccount int REFERENCES Account(CodiceAccount),
     constraint ID_ORDINE_ID primary key (CodiceOrdine),
     constraint SID_ORDIN_PAGAM_ID unique (CodicePagamento));

create table PAGAMENTO (
     CodicePagamento int not null AUTO_INCREMENT,
     Importo float not null,
     constraint ID_PAGAMENTO_ID primary key (CodicePagamento));
