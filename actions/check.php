<?php

    $account = esLib::getAccountByOperation($data, $operation);
    $payer = $esAdapter->getPayerByNum($account);

    if ($payer)
    {
        $debts = $esAdapter->selectDebts($payer['id']);

        $xmlBody  = '<AccountInfo>';
        $xmlBody .= '<Name>' . $payer['name'] . '</Name>';
        $xmlBody .= '<Address>' . $payer['address'] . '</Address>';
//      $xmlBody .= '<Phone>' . $payer['phone'] . '</Phone>';
        $xmlBody .= '<AmountToPay>' . number_format($debts[0]['sum'], 2) . '</AmountToPay>';
//      $xmlBody .= '<Charge>' . $payer['charge'] . '</Charge>';
        $xmlBody .= '<AccountBalance>' . number_format($debts[0]['balance'], 2) . '</AccountBalance>';
        $xmlBody .= '</AccountInfo>';
    }
    else
    {
        $msg = 'Абонента не знайдено';
        $code = -10;
    }

?>