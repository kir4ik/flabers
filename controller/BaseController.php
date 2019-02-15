<?php

namespace controller;

use model;

class BaseController
{
    function __construct($model)
    {
        $this->title = 'BaseTemlate';
        $this->content = '';
        $this->model = $model;
    }

    // отдаёт готовую страницу
    public function render()
    {
        echo $this->build('BaseTemplate', [
            'title' => $this->title,
            'content' => $this->content
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