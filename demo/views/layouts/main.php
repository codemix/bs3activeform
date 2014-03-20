<!DOCTYPE html>
<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',CClientScript::POS_END);
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body data-spy="scroll" data-target=".bs3-docs-sidebar">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <?= CHtml::link('Codemix\BS3ActiveForm', 'https://github.com/codemix/bs3activeform', array('class'=>'navbar-brand')) ?>
            </div>
            <div class="collapse navbar-collapse">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array(
                        'class'=>'nav navbar-nav',
                    ),
                    'items'=>array(
                        array(
                            'label'=>'Overview',
                            'url'=>array('index','view'=>'index'),
                            'active' => $this->action->view === 'pages/index',
                        ),
                        array(
                            'label'=>'Default Layout',
                            'url'=>array('index','view'=>'default'),
                            'active' => $this->action->view === 'pages/default',
                        ),
                        array(
                            'label'=>'Horizontal Layout',
                            'url'=>array('index','view'=>'horizontal'),
                            'active' => $this->action->view === 'pages/horizontal',
                        ),
                        array(
                            'label'=>'Inline Layout',
                            'url'=>array('index','view'=>'inline'),
                            'active' => $this->action->view === 'pages/inline',
                        ),
                    ),
                )); ?>
            </div>
        </div>
    </nav>

    <div class="container">

        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'htmlOptions' => array(
                    'class' => 'breadcrumb',
                ),
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

    </div>

</body>
</html>
