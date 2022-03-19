<style>
@import url("conceptStyle.css");
</style>
<div class="mainscreen">

    <div class="card">
        <div class="leftside">
            <img src="images/downloaded/one_piece_of_art_sofa.jpg" class="product" alt="Shoes" style="width:100px height:100px"/>
        </div>
        <div class="rightside">
            <form action="productShipping.php">
                <h1>CheckOut</h1>
                <h2>Payment Information</h2>
                <input type="text" placeholder="Card-Holder name" class="inputbox" name="name" required />
  
                <input type="number" placeholder="Card Number" class="inputbox" name="card_number" id="card_number" required />

                <select class="inputbox" name="card_type" id="card_type" required>
                    <option value="">--Select a Card Type--</option>
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                </select>
                <div class="expcvv">

                    <p class="expcvv_text">Expiry</p>
                    <input type="date" class="inputbox" name="exp_date" id="exp_date" required />

                    <p class="expcvv_text2">CVV</p>
                    <input type="password" class="inputbox" name="cvv" id="cvv" required />
                </div>
                <p></p>
                <button type="submit" class="button">CheckOut</button>
            </form>
        </div>
    </div>
</div>