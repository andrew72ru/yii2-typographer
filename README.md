Smart typographer for Yii2
==========================
Typographer based on Evgeny Muravjev Typograph, http://mdash.ru

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist andrew72ru/yii2-typographer "*"
```

or add

```
"andrew72ru/yii2-typographer": "*"
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

Where you text in paragraph, and you not need to convert this to oher paragraphs:

```php
<p class="lead"><?= Yii::$app->typographer->directTypo($text, true /* true – use Yii ntext formatter, false - do not use */)?></p>
```

Where you text is text with `\n` or markdown text

```php
<?= Yii::$app->typographer->typo($text) ?>
```