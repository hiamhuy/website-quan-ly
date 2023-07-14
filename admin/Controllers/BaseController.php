<?php

class BaseController
{
    const VIEW_FOLDER_NAME = 'admin/Views';
    public function view($path)
    {
        $path = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $path) . '.php';
        require($path);
    }
}

?>