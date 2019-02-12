<?php

namespace controller;

use model;

class BaseOrder
{
    function __construct()
    {
        $this->title = 'BaseTemlate';
        $this->content = '';
        $this->model = new model\Order();
    }

    // отдаёт готовую страницу
    public function render()
    {
        echo $this->build('BaseTemplate', [
            'title' => $this->title,
            'content' => $this->content,
            'isList' => $this->isList
        ]);
    }

    // собирает контент в буфере и возвращает как строку
    protected function build($template, array $params = [])
	{
		ob_start();
		extract($params);
		include_once __DIR__ . '/../view/' . $template . '.html.php';
		return ob_get_clean();
	}
}