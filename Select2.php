<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\select2;

use Yii;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Class Select2
 * @package xutl\select2
 */
class Select2 extends InputWidget
{

    public $language;

    public $clientOptions = [];

    /**
     * {@inheritDoc}
     * @see \yii\base\Object::init()
     */
    public function init()
    {
        parent::init();
        if (!isset ($this->options ['id'])) {
            $this->options ['id'] = $this->getId();
        }

        $this->clientOptions = array_merge([
            'theme' => 'bootstrap',
        ], $this->clientOptions);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $language = $this->language ? $this->language : Yii::$app->language;

        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textArea($this->name, $this->value, $this->options);
        }
        $view = $this->getView();
        Select2Asset::register($view);
        $assetBundle = Select2LanguageAsset::register($view);
        $assetBundle->language = $language;

        $options = empty ($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $view->registerJs("jQuery(\"#{$this->options['id']}\").select2({$options});");
    }
}