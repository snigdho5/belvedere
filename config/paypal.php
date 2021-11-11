<?php 

return [ 

    'client_id' => 'AUM8oxHb3GwILAV1qg81g-5KyvbG2z2eAFAfNViHotvBjvk6MtGyf0wpNqMB3vCtd0-3tRjJ2iLUw_H4',

	'secret' => 'EEaaJ5qFgERVIeJsCkgiScJ8oSCBtb36MZduq5nNT8xOPe1GlpDdzWcbVvFdXn23VRQ72cHfRn4QsELf',

    'settings' => array(

        'mode' => 'live',

        'http.ConnectionTimeOut' => 1000,

        'log.LogEnabled' => true,

        'log.FileName' => storage_path() . '/logs/paypal.log',

        'log.LogLevel' => 'FINE'

    ),

];