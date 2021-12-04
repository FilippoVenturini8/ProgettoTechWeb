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
        $stmt = $this->db->prepare("SELECT Nome, CodiceCategoria FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDisksFromCategory($categoryID){
        $stmt = $this->db->prepare("SELECT CodiceCategoria, Titolo, DataPubblicazione, QuantitaDisponibile, Copertina, Prezzo, VotoMedio, Artista.Nome as Artista, Categoria
                                    FROM disco, artista
                                    WHERE disco.codiceArtista = disco.codiceArtista
                                    AND CodiceCategoria= $categoryID");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDisksInCart($accountID){
        $stmt = $this->db->prepare("SELECT Disco.CodiceDisco as CodiceDisco, Quantita, Copertina, Titolo, Prezzo, VotoMedio, Artista.Nome as Artista, CodiceCategoria
                                    FROM Disco_In_Carrello, Disco, Artista
                                    WHERE Disco_In_Carrello.CodiceDisco = Disco.CodiceDisco
                                    AND Disco.CodiceArtista = Artista.CodiceArtista
                                    AND Disco_In_Carrello.CodiceAccount = $accountID");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>