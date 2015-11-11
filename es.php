<?php

	ob_start();

	require_once 'classes/esDemo.class.php';
	require_once 'classes/esXml.class.php';
	require_once 'classes/esLib.class.php';

	define('SAFE_MODE', true);

	$allowedIps = array('193.93.216.127', '178.212.111.21', '93.183.196.26');

	$stdin      = file_get_contents('php://input');
	$data       = esXml::xml2array($stdin);
	$operation  = esLib::getOperation($data);

	$xmlBody = '';

	$code = 0;
	$msg = 'Запит успішно опрацьовано';
	if (!$stdin)
	{
		$code = -1;
		$msg = 'Не передано даних для обробки';
	}
	else if (!$operation)
	{
		$code = -1;
		$msg = 'Не задано дії для обробки';
	} 
	else
	{
		$esAdapter = new esDemo();

		$isFailed = false;
		if (SAFE_MODE)
		{
			if (!in_array($_SERVER['REMOTE_ADDR'], $allowedIps))
			{
				$code = -98;
				$msg = 'Запит із недозволеної IP-адреси';
				$isFailed = true;
			}
		}

		$esActionsPath = 'actions';

		if (!$isFailed)
		{
			switch ($operation)
			{
				case 'Check':
					include $esActionsPath . '/check.php';
					break;
				case 'Payment':
					include $esActionsPath . '/pay.php';
					break;
				case 'Confirm':
					include $esActionsPath . '/confirm.php';
					break;
				case 'Cancel':
					include $esActionsPath . '/cancel.php';
					break;
			}
		}
	}

	$ob = ob_get_contents();
	ob_end_clean();

	$stdout = $ob;

	if ($stdout)
	{
		$code = -99;
		$msg = 'Збій програмного забезпечення';
	}

	$xml  = '<Response>';
	$xml .= '<StatusCode>' . $code . '</StatusCode>';
	$xml .= '<StatusDetail>' . $msg . '</StatusDetail>';
	$xml .= '<DateTime>' . date('Y-m-d\TH:i:s') . '</DateTime>';
	$xml .= '<Sign></Sign>';
	$xml .= $xmlBody;
	$xml .= '</Response>';

	header('Content-Type: application/xml; charset=utf-8');	
	echo $xml;

?>