<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 07/08/2018
 * Time: 20:20
 */

require_once "Searchh.php";

/**
 * This class is responsible for searching for weak signals through a user-specified keywords. In this type of search, search engines are used.
 */
class SocialNetworkSearch extends Search
{
    /**
     * This private attribute stores the value of keywords.
     * @var String $keywords
     */
    private $keywords;

    /**
     * The constructor has no parameters and is responsible for creating a SearchEngine object and assigning to corresponding attribute.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method gets keywords.
     * @return String
     */
    public function getKeywords()
    {
        return $this->keywords;
    }


    /**
     * This method is responsible for writing the data (the parameters themselves) to a text file.
     * @param String $keywords represents the keywords in which the user wishes to search for weak signals.
     * @return void
     */
    public function writeSocialNetworkSearchOnFile($keywords)
    {
        $file = fopen('keywords.txt', "w");
        fwrite($file, $this->Content->getSpecialWords()->removeAccents($this->Content->getSpecialWords()->removePunctuationCharacters($keywords)));
        fclose($file);
    }

    /**
     * This method checks if all requirements (fields filled) to perform a SpecificSearch are satisfied.
     * @return boolean
     */
    public function verifySocialNetworkSearch()
    {
        if(($this->Search->getOptionField() == '3' && $this->Search->getKeywordsField()!=""  && $this->Search->getSocialNetwork()!='0' && $this->Search->getSummarization()!='0'))
        {
            return true;
        }
        else
            return false;
    }


    /**
     * This method is responsible for calling a python script that performs a Twitter search.
     * @return void
     */
    public function twitterSearch()
    {
        set_time_limit(12000);
        shell_exec(escapeshellcmd('python Twitter.py'));
    }

    /**
     * This method is responsible for calling a python script that performs an Instagram search.
     * @return void
     */
    public function instagramSearch()
    {
        set_time_limit(12000);
        shell_exec(escapeshellcmd('python Instagram.py'));
    }

    /**
     * This method is responsible for triggering one of the class methods, and has an option as the parameter.
     * @param String $option represents the search engine chosen by the user.
     * @return void
     */
    public function chooseSocialNetwork($option)
    {
        switch($option)
        {
            case "twitter":
                $this->twitterSearch();
                break;

            case "instagram":
                $this->instagramSearch();
                break;

            default:
                print("<script>alert('Um erro ocorreu, atualize a página! Se o erro persistir, contate o suporte enviando a seguinte mensagem: Error in method chooseSocialNetwork(option).');</script>");
        }
    }

    public function writeSocialNetwork($social)
    {
        file_put_contents('social.txt',$social);
    }

    /**
     * This polymorphic method has no parameters, and is responsible for calling all methods of other classes that compose a SpecificSearch.
     * @return void
     */
    public function searching()
    {
        if ((($this->verifyIfSearchExists()==true)) && ($this->verifySocialNetworkSearch()==true))
        {
            $this->writeTypeSearch($this->Search->getOptionField());
            $this->writeSocialNetwork($this->Search->getSocialNetwork());
            $this->writeSocialNetworkSearchOnFile($this->Search->getKeywordsField());
            $this->writeDegreeOfCompressionField($this->Search->getSummarization());
            $this->writeTypeBaseField($this->Search->getChooseDataSetType());
            $this->chooseSocialNetwork($this->Search->getSocialNetwork());
            $this->Search->searchMode();
        }
    }

}