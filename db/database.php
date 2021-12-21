<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }

    public function getAllCategories(){
        $stmt = $this->db->prepare("SELECT Nome, Copertina FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDisksFromCategory($category){
        $stmt = $this->db->prepare("SELECT Codice, Categoria, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista
                                    FROM disco
                                    WHERE Categoria = \"$category\"");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDisksInCart($accountMail){
        $stmt = $this->db->prepare("SELECT Disco.Codice as CodiceDisco, Quantita, Copertina, Titolo, Prezzo, VotoMedio, Artista, Disco.Categoria as CodiceCategoria
                                    FROM Disco_In_Carrello, Disco
                                    WHERE Disco_In_Carrello.CodiceDisco = Disco.Codice
                                    AND Disco_In_Carrello.MailAccount = \"$accountMail\"");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDiskInCart($codiceDisco, $accountMail){
        $stmt = $this->db->prepare("SELECT quantita, (prezzo * quantita) as totale
                                    FROM Disco_In_Carrello, Disco
                                    WHERE Disco_In_Carrello.CodiceDisco = ?
                                    AND Disco_In_Carrello.CodiceDisco = Disco.Codice
                                    AND Disco_In_Carrello.MailAccount = ?");
        $stmt->bind_param('is',$codiceDisco, $accountMail);
        $stmt->execute();
        $result = $stmt->get_result();

        if(count($result->fetch_all(MYSQLI_ASSOC)) > 0){
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        } else{
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function getCartTotal($accountMail){
        $stmt = $this->db->prepare("SELECT Sum(Quantita*Disco.Prezzo) as Totale
                                    FROM Disco_In_Carrello, Disco
                                    WHERE Disco_In_Carrello.CodiceDisco = Disco.Codice
                                    AND Disco_In_Carrello.MailAccount = \"$accountMail\"");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isAdmin($accountMail){
        $stmt = $this->db->prepare("SELECT isAdmin
                                    FROM Account
                                    WHERE Mail = \"$accountMail\"");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrders(){
        $stmt = $this->db->prepare("SELECT Ordine.Codice as CodiceOrdine, CodicePagamento, DataOrdine, DataSpedizione, DataConsegna, MailAccount, Nome, Cognome, Cellulare
                                    FROM Ordine, Account
                                    WHERE Ordine.MailAccount = Account.Mail");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetails($orderID){
        $stmt = $this->db->prepare("SELECT CodiceDisco, CodiceOrdine, Titolo, Copertina, Artista, Quantita, Prezzo*Quantita as Totale, DataOrdine, DataSpedizione, DataConsegna
                                    FROM Disco_Ordinato, Disco, Ordine
                                    WHERE Disco_Ordinato.CodiceOrdine = $orderID
                                    AND Disco_Ordinato.CodiceDisco = Disco.Codice
                                    AND Disco_Ordinato.CodiceOrdine = Ordine.Codice");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserInfo($accountMail){
        $stmt = $this->db->prepare("SELECT Nome, Cognome, Mail
                                    FROM Account
                                    WHERE Mail = \"$accountMail\"");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getPopularsDisks(){
        $stmt = $this->db->prepare("SELECT Codice, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria
                                    FROM Disco
                                    ORDER BY DataPubblicazione DESC
                                    LIMIT 5");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllDisks(){
        $stmt = $this->db->prepare("SELECT Codice, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria
                                    FROM Disco");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrdersByAccount($accountMail){
        $stmt = $this->db->prepare("SELECT Codice, CodicePagamento, DataOrdine, DataSpedizione, DataConsegna, MailAccount
                                    FROM Ordine
                                    WHERE MailAccount = \"$accountMail\"");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //TODO prevent sql injection
    public function checkLogin($email, $password){
        $query = "SELECT mail, nome, cognome, cellulare, immagineprofilo, isadmin FROM account WHERE mail = ? AND psw = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isMailAvailable($mail){
        $query = "SELECT mail FROM account WHERE mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();

        return mysqli_num_rows($result)==0;
    }

    public function registerUser($name, $surname, $mail, $password, $phone){
        $query = "INSERT INTO account(nome, cognome, mail, psw, cellulare, isAdmin)
                  VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $name, $surname, $mail, $password, $phone);
        $stmt->execute();
    }

    public function modifyAccount($mail, $password, $phone){
        $query = "UPDATE account 
                    SET mail = ?, cellulare = ?
                    WHERE mail = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $mail, $phone, $_SESSION["mail"]);
        $stmt->execute();
    }

    public function getMessages($mail){
        $query = "SELECT Testo, Titolo, Link, MailAccount, `data`
                  FROM notifica WHERE MailAccount = ?
                  ORDER BY `data` DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $mail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getDisksVotes(){
        $stmt = $this->db->prepare("SELECT CodiceDisco, AVG(Voto) AS VotoMedio
                                    FROM Disco_Ordinato
                                    WHERE Voto IS NOT NULL
                                    GROUP BY CodiceDisco");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewDisk($titolo, $dataPubblicazione, $quantitaDisponibile, $copertina, $prezzo, $artista, $categoria){
        $stmt = $this->db->prepare("INSERT INTO Disco(Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, Artista, Categoria)
                                    VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisdss",$titolo, $dataPubblicazione, $quantitaDisponibile, $copertina, $prezzo, $artista, $categoria);
        return $stmt->execute();
    }


    public function getDisk($codice){
        $stmt = $this->db->prepare("SELECT Codice, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria
                                    FROM Disco
                                    WHERE Codice = ?");
        $stmt->bind_param('i', $codice);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }
    
    public function alterQuantityInCart($codiceDisco, $mail, $op){
        if($op == "i"){
            $stmt = $this->db->prepare("UPDATE Disco_In_Carrello
                                    SET Quantita = Quantita + 1
                                    WHERE CodiceDisco = ?
                                    AND mailAccount = ?");
            $stmt->bind_param("is",$codiceDisco, $mail);
            return $stmt->execute();
        } else if($op == "d"){
            $stmt = $this->db->prepare("UPDATE Disco_In_Carrello
                                    SET Quantita = Quantita - 1
                                    WHERE CodiceDisco = ?
                                    AND mailAccount = ?");
            $stmt->bind_param("is",$codiceDisco, $mail);
            return $stmt->execute();
        }
    }

    public function insertNewDiskInCart($codiceDisco, $mailAccount){
        $stmt = $this->db->prepare("INSERT INTO Disco_In_Carrello(CodiceDisco, Quantita, MailAccount)
                                    VALUES (?,1,?)");
        $stmt->bind_param("is",$codiceDisco, $mailAccount);
        return $stmt->execute();
    }

    public function removeDiskFromCart($codiceDisco, $mailAccount){
        $stmt = $this->db->prepare("DELETE FROM Disco_In_Carrello
                                    WHERE CodiceDisco = ? AND MailAccount = ?");
        $stmt->bind_param("is", $codiceDisco, $mailAccount);
        return $stmt->execute();
    }

    public function searchDisk($str){
        $stmt = $this->db->prepare("SELECT Codice, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria
                                    FROM Disco
                                    WHERE Titolo LIKE '%$str%'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvailableQuantity($codiceDisco){
        $stmt = $this->db->prepare("SELECT QuantitaDisponibile
                                    FROM Disco
                                    WHERE Codice = ?");
        $stmt->bind_param("i", $codiceDisco);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["QuantitaDisponibile"];
    }

    public function insertNewOrder($dataOrdine, $mailAccount){
        $stmt = $this->db->prepare("INSERT INTO ORDINE(DataOrdine, MailAccount)
                                    VALUES (?,?)");
        $stmt->bind_param("ss",$dataOrdine, $mailAccount);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function insertNewDiskInOrder($codiceDisco, $codiceOrdine, $quantita){
        $stmt = $this->db->prepare("INSERT INTO DISCO_ORDINATO(CodiceDisco, CodiceOrdine, Quantita)
                                    VALUES (?,?,?)");
        $stmt->bind_param("iii",$codiceDisco, $codiceOrdine, $quantita);
        return $stmt->execute();
    }

    public function clearCart($mailAccount){
        $stmt = $this->db->prepare("DELETE FROM DISCO_IN_CARRELLO WHERE MailAccount = ?");
        $stmt->bind_param("s",$mailAccount);
        return $stmt->execute();
    }
    

}
?>