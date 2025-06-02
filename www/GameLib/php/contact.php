<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
<link rel="StyleSheet" href="../Css/style.css">

<link rel="StyleSheet" href="../Css/styles.css">
<?php include("dbConnection.php");?>

</head>
<body>
    

<section id="header">
<a href="../html/index.html"> <img src="../rss/controller.png" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li> <a  href="../html/index.html"> Home </a></li>           
            <li> <a  href="../html/about.html">About</a></li>
            <li> <a class="active" href="../php/contact.php">Contact us</a></li>
        </ul>
    </div>
</section>

 <fieldset >
    <legend>Form</legend> <!-- Titre du fieldset-->
    <form method="POST" action="" >
<label for="name">Full Name:</label>
<input type="text" name="name" id="name" placeholder="Full Name" required/>
<label for="email">Email:</label>
<input type="email" name="email" id="email" placeholder="Email" required/>
<label for="feedback">Message:</label>
<input type="text" name="feedback" id="feedback" placeholder="Message" required/>
 <input type="submit" value="send">
 </form>
</fieldset>


<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO feedbacks (email, name, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $name, $feedback);

    $stmt->execute();
    $stmt->close();
    echo "Feedback been sent thank you for your survey";
}
?>



<h2>
<?php //todo add comment section of the feedbacks idea to get all the database and parcour them while displaying each time 1 row
?>
</h2>


</body>
</html>