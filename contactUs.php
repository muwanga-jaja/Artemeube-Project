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

<div class="container-login" id="container">
    <div class="sign-in-container ">
        <form action="validateUser.php" class="overlay-panel-login">
            <span>message</span>
            <input type="email" name="email" placeholder="Email" />
            <input type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" name="telephone" placeholder="Phone Number" />
            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
            <button type="submit">send</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            
            <div class="overlay-panel overlay-right-map">
                <h1>we are here on Google maps</h1>
                    <img src="images/current_location.png" alt="">
                
                <a href="">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3612.6240926756054!2d55.2049576!3d25.11458309999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sae!4v1646219726876!5m2!1sen!2sae" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                   <br/><p></p> <button class="ghost" id="signUp">on Google maps</button>
                </a>
            </div>
        </div>
    </div>
</div>