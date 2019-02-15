<?php

namespace controller;

use externalAPI\Convertor;
use model;

class OrderJSON extends BaseController
{
    function __construct()
    {
        parent::__construct(new model\Order());
    }

    public function actionList()
    {
        $filter = [
            'id' => $_GET['id'] ?? '',
            'client_name' => $_GET['client_name'] ?? '',
            'amount' => $_GET['amount'] ?? '',
        ];

        $this->model->find($filter); // поиск
        
        $isDesc = true; // как сортировать
        $orders = $this->model->get([], ['date_created'], $isDesc);

        $count = $this->model->getCount();
        $sumInUAH = $this->model->getSum('amount');
        $sumInUSD = $sumInUAH > 0 ? Convertor::exec($sumInUAH, 'UAH', 'USD') : 0;

        $res = [
            'orders' => $orders,
            'count' => $count,
            'sumInUAH' => getAsPrice($sumInUAH),
            'sumInUSD' => getAsPrice($sumInUSD)
        ];

        $this->giveJson($res);
        exit();
    }

    private function giveJson($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
    }
}