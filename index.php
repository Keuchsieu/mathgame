<?php
session_start();
if (!isset($_SESSION["ready"])){
    header("Location: login.php");
    die();
}
?>
<div style="width:70%">
    <form action="login.php" style="text-align:right;">
        <input type="submit" value="Logout">
    </form>
</div>
<?php
if ($_SESSION["start"] == 1){
    $_SESSION["count"] = 0;
    $_SESSION["right"] = 0;
    $_SESSION["flag"] = 0;
    $_SESSION["start"] = 0;
} else {
    if (!empty($_POST["answer"] and is_numeric($_POST["answer"]))){
        $_SESSION["count"] = $_SESSION["count"] + 1;
        if ($_POST["answer"] == $_SESSION["answer"]) {
            $_SESSION["right"] = $_SESSION["right"] +1; 
            $_SESSION["flag"] = 1;
        } else {
            $_SESSION["flag"] = 2;
            $A = $_SESSION["A"];
            $B = $_SESSION["B"];
            $D = $_SESSION["display"];
            $AN = $_SESSION["answer"];
        }
    } else if (!is_numeric($_POST["answer"])) {
        $_SESSION["flag"] = 3;
    }
}
$_SESSION["A"] = rand(0,20);
$o = rand(0,1);
$_SESSION["B"] = rand(0,20);
$_SESSION["answer"] = -1;
$_SESSION["display"];
if ($o == 0) {
    $_SESSION["answer"] = $_SESSION["A"] + $_SESSION["B"];
    $_SESSION["display"] = " + ";
} else {
    $_SESSION["answer"] = $_SESSION["A"] - $_SESSION["B"];
    $_SESSION["display"] = " - ";
}
echo "<h2 style=\"text-align:center;\">Math Game</h2>";
echo "<p style=\"text-align:center;\"><b>" . $_SESSION["A"] . $_SESSION["display"] . $_SESSION["B"] . "</b></p>";
?>
<form action="index.php" method="post">
    <div style="text-align:center;"><input syle="text" name="answer" placeholder="Enter Answer"/></div>
    <br>
    <div style="text-align:center;"><input type="submit" value="Submit" /></div>
</form>
<hr />
<?php
if (!empty($_SESSION["flag"])){
    if ($_SESSION["flag"] == 3){
        echo "<p style=\"text-align:center;color: red;\">You must enter a number for your answer</p>";
    } else if ($_SESSION["flag"] == 1){
        echo "<p style=\"color: green;text-align:center;\">Correct!</p>";
    } else if ($_SESSION["flag"] == 2) {
        echo "<p style=\"text-align:center;color: red;\">INCORRECT, " . $A . $D . $B . " is " . $AN . "</p>";
    }
}
echo "<p style=\"text-align:center;\">Score: " . $_SESSION["right"] . "/" . $_SESSION["count"] . "</p>"
?>