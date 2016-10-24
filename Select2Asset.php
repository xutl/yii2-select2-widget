<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\select2;

use Yii;
use yii\web\AssetBundle;

/**
 * Class Select2Asset
 * @package xutl\select2
 */
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@vendor/xutl/yii2-select2-widget/assets';

    public $js = [
        'js/select2.min.js',
    ];

    public $css = [
        'css/select2.min.css',
		'css/select2-bootstrap.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}