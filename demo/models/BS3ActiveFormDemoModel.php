<?php
class BS3ActiveFormDemoModel extends CFormModel
{
    public $demo;

    public function rules()
    {
        return array(
            array('demo', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'demo' => 'Demolabel',
        );
    }
}
