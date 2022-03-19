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

    <div class="overlay">

        <div class="overlay-panel overlay-right-map">
            <h1>we are here</h1>
            <a href=""><button class="ghost" id="signUp">on Google maps</button>
            </a>
        </div>
    </div>

</div>