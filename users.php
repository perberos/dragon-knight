<?php // users.php :: Handles user account functions.

include('lib.php');
$link = opendb();

if (isset($_GET["do"])) {

    $do = $_GET["do"];
    if ($do == "register") { register(); }
    elseif ($do == "verify") { verify(); }
    elseif ($do == "lostpassword") { lostpassword(); }
    elseif ($do == "changepassword") { changepassword(); }

}

function register() { // Register a new account.

    $controlrow = getcontrol ();

    if (isset($_POST["submit"])) {

        $errors = 0; $errorlist = "";

        // Process username.
        if ($_POST["username"] == "") { $errors++; $errorlist .= "Username field is required.<br />"; }
        if (preg_match("/[^A-z0-9_\-]/", $_POST["username"])==1) { $errors++; $errorlist .= "Username must be alphanumeric.<br />"; } // Thanks to "Carlos Pires" from php.net!
        $usernamequery = doquery("SELECT username FROM {{table}} WHERE username='". mysql_escape_string ($_POST["username"]) ."' LIMIT 1","users");
        if (mysql_num_rows($usernamequery) > 0) { $errors++; $errorlist .= "Username already taken - unique username required.<br />"; }

        // Process charname.
        if ($_POST["charname"] == "") { $errors++; $errorlist .= "Character Name field is required.<br />"; }
        if (preg_match("/[^A-z0-9_\-]/", $_POST["charname"])==1) { $errors++; $errorlist .= "Character Name must be alphanumeric.<br />"; } // Thanks to "Carlos Pires" from php.net!
        $characternamequery = doquery("SELECT charname FROM {{table}} WHERE charname='". mysql_escape_string ($_POST["charname"]) ."' LIMIT 1","users");
        if (mysql_num_rows($characternamequery) > 0) { $errors++; $errorlist .= "Character Name already taken - unique Character Name required.<br />"; }

        // Process email address.
        if ($_POST["email1"] == "" || $_POST["email2"] == "") { $errors++; $errorlist .= "Email fields are required.<br />"; }
        if ($_POST["email1"] != $_POST["email2"]) { $errors++; $errorlist .= "Emails don't match.<br />"; }
        if (! is_email($_POST["email1"])) { $errors++; $errorlist .= "Email isn't valid.<br />"; }
        $emailquery = doquery("SELECT email FROM {{table}} WHERE email='". mysql_escape_string ($_POST["email1"]) ."' LIMIT 1","users");
        if (mysql_num_rows($emailquery) > 0) { $errors++; $errorlist .= "Email already taken - unique email address required.<br />"; }

        // Process password.
        if (trim($_POST["password1"]) == "") { $errors++; $errorlist .= "Password field is required.<br />"; }
        if (preg_match("/[^A-z0-9_\-]/", $_POST["password1"])==1) { $errors++; $errorlist .= "Password must be alphanumeric.<br />"; } // Thanks to "Carlos Pires" from php.net!
        if ($_POST["password1"] != $_POST["password2"]) { $errors++; $errorlist .= "Passwords don't match.<br />"; }
        $password = md5($_POST["password1"]);

        if ($errors == 0) {

            if ($controlrow["verifyemail"] == 1) {
                $verifycode = "";
                for ($i=0; $i<8; $i++) {
                    $verifycode .= chr(rand(65,90));
                }
            } else {
                $verifycode='1';
            }

            $query = doquery("INSERT INTO {{table}} SET id='',regdate=NOW(),verify='".$verifycode."',username='". mysql_escape_string ($_POST["username"]) ."',password='".$password."',email='". mysql_escape_string ($_POST["email1"]) ."',charname='". mysql_escape_string ($_POST["charname"]) ."',charclass='". mysql_escape_string ($_POST["charclass"]) ."',difficulty='". mysql_escape_string ($_POST["difficulty"]) ."'", "users") or die(mysql_error());

            if ($controlrow["verifyemail"] == 1) {
                if (sendregmail($email1, $verifycode) == true) {
                    $page = "Your account was created successfully.<br /><br />You should receive an Account Verification email shortly. You will need the verification code contained in that email before you are allowed to log in. Once you have received the email, please visit the <a href=\"users.php?do=verify\">Verification Page</a> to enter your code and start playing.";
                } else {
                    $page = "Your account was created successfully.<br /><br />However, there was a problem sending your verification email. Please check with the game administrator to help resolve this problem.";
                }
            } else {
                $page = "Your account was created succesfully.<br /><br />You may now continue to the <a href=\"login.php?do=login\">Login Page</a> and continue playing ".$controlrow["gamename"]."!";
            }

        } else {

            $page = "The following error(s) occurred when your account was being made:<br /><span style=\"color:red;\">$errorlist</span><br />Please go back and try again.";

        }

    } else {

        $page = gettemplate("register");
        if ($controlrow["verifyemail"] == 1) {
            $controlrow["verifytext"] = "<br /><span class=\"small\">A verification code will be sent to the address above, and you will not be able to log in without first entering the code. Please be sure to enter your correct email address.</span>";
        } else {
            $controlrow["verifytext"] = "";
        }
        $page = parsetemplate($page, $controlrow);

    }

    display($page, "Register", false, false, false);

}

function verify() {

    if (isset($_POST["submit"])) {
        $userquery = doquery("SELECT username,email,verify FROM {{table}} WHERE username='". mysql_escape_string ($_POST["username"]) ."' LIMIT 1","users");
        if (mysql_num_rows($userquery) != 1) { die("No account with that username."); }
        $userrow = mysql_fetch_array($userquery);
        if ($userrow["verify"] == 1) { die("Your account is already verified."); }
        if ($userrow["email"] != $_POST["email"]) { die("Incorrect email address."); }
        if ($userrow["verify"] != $_POST["verify"]) { die("Incorrect verification code."); }
        // If we've made it this far, should be safe to update their account.
        $updatequery = doquery("UPDATE {{table}} SET verify='1' WHERE username='". mysql_escape_string ($_POST["username"]) ."' LIMIT 1","users");
        display("Your account was verified successfully.<br /><br />You may now continue to the <a href=\"login.php?do=login\">Login Page</a> and start playing the game.<br /><br />Thanks for playing!","Verify Email",false,false,false);
    }
    $page = gettemplate("verify");

    display($page, "Verify Email", false, false, false);

}

function lostpassword() {

    if (isset($_POST["submit"])) {
        $userquery = doquery("SELECT email FROM {{table}} WHERE email='". mysql_escape_string ($_POST["email"]). "' LIMIT 1","users");
        if (mysql_num_rows($userquery) != 1) { die("No account with that email address."); }
        $newpass = "";
        for ($i=0; $i<8; $i++) {
            $newpass .= chr(rand(65,90));
        }
        $md5newpass = md5($newpass);
        $updatequery = doquery("UPDATE {{table}} SET password='$md5newpass' WHERE email='". mysql_escape_string ($_POST["email"]). "' LIMIT 1","users");
        if (sendpassemail($_POST["email"],$newpass) == true) {
            display("Your new password was emailed to the address you provided.<br /><br />Once you receive it, you may <a href=\"login.php?do=login\">Log In</a> and continue playing.<br /><br />Thank you.","Lost Password",false,false,false);
        } else {
            display("There was an error sending your new password.<br /><br />Please check with the game administrator for more information.<br /><br />We apologize for the inconvience.","Lost Password",false,false,false);
        }
        die();
    }
    $page = gettemplate("lostpassword");

    display($page, "Lost Password", false, false, false);

}

function changepassword() {

    if (isset($_POST["submit"])) {

        $userquery = doquery("SELECT * FROM {{table}} WHERE username='". mysql_escape_string ($_POST["username"]) ."' LIMIT 1","users");
        if (mysql_num_rows($userquery) != 1) { die("No account with that username."); }
        $userrow = mysql_fetch_array($userquery);
        if ($userrow["password"] != md5($_POST["oldpass"])) { die("The old password you provided was incorrect."); }
        if (preg_match("/[^A-z0-9_\-]/", $_POST["newpass1"])==1) { die("New password must be alphanumeric."); } // Thanks to "Carlos Pires" from php.net!
        if ($_POST["newpass1"] != $_POST["newpass2"]) { die("New passwords don't match."); }
        $realnewpass = md5($_POST["newpass1"]);
        $updatequery = doquery("UPDATE {{table}} SET password='". mysql_escape_string ($realnewpass). "' WHERE username='". mysql_escape_string ($_POST["username"]). "' LIMIT 1","users");
        if (isset($_COOKIE["dkgame"])) { setcookie("dkgame", "", time()-100000, "/", "", 0); }
        display("Your password was changed successfully.<br /><br />You have been logged out of the game to avoid cookie errors.<br /><br />Please <a href=\"login.php?do=login\">log back in</a> to continue playing.","Change Password",false,false,false);
        die();
    }
    $page = gettemplate("changepassword");

    display($page, "Change Password", false, false, false);

}

function sendpassemail($emailaddress, $password) {

    $controlrow = getcontrol ();

	$email = <<<END
You or someone using your email address submitted a Lost Password application on the ${controlrow["gamename"]} server, located at ${controlrow["gameurl"]}.

We have issued you a new password so you can log back into the game.

Your new password is: $password

Thanks for playing.
END;

    $status = mymail($emailaddress, "$gamename Lost Password", $email);
    return $status;

}

function sendregmail($emailaddress, $vercode) {

    $controlrow = getcontrol();

    $verurl = $controlrow["gameurl"] . "?do=verify";

	$email = <<<END
You or someone using your email address recently signed up for an account on the ${controlrow["gamename"]} server, located at ${controlrow["gameurl"]}.

This email is sent to verify your registration email. In order to begin using your account, you must verify your email address.
Please visit the Verification Page (${verurl}) and enter the code below to activate your account.
Verification code: ${vercode}

If you were not the person who signed up for the game, please disregard this message. You will not be emailed again.
END;

    $status = mymail($emailaddress, $controlrow["gamename"]." Account Verification", $email);
    return $status;

}

function mymail($to, $title, $body, $from = '') { // thanks to arto dot PLEASE dot DO dot NOT dot SPAM at artoaaltonen dot fi.

    $controlrow = getcontrol ();

  $from = trim($from);

  if (!$from) {
   $from = '<'.$controlrow["adminemail"].'>';
  }

  $rp    = $controlrow["adminemail"];
  $org    = $controlrow["gameurl"];
  $mailer = 'PHP';

  $head  = '';
  $head  .= "Content-Type: text/plain \r\n";
  $head  .= "Date: ". date('r'). " \r\n";
  $head  .= "Return-Path: $rp \r\n";
  $head  .= "From: $from \r\n";
  $head  .= "Sender: $from \r\n";
  $head  .= "Reply-To: $from \r\n";
  $head  .= "Organization: $org \r\n";
  $head  .= "X-Sender: $from \r\n";
  $head  .= "X-Priority: 3 \r\n";
  $head  .= "X-Mailer: $mailer \r\n";

  $body  = str_replace("\r\n", "\n", $body);
  $body  = str_replace("\n", "\r\n", $body);

  return mail($to, $title, $body, $head);

}