<?php
    try{
        $last_id = $_SESSION["last_id"];
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT userName, address1, state, email, gender ".
        " FROM registration WHERE id = :last_id");
        $stmt->bindParam(' :last_id', $last_id);
        $stmt->execute();

        //set the resulting array to assiciative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //var_dump($stmt->ferchAll()[0]);
        $assocArray = $stmt->fetchAll()[0];
        $name = $assocArray["userName"];
        $website = $assocArray["address1"];
        $comment = $assocArray["state"];
        $email = $assocArray["email"];
        $gender = $assocArray["gender"];
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }

?>