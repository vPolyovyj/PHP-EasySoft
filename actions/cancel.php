<?php

	$dt      = date('Y-m-d\TH:i:s');
	$payment = esLib::getPaymentByOperation($data, $operation);

	if ($esAdapter->cancel($payment))
	{
		$xmlBody = '<CancelDate>' . $dt . '</CancelDate>';
	}
	else
	{
		$msg = 'Помилка скасування платежу';		
		$code = -13;
	}

?>