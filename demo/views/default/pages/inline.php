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
        ),
    )); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endClip(); ?>

<h1>Examples: Inline Layout</h1>

<p>
    If <code>layout</code> is set to <code>inline</code> an inline form is rendered.
</p>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'inline',
)); ?>
~~~
<?php $this->endWidget(); ?>

<p>
    Following is a list of the most common form elements to exemplify different options and validation states.
</p>

<div class="alert alert-warning">
    <p>
        <b>Note:</b> While the class does support error messages and help texts in this mode,
        Bootstrap 3 does not really display them nicely. That's why error messages are disabled
        by default in this mode. You can enable them at your own risk through
        <code>enableErrorBlock</code> in the group options or on the form. Also note that input
        groups are not really supported well by Bootstrap 3, as they span the full width.
    <p>
</div>

<?php $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'layout' => 'inline',
)); ?>

    <hr>

    <h2 id="default-options">Default Options</h2>
    <div class="row">
        <div class="col-md-12">
            <p>
            <?php $model = new BS3ActiveFormDemoModel; ?>
            <?= $form->group('textField',$model, 'demo') ?>
            <?= $form->group('checkBox',$model, 'demo') ?>
            <?= $form->group('dropDownList',$model, 'demo', $opts) ?>
            <?= $form->group('checkBoxList',$model, 'demo', $opts) ?>
            </p>

            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo') ?>
<?= '<?=' ?> $form->group('checkBox',$model, 'demo') ?>
<?= '<?=' ?> $form->group('dropDownList',$model, 'demo', $opts) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <hr>

    <h2 id="help-text">Help Text</h2>
    <div class="row">
        <div class="col-md-12">
            <p>
                <?php $model = new BS3ActiveFormDemoModel; ?>
                <?= $form->group('textField',$model, 'demo', array(
                    'helpText' => 'Help text',
                )) ?>
                <?= $form->group('checkBox',$model, 'demo',array(
                    'helpText' => 'Help text',
                )) ?>
                <?= $form->group('dropDownList',$model, 'demo', $opts,array(
                    'helpText' => 'Help text',
                )) ?>
            </p>
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?=' ?> $form->group('textField',$model, 'demo', array(
    'helpText' => 'Help text',
)) ?>
<?= '<?=' ?> $form->group('checkBox',$model, 'demo',array(
    'helpText' => 'Help text',
)) ?>
<?= '<?=' ?> $form->group('dropDownList',$model, 'demo', $opts,array(
    'helpText' => 'Help text',
)) ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
