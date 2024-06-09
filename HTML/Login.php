<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LittleLearners</title>
    <link rel="stylesheet" href="../Css/Login-style.css">
    <link rel="icon" type="image/png" href="../images/Logo.png">
</head>
<body>
    <div class="header">
        <nav>
            <ul>
                <li><img src="../images/Logo.png" class="logo"> </li>
                <li id="bigFont">LittleLearners</li>
            </ul>
        </nav>
    </div>

    <div class="video-wrap">
        <video autoplay="" loop="" muted="" class="custom-video" poster="" style="z-index: -10;position: absolute; right: 0;bottom: 0;">
            <source src="../videos/LoginV.mp4" type="video/mp4">
        </video>
    </div>

    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form action="../singupHandle.php" method="post">
                <input type="text" placeholder="Full name" name="signupName" required autocomplete="off" />
                <input type="email" placeholder="Email address" name="signupMail" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Enter a valid email address" autocomplete="off" />
                <input type="password" placeholder="Password" name="signupPass" required pattern="^(?=.*[A-Z])(?=.*\d).{6,}$" title="Password must contain at least 6 characters, including at least one uppercase letter and one digit." autocomplete="off" />
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" />
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" value="Signup"/>
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form action="../loginHandle.php" method="post">
                <input type="email" placeholder="Email address" name="loginMail" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Enter a valid email address" autocomplete="off" />
                <input type="password" placeholder="Password" name="loginPassword" required  autocomplete="off" />
                <a href="#">Forgot password?</a>
                <input type="submit" value="Login" />
            </form>
        </div>

        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");

            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });

            <?php
            session_start();
            if (isset($_SESSION['loginError']) && $_SESSION['loginError']) {
                echo "alert('Username / password are not correct !!');";
                unset($_SESSION['loginError']); // Unset the session variable to avoid showing the alert again
            }
            ?>
        </script>
    </section>
</body>
</html>
