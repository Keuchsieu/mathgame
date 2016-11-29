<?php
session_start();
$_SESSION["start"] = 1;
$error = "";
if (isset($_POST["Email"])){
    if (($_POST["Email"] == "a@a.a") and ($_POST["Password"]=="aaa")){
        header("Location: game.php");
        die();
    } else {
        $error = "Invalid login credentials";
    }
}
echo "<h2 style=\"text-align:center;\">Please login to enjoy our math game</h2>";
?>
<form action="index.php" method="post">
    <table align="center" style="text-align:right;">
        <tr>
            <td>Email:</td>
            <td><input type="email" name="Email" placeholder="a@a.a" size="35"/></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="Password" placeholder="password" size="35"/></td>
        </tr>
        <tr align="left">
            <td></td>
            <td><input type="submit" name="submit" value="Login"/></td>
        </tr>
    </table>
</form>
<?php
echo "<p style=\"color:red;text-align:center;\">" . $error . "</p>";
?>
      