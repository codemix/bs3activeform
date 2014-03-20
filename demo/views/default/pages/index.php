<?php
$opts = array_combine(range(1,3), range(1,3));
$model = new BS3ActiveFormDemoModel;
?>

<?php $this->beginClip('sideBar'); ?>
    <?php $this->widget('zii.widgets.CMenu',array(
        'htmlOptions'=>array(
            'class'=>'nav',
        ),
        'items'=>array(
            array(
                'label'=>'Introduction',
                'url'=>'#introduction',
            ),
            array(
                'label'=>'Group Options',
                'url'=>'#group-options',
            ),
            array(
                'label'=>'Form Options',
                'url'=>'#form-options',
            ),
        ),
    )); ?>
    <a href="#top" class="back-to-top">Back to top</a>
<?php $this->endClip(); ?>

<h1>BS3ActiveForm</h1>

<p class="lead">A lightweight utility to render Bootstrap 3 forms in Yii</p>

<h2 id="introduction">Introduction</h2>

<p>
    <tt>BS3ActiveForm</tt> is an enhanced version of <tt>CActiveForm</tt> which mainly adds
    the convenient <code>group()</code> method. It renders all sorts of Bootstrap 3
    form groups. By default it creates the markup for stacked form elements.
</p>

<div class="panel panel-default">
    <div class="panel-heading">Example 1: Default form</div>
    <div class="panel-body row">
        <div class="col-md-4">
           <?php $form = $this->beginWidget('Codemix\BS3ActiveForm') ?>
                <?= $form->group('textField', $model, 'demo'); ?>
                <?= $form->group('dropDownList', $model, 'demo', $opts); ?>
                <?= $form->group('checkBox', $model, 'demo'); ?>
                <?= $form->group('radioButtonList', $model, 'demo', $opts); ?>
            <?php $this->endWidget() ?>
        </div>
        <div class="col-md-8">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm') ?>
    <?= '<?=' ?> $form->group('textField', $model, 'demo'); ?>
    <?= '<?=' ?> $form->group('dropDownList', $model, 'demo', $opts); ?>
    <?= '<?=' ?> $form->group('checkBox', $model, 'demo'); ?>
    <?= '<?=' ?> $form->group('radioButtonList', $model, 'demo', $opts); ?>
<?= '<?php' ?> $this->endWidget() ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<p>
    The arguments you can supply to <code>group()</code> depend on the type of input you want to render.
    For list type inputs like dropDownList, checkBoxList, etc. you need 5 arguments:
</p>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
BS3ActiveForm::group($method, $model, $attribute, $listOptions, $options=array());
~~~
<?php $this->endWidget(); ?>

<p>
    For all other input elements it expects 4 arguments:
</p>

<?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
BS3ActiveForm::group($method, $model, $attribute, $options=array());
~~~
<?php $this->endWidget(); ?>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>$method</code></td>
            <td>
                The method name from <tt>CActiveForm</tt> which will render the input element, for example
                <tt>textField</tt> or <tt>radioButtonList</tt>.
            </td>
        </tr>
        <tr>
            <td><code>$model</code></td>
            <td>
                The model object that ist passed to the <tt>CActiveForm</tt> method.
            </td>
        </tr>
        <tr>
            <td><code>$attribute</code></td>
            <td>
                The attribute name that ist passed to the <tt>CActiveForm</tt> method.
            </td>
        </tr>
        <tr>
            <td><code>$listOptions</code></td>
            <td>
                The list options that are passed to the <tt>CActiveForm</tt> method. This is only
                required for list style elements.
            </td>
        </tr>
        <tr>
            <td><code>$options</code></td>
            <td>
                The options that control how the form group is rendered. See below.
            </td>
        </tr>
    </tbody>
</table>

<div class="alert alert-warning">
    <p>
        <b>Note:</b> This class does <i>not</i> include any Bootstrap 3 CSS or Javascript files.
        The idea was to keep this class very lightweight. Including Bootstrap 3 is very easy, though.
        For a start you can just drop the following lines into your layout file.
    <p>
    <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<head>
    <?= '<?php' ?> 
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',CClientScript::POS_END);
    ?>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
~~~
    <?php $this->endWidget(); ?>

    <p>
        Of course you'll also have to modify the default main layout markup to adhere to the Bootstrap 3 conventions.
    </p>

</div>

<h2 id="group-options">Group Options</h2>

<p>
    The markup that is created for a form group can be controlled through the <code>$options</code>
    argument. Let's look at some simple examples first.
</p>


<div class="panel panel-default">
    <div class="panel-heading">Example 2: Group options</div>
    <div class="panel-body row">
        <div class="col-md-4">
           <?php $form = $this->beginWidget('Codemix\BS3ActiveForm') ?>
                <?= $form->group('textField', $model, 'demo', array(
                    'inputOptions' => array(
                        'placeholder' => 'Placeholder',
                    ),
                )); ?>
                <?= $form->group('dropDownList', $model, 'demo', $opts, array(
                    'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{help}</div></div>',
                )); ?>
                <?= $form->group('checkBox', $model, 'demo',array(
                    'helpText' => 'Help text',
                )); ?>
                <?= $form->group('radioButtonList', $model, 'demo', $opts, array(
                    'inline' => 'true',
                )); ?>
            <?php $this->endWidget() ?>
        </div>
        <div class="col-md-8">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm') ?>
    <?= '<?=' ?> $form->group('textField', $model, 'demo', array(
        'inputOptions' => array(
            'placeholder' => 'Placeholder',
        ),
    )); ?>
    <?= '<?=' ?> $form->group('dropDownList', $model, 'demo', $opts, array(
        'template' => '{label} <div class="row"><div class="col-xs-4">{input}{error}{help}</div></div>',
    )); ?>
    <?= '<?=' ?> $form->group('checkBox', $model, 'demo',array(
        'helpText' => 'Help text',
    )); ?>
    <?= '<?=' ?> $form->group('radioButtonList', $model, 'demo', $opts,array(
        'inline' => 'true',
    )); ?>
<?= '<?php' ?> $this->endWidget() ?>
~~~
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<p>
    The following options can be used with <code>group()</code>. Note, that for some elements
    the options will be set to sane default values.
</p>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Option</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>template</code></td>
            <td>
                The template used to render the form group. This value is set automatically depending on the
                form layout (see below) and the input type. For the default layout the value is
                <code>{label} {input} {error} {help}</code>. The available placeholders are:
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td><code>{label}</code></td>
                            <td>
                                The full label tag for the input element
                            </td>
                        </tr>
                        <tr>
                            <td><code>{beginLabel}</code></td>
                            <td>
                                The opening label tag (if you need more control over the label than with <code>{label}</code>).
                            </td>
                        </tr>
                        <tr>
                            <td><code>{labelTitle}</code></td>
                            <td>
                                The label tag, for use with <code>{beginLabel}</code> / <code>{endLabel}.</code>
                            </td>
                        </tr>
                        <tr>
                            <td><code>{endLabel}</code></td>
                            <td>
                                The closing label tag.
                            </td>
                        </tr>
                        <tr>
                            <td><code>{beginWrapper}</code></td>
                            <td>
                                The opening wrapper tag. This is only used for some elements and layouts.
                            </td>
                        </tr>
                        <tr>
                            <td><code>{endWrapper}</code></td>
                            <td>
                                The closing wrapper tag. This is only used for some elements and layouts.
                            </td>
                        </tr>
                        <tr>
                            <td><code>{input}</code></td>
                            <td>
                                The input element. This can also be a list of elements, e.g. for <tt>checkBoxList</tt>.
                            </td>
                        </tr>
                        <tr>
                            <td><code>{error}</code></td>
                            <td>
                                The error element.
                            </td>
                        </tr>
                        <tr>
                            <td><code>{help}</code></td>
                            <td>
                                The help element.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        <tr>
        <tr>
            <td><code>groupTag</code></td>
            <td>
                The container tag of rendered template. The default is <code>div</code>.
            </td>
        <tr>
        <tr>
            <td><code>groupOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the container tag. The default is
                <code>array('class' =&gt; 'form-group')</code>.
            </td>
        <tr>
        <tr>
            <td><code>labelOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the label tag. The default for most input types is
                <code>array('class' =&gt; 'control-label')</code>.
            </td>
        <tr>
        <tr>
            <td><code>wrapperTag</code></td>
            <td>
                The tag to use for the (optional) wrapper. Default is <code>div</code>.
            </td>
        <tr>
        <tr>
            <td><code>wrapperOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the wrapper tag. The default for form layout
                <code>horizontal</code> (see form options below) is <code>array('class' =&gt; 'col-sm-6')</code>.
            </td>
        <tr>
        <tr>
            <td><code>inputTemplate</code></td>
            <td>
                An optional template for the input element. If set, this will be used to render the
                content of the <code>{input}</code> placeholder. This can be used to create input
                groups (see the examples). The default is none.
            </td>
        <tr>
        <tr>
            <td><code>inputOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the input element that are passed to the <tt>CActiveForm</tt> method.
                The default depends for most elements is <code>array('class' =&gt; 'form-control')</code>.
                Elements of type <tt>checkBox</tt>, <tt>checkBoxList</tt> and <tt>radioButtonlist</tt> add
                some more options to render the correct label markup.
            </td>
        <tr>
        <tr>
            <td><code>errorTag</code></td>
            <td>
                The tag to use for the error element. Default is <code>p</code>.
            </td>
        <tr>
        <tr>
            <td><code>errorOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the error element. The default depends on the form layout.
                It's <code>array('class' =&gt; 'help-block')</code> for layout <code>default</code> and
                <code>array('class' =&gt; 'help-block col-sm-3')</code> for layout <code>horizontal</code>.
            </td>
        <tr>
        <tr>
            <td><code>helpTag</code></td>
            <td>
                The tag to use for the help element. Default is <code>p</code>.
            </td>
        <tr>
        <tr>
            <td><code>helpOptions</code></td>
            <td>
                The <code>htmlOptions</code> of the help element. The default depends on the form layout.
                It's <code>array('class' =&gt; 'help-block')</code> for layout <code>default</code> and
                <code>array('class' =&gt; 'help-block col-sm-3')</code> for layout <code>horizontal</code>.
            </td>
        <tr>
        <tr>
            <td><code>inline</code></td>
            <td>
                This option can be used with <tt>radioButtonList</tt> and <tt>checkBoxList</tt> elements
                to render inline list items. If set to <code>true</code>, it will automatically set the
                appropriate <code>template</code> and <code>inputOptions</code> (i.e. labelOptions).
            </td>
        <tr>
        <tr>
            <td><code>label</code></td>
            <td>
                If this is set to <code>false</code>, no label will be rendered
                (i.e. <code>{label},</code> <code>{beginLabel}</code> and <code>{endLabel}</code> will be empty).
            </td>
        <tr>
        <tr>
            <td><code>enableErrorBlock</code></td>
            <td>
                Whether to render the error block. This is mainly useful for <code>inline</code> forms.
                By default this is <code>true</code> for <code>standard</code> and <code>horizontal</code>
                layout and <code>false</code> for <code>inline</code> layout.
            </td>
        </tr>
    </tbody>
</table>

<h2 id="form-options">Form Options</h2>

<p>
    Except for <code>inline</code>, all the above options can also be set on the <tt>BS3ActiveForm</tt>.
    The options set on the form will be used as default values for all form groups. If <code>$options</code>
    are provided in the call to <code>group()</code>, they will be override the default group options set here.
</p>

<div class="panel panel-default">
    <div class="panel-heading">Example 3: Form options</div>
    <div class="panel-body">
            <?php $this->beginWidget('CMarkdown'); ?>
~~~
[php]
<?= '<?php' ?> $form = $this->beginWidget('Codemix\BS3ActiveForm', array(
    'helpOptions' => array(
        'class' => 'help-block well',
    ),
)) ?>
    <?= '<?=' ?> $form->group('textField', $model, 'demo'); ?>
    <?= '<?=' ?> $form->group('dropDownList', $model, 'demo', $opts); ?>
    <?= '<?=' ?> $form->group('checkBox', $model, 'demo'); ?>
    <?= '<?=' ?> $form->group('radioButtonList', $model, 'demo', $opts); ?>
<?= '<?php' ?> $this->endWidget() ?>
~~~
            <?php $this->endWidget(); ?>
    </div>
</div>

<p>
    Besides this you can also set some more options on the form to define the layout you want to use.
</p>

<table class="table table-bordered table-striped">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
        <tr>
            <th>Option</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>layout</code></td>
            <td>
                The form layout, which can either be <code>default</code>, <code>horizontal</code>
                or <code>inline</code>. If the layout is <code>horizontal</code> the following defaults
                are set:
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td><code>template</code></td>
                            <td>
                                <code>{label} {beginWrapper} {input} {error} {endWrapper} {help}</code>
                            </td>
                        </tr>
                        <tr>
                            <td><code>wrapperOptions</code></td>
                            <td>
                                <code>array('class' =&gt; 'col-sm-6')</code>.
                            </td>
                        </tr>
                        <tr>
                            <td><code>labelOptions</code></td>
                            <td>
                                <code>array('class' =&gt; 'control-label col-sm-3')</code>.
                            </td>
                        </tr>
                        <tr>
                            <td><code>errorOptions</code></td>
                            <td>
                                <code>array('class' =&gt; 'help-block col-sm-3')</code>.
                            </td>
                        </tr>
                        <tr>
                            <td><code>helpOptions</code></td>
                            <td>
                                <code>array('class' =&gt; 'help-block col-sm-3')</code>.
                            </td>
                        </tr>
                    </tbody>
                </table>
                So in order to modify the horizontal layout (e.g. adapt column width or change location of
                help and error element) you can configure your own values for the above parameters through
                the form options.
            </td>
        </tr>
        <tr>
            <td><code>horizontalLabelClass</code></td>
            <td>
                The CSS class to add to the label in horizontal mode. Default is <code>col-sm-3</code>.
            </td>
        </tr>
        <tr>
            <td><code>horizontalWrapperOffsetClass</code></td>
            <td>
                The CSS class to add to the wrapper in horizontal mode if no label is rendered.
                Default is <code>col-sm-offset-3</code>. This should match the width set through
                <code>horizontalLabelClass</code>.
            </td>
        </tr>
        <tr>
            <td><code>horizontalWrapperClass</code></td>
            <td>
                The CSS class to add to the wrapper in horizontal mode. Default is <code>col-sm-6</code>.
            </td>
        </tr>
        <tr>
            <td><code>horizontalErrorClass</code></td>
            <td>
                The CSS class to add to the error block in horizontal mode. Default is none.
            </td>
        </tr>
        <tr>
            <td><code>horizontalHelpClass</code></td>
            <td>
                The CSS class to add to the help block in horizontal mode. Default is <code>col-sm-3</code>.
            </td>
        </tr>
    </tbody>
</table>
