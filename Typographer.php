<?php
namespace andrew72ru\typographer;

use Yii;
use EMT\EMTypograph;
use yii\base\Component;
use yii\helpers\Markdown;
use Michelf\MarkdownExtra;

/**
 * A text (or HTML) formatter for Yii2 with Evgeny Muravjev Typograph, http://mdash.ru
 *
 * @package andrew72ru\typographer
 * @author Andrew Zhdanovskih <andrew72ru@gmail.com>
 * @param $params Array settings of emuravjev/mdash
 * @param $markdown boolean Whether to use yii\helpers\Markdown to convert text
 * @param $markdownType what type of markdown use in converter
 */
class Typographer extends Component
{
    /**
     * @var array
     */
    public $params = [
        'Text.paragraphs' => 'off',
        'Text.breakline' => 'off',
        'OptAlign.oa_oquote' => 'on',
    ];
    /**
     * @var bool
     */
    public $markdown = true;
    /**
     * @var string
     */
    public $markdownType = 'gfm';

    private $_t;

    /**
     * @return EMTypograph
     */
    public function Setup()
    {
        $_t = new EMTypograph();
        $_t->setup($this->params);
        return $_t;
    }

    /**
     * Process the $text using settings with explode \n to <p>
     * @param $text
     * @return string
     */
    public function typo($text)
    {
        $t = $this->Setup();
        if($this->markdown)
            $text = MarkdownExtra::defaultTransform($text);

        $t->set_text($text);
        return $t->apply();
    }

    /**
     * Process $text using settings without explode \n to <p>
     * $ntext = true change \n to <br>
     * @param $text
     * @param bool $ntext
     * @return string
     */
    public function directTypo($text)
    {
        $t = $this->Setup();
        $text = Markdown::processParagraph($text, $this->markdownType);
        $t->set_text($text);
        return $t->apply();
    }
}