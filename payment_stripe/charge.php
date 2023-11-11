<?php
require '../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51O9rtNKbqSaPrllSdjV3hRaAlE8vakOJzKtK9WqCFuAkFYOLAV9cL1YXVCGKScHkLjIbEPi1zWAfhRy75FJLIS8S00wsbaO6Bj');
$response = ["payement" => "error","amount" => 0];

if (isset($_POST['stripeToken']) && isset($_POST['amount']) && isset($_POST['first-name']) && isset($_POST['last-name'])){
    $stripeToken = $_POST['stripeToken'];
    $amount = $_POST['amount'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];

    $amount = $amount*100;

    try{
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'eur',
            'description' => 'Paiement test',
            'source' => $stripeToken,
            'metadata' => [
                'first-name' => $firstName,
                'last-name' => $lastName
            ]
            ]);

            echo 'Mety ketrika Rzandry ahhh';
        } catch (\Stripe\Exception\CardException $e) {
            $response['message'] = $e -> getMessage();

        } catch (\Exception $e){
            $response['message'] = $e ->getMessage();   
        }

}
echo json_encode($response);

?>