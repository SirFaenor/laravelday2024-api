<?php
/**
 * Configurazione gateway di pagamento payway
 * Di default sono inseriti i valori di test
 */

return [
    'user' => env('PAYWAY_USER', 'Bo-70849668'),
    'password' => env('PAYWAY_PASSWORD', 'Bo-70849668'),
    'codice_conv' => env('PAYWAY_CONV', '7851431'),
    'terminal_id' => env('PAYWAY_TERMINAL_ID', 'PIS-70849668'),
    // key per signature
    'ksig' => env('PAYWAY_KSIG', '41a4d7dcda6f6a85f990c2f168dd45e5'),
    'wsdl' => env('PAYWAY_WSDL', 'https://pwtest.sinergia.bcc.it/SINE_CG_SERVICES/services/PaymentInitGatewayPort?wsdl'),
    'callBackUrl' => env('PAYWAY_NOTIFY_URL', 'https://webservice.aipioppi.com/api/payway/callback'),
];
