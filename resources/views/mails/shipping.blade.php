<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <div>
        <div
            style="
          width: 500px;
          background-color: rgb(225, 225, 225);
          padding: 50px;
          border-radius: 32px;
        ">
            <img style="
                    margin-bottom: 50px;
                    width: 100px;
                    height: 100px;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                "
                src="https://i.ibb.co/pPBzPfx/1-transparent-logo-black-scroped.png" alt="1-transparent-logo-black"
                border="0" />
            <p>Bonjour ,</p>
            <p>
                Nous tenons à vous informer que votre commande a été préparée et est
                prête à être livrée à l'adresse que vous avez fournie lors de votre
                commande. Veuillez noter que la livraison devrait arriver dans les
                prochains jours.
            </p>
            <p>
                Voici les détails de votre commande: Numéro de commande: {{ $order_id }} Montant total de la
                commande: {{ $amount }}
            </p>
            <p>
                Nous espérons que vous apprécierez vos achats et que vous serez
                entièrement satisfait de votre commande. Si vous avez des questions ou
                des préoccupations, n'hésitez pas à nous contacter.
            </p>
            <p>Cordialement,</p>

            <p>Hairclip</p>
        </div>
    </div>
</body>

</html>
