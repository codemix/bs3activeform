<?php
class BS3ActiveFormDemoModule extends CWebModule
{
    public $layout = '/layouts/2column';
    public function init()
    {
    //    die($this->layoutPath);
        Yii::setPathOfAlias('bs3activeformdemo',__DIR__);
        Yii::import('bs3activeformdemo.models.*');
    }
}
