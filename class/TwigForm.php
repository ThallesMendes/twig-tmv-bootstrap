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

    /**
     * Inicializa funções referente a formularios
     */
    public function initFunctions()
    {
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicInput', array($this, 'basicInput')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicSelect', array($this, 'basicSelect')) );
    }

    /**
     * Gera um elemento HTML de input basico seguindo padrões do bootstrap
     * @param $id                   - propiedade id do componente
     * @param $label                - label do input
     * @param $colsm                - propiedade col-sm bootstrap
     * @param $colmd                - proiedade col-md bootstrap
     * @param string $type          - tipo do input - padrao text
     * @param string $placeholder   - placeholder do input
     * @param string $class         - class css extra para input
     * @param string $other         - propiedade extra para o input
     */
    public function basicInput( $id, $label, $colsm, $colmd, $type="text", $placeholder="", $class="", $other="" ){
        $html = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <input type="'. $type .'" placeholder="'. $placeholder .'" class="form-control '. $class .'" id="'. $id .'" '. $other .'>
                </div>';
        echo trim($html);

    }

    /**
     * Gera um elemento HTML de select basico seguindo padrões do bootstrap
     * @param $id
     * @param $label
     * @param $colsm
     * @param $colmd
     * @param $values
     * @param $labels
     * @param string $class
     * @param string $other
     */
    public function basicSelect( $id, $label, $colsm, $colmd, $values, $labels, $class="", $other="" ){
        $html   = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <select class="form-control '. $class .'" id="'. $id .'" '. $other .'>';
        $i      = 0;

        foreach($values as $v){
            $html .= '<option value="'. $v .'" >' . $labels[$i] . '</option>';
            $i++;
        }
        $html .= '</select>';
        $html .= '</div>';

        echo trim($html);
    }
}