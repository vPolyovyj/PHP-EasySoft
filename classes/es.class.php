<?php

interface es
{
	public function getPayerByNum($num);

	public function selectPayersByNum($num);

	public function selectPayersByAddr($queryAddr);

	public function getCompany();

	public function selectDebts($payerId, $serviceCode = '');

	public function getPayerAddress($payerId);

	public function generateCheckRef();

	public function prepay($account, $sum, $dt, $order);

	public function confirm($paymentId, $dt);

	public function cancel($paymentId);

    public function verifySign($data, $sign);

    public function generateSign($data);
}

?>