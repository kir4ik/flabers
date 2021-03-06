<?php

namespace controller;

use externalAPI\Convertor;
use model;

class Order extends BaseController
{
    function __construct()
    {
        parent::__construct(new model\Order());
    }

    public function actionCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->title = 'Создать заказ';
            $this->content = $this->build('order/create');
        }
        else {
            $isSuccess = $this->model->create([
                'client_name' => $_POST['client_name'],
                'client_last_name' => $_POST['client_last_name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'city' => $_POST['city'],
                'amount' => $_POST['amount'],
            ]);
            // всё ок
            if ($isSuccess) {
                $this->title = 'Заявка принята';
                $this->content = $this->build('order/create', [
                    'cleanData' => $this->model->clean
                ]);
                return;
            }
            // не корректные данные
            $this->title = 'Создать заказ|Ошибка';
            $this->content = $this->build('order/create', [
                'cleanData' => $this->model->clean,
                'errors' => $this->model->errors
            ]);
        }
    }

    public function actionList()
    {
        $this->title = 'Отчёты о заказах';

        if (!isset($_GET['filter'])) {
            $orders = $this->model->find()->get();
        }
        else {
            $filter = [
                'id' => $_GET['id'] ?? '',
                'client_name' => $_GET['client_name'] ?? '',
                'amount' => $_GET['amount'] ?? '',
            ];

            $this->model->find($filter); // поиск
        }
        
        $isDesc = true; // как сортировать
        $orders = $this->model->get([], ['date_created'], $isDesc);

        $count = $this->model->getCount();
        $sumInUAH = $this->model->getSum('amount');
        $sumInUSD = $sumInUAH > 0 ? Convertor::exec($sumInUAH, 'UAH', 'USD') : 0;

        $this->content = $this->build('order/list', [
            'orders' => $orders,
            'count' => $count,
            'sumInUAH' => getAsPrice($sumInUAH),
            'sumInUSD' => getAsPrice($sumInUSD)
        ]);
    }
}