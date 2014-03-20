<?php
class DefaultController extends CController
{
    public function actions()
    {
        return array(
            'index' => array(
                'class' => 'CViewAction',
            ),
        );
    }
}

