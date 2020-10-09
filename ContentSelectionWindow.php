<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 24/07/2018
 * Time: 05:13
 */

require_once 'ContentSelection.php';
require_once 'SearchWindow.php';

/**
 * This class is responsible for getting the GUI values ​​and passing it to the Sentence class.
 */
class ContentSelectionWindow
{

    private $createDataSet;

    /**
     * This private attribute stores the value of a Sentence.
     * @var ContentSelection $Sentence
     */
    private $Sentence;

    private $SearchWIndow;

    /**
     * The constructor has no parameters, and its responsibility is to check if the values ​​are present in the GUI, if they are, it assigns to the corresponding private attributes.
     */
    public function __construct()
    {
        if (isset($_POST['createButton']))
            $this->createDataSet = $_POST['createButton'];
        $this->Sentence = new ContentSelection();
        $this->SearchWIndow = new SearchWindow();
    }

    /**
     * @return SearchWindow
     */
    public function getSearchWIndow()
    {
        return $this->SearchWIndow;
    }

    /**
     * This method gets the extract sentences button and returns a String.
     * @return String
     */
    public function getCreateDataSet()
    {
        return $this->createDataSet;
    }

    /**
     * This method gets a Sentence object type.
     * @return ContentSelection
     */
    public function getSentence()
    {
        return $this->Sentence;
    }

    /**
     * Method that displays the array of statements in the GUI for the user.
     * @return void
     */

    public function defineTextualDatabaseType()
    {

        if($this->getSearchWIndow()->getOptionField()!="0")
        {
            if(file_get_contents("type base.txt")=="textBase")
            {
                error_reporting(0);
                $text=$this->Sentence->extractText();
                for ($i = 0; $i < count($text); $i++)
                {
                    if(trim($text[$i])!="")
                    {
                        $x = "BEGIN"."\r\n".$this->Sentence->extractText()[$i]."\r\n"."END"."\r\n";
                        echo("<br/><div class='input-group'><span class='input-group-addon frspan'><input type='checkbox' name='text[]' value='$x' aria-label='123'></span><span style='text-align: justify' >".$this->Sentence->extractText()[$i]."</span></div><br/>");
                }}
            }
            if(file_get_contents("type base.txt")=="sentenceBase")
            {
                error_reporting(0);
                $sentences = $this->Sentence->extractSentences();
                for ($i = 0; $i < count($sentences); $i++)
                {
                    for ($j = 0; $j < count($sentences[$i]); $j++)
                    {
                        if(trim($sentences[$i][$j])!="")
                        {
                            $x = $sentences[$i][$j];
                            echo("<br/><div class='input-group'><span class='input-group-addon frspan'><input type='checkbox' name='sentence[]' value='$x' aria-label='123'></span><span style='text-align: justify' >".$sentences[$i][$j]."</span></div><br/>");
                    }}
                }
            }
            if(file_get_contents("type base.txt")=="wordBase")
            {
                error_reporting(0);
                $words = $this->Sentence->extractWords();
                for ($i = 0; $i < count($words); $i++)
                {
                    for ($j = 0; $j < count($words[$i])-1; $j++)
                    {
                        if(trim($words[$i][$j])!="")
                        {
                            $x = $words[$i][$j];
                            echo("<br/><div class='input-group'><span class='input-group-addon frspan'><input type='checkbox' name='word[]' value='$x' aria-label='123'></span><span style='text-align: justify' >&nbsp;".$words[$i][$j]."</span></div><br/>");
                    }}
                }
            }
        }
    }

    /**
     * Method that gets the selected sentences and stores them in a file.
     * @return void
     */

    public function getSelectedContent()
    {
        if(isset($_POST['text']))
        {
            $f= fopen('selected text.txt', 'a+');
            fwrite($f,implode("",$_POST['text']));
            fclose($f);
        }
        if(isset($_POST['sentence']))
        {
            $f= fopen('selected sentences.txt', 'a+');
            fwrite($f,implode(" ",$_POST['sentence']));
            fclose($f);
        }
        if(isset($_POST['word']))
        {
            $f= fopen('selected words.txt', 'a+');
            fwrite($f,implode(" ",$_POST['word']));
            fclose($f);
        }
    }

	/**
     * Method that shows the selected sentences.
     * @return void
     */
    public function showSelectedSentences()
    {	if(file_exists('\xampp\MeusTrabalhosEmPHP\crawler\files\selected sentences.txt'))
		{
			$array = explode(".", file_get_contents('\xampp\MeusTrabalhosEmPHP\crawler\files\selected sentences.txt'));
			unset($array[count($array)-1]);
			for ($i = 0; $i <count($array);$i++)
			{
				echo("<li style='text-align:justify'><a href='#'>".  $array[$i] . "." ."<br />"."<br />". "</a></li>");
			}
		}
		else
			echo("<b>Se as sentenças não aparecerem, recarregue a página apertando f5</b>");
	}



}