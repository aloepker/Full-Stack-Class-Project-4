<?php
session_start();
$servername = "localhost";
$dbname = "project";
$userName = "root";
$password = "";

try{
    $last_id = $_SESSION["last_id"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT userName, password, firstName, lastName, address1, address2, city, state, zipCode, phone, email, gender, maritalStatus, dateOfBirth".
        " FROM registration WHERE id = :last_id");
    $stmt->bindParam(':last_id', $last_id);
    $stmt->execute();

    //set the resulting array to assiciative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //var_dump($stmt->ferchAll()[0]);
    $assocArray = $stmt->fetchAll()[0];

    $username = $assocArray["userName"];
    $password = $assocArray["password"];
    $firstName = $assocArray["firstName"];
    $lastName = $assocArray["lastName"];
    $address1 = $assocArray["address1"];
    $address2 = $assocArray["address2"];
    $city = $assocArray["city"];
    $state = $assocArray["state"];
    $zipCode = $assocArray["zipCode"];
    $phone = $assocArray["phone"];
    $email = $assocArray["email"];
    $gender = $assocArray["gender"];
    $maritalStatus = $assocArray["maritalStatus"];
    $dateOfBirth = $assocArray["dateOfBirth"];
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    $conn = null;
}

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drifters of Forza Registration</title>
    <meta name="description" content="Adam is making a website, WooHoo!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <meta name="theme-color" content="#faaafa">
    <script src="js/validation.js" defer></script>
</head>
<body>
<div id="container">
    <header>
        <h1>Drifters of Forza</h1>
        <h2>You have successfully registered with our database!</h2>
    </header>

    <div class="maincontainer">

        <nav>
            <p>Page Navigation</p>
            <a href="index.html">Home</a>
            <a href="registration.php">Registration</a>
            <a href="Animations.html">Animations</a>
        </nav>


        <main>
            <div class="container">
                <p>Fill out to become a Drifter of Forza!</p>
                <!-- see page 73 in the book for best practices -->
                <?php if (!empty($errors)): ?>
                    <div class="error-container">
                        <p>Please fix the following errors:</p>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form id="theForm" action="/registration.php" method="POST">
                    <label for="Username">Username:
                        <input disabled id="Username" name="Username" placeholder="Username Here" value="<?php echo htmlspecialchars($username); ?>"></label>
                    <label class="e" id="U"> Username must be between 6 and 50 characters  </label>
                    <br>

                    <label for="Password">Password:
                        <input disabled id="Password" name="Password" placeholder="Password Here" value="<?php echo htmlspecialchars($password); ?>">
                        <label class="e" id="P"> Password must be between 8 and 50 characters  </label>

                        <br>

                        <label for="Repeat_Password">Repeat Password:
                            <input disabled id="Repeat_Password" name="Repeat Password" placeholder="Password Again Here" value="<?php echo htmlspecialchars($password); ?>"></label>
                        <label class="e" id="PR"> Passwords must match                          </label>
                        <br>

                        <label for="First_Name">First Name:
                            <input disabled id=First_Name name="First Name" placeholder="First Name Here" value="<?php echo htmlspecialchars($firstName); ?>"></label>
                        <label class="e" id="FN"> First Name Required. Must be between less than 50 characters</label>
                        <br>

                        <label for="Last_Name">Last Name:
                            <input disabled id=Last_Name name="Last Name" placeholder="Last Name Here" value="<?php echo htmlspecialchars($lastName); ?>"></label>
                        <label class="e" id="LN"> Last Name Required. Must be less than 50 characters </label>
                        <br>

                        <label for="Address1">Address:
                            <input disabled id=Address1 name="Address1" placeholder="Address Line 1 Here" value="<?php echo htmlspecialchars($address1); ?>"></label>
                        <label class="e" id="A"> Address Required. Must be less than 100 characters  </label>
                        <br>

                        <label for="Address2">
                            <input disabled id=Address2 name="Address2" placeholder="Address Line 2 Here" value="<?php echo htmlspecialchars($address2); ?>"></label>
                        <label class="e" id="A2"> Must be less than 100 characters                     </label>
                        <br>

                        <label for="City">City:
                            <input disabled id=City name="City" placeholder="City Name Here" value="<?php echo htmlspecialchars($city); ?>"></label>
                        <label class="e" id="C"> City Name Required. Must be less than 50 characters </label>
                        <br>

                        <label for="State">State:
                            <select disabled id="State">
                                <option value="na" selected="selected" <?php echo htmlspecialchars($state); ?>>Select a State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL" <?php if (isset($state) && $state=="IL") echo "checked"; ?>>Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select></label>
                        <label class="e" id="S"> State Name Required </label>

                        <br>

                        <label for="Zip_Code">Zip Code:
                            <input disabled id=Zip_Code name="Zip Code" placeholder="Zip Code Here" value="<?php echo htmlspecialchars($zipCode); ?>"></label>
                        <label class="e" id="Z"> Zipcode must be between 5 and 9 numbers</label>
                        <br>

                        <label for="Phone_Number">Phone Number:
                            <input disabled id=Phone_Number name="Phone Number" placeholder="Phone Number Here"  value="<?php echo htmlspecialchars($phone); ?>"></label>
                        <label class="e" id="PN"> Phone Number must 10 digits with no punctuation.       </label>
                        <br>


                        <label for="Email">Email:
                            <input disabled id=Email name="Email" placeholder="Email Here" value="<?php echo htmlspecialchars($email); ?>"></label>
                        <label class="e" id="E"> Please enter a valid Email address</label>
                        <br>

                        <label>Gender:
                            <input disabled type="radio" id=male name="Gender" <?php if (isset($gender) && $gender=="male") echo "checked"; ?>>male
                            <input disabled type="radio" id=female name="Gender" <?php if (isset($gender) && $gender=="female") echo "checked"; ?>>female
                            <input disabled type="radio" id=other name="Gender" <?php if (isset($gender) && $gender=="male") echo "checked"; ?>>other</label>
                        <label class="e" id="G"> Please select one      </label>
                        <br>

                        <label>Marital Status:
                            <input disabled type="radio" id=single name="Marital Status" <?php if (isset($maritalStatus) && $maritalStatus=="single") echo "checked"; ?>><label for="single">Single</label>
                            <input disabled type="radio" id=married name="Marital Status" <?php if (isset($maritalStatus) && $maritalStatus=="married") echo "checked"; ?>><label for="married">Married</label></label>
                        <label class="e" id="M"> Please select one </label>
                        <br>


                        <label for="DOB">Date of Birth:
                            <input disabled type="date" id=DOB name="DOB" placeholder="Calendar popup Here" value="<?php echo htmlspecialchars($dateOfBirth); ?>"></label>
                        <label class="e" id="D"> Please enter your date of birth  </label>
                        <br>

                        <button type="submit" id="submitButton">Submit</button> <button type="reset">Clear</button>

                </form>
            </div>
        </main>

    </div>

    <footer>
        <p>External Links</p>
        <a href="https://forza.net/" target = "blank">Forza Homepage</a>
        <a href="https://www.youtube.com/@formuladrift" target = "blank">Formula Drift's YouTube Page</a>
    </footer>

</div>
</body>
</html>
