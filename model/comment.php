<?php
    function getall_bl(){
        $conn= db();
        $sql = "SELECT * FROM comment ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dssp = $stmt->fetchAll();
        $conn = null;
        return $dssp;
    }
    function delbl($id){
        $conn= db();
        $sql = "DELETE FROM comment WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function addbl($name,$information){
        $conn= db();
        $sql = "INSERT INTO comment (name,information) VALUES ('".$name."','".$information."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
?>