<style>
@import url("general.css");
</style>

<script>
var colors = ['1abc9c', '2c3e50', '2980b9', '7f8c8d', 'f1c40f', 'd35400', '27ae60'];

colors.each(function(color) {
    $$('.color-picker')[0].insert(
        '<div class="square" style="background: #' + color + '"></div>'
    );
});

$$('.color-picker')[0].on('click', '.square', function(event, square) {
    background = square.getStyle('background');
    $$('.custom-dropdown select').each(function(dropdown) {
        dropdown.setStyle({
            'background': background
        });
    });
});
</script>

<!-- start of body-->
<div class="container-register">
    <form action="#" class="form-container sign-in-container">
        <span><h1>Register User</h1></span>

        <input type="text" placeholder="Username" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <input type="password" placeholder="Confrim Password" />
        <span class="custom-dropdown ">
            <select>
                <option value="admin">Administrator</option>
                <option value="user">Regular user</option>
            </select>
        </span>
        <button type="submit" name="save_user">Save</button>
    </form>
    <div class="form-container  overlay-right">
		<form action="#">
			<img src="images/downloaded/login_placeHolder.png" class="image_resizer" alt="">
		</form>
	</div>

</div>
<!-- enf of body-->
<!-- 
 <div class="right-panel-active ">
            <form action="#" class=" form-container ">
                <h1>Register User</h1>

                <input type="text" placeholder="Username" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <input type="password" placeholder="Confrim Password" />
                <button>Save</button>
            </form>
        </div>
-->
