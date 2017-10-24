<?php
declare(strict_types=1);

namespace kdaviesnz\fleschkincaid;


use DaveChild\TextStatistics\Text;
use DaveChild\TextStatistics\TextStatistics;

class FleschKincaid implements \IFleschKincaid
{

    private $data; // json string
    private $content;

    /**
     * FleschKincaid constructor.
     */
    public function __construct(string $content)
    {
        $this->content = $content;
        $this->data = json_encode(array(
           "reading_ease"=>$this->reading_ease(),
            "clean_text"=>$this->clean_text(),
            "character_count"=>$this->character_count(),
            "text_length"=>$this->text_length(),
            "letter_count"=>$this->letter_count(),
            "word_count"=>$this->word_count(),
            "average_syllables_per_word"=>$this->average_syllables_per_word(),
            "percentage_words_with_three_Syllables"=>$this->percentage_words_with_three_Syllables(),
            "sentence_count"=>$this->sentence_count(),
            "average_words_per_sentence"=>$this->average_words_per_sentence(),
            "grade_level"=>$this->grade_level(),
            "gunning_fog_score"=>$this->gunning_fog_score(),
            "coleman_liau_index"=>$this->coleman_liau_index(),
            "smog_index"=>$this->smog_index(),
            "automated_readability_index"=>$this->automated_readability_index()
        ));
    }

    public function __toString()
    {
        return $this->data;
    }

    private function reading_ease():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->flesch_kincaid_reading_ease($this->content);
    }

    private function clean_text():string {
        return Text::cleanText($this->content);
    }

    private function character_count():int {
        return Text::characterCount($this->content);
    }

    private function text_length():int {
        return Text::textLength($this->content);
    }

    private function letter_count():int {
        return Text::letterCount($this->content);
    }

    private  function word_count():int {
        return Text::wordCount($this->content);
    }

    public function syllable_count( string $word ) :int{
        $textStatistics = new TextStatistics();
        return $textStatistics->syllableCount($word );
    }

    private function average_syllables_per_word():float
    {
        $textStatistics = new TextStatistics();
        return $textStatistics->averageSyllablesPerWord($this->content);
    }

    private function percentage_words_with_three_Syllables():float
    {
        $textStatistics = new TextStatistics();
        return $textStatistics->percentageWordsWithThreeSyllables($this->content);
    }

    private function sentence_count():int {
        $textStatistics = new TextStatistics();
        return $textStatistics->sentenceCount($this->content);
    }

    private function average_words_per_sentence():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->averageWordsPerSentence($this->content);
    }

    private function grade_level():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->flesch_kincaid_grade_level($this->content);
    }

    private function gunning_fog_score():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->gunning_fog_score($this->content);
    }

    private function coleman_liau_index():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->coleman_liau_index($this->content);
    }

    private function smog_index():float
    {
        $textStatistics = new TextStatistics();
        return $textStatistics->smog_index($this->content);
    }

    private function automated_readability_index():float {
        $textStatistics = new TextStatistics();
        return $textStatistics->automated_readability_index($this->content);
    }

}