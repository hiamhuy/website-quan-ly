<?php
class TabController extends BaseController
{
    public function index()
    {
        return $this->view("app.tab.index");
    }
}