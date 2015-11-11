<?php

	$dt      = date('Y-m-d\TH:i:s');
	$payment = esLib::getPaymentByOperation($data, $operation);

	if ($esAdapter->confirm($payment, $dt))
	{
		$xmlBody = '<OrderDate>' . $dt . '</OrderDate>';
	}
	else
	{
		$msg = 'Помилка підтвердження платежу';		
		$code = -12;
	}

?>