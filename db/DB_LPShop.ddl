-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Fri Dec  3 11:18:49 2021 
-- * LUN file: C:\xampp\htdocs\ProgettoTechWeb\DB_LPShop.lun 
-- * Schema: Schema_Logico_LPShop/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Schema_Logico_LPShop;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table ACCOUNT (
     Mail varchar(30) not null,
     Password varchar(256) not null,
     ImmagineProfilo varchar(40),
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Cellulare int not null,
     constraint ID_ACCOUNT_ID primary key (Mail));

create table ARTISTA (
     Nome varchar(15) not null,
     constraint ID_ARTISTA_ID primary key (Nome));

create table CATEGORIA (
     Nome varchar(15) not null,
     constraint ID_CATEGORIA_ID primary key (Nome));

create table DISCO (
     Codice int not null AUTO_INCREMENT,
     Nome varchar(15) not null,
     DataPubblicazione date not null,
     QuantitaDisponibile int not null,
     Copertina varchar(40),
     Prezzo int not null,
     VotoMedio int not null,
     Artista varchar(15) not null,
     Categoria varchar(15) not null,
     constraint ID_DISCO_ID primary key (Codice));

create table DISCO_ORDINATO (
     CodiceDisco int not null,
     CodiceOrdine int not null,
     Quantita int not null,
     Voto int,
     constraint ID_DISCO_ORDINATO_ID primary key (CodiceDisco, CodiceOrdine));

create table DISCO_IN_CARRELLO (
     Quantita int not null,
     MailAccount varchar(30) not null,
     CodiceDisco int not null,
     constraint ID_DISCO_IN_CARRELLO_ID primary key (MailAccount, CodiceDisco));

create table NOTIFICA (
     Codice int not null AUTO_INCREMENT,
     Testo varchar(256) not null,
     Link varchar(30),
     Visualizzata varchar(1) not null,
     MailAccount varchar(30) not null,
     constraint ID_NOTIFICA_ID primary key (Codice));

create table ORDINE (
     Codice int not null AUTO_INCREMENT,
     CodicePagamento int,
     DataOrdine date not null,
     DataSpedizione date,
     DataConsegna date,
     Stato varchar(1) not null,
     MailAccount varchar(1) not null,
     constraint ID_ORDINE_ID primary key (Codice),
     constraint SID_ORDIN_PAGAM_ID unique (CodicePagamento));

create table PAGAMENTO (
     Codice int not null AUTO_INCREMENT,
     Importo int not null,
     constraint ID_PAGAMENTO_ID primary key (Codice));


-- Constraints Section
-- ___________________ 

alter table DISCO add constraint REF_DISCO_ARTIS_FK
     foreign key (Artista)
     references ARTISTA;

alter table DISCO add constraint REF_DISCO_CATEG_FK
     foreign key (Categoria)
     references CATEGORIA;

alter table DISCO_ORDINATO add constraint EQU_DISCO_ORDIN_FK
     foreign key (CodiceOrdine)
     references ORDINE;

alter table DISCO_ORDINATO add constraint REF_DISCO_DISCO_1
     foreign key (CodiceDisco)
     references DISCO;

alter table DISCO_IN_CARRELLO add constraint REF_DISCO_ACCOU
     foreign key (MailAccount)
     references ACCOUNT;

alter table DISCO_IN_CARRELLO add constraint REF_DISCO_DISCO_FK
     foreign key (CodiceDisco)
     references DISCO;

alter table NOTIFICA add constraint REF_NOTIF_ACCOU_FK
     foreign key (MailAccount)
     references ACCOUNT;

alter table ORDINE add constraint ID_ORDINE_CHK
     check(exists(select * from DISCO_ORDINATO
                  where DISCO_ORDINATO.CodiceOrdine = Codice)); 

alter table ORDINE add constraint REF_ORDIN_ACCOU_FK
     foreign key (MailAccount)
     references ACCOUNT;

alter table ORDINE add constraint SID_ORDIN_PAGAM_FK
     foreign key (CodicePagamento)
     references PAGAMENTO;

alter table PAGAMENTO add constraint ID_PAGAMENTO_CHK
     check(exists(select * from ORDINE
                  where ORDINE.CodicePagamento = Codice)); 


-- Index Section
-- _____________ 

create unique index ID_ACCOUNT_IND
     on ACCOUNT (Mail);

create unique index ID_ARTISTA_IND
     on ARTISTA (Nome);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (Nome);

create unique index ID_DISCO_IND
     on DISCO (Codice);

create index REF_DISCO_ARTIS_IND
     on DISCO (Artista);

create index REF_DISCO_CATEG_IND
     on DISCO (Categoria);

create unique index ID_DISCO_ORDINATO_IND
     on DISCO_ORDINATO (CodiceDisco, CodiceOrdine);

create index EQU_DISCO_ORDIN_IND
     on DISCO_ORDINATO (CodiceOrdine);

create index REF_DISCO_DISCO_IND
     on DISCO_IN_CARRELLO (CodiceDisco);

create unique index ID_DISCO_IN_CARRELLO_IND
     on DISCO_IN_CARRELLO (MailAccount, CodiceDisco);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (Codice);

create index REF_NOTIF_ACCOU_IND
     on NOTIFICA (MailAccount);

create unique index ID_ORDINE_IND
     on ORDINE (Codice);

create index REF_ORDIN_ACCOU_IND
     on ORDINE (MailAccount);

create unique index SID_ORDIN_PAGAM_IND
     on ORDINE (CodicePagamento);

create unique index ID_PAGAMENTO_IND
     on PAGAMENTO (Codice);

