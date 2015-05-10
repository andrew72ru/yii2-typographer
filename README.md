Smart typographer for Yii2
==========================
Typographer based on Evgeny Muravjev Typograph, http://mdash.ru

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist andrew72ru/yii2-typographer "dev-master"
```

or add

```
"andrew72ru/yii2-typographer": "dev-master"
```

to the require section of your `composer.json` file.


Setup
-----

Set up you application components:

```php
    'components' => [
        …
        'typographer' => [
            'class' => 'andrew72ru\typographer\Typographer',
            'params' => [
                'Text.paragraphs' => 'off',
                'Text.breakline' => 'off',
                'OptAlign.oa_oquote' => 'on',
                'OptAlign.oa_obracket_coma' => 'on',
                'OptAlign.oa_oquote_extra' => 'on',
                'Number.math_chars' => 'on',
                // Other parametrs – see http://mdash.ru
            ],
            'markdown' => true // Whether to use yii\helpers\Markdown to convert text
            'markdownType' => 'gfm' // what type of markdown use in converter
        ]
    ]
```

Usage
-----

If your text is in paragraph, and you don’t need to convert this to other paragraphs:

```php
<p class="lead"><?= Yii::$app->typographer->directTypo($text)?></p>
```

If your text with \n or markdown text

```php
<?= Yii::$app->typographer->typo($text) ?>
```
