<?php
$opts = array_combine(range(1,3), range(1,3));
?>

<?php $this->beginClip('sideBar'); ?>
    <?php $this->widget('zii.widgets.CMenu',array(
        'htmlOptions'=>array(
            'class'=>'nav',
        ),
        'items'=>array(
            array(
                'label'=>'Default Options',
                'url'=>'#default-options',
            ),
            array(
                'label'=>'Help Text',
                'url'=>'#help-text',
            ),
            array(
                'label'=>'Placeholder',
                'url'=>'#placeholder',
            ),
            array(
                'label'=>'Disabled Label',
                'url'=>'#disabled-label',
            ),
            array(
                'label'=>'Column Sizing',
                'url'=>'#column-sizing',
            ),
            array(
                'label'=>'List Controls',
                'url'=>'#list-controls',
            ),
            array(
                'label'=>'Inline Lists',
                'url'=>'#inline-lists',
            ),
            array(
                'label'=>'Custom Inputs',
                'url'=>'#custom-inputs',
            ),
        ),
    )); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endClip(); ?>

<h1>Examples: Default Layout</h1>

<p>
    If no <code>layout</code> is specified on the form object (or if it's set to <code>default</code>)
    then a stacked form is created.
</p>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm'); ?>
~~~
<?php $this->endWidget(); ?>

<p>
    Following is a list of the most common form elements to exemplify different options and validation states.
</p>

<?php $form = $this->beginWidget('Codemix\BS3ActiveForm'); ?>

    <hr>

    <h2 id="default-options">Default Options</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo') ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo') ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo') ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="help-text">Help Text</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'helpText' => 'Help text',
                )) ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'helpText' => 'Help text',
                )) ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'helpText' => 'Help text',
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="placeholder">Placeholder</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'inputOptions' => array(
                        'placeholder' => 'Placeholder',
                    ),
                )) ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'inputOptions' => array(
        'placeholder' => 'Placeholder',
    ),
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="disabled-label">Disabled Label</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'label' => false,
                    'inputOptions' => array(
                        'placeholder' => $model->getAttributeLabel('demo'),
                    ),
                )) ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'label' => false,
    'inputOptions' => array(
        'placeholder' => $model->getAttributeLabel('demo'),
    ),
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="column-sizing">Column Sizing</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{help}</div></div>',
                )) ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'template' => '{label} <div class="row"><div class="col-xs-6">{input}{error}{help}</div></div>',
                )) ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'template' => '{label} <div class="row"><div class="col-xs-8">{input}{error}{help}</div></div>',
                )) ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{help}</div></div>',
                )) ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{help}</div></div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'template' => '{label} <div class="row"><div class="col-xs-6">{input}{error}{help}</div></div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'template' => '{label} <div class="row"><div class="col-xs-8">{input}{error}{help}</div></div>',
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="list-controls">List Controls</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('dropDownList',$model,'demo',$opts) ?>
                <?= $form->group('checkBoxList',$model,'demo',$opts) ?>
                <?= $form->group('radioButtonList',$model,'demo',$opts, array(
                    'helpText' => 'Help Text',
                )) ?>
        </div>

        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('dropDownList',$model,'demo',$opts) ?>
<?= '<?=' ?> $form->group('checkBoxList',$model,'demo',$opts) ?>
<?= '<?=' ?> $form->group('radioButtonList',$model,'demo',$opts, array(
    'helpText' => 'Help Text',
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="inline-lists">Inline Lists</h2>
    <div class="row">
        <div class="col-md-6">
                <?= $form->group('checkBoxList',$model,'demo',$opts, array(
                    'inline' => true,
                )) ?>
                <?= $form->group('radioButtonList',$model,'demo',$opts, array(
                    'inline' => true,
                )) ?>
        </div>

        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('checkBoxList',$model,'demo',$opts, array(
    'inline' => true,
)) ?>
<?= '<?=' ?> $form->group('radioButtonList',$model,'demo',$opts, array(
    'inline' => true,
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="custom-inputs">Custom Inputs</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
                )) ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}'.
                        '<span class="input-group-addon">.00</span></div>',
                )) ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">'.
                        $form->checkBox($model, 'demo').'</span>{input}</div>',
                )) ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><span class="input-group-btn">'.
                        '<button class="btn btn-default">Go!</button></span>{input}</div>',
                )) ?>
                <?php $menu = $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class'=>'dropdown-menu'),
                    'items' => array(
                        array('label'=>'Action', 'url'=>'#'),
                        array('label'=>'Another Action', 'url' =>'#'),
                        array('itemOptions'=>array('class'=>'divider')),
                        array('label'=>'Separated link', 'url'=>'#'),
                    ),
                ), true); ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
                        '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action '.
                        '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
                )) ?>
                <?= $form->group('textField',$model,'demo', array(
                    'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
                        '<button class="btn btn-default">Action</button>'.
                        '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">'.
                        '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
                )) ?>



        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}'.
        '<span class="input-group-addon">.00</span></div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">'.
        $form->checkBox($model, 'demo').'</span>{input}</div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><span class="input-group-btn">'.
        '<button class="btn btn-default">Go!</button></span>{input}</div>',
)) ?>
<?= '<?php' ?> $menu = $this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class'=>'dropdown-menu'),
    'items' => array(
        array('label'=>'Action', 'url'=>'#'),
        array('label'=>'Another Action', 'url' =>'#'),
        array('itemOptions'=>array('class'=>'divider')),
        array('label'=>'Separated link', 'url'=>'#'),
    ),
), true); ?>
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
        '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action '.
        '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
)) ?>
<?= '<?=' ?> $form->group('textField',$model,'demo', array(
    'inputTemplate' => '<div class="input-group"><div class="input-group-btn">'.
        '<button class="btn btn-default">Action</button>'.
        '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">'.
        '<span class="caret"></span></button>'.$menu.'</div>{input}</div>',
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
