<?php
namespace Twigtmv\Classes;

use Fasttmv\Classes\Objeto;

class Twig extends Objeto
{
    /**
     * @var Twig
     */
    public static $instance;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * private singleton
     * Twig constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return Twig
     */
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new Twig();
        }
        return self::$instance;
    }

    /**
     * @param \Twig_Environment $twig
     */
    public function initAll( $twig ){
        $this->setTwig($twig);
        TwigForm::getInstance()->initFunctions();
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param \Twig_Environment $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
    

}