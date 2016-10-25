# yii2-select2-widget

````
<?= $form->field($model, 'category_id')->widget(Select2::className(), [
            'items' => ArrayHelper::map(\common\models\Category::find()->where(['parent' => null])->asArray()->all(), 'id', 'name'),
            'clientOptions' => [
                'placeholder' => Yii::t('app', 'please choose'),
            ],
        ]) ?>

        <?= $form->field($model, 'tagValues')->widget(Select2::className(), [
            'options' => [
                'multiple' => true
            ],
            'items' => ArrayHelper::map($model->tags, 'id', 'name'),
            'clientOptions' => [
                'placeholder' => Yii::t('app', 'Add the tag you are looking for'),
                'tags' => true,
                'ajax' => [
                    'url' => Url::to(['/user/settings/auto-complete']),
                    'dataType' => 'json',
                    //延迟250ms发送请求
                    'delay' => 250,
                    'cache' => true,
                    'data' => new \yii\web\JsExpression('function (params) {
                        return {
                            query: params.term
                        };
                    }'),
                    'processResults' => new \yii\web\JsExpression('function (data) {
                        return {
                            results: data
                        };
                    }'),
                ],
            ],
        ]) ?>
````