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
            <p>Cher(e) {{ $customer_name }},</p>
            <p>
                Nous vous remercions pour votre commande passée sur notre site
                internet hairclip.com le{{ date('d-m-Y', strtotime($order_created_at)) }}. Nous sommes ravis de vous
                compter parmi nos clients fidèles.
            </p>
            <p>
                Votre commande a été traitée avec succès et nous confirmons que nous
                avons bien reçu votre paiement. Voici les détails de votre commande:
            </p>
            <p>
                <b>Numéro de commande : </b> {{ $order_id }} <br />
                <b>Date de la commande : </b> {{ date('d-m-Y', strtotime($order_created_at)) }} <br />
                <b>Total de la commande : </b> {{ $amount }} € + {{ $billing }} €
            </p>
            <p>
                Nous sommes actuellement en train de préparer votre commande pour
                l'expédition. Nous ferons de notre mieux pour expédier votre commande
                le plus rapidement possible.
            </p>
            <p>
                Nous vous enverrons un autre e-mail dès que votre commande aura été
                expédiée. Vous pourrez suivre votre colis en utilisant le lien de
                suivi que nous vous fournirons.
            </p>
            <p>
                Si vous avez des questions ou des préoccupations concernant votre
                commande, n'hésitez pas à nous contacter. Nous serons heureux de vous
                aider.
            </p>
            <p>
                Nous vous remercions encore une fois pour votre confiance et votre
                fidélité envers notre entreprise.
            </p>
            <p>Cordialement,</p>
        </div>
    </div>
</body>

</html>
