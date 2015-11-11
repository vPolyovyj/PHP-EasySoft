<?php

class esLib
{
	public static function getOperation($data)
	{		
		$ops = array('Check', 'Payment', 'Confirm', 'Cancel');

		foreach ($ops as $k => $op)
		{
			if (isset($data['Request'][$op]))
			{
				return $op;
			}
		}

		return '';
	}

	public static function getDateTime($data)
	{
		return $data['Request']['DateTime']['value'];
	}

	public static function getAccountByOperation($data, $op)
	{
		return $data['Request'][$op]['Account']['value'];
	}

	public static function getServiceByOperation($data, $op)
	{
		return $data['Request'][$op]['ServiceId']['value'];
	}

	public static function getOrderByOperation($data, $op)
	{
		return $data['Request'][$op]['OrderId']['value'];
	}

	public static function getAmountByOperation($data, $op)
	{
		return $data['Request'][$op]['Amount']['value'];
	}

	public static function getPaymentByOperation($data, $op)
	{
		return $data['Request'][$op]['PaymentId']['value'];
	}
}

?>