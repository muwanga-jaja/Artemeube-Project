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
        <form action="index.php?page=adminPanel.php" class="overlay-panel-login">
            <h1 style="color:black;x font-size=24px">Sign in</h1>
            <span>Enter your account details</span>
            <input type="hidden" value="admin" name="login" />
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



<!--
        <div class="overlay-container">
            <div class="overlay">
                <form action="" class="sign-up-container ">
                    <div class=" overlay-left">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
-->


<!--	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
-->