<?php
    function getall_dish(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM dish");
        $stmt->execute();
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function deldish($id){
        $conn=connectdb();
        $sql = "DELETE FROM dish WHERE id=".$id;
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function adddish($id_dish,$name_dish,$price_dish,$img_dish,$id_eatery,$id_catalog){
        $conn=connectdb();
        $sql = "INSERT INTO dish (id,name,price,img,id_eatery,id_catalog) VALUES ('".$id_dish."','".$name_dish."','".$price_dish."','".$img_dish."','".$id_eatery."','".$id_catalog."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function checkuser($username,$password) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM user WHERE name='".$username."' AND password='".$password."'");
        $stmt ->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if(count($kq)>0) return $kq[0]['role'];
        else return 0;
    }
    function getuserinfo($username,$password) {
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM user WHERE name='".$username."' AND password='".$password."'");
        $stmt ->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

?>