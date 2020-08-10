<?php


namespace src\utils;


class Renderer
{
    public function render($view, $data = [])
    {
        $viewContent = $this->renderFile($view, $data);
        $view = $this->renderFile('main', [
            'title' => 'title',
            'content' => $viewContent
        ]);

        return $view;
    }

    public function renderFile($view, $data)
    {
        if ($data) {
            extract($data, EXTR_OVERWRITE);
        }

        ob_start();

        include __DIR__ . "/../view/$view.php";
        $content = ob_get_clean();

        return $content;
    }

}