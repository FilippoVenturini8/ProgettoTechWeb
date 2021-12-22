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

        return $result->fetch_all(MYSQLI_ASSOC);
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
        $stmt = $this->db->prepare("SELECT Ordine.Codice as CodiceOrdine, DataOrdine, DataSpedizione, DataConsegna, MailAccount, Nome, Cognome, Cellulare
                                    FROM Ordine, Account
                                    WHERE Ordine.MailAccount = Account.Mail
                                    ORDER BY Ordine.Codice DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMatchingOrders($str){
        $stmt = $this->db->prepare("SELECT Ordine.Codice as CodiceOrdine, DataOrdine, DataSpedizione, DataConsegna, MailAccount, Nome, Cognome, Cellulare
                                    FROM Ordine, Account
                                    WHERE Ordine.MailAccount = Account.Mail
                                    AND (Ordine.Codice = ?
                                    OR MailAccount LIKE ?)
                                    ORDER BY Ordine.Codice DESC");
        $patternMail = "%".$str."%";
        $stmt->bind_param("ss",$str, $patternMail,);
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
                                    FROM Disco_Ordinato, Disco
                                    WHERE Disco_Ordinato.CodiceDisco = Disco.Codice
                                    GROUP BY CodiceDisco
                                    ORDER BY SUM(Disco_Ordinato.Quantita) DESC
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
        $stmt = $this->db->prepare("SELECT Codice, DataOrdine, DataSpedizione, DataConsegna, MailAccount
                                    FROM Ordine
                                    WHERE MailAccount = \"$accountMail\"
                                    ORDER BY Codice DESC");
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
        $query = "SELECT Codice, Testo, Titolo, Link, MailAccount, DataNotifica, Visualizzata
                  FROM notifica WHERE MailAccount = ?
                  ORDER BY Codice DESC";
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
                                    WHERE Titolo LIKE ?
                                    OR Artista LIKE ?
                                    OR Codice = ?");
        $patternNome = "%".$str."%";
        $patternAutore = $str."%";
        $stmt->bind_param("sss",$patternNome, $patternAutore, $str);
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


    public function removeDiskFromList($codiceDisco){
        $stmt = $this->db->prepare("DELETE FROM Disco
                                    WHERE Codice = ?");
        $stmt->bind_param("i", $codiceDisco);
        return $stmt->execute();
    }


    public function insertNewOrder($dataOrdine, $dataSpedizione, $dataConsegna, $mailAccount){
        $stmt = $this->db->prepare("INSERT INTO ORDINE(DataOrdine, DataSpedizione, DataConsegna, MailAccount)
                                    VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$dataOrdine, $dataSpedizione, $dataConsegna, $mailAccount);
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
    
    public function insertNotification($testo, $titolo, $link, $dataNotifica, $mailAccount){
        $stmt = $this->db->prepare("INSERT INTO NOTIFICA(Testo, Titolo, Link, DataNotifica, MailAccount)
                                    VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$testo, $titolo, $link, $dataNotifica, $mailAccount);
        return $stmt->execute();
    }

    public function selectAdminMail(){
        $stmt = $this->db->prepare("SELECT Mail
                                    FROM Account
                                    WHERE isAdmin = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["Mail"];
    }

    public function alterQuantityDisk($codiceDisco, $quantitaOrdinata){
        $stmt = $this->db->prepare("UPDATE Disco
                                    SET QuantitaDisponibile = QuantitaDisponibile - ?
                                    WHERE Codice = ?");
        $stmt->bind_param("ii",$quantitaOrdinata,$codiceDisco);
        return $stmt->execute();
    }

    public function getFinishedDisks(){
        $stmt = $this->db->prepare("SELECT Codice, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista, Categoria
                                    FROM Disco
                                    WHERE QuantitaDisponibile = 0");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateLastLogin($accountMail){
        $stmt = $this->db->prepare("UPDATE Account
                                    SET LastLogin = NOW()
                                    WHERE Mail = ?");
        $stmt->bind_param("s",$accountMail);
        return $stmt->execute();
    }

    public function getLastLogin($accountMail){
        $stmt = $this->db->prepare("SELECT LastLogin
                                    FROM Account
                                    WHERE Mail = ?");
                                    
        $stmt->bind_param("s",$accountMail);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["LastLogin"];
    }

    public function readNotification($codiceNotifica){
        $stmt = $this->db->prepare("UPDATE Notifica
                                    SET Visualizzata = 1
                                    WHERE Codice = ?");
        $stmt->bind_param("i",$codiceNotifica);
        return $stmt->execute();
    }

    public function isRead($codiceNotifica){
        $stmt = $this->db->prepare("SELECT Visualizzata
                                    FROM Notifica
                                    WHERE Codice = ?");
        $stmt->bind_param("i",$codiceNotifica);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["Visualizzata"];
    }

    public function modifyProduct($Codice, $Artista, $Titolo, $quantitaDisponibile, $prezzo){
        $stmt = $this->db->prepare("UPDATE Disco
        SET QuantitaDisponibile = ?,
            Artista = ?,
            Titolo = ?,
            Prezzo = ?
        WHERE Codice = ?");
        $stmt->bind_param("issif",$Codice,$Artista, $Titolo, $quantitaDisponibile, $prezzo);
        return $stmt->execute();
    }
    public function getNotificationLink($codiceNotifica){
        $stmt = $this->db->prepare("SELECT Link
                                    FROM Notifica
                                    WHERE Codice = ?");
        $stmt->bind_param("i",$codiceNotifica);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["Link"];

    }

}
?>