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
        $stmt = $this->db->prepare("SELECT Categoria, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista
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
        $stmt = $this->db->prepare("SELECT Ordine.Codice as CodiceOrdine, CodicePagamento, DataOrdine, DataSpedizione, DataConsegna, MailAccount, Nome, Cognome
                                    FROM Ordine, Account
                                    WHERE Ordine.MailAccount = Account.Mail");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetails($orderID){
        $stmt = $this->db->prepare("SELECT Titolo, Copertina, Artista, Quantita, Prezzo*Quantita as Totale
                                    FROM Disco_Ordinato, Disco
                                    WHERE Disco_Ordinato.CodiceOrdine = $orderID
                                    AND Disco_Ordinato.CodiceDisco = Disco.Codice");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserInfo($accountMail){
        $stmt = $this->db->prepare("SELECT Nome, Cognome
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
        var_dump($name);
        var_dump($surname);
        var_dump($mail);
        var_dump($phone);
        var_dump($password);
        $stmt->bind_param('sssss', $name, $surname, $mail, $password, $phone);
        $stmt->execute();
    }

}
?>