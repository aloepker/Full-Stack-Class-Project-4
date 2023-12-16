<?php
/* mreplace isValdid with my validation boolean, or maybe the entire function o:) */
    if ($isValid) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                $username, $password);
            //set pdo error mode to exception:
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("INSERT INTO registration (userName, password, firstName, lastName,
                   address1, city, state, zipCode, phone, email, gender, maritalStatus, dateOfBirth)
/*  aadjust variables bellow */           
            VALUES (:name, '', '', '', :website, '', :comment, '', '', :email, :gender, '', CURDATE())");
            $sql->bindParam(' :name', $name);
            $sql->bindParam(' :website', $aaddress);
            $sql->bindParam(' :commeent', $comment);
            $sql->bindParam(' :email', $email);
            $sql->bindParam(' :gender', $gender);

            sql->execute();

            $last_id = $conn->lastInsertId();
            $_SESSION["last_id"] = "$last_id";

            header("Location: confirmation,php");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $conn = null;
        }

    }


?>