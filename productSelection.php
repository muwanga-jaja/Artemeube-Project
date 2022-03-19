
<style>
@import url("conceptStyle.css");
</style>
    <title>Product Selection</title>
    <link rel="stylesheet" type="text/css" href="pdtSelectionStyle.css" />

    <table class="checkoutTable">
        <th>
            <h3>You can check the product</h3>
        </th>
        <tr>
            <td><img src="images/bed.png" alt=""> </td>
            <td width=12> Qty</td>
            <td> Size</td>
            <td>Selection</td>
        </tr>
    </table>
    <div class="pricing-box-container">
        <div class="pricing-box text-center">
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
            <button class="btn-primary">Get Started</button>
        </div>
        
    <div class="pricing-box-container">
        <div class="pricing-box text-center">

            <button class="btn-primary">Get Started</button>
        </div>
    </div>
    </div>
