<?php
class Render
{
    public function render($view, $data = [])
    {
        extract($data);
        if (file_exists(_DIR_ROOT . '/admin/Views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/admin/Views/' . $view . '.php';
        }
    }
}

?>