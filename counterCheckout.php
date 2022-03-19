<style>
@import url("conceptStyle.css");
</style>
<div class="mainscreen">

    <div class="card">
        <div class="leftside">
            <img src="images/downloaded/design_types/abstract_design1.jpg" class="product" alt="Shoes" />
        </div>
        <div class="rightside">
            <form action="productShipping.php">
                <h1>Cart</h1>
                <h2>Carpet with abstract design</h2>
                <input type="text" value="4500AED" class="inputbox" name="name" style="color:white" disabled />

                <input type="number" placeholder="1" value="1" min="1" class="inputbox" name="card_number"
                    id="card_number" required />

                <div class="expcvv">
                    <p class="expcvv_text2">Size in Meters</p>
                    <select class="inputbox" name="cvv" id="cvv">
                        <option name="3.00 * 2.00">3.00 * 2.00</option>
                        <option name="3.00 * 2.00">6.00 * 4.00</option>
                        <option name="3.00 * 2.00">10.00 * 12.00</option>
                        <option name="3.00 * 2.00">12.00 * 18.00 </option>
                        <option name="nill">My own size </option>
                        <select>
                </div>
                <div class="expcvv">
              <p>  <input type="number" placeholder="2" value="2" min="1" class="inputbox" name="custom-size"
                    id="custom-size" /></p>
                 <p>   <input type="number" placeholder="2" value="2" min="1" class="inputbox" name="custom-size"
                    id="custom-size" /></p>
</div>
               
                <button type="submit" class="button">Proceed>></button>
            </form>
        </div>
    </div>
</div>