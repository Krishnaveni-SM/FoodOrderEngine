<!DOCTYPE html>
<html>
<head>
    <title>Muscat Payment Form</title>
    <link rel="stylesheet" type="text/css" href="styles/payment.css">
</head>
<body>
    <div class="payment-container">
        <h1>Muscat Payment Details</h1>
        <form class="payment-form">
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="**** **** **** ****" required>
            
            <label for="cardName">Cardholder's Name</label>
            <input type="text" id="cardName" name "cardName" placeholder="John Doe" required>
            
            <div class="flex-row">
                <div class="expiry">
                    <label for="expiryMonth">Expiration Month</label>
                    <input type="text" id="expiryMonth" name="expiryMonth" placeholder="MM" required>
                </div>
                <div class="expiry">
                    <label for="expiryYear">Expiration Year</label>
                    <input type="text" id="expiryYear" name="expiryYear" placeholder="YY" required>
                </div>
            </div>
            
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="***" required>
            
            <button type="submit">Pay Now</button>
        </form>
    </div>
    
    <?php
    if (isset($_GET["total_amount"])) {
        // Retrieve the total_amount value from the query parameter
        $totalAmount = $_GET["total_amount"];
    } else {
        // Handle the case where the total_amount parameter is not provided
        echo "Total amount not provided.";
    }
    ?>
</body>
</html>
