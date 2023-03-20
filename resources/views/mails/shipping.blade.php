<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        Bonjour ,
    </p>
    <p>
        Nous tenons à vous informer que votre commande a été préparée et est prête à être livrée à l'adresse que vous
        avez fournie lors de votre commande. Veuillez noter que la livraison devrait arriver dans les prochains jours.
    </p>
    <p>
        Voici les détails de votre commande:

        Numéro de commande: {{ $order_id }}
        Montant total de la commande: {{ $amount }}
    </p>
    <p>
        Nous espérons que vous apprécierez vos achats et que vous serez entièrement satisfait de votre commande. Si vous
        avez des questions ou des préoccupations, n'hésitez pas à nous contacter.
    </p>
    <p>
        Cordialement,
    </p>
    <p>Hairclip</p>



    <p> Cher(e) {{ $customer_name }},</p>
    <br>
    <p> Nous vous remercions pour votre commande passée sur notre site internet hairclip.com
        le{{ date('d-m-Y', strtotime($order_created_at)) }}.
        Nous sommes ravis de vous compter parmi nos clients fidèles.</p>
    <br>

    <p> Votre commande a été traitée avec succès et nous confirmons que nous avons bien reçu votre paiement. Voici les
        détails de votre commande:</p>
    <br>

    <p>
        <b>Numéro de commande : </b> {{ $order_id }} <br>
        <b>Date de la commande : </b> {{ date('d-m-Y', strtotime($order_created_at)) }} <br>
        <b>Total de la commande : </b> {{ $amount }} € + {{ $billing }} € <br>
    </p>
    <br>

    <p> Nous sommes actuellement en train de préparer votre commande pour l'expédition. Nous ferons de notre mieux pour
        expédier votre commande le plus rapidement possible.</p>
    <br>

    <p> Nous vous enverrons un autre e-mail dès que votre commande aura été expédiée. Vous pourrez suivre votre colis en
        utilisant le lien de suivi que nous vous fournirons.</p>
    <br>

    <p> Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter. Nous
        serons heureux de vous aider.</p>
    <br>

    <p> Nous vous remercions encore une fois pour votre confiance et votre fidélité envers notre entreprise.</p>
    <br>
    <br>
    <p> Cordialement,</p>
    <br>

</body>

</html>
