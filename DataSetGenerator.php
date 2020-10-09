<?php
/**
 * Created by PhpStorm.
 * User: Marcus
 * Date: 15/09/2019
 * Time: 10:55
 */

class DataSetGenerator
{
    public function getDatasetType()
    {
        $type = file_get_contents("type base.txt");
        if ($type == "textBase") {
            $type = "textos";
        }
        if ($type == "sentenceBase") {
            $type = "sentenças";
        }
        if ($type == "wordBase") {
            $type = "palavras";
        }
        return $type;
    }


    public function getType()
    {
        if (file_exists("type search.txt")) {
            $file = file_get_contents("type search.txt");
            if ($file == "1") {
                $type = "Busca por URL";
            }
            if ($file == "2") {
                $key = file_get_contents("keywords.txt");
                if (strpos($key,"site") !== false) {
                    $type = "Busca com fonte";
                }
                else
                    $type = "Busca sem fonte";
            }
            if ($file == "3") {
                $type = "Busca em Rede Social";
            }
        }
        return $type;
    }

    public function getURLs()
    {
        if (file_exists("type search.txt")) {
            $file = file_get_contents("type search.txt");
            if ($file == "1") {
                $url = file_get_contents("list Urls.txt");
            }
            if ($file == "3") {
                $socialNetwork = file_get_contents("social.txt");
                if ($socialNetwork == "twitter") {
                    $url = "twitter.com/" . file_get_contents("keywords.txt");
                }
                if ($socialNetwork == "instagram") {
                    $url = "https://www.instagram.com/" . file_get_contents("keywords.txt") . "/?hl=pt-br";
                }
            }
        }
        return $url;
    }

    public function getArray()
    {
        $a = file_get_contents('list urls.txt');
        $string = str_replace("'\'", "", $a);
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
        return $this->matrixToArray($match);
    }

    public function matrixToArray($matrix)
    {
        $array = array();
        for ($i = 0; $i < count($matrix[0]); $i++) {
            $array[] = $matrix[0][$i];
        }
        return $array;
    }

    public function generateTextDataSet()
    {
        if (file_exists("selected text.txt")) {
            $text = array();
            $handle = fopen("selected text.txt", "r") or die("<b>Could not access file: </b><br/><br/>");
            $contents = fread($handle, filesize("selected text.txt"));
            fclose($handle);
            $loop_pattern = "/BEGIN(.*?)END/s";
            preg_match_all($loop_pattern, str_replace("'", "", $contents), $matches);
            $loops = $matches[0];
            foreach ($loops as $value) {
                $value = trim($value);
                $pattern = array("/[[:blank:]]+/", "/BEGIN(.*)/", "/END(.*)/");
                $replacement = array(" ", "", "");
                $value = preg_replace($pattern, $replacement, $value);
                $value = preg_replace('/^#\d+\s*/m', '', $value);
                $value = str_replace("\n", " ", $value);
                {
                    array_push($text, $value);
                }
            }
            date_default_timezone_set('America/Sao_Paulo');
            $currentDateTime = date("d-m-Y H:i:s");
            $summarization = file_get_contents("degree.txt");
            $type = $this->getDatasetType();
            $urls = $this->getURLs();
            $searchType = $this->getType();
            if ($urls != "") {
                for ($i = 0; $i < count($text); $i++) {
                    echo("<tr><td class='column1' contenteditable='false' spellcheck='false'><input type='hidden' value='$i' name='id'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'><input type='hidden' value='$currentDateTime' name='date'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'><input type='hidden' value='$text[$i]' name='content'>$text[$i]</td><td class='column4' contenteditable='false' spellcheck='false'><input type='hidden' value='$summarization' name='summarization'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'><input type='hidden' value='$type' name='type'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'><input type='hidden' value='$urls' name='urls'>$urls</td></tr>");
                }
            } else {
                for ($i = 0; $i < count($text); $i++) {
                    for ($j = 0; $j < count($this->extractText()); $j++) {
                        similar_text($this->extractText()[$j], $text[$i], $percent);
                        if ($percent >= 60.00) {
                            $urls = $this->getArray()[$j];
                            echo("<tr><td class='column1' contenteditable='false' spellcheck='false'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'>$text[$i]</td><td class='column4' contenteditable='false' spellcheck='false'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'>$urls</td></tr>");
                        }
                    }
                }
            }
        }
    }

    public function generateSentenceDataSet()
    {
        error_reporting(0);
        if (file_exists("selected sentences.txt")) {
            date_default_timezone_set('America/Sao_Paulo');
            $currentDateTime = date("d-m-Y H:i:s");
            $sentences = explode(".", file_get_contents("selected sentences.txt"));
            $summarization = file_get_contents("degree.txt");
            $type = $this->getDatasetType();
            $urls = $this->getURLs();
            $searchType = $this->getType();
            if ($urls != "") {
                for ($i = 0; $i < sizeof($sentences) - 1; $i++) {
                    echo("<tr><td class='column1' contenteditable='false' spellcheck='false'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'>$sentences[$i]</td><td class='column4' contenteditable='false' spellcheck='false'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'>$urls</td></tr>");
                }
            } else {
                for ($i = 0; $i < count($sentences); $i++) {
                    for ($j = 0; $j < count($this->extractText()); $j++) {
                        similar_text($this->extractText()[$j], $sentences[$i], $percent);
                        if ($percent >= 10.00) {
                            $urls[] = $this->getArray()[$j];
                        }
                    }
                }
                for ($i = 0; $i < count($sentences) - 1; $i++) {
                    echo("<tr><td class='column1' contenteditable='false' spellcheck='false'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'>$sentences[$i]</td><td class='column4' contenteditable='false' spellcheck='false'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'>$urls[$i]</td></tr>");
                }
            }
        }
    }

    public function generateWordDataSet()
    {
        error_reporting(0);
        if (file_exists("selected words.txt")) {
            date_default_timezone_set('America/Sao_Paulo');
            $currentDateTime = date("d-m-Y H:i:s");
            $words = explode(" ", file_get_contents("selected words.txt"));
            $summarization = file_get_contents("degree.txt");
            $type = $this->getDatasetType();
            $urls = $this->getURLs();
            $searchType = $this->getType();
            if ($urls != "") {
                for ($i = 0; $i < count($words); $i++) {
                    echo("<tr><td class='column1' contenteditable='false' spellcheck='false'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'>$words[$i]</td><td class='column4' contenteditable='false' spellcheck='false'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'>$urls</td></tr>");
                }
            } else {
                for ($i = 0; $i < count($words); $i++) {
                    for ($j = 0; $j < count($this->extractText()); $j++) {
                        if (strpos($this->extractText()[$j], $words[$i]) !== FALSE) {
                            $urls[] = $this->getArray()[$j];
                        }
                    }
                }
                for ($i = 0; $i < count($words); $i++) {
                    echo("<tr><td class='column1' contenteditable='false' spellcheck='false'>$i</td><td class='column2' contenteditable='false'  spellcheck='false'>$currentDateTime</td><td class='column3' contenteditable='false' spellcheck='false' style='text-align:justify'>$words[$i]</td><td class='column4' contenteditable='false' spellcheck='false'>$summarization</td><td class='column5' contenteditable='false' spellcheck='false'>$type</td><td class='column6' contenteditable='false' spellcheck='false'><input type='hidden' value='$searchType' name='searchType'>$searchType</td><td class='column7' contenteditable='false' spellcheck='false'>$urls[$i]</td></tr>");
                }
            }
        }
    }

    public function extractText()
    {
        if (file_get_contents("degree.txt") == "não") {
            $filename = "clean content.txt";
        } else {
            $filename = "summarized.txt";
        }
        $text = array();
        $handle = fopen($filename, "r") or die("<b>Could not access file: $filename</b><br/><br/>");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        $loop_pattern = "/BEGIN(.*?)END/s";
        preg_match_all($loop_pattern, str_replace("'", "", $contents), $matches);
        $loops = $matches[0];
        foreach ($loops as $value) {
            $value = trim($value);
            $pattern = array("/[[:blank:]]+/", "/BEGIN(.*)/", "/END(.*)/");
            $replacement = array(" ", "", "");
            $value = preg_replace($pattern, $replacement, $value);
            $value = preg_replace('/^#\d+\s*/m', '', $value);
            $value = str_replace("\n", " ", $value);
            {
                array_push($text, $value);
            }
        }
        return $text;
    }
}