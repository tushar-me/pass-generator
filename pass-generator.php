<?php
    $password = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){ // jodi post method e submit kora hoy tahole
        $password_length = 20;
        $add_special_characters = isset($_POST['Special_Character']);
        $add_numbers = isset($_POST["Number"]);
        $available_characters ="QWERTYUIOPLKJhgfdsazxcvbnm";
        $available_special_characters = "!@#$%^&*-_=+";
        $available_numbers = "0987654321";

        if($add_special_characters){
            $available_characters.= $available_special_characters;
        }

        if($add_numbers){
            $available_characters.= $available_numbers;
        }

        for ( $i = 0; $i < $password_length; $i++ ) {
            $password .= $available_characters[rand( 0, strlen( $available_characters ) - 1 )];
        }
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Your Password</title>
    <link rel="stylesheet" href="pass-generator.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Generate Your Password</h1>
            <form action="pass-generator.php" method="post">
                <div class="inputLabel">
                    <label for="length">How many characters password do you want <span>(min:8 - max:32)</span></label>
                </div>
                <div class="lengthInput">
                    <input type="number" id="length" name="length"  placeholder="Inter length" min="8" max="32" required>
                </div>
                <div class="special_character">
                   <label for="">Add Special Character</label>
                   <input type="checkbox" name="Special_Character" id="Special_Character" value="1">
                </div>
                <div class="number">
                   <label for="">Add Number</label>
                   <input type="checkbox" name="Number" id="Number" value="1">
                </div>
                <div class="submitButton">
                    <button type="submit" name="submit">Generate Password</button>
                </div>
            </form>
            <div class="pass-box">
                <p>Your Generated Password : </p>
                <div class="pass">
                    <span><?php echo $password;?></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>