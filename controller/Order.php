<?php

namespace controller;

class Order extends BaseOrder
{
    function __construct()
    {
        parent::__construct();
    }

    public function actionCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->title = 'Создать заказ';
            $this->content = $this->build('order/create');
        }
        else {
            $isSuccess = $this->model->create($_POST);
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
        $this->isList = true;

        if (!isset($_GET['filter'])) {
            $this->content = $this->build('order/list', [
                'orders' => $this->model->get()
            ]);
            return;
        }

        $filter = [
            'id' => $_GET['id'] ?? '',
            'city' => $_GET['city'] ?? '',
            'amount' => $_GET['amount'] ?? '',
        ];

        $orders = $this->model->get([], $filter, ['date_created'], true);

        $this->content = $this->build('order/list', [
            'orders' => $orders
        ]);
    }
}