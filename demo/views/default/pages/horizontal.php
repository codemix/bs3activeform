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
            array(
                'label'=>'Custom Columns',
                'url'=>'#custom-columns',
            ),
        ),
    )); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endClip(); ?>

<h1>Examples: Horizontal Layout</h1>

<p>
    If <code>layout</code> is set to <code>horizontal</code> a horizontal form is rendered.
</p>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'horizontal',
)); ?>
~~~
<?php $this->endWidget(); ?>

<p>
    Here the standard template is set to <code>{label} {beginWrapper} {input} {error} {endWrapper} {help}</code>,
    which will use 3 columns for label (<code>col-sm-3</code>), input (<code>col-sm-6</code>)
    and help text (<code>col-sm-3</code>). Error messages get rendered below the input. The column
    arrangement can easily be changed, though (see <a href="#custom-columns">below</a>).
</p>
<p>
    Following is a list of the most common form elements to exemplify different options and validation states.
</p>

<?php $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'horizontal',
)); ?>
    <hr>

    <h2 id="default-options">Default Options</h2>
    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo') ?>
                <?= $form->group('checkBox',$model, 'demo') ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo') ?>
                <?= $form->group('checkBox',$model, 'demo') ?>
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
                    'wrapperOptions' => array(
                        'class' => 'col-sm-2',
                    ),
                    'helpText' => 'Help text',
                )) ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'wrapperOptions' => array(
                        'class' => 'col-sm-4',
                    ),
                    'helpText' => 'Help text',
                )) ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'wrapperOptions' => array(
                        'class' => 'col-sm-4',
                    ),
                    'helpText' => 'Help text',
                )) ?>

        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'wrapperOptions' => array(
        'class' => 'col-sm-2',
    ),
    'helpText' => 'Help text',
)) ?>
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'wrapperOptions' => array(
        'class' => 'col-sm-4',
    ),
    'helpText' => 'Help text',
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
                <?= $form->group('checkBoxList',$model,'demo',$opts, array(
                    'label' => false,
                )) ?>
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
<?= '<?=' ?> $form->group('checkBoxList',$model,'demo',$opts, array(
    'label' => false,
)) ?>
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

    <hr>

<?php $this->endWidget(); ?>

<hr>

<h2 id="custom-columns">Custom Columns</h2>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'horizontal',
    'template' => "{label}\n{beginWrapper}\n{input}\n{help}\n{error}\n{endWrapper}",
    'horizontalLabelClass' => 'col-sm-4',
    'horizontalWrapperOffsetClass' => 'col-sm-offset-4',
    'horizontalWrapperClass' => 'col-sm-8',
    'horizontalErrorClass' => '',
    'horizontalHelpClass' => '',
)); ?>
~~~
<?php $this->endWidget(); ?>


<?php $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'horizontal',
    'template' => "{label}\n{beginWrapper}\n{input}\n{help}\n{error}\n{endWrapper}",
    'horizontalLabelClass' => 'col-sm-4',
    'horizontalWrapperOffsetClass' => 'col-sm-offset-4',
    'horizontalWrapperClass' => 'col-sm-8',
    'horizontalErrorClass' => '',
    'horizontalHelpClass' => '',
)); ?>

    <div class="row">
        <div class="col-md-6">
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'helpText' => 'Help text',
                )) ?>
                <?= $form->group('dropDownList',$model, 'demo', $opts) ?>
                <?= $form->group('checkBoxList',$model, 'demo', $opts) ?>
                <?= $form->group('checkBox',$model, 'demo') ?>
                <p>Error state:</p>
                <?php $model->validate(); ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'helpText' => 'Help text',
                )) ?>
                <?= $form->group('dropDownList',$model, 'demo', $opts) ?>
                <?= $form->group('checkBoxList',$model, 'demo', $opts) ?>
                <?= $form->group('checkBox',$model, 'demo') ?>
        </div>
        <div class="col-md-6">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'helpText' => 'Help text',
)) ?>
<?= '<?=' ?> $form->group('dropDownList',$model, 'demo', $opts) ?>
<?= '<?=' ?> $form->group('checkBoxList',$model, 'demo', $opts) ?>
<?= '<?=' ?> $form->group('checkBox',$model, 'demo') ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>


<?php $this->endWidget(); ?>
