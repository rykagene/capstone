<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>


    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />

<body>

    <div class="form-structor">

        <div class="signup">
            <form method="POST" action="toLogin.php" class="form" id="b-form">
                <h2 class="form-title" id="signup"><span>or</span>Log In</h2>
                <div class="form-holder">
                    <input type="text" name="student_id" class="input" placeholder="Student Number"
                        required="required" />
                    <input type="password" name="password" class="input" placeholder="Password" required="required" />
                </div>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
        </div>
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Sign Up</h2>
                <div class="form-holder">
                    <input type="fname" class="input" placeholder="First Name" />
                    <input type="lname" class="input" placeholder="Last Name" />
                    <input type="stud-no" class="input" placeholder="Student Number" />
                    <input type="email" class="input" placeholder="Email" />
                    <input type="password" class="input" placeholder="Password" />
                    <input type="confirm-pass" class="input" placeholder="Confirm Password" />
                </div>
                <button class="submit-btn">Sign up</button>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>