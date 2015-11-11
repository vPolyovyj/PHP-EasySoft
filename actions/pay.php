<?php

	$dt      = esLib::getDateTime($data);
	$account = esLib::getAccountByOperation($data, $operation);
	$order   = esLib::getOrderByOperation($data, $operation);
	$amount  = esLib::getAmountByOperation($data, $operation);

	if ($ref = $esAdapter->prepay($account, $amount, $dt, $order))
	{
		$xmlBody = '<PaymentId>' . $ref . '</PaymentId>';
	}
	else
	{
		$msg = 'Помилка внесення платежу';		
		$code = -11;
	}

?>