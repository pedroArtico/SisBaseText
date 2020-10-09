<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 27/07/2018
 * Time: 21:41
 */

require_once 'SpecialWords.php';

/**
 * This class has the responsibility of extracting sentences from the contents of a WEB search.
 */
class ContentSelection
{
    /**
     * This private attribute stores an object of type SpecialWords.
     * @var SpecialWords $SpecialWords
     */
    private $SpecialWords;

    /**
     * The constructor has no parameters and is responsible for creating a SpecialWord object and assigning to the corresponding attribute.
     */
    public function __construct()
    {
        $this->SpecialWords = new SpecialWords();
    }

    /**
     * This method gets a SpecialWords object type.
     * @return SpecialWords
     */
    public function getSpecialWords()
    {
        return $this->SpecialWords;
    }

    /**
     * @return ContentSelectionWindow
     */
    public function getContentSelectionWindow()
    {
        return $this->ContentSelectionWindow;
    }


    /**
     * This method is responsible for clearing the keyword file, removing excessive whitespaces.
     * @return array
     */
    public function keywordsFileClean()
    {
		if(file_exists('keys.txt'))
		{	
			$key = file_get_contents('keys.txt');
			$clean= explode(" ",preg_replace('/\s+/', ' ', trim($key)));
			return $clean;
		}
	}

    /**
     * This method is responsible for separating the contents of the search file into sentences delimited by "." .
     * @return array
     */
    public function getSentencesFromFile()
    {
		if(file_exists('clean content.txt'))
		{			
			$sentences=array();
			$content = file_get_contents('clean content.txt');
			$c= preg_replace('/(\s)+/', ' ', trim($content));
			$array= explode(".",$c);
			for($i=0;$i<count($array);$i++)
			{
				$sentences[$i]=$array[$i].".";
			}
			return $sentences;
		}
	}

    /**
     * Method that searches for escape characters and unwanted characters, returning true, if they exist, and false if they do not exist.
     * @param String $sentence is the sentence extracted from the contents of a Web search.
     * @return boolean
     */
    public function checkForTrash($sentence)
	{
		if(preg_match('/^[^a-z]*$/', $sentence{0})) 
		{
			return false;
		} 
		else 
		{
			return true;
		}
	}

    /**
     * This method gets the size of a sentence (considering all the characters present).
     * @param String $sentence is the sentence extracted from the contents of a Web search.
     * @return int
     */
    public function filterSentencesBySize($sentence)
    {
        return strlen(implode("",(array)$sentence));
    }

    public function cleanSentences()
    {
        $trash=array("=", "{", "}","www","@","query","window");
        $vector=$this->getSentencesFromFile();
        for($i=0;$i<count($trash);$i++)
        {
            for($j=0;$j<count($vector);$j++)
            {
                if ((strpos($vector[$j], $trash[$i])==true) && ($this->checkForTrash($vector[$j])==true))
                {
                    $vector[$j]=" ";
                }
            }
        }
        return $vector;
    }

    public function extractText()
    {
        if(file_get_contents("degree.txt")=="não")
        {
            $filename = "clean content.txt";
        }
        else
            {
                $filename = "summarized.txt";
            }
        $text = array();
        $handle = fopen($filename, "r") or die("<b>Could not access file: $filename</b><br/><br/>");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        $loop_pattern = "/BEGIN(.*?)END/s";
        preg_match_all($loop_pattern, str_replace("'","",$contents), $matches);
        $loops = $matches[0];
        foreach ($loops as $value) {
            $value = trim($value);
            $pattern = array("/[[:blank:]]+/", "/BEGIN(.*)/", "/END(.*)/");
            $replacement = array(" ", "", "");
            $value = preg_replace($pattern, $replacement, $value);
            $value = preg_replace( '/^#\d+\s*/m', '', $value );
            $value = str_replace( "\n", " ", $value );
            {
                array_push($text,$value);
            }
        }
        return $text;
    }

    /**
     * Method that gets the news article link.
     * @return array
     */
    public function getArticles()
    {
        if(file_exists('list Urls.txt'))
        {
            $a = file_get_contents('list Urls.txt');
            $string = str_replace("'\'", "", $a);
            preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
            return $match[0];
        }
        else
            echo("<b>O arquivo contendo os artigos não existe!<b>");
    }


    /**
     * This method makes the extractive summarizing of the sentences according to the degree of compression established by the user.
     */
    public function extractSentences()
	{
	    $var = $this->extractText();
	    for($i=0;$i<count($var);$i++)
	    {
	        if(!empty($var[$i]))
	        {
	            $sentences[$i]= explode(".",$var[$i]);
            }
        }
        for($i=0;$i<sizeof($sentences);$i++)
        {
            for($j=0;$j<sizeof($sentences[$i]);$j++)
            {
                if(!empty($sentences[$i][$j]) && $sentences[$i][$j]!="" && strlen($sentences[$i][$j])>20)
                {
                    $sentences_vector[$i][]= $sentences[$i][$j].".";
                }
            }
        }
        return $sentences_vector;
	}

    public function extractWords()
    {
        //error_reporting(0);
        $var = $this->extractText();
        for($i=0;$i<count($var);$i++)
        {
            $text[$i] = explode(" ", $this->SpecialWords->removePunctuationCharacters($var[$i]));
        }
        if(!empty($text))
        {
            for($i=0;$i<sizeof($text);$i++)
            {
                for($j=0;$j<sizeof($text[$i]);$j++)
                {
                    if((!in_array($text[$i][$j], $this->SpecialWords->stopwordsVector())) && (!empty($text[$i][$j])) && !strstr($text[$i][$j],"http") && !preg_match('/[0-9]/', $text[$i][$j])  && !strstr($text[$i][$j],"—")  && !strstr($text[$i][$j],'"')   && !strstr($text[$i][$j],"–"))
                    {
                        $word[$i][] = strtolower($text[$i][$j]);
                    }
                }
            }
        }
        return $word;
    }

    /**
     * Generates an array of sentences that will be displayed to the user.
     * @return array
     */
    public function generateArray()
    {
        $sentence=array();
        $array = explode(".", file_get_contents('combined sentence.txt'));
        unset($array[count($array)-1]);
        for ($i = 0; $i <count($array);$i++)
        {
            $sentence[$i] = $array[$i] . ".";
        }
        return $sentence;
    }

    /**
     * Generates an array containing the statements that have been selected by the user as possible weak signals.
     * @return array
     */
    public function selectedSentencesArray()
    {
        $selected=array();
        $sentences= file_get_contents('selected sentences.txt');
        for($i=0;$i<count(explode('.',$sentences));$i++)
        {
            $selected[$i]=explode('.',$sentences)[$i].".";
        }
        unset($selected[count($selected)-1]);
        return $selected;
    }
}