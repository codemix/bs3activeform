<?php
namespace Codemix;

/**
 * BS3ActiveForm
 *
 * A Bootstrap 3 enhanced version of CActiveForm.
 */
class BS3ActiveForm extends \CActiveForm
{
    /**
     * @var string the form layout. Either 'standard', 'horizontal' or 'inline'
     */
    public $layout = 'standard';

    /**
     * @var string the default template for form groups. Default depends on the form layout.
     */
    public $template;

    /**
     * @var string tag name of for form group containers. Default is 'div'.
     */
    public $groupTag = 'div';

    /**
     * @var array HTML options for form group containers. Default is class 'form-group'.
     */
    public $groupOptions = array('class'=>'form-group');

    /**
     * @var array HTML options for the label. Default depends on the form layout.
     */
    public $labelOptions = array();

    /**
     * @var string tag for the wrapper to use in form groups. Default is 'div'.
     */
    public $wrapperTag = 'div';

    /**
     * @var array HTML options for the wrapper tag in form groups.
     */
    public $wrapperOptions = array();

    /**
     * @var array HTML options for the input element. Default is class 'form-control'.
     */
    public $inputOptions = array('class'=>'form-control');

    /**
     * @var string default tag name for error blocks in form groups. Default is 'p'.
     */
    public $errorTag = 'p';

    /**
     * @var array HTML options for error blocks in form groups. Default is class 'help-block'.
     */
    public $errorOptions = array();

    /**
     * @var string default tag name for help blocks in form groups. Default is 'p'.
     */
    public $helpTag = 'p';

    /**
     * @var array HTML options for help blocks in form groups. Default is class 'help-block'.
     */
    public $helpOptions = array();

    /**
     * @var array HTML options for the form tag. Default is role 'form'.
     */
    public $htmlOptions = array('role' => 'form');

    /**
     * @var string the CSS class to add to the label in horizontal mode. Default is 'col-sm-3'.
     */
    public $horizontalLabelClass = 'col-sm-3';

    /**
     * @var string the CSS class to add to the wrapper in horizontal mode if label is disabled. Default is 'col-sm-offset-3'.
     */
    public $horizontalWrapperOffsetClass = 'col-sm-offset-3';

    /**
     * @var string the CSS class to add to the wrapper in horizontal mode. Default is 'col-sm-6'.
     */
    public $horizontalWrapperClass = 'col-sm-6';

    /**
     * @var string the CSS class to add to the error block in horizontal mode. Default is none.
     */
    public $horizontalErrorClass = '';

    /**
     * @var string the CSS class to add to the help text in horizontal mode. Default is 'col-sm-3'.
     */
    public $horizontalHelpClass = 'col-sm-3';

    /**
     * @var bool whether to render the error block for a from group.
     */
    public $enableErrorBlock;

    /**
     * Init the form widget
     */
    public function init()
    {
        if($this->layout!=='standard') {
            $class = 'form-'.$this->layout;
            if(isset($this->htmlOptions['class'])) {
                $this->htmlOptions['class'] .= " $class";
            } else {
                $this->htmlOptions['class'] = $class;
            }
        }
        parent::init();
    }

    /**
     * Render a form group
     *
     * This method accepts 4 or 5 arguments, depending on the type of input field. For list
     * inputs which require a list of options (i.e. dropDownList or checkBoxList) the signature is:
     *
     *  group($method, $model, $attribute, $listOptions, $options)
     *
     * For all other elements it is
     *
     *  group($method, $model, $attribute, $options)
     *
     * @param string $method the CActiveForm method name, e.g. textField, dropDownList, etc.
     * @param CModel $model the form model
     * @param string $attribute the attribute name
     * @param array $options group options
     * @return string the rendered form group
     */
    public function group($method, $model, $attribute, $options=array())
    {
        $args = func_get_args();
        if(strpos($method, 'List')===false) {
            $listOptions = false;
        } else {
            $listOptions = $options;
            $options = isset($args[4]) ? $args[4] : array();
        }

        $options = $this->getGroupOptions($method, $options);

        return $this->renderGroup($method, $model, $attribute, $listOptions, $options);
    }

    /**
     * @param string $method the CActiveForm method name, e.g. textField, dropDownList, etc.
     * @param CModel $model the form model
     * @param string $attribute the attribute name
     * @param bool|array $listOptions list options or false if none
     * @param array $options group options
     * @return string the rendered form group
     */
    protected function renderGroup($method, $model, $attribute, $listOptions, $options)
    {

        if(isset($options['label']) && $options['label']===false) {
            $beginLabel = $endLabel = $labelTitle = $label = '';
        } else {
            $beginLabel = \CHtml::openTag('label', $options['labelOptions']);
            $endLabel = \CHtml::closeTag('label');
            $labelTitle = isset($options['label']) ? $options['label'] : $model->getAttributeLabel($attribute);
            $label = \CHtml::tag('label',$options['labelOptions'], $labelTitle);
        }
        $beginWrapper = \CHtml::openTag($options['wrapperTag'], $options['wrapperOptions']);
        $endWrapper = \CHtml::closeTag($options['wrapperTag']);

        if($model->hasErrors($attribute) && $options['enableErrorBlock']) {
            $error = \CHtml::tag($options['errorTag'], $options['errorOptions'], $model->getError($attribute));
            $options['groupOptions']['class'] = isset($options['groupOptions']['class']) ?
                $options['groupOptions']['class'].' has-error' : 'has-error';
        } else {
            $error = '';
        }

        $help = isset($options['helpText']) ?
            \CHtml::tag($options['helpTag'], $options['helpOptions'], $options['helpText']) : '';

        if($this->layout==='inline' && !isset($options['inputOptions']['placeholder'])) {
            $options['inputOptions']['placeholder'] = $labelTitle;
        }

        if($listOptions) {
            $input = parent::$method($model, $attribute, $listOptions, $options['inputOptions']);
        } else {
            $input = parent::$method($model, $attribute, $options['inputOptions']);
        }

        if(isset($options['inputTemplate'])) {
            $input = strtr($options['inputTemplate'], array('{input}'=>$input));
        }

        $content = strtr($options['template'], array(
            '{label}' => $label,
            '{beginLabel}' => $beginLabel,
            '{labelTitle}' => $labelTitle,
            '{endLabel}' => $endLabel,
            '{beginWrapper}' => $beginWrapper,
            '{endWrapper}' => $endWrapper,
            '{input}' => $input,
            '{error}' => $error,
            '{help}' => $help,
        ));

        return \CHtml::tag($options['groupTag'], $options['groupOptions'], $content);
    }

    /**
     * @param string $method the CActiveForm method name
     * @param array $options as passed to the current group() call
     * @return array final render options for the form group
     */
    protected function getGroupOptions($method, $options=array())
    {
        $optionsMethod = 'get'.ucfirst($this->layout).'GroupOptions';
        $groupOptions = $this->$optionsMethod($method, $options);

        return \CMap::mergeArray($groupOptions, $options);
    }

    /**
     * @return array the global default group options as configured on the form object
     */
    protected function getDefaultGroupOptions()
    {
        return array(
            'template' => $this->template,
            'groupTag' => $this->groupTag,
            'groupOptions' => $this->groupOptions,
            'labelOptions' => $this->labelOptions,
            'wrapperTag' => $this->wrapperTag,
            'wrapperOptions' => $this->wrapperOptions,
            'inputOptions' => $this->inputOptions,
            'errorTag' => $this->errorTag,
            'errorOptions' => $this->errorOptions,
            'helpTag' => $this->helpTag,
            'helpOptions' => $this->helpOptions,
            'enableErrorBlock' => $this->enableErrorBlock,
        );
    }

    /**
     * @param string $method the CActiveForm method name
     * @param array $options as passed to the current group() call
     * @return array default options for the specified element type in layout mode 'standard'
     */
    protected function getStandardGroupOptions($method, $options)
    {
        $groupOptions = $this->getDefaultGroupOptions();

        if(!$groupOptions['template']) {
            $groupOptions['template'] = "{label}\n{input}\n{error}\n{help}";
        }
        if(!$groupOptions['labelOptions']) {
            $groupOptions['labelOptions'] = array('class'=>'control-label');
        }
        if(!$groupOptions['errorOptions']) {
            $groupOptions['errorOptions'] = array('class'=>'help-block');
        }
        if(!$groupOptions['helpOptions']) {
            $groupOptions['helpOptions'] = array('class'=>'help-block');
        }
        if($groupOptions['enableErrorBlock']===null) {
            $groupOptions['enableErrorBlock'] = true;
        }

        if($method==='checkBox') {
            $groupOptions['template'] = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{help}\n</div>";
            $groupOptions['labelOptions'] = array('class'=>null);
            $groupOptions['inputOptions'] = array('class'=>null);
        } elseif($method==='checkBoxList' || $method==='radioButtonList') {
            $groupOptions['inputOptions']['container'] = '';
            $groupOptions['inputOptions']['class'] = null;
            $groupOptions['inputOptions']['separator'] = "\n";
            $groupOptions['labelOptions'] = array('class'=>null);

            $class = $method==='checkBoxList' ? 'checkbox' : 'radio';
            if(isset($options['inline']) && $options['inline']) {
                $groupOptions['template'] = "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{error}\n{help}";
                $groupOptions['inputOptions']['labelOptions'] = array(
                    'class' => "$class-inline",
                );
                $groupOptions['inputOptions']['template'] = "{beginLabel}\n{input}\n{labelTitle}\n{endLabel}";
            } else {
                $groupOptions['inputOptions']['template'] =
                    "<div class=\"$class\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>";
            }
        }
        return $groupOptions;
    }

    /**
     * @param string $method the CActiveForm method name
     * @param array $options as passed to the current group() call
     * @return array default options for the specified element type in layout mode 'horizontal'
     */
    protected function getHorizontalGroupOptions($method, $options)
    {
        $groupOptions = $this->getDefaultGroupOptions();

        if(!$groupOptions['template']) {
            $groupOptions['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{help}";
        }
        if(!$groupOptions['wrapperOptions']) {
            $groupOptions['wrapperOptions'] = array('class' => $this->horizontalWrapperClass);
        }
        if(isset($options['label']) && !$options['label']) {    // 'label' => false
            if(isset($groupOptions['wrapperOptions']['class'])) {
                $groupOptions['wrapperOptions']['class'] .= ' '.$this->horizontalWrapperOffsetClass;
            } else {
                $groupOptions['wrapperOptions']['class'] = $this->horizontalWrapperOffsetClass;
            }
        }
        if(!$groupOptions['labelOptions']) {
            $groupOptions['labelOptions'] = array('class'=>'control-label '.$this->horizontalLabelClass);
        }
        if(!$groupOptions['errorOptions']) {
            $groupOptions['errorOptions'] = array('class'=>'help-block '.$this->horizontalErrorClass);
        }
        if(!$groupOptions['helpOptions']) {
            $groupOptions['helpOptions'] = array('class'=>'help-block '.$this->horizontalHelpClass);
        }
        if($groupOptions['enableErrorBlock']===null) {
            $groupOptions['enableErrorBlock'] = true;
        }

        if($method==='checkBox') {
            $groupOptions['template'] = '{beginWrapper}<div class="checkbox">{beginLabel}{input} {labelTitle}{endLabel}</div>{error}{endWrapper} {help}';
            $groupOptions['wrapperOptions']['class'] = $this->horizontalWrapperClass.' '.$this->horizontalWrapperOffsetClass;
            $groupOptions['labelOptions'] = array('class'=>null);
            $groupOptions['inputOptions'] = array('class'=>null);
        } elseif($method==='checkBoxList' || $method==='radioButtonList') {
            $groupOptions['inputOptions']['container'] = '';
            $groupOptions['inputOptions']['class'] = null;
            $groupOptions['inputOptions']['separator'] = "\n";

            $class = $method==='checkBoxList' ? 'checkbox' : 'radio';
            if(isset($options['inline']) && $options['inline']) {
                $groupOptions['template'] = "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{error}\n{help}";
                $groupOptions['inputOptions']['labelOptions'] = array(
                    'class' => "$class-inline",
                );
                $groupOptions['inputOptions']['template'] = "{beginLabel}\n{input}\n{labelTitle}\n{endLabel}";
            } else {
                $groupOptions['inputOptions']['template'] =
                    "<div class=\"$class\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>";
            }
        }
        return $groupOptions;
    }

    /**
     * @param string $method the CActiveForm method name
     * @param array $options as passed to the current group() call
     * @return array default options for the specified element type in layout mode 'horizontal'
     */
    protected function getInlineGroupOptions($method, $options)
    {
        $groupOptions = $this->getDefaultGroupOptions();

        if(!$groupOptions['template']) {
            $groupOptions['template'] = "{label}\n{input}\n{error}\n{help}";
        }
        if(!$groupOptions['labelOptions']) {
            $groupOptions['labelOptions'] = array('class'=>'sr-only');
        }
        if(!$groupOptions['errorOptions']) {
            $groupOptions['errorOptions'] = array('class'=>'help-block');
        }
        if(!$groupOptions['helpOptions']) {
            $groupOptions['helpOptions'] = array('class'=>'help-block');
        }
        if($groupOptions['enableErrorBlock']===null) {
            $groupOptions['enableErrorBlock'] = false;
        }

        if($method==='checkBox') {
            $groupOptions['template'] = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{help}\n</div>";
            $groupOptions['labelOptions'] = array('class'=>null);
            $groupOptions['inputOptions'] = array('class'=>null);
        } elseif($method==='checkBoxList' || $method==='radioButtonList') {
            $groupOptions['inputOptions']['container'] = '';
            $groupOptions['inputOptions']['class'] = null;
            $groupOptions['inputOptions']['separator'] = "\n";

            $class = $method==='checkBoxList' ? 'checkbox' : 'radio';
            if(isset($options['inline']) && $options['inline']) {
                $groupOptions['template'] = "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{error}\n{help}";
                $groupOptions['inputOptions']['labelOptions'] = array(
                    'class' => "$class-inline",
                );
                $groupOptions['inputOptions']['template'] = "{beginLabel}\n{input}\n{labelTitle}\n{endLabel}";
            } else {
                $groupOptions['inputOptions']['template'] =
                    "<div class=\"$class\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>";
            }
        }
        return $groupOptions;
    }
}
