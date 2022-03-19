<?php

?>
<style>
@import url("general.css");
</style>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
</script>

<!--body begins here -->
<div class="container-login" id="container">
    <div class="sign-in-container ">
        <form enctype="multipart/form-data" action="<?php URL; ?>indexController/editSubmitIndex" class="overlay-panel">
            <h1 style="color:black;x font-size=24px">Sign in</h1>
            <span>Enter your account details</span>
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start the journey with us</p>
                <a href="index.php?page=registerUser.php">
                    <button class="ghost" id="signUp">Sign Up</button>
                </a>
            </div>
        </div>
    </div>
</div>

