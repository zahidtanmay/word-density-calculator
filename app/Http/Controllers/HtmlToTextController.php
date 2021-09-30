<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\WordDensity;
use App\Services\HtmlToText;
use Illuminate\Http\Request;

class HtmlToTextController
{
    private $htmlToText;

    public function __construct(HtmlToText $htmlToText)
    {
        $this->htmlToText = $htmlToText;
    }

    public function convert(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = $request->get('url');
        $html = file_get_contents($url);
        $this->htmlToText->setHtml(html_entity_decode($html));
        $text = $this->htmlToText->getText();
        $text = strtolower($text);
        $totalWordCount = str_word_count($text);
        $wordsAndOccurrence  = array_count_values(str_word_count($text, 1));
        arsort($wordsAndOccurrence);
        $highDensities = count($wordsAndOccurrence) > 20 ?
            array_slice($wordsAndOccurrence, 0, 20) : $wordsAndOccurrence;
        $wordDensities = [];
        foreach ($highDensities as $key => $value) {
            $wordDensities[$key] = ($value / $totalWordCount);
        }

        WordDensity::create([
           'url' => $url,
           'notes' => json_encode($wordDensities)
        ]);

        return redirect('/')->with([
            'url' => $url,
            'wordDensities' => json_encode($wordDensities)
        ]);
    }
}
