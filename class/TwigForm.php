<?php
namespace Twigtmv\Classes;

/**
 * Class TwigForm
 * Classe com funções relacionada a formulário
 * @package Twigtmv\Classes
 */
class TwigForm
{
    /**
     * @var TwigForm
     */
    public static $instance;

    /**
     * @return TwigForm
     */
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new TwigForm();
        }
        return self::$instance;
    }

    public function initFunctions()
    {
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicInput', array($this, 'basicInput')) );
    }

    public function basicInput( $id, $label, $colsm, $colmd, $type="text", $placeholder="", $class="", $other="" ){
        $html = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <input type="'. $type .'" placeholder="'. $placeholder .'" class="form-control '. $class .'" id="'. $id .'" '. $other .'>
                </div>';
        echo trim($html);

    }
}