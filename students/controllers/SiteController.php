<?php


class SiteController
{
    public function actionIndex()
    {
        Helper::checkAuth();
        $list = array();
      $list = Site::getList(100);
        require_once(ROOT . '/views/site/index.php');

        if (isset($_POST['submits'])) {
            $request = $_POST['req'];

            $list = array();
            $list = Site::Search($request);
            require_once(ROOT . '/views/site/index.php');

        }
        return true;
    }
    public static function actionNone()
    {
        require_once(ROOT . '/views/404/404.php');
        return true;
    }
    public function actionMaxpoints()
    {
        Helper::checkAuth();
        $list = array();
        $list = Site::getmaxList(20);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
    public function actionResult()
    {
        Helper::checkAuth();
        $list = array();
        $list = Site::Search('Descry');
        require_once(ROOT . '/views/site/index.php');
        return true;

    }
}