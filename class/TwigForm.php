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
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicButton', array($this, 'basicButton')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('actionButton', array($this, 'actionButton')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicTextarea', array($this, 'basicTextarea')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicCheckbox', array($this, 'basicCheckbox')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('basicHidden', array($this, 'basicHidden')) );
        Twig::getInstance()->getTwig()->addFunction( new TwigFunction('angularSelect', array($this, 'angularSelect')) );
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
     * @param boolean $echo
     * @return void|string
     */
    public function basicInput( $id, $label, $colsm, $colmd, $type="text", $placeholder="", $class="", $other="", $echo=true ){
        $html = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <input type="'. $type .'" placeholder="'. $placeholder .'" class="form-control '. $class .'" id="'. $id .'" name="'. $id .'" '. $other .'>
                </div>';
        if($echo)
            echo trim($html);
        else
            return trim($html);

    }

    /**
     * @param $id
     * @param string $value
     * @param string $other
     * @param boolean $echo
     * @return void|string
     */
    public function basicHidden( $id, $value="" ,$other="", $echo=true ){
        $html = '<input type="hidden" id="'. $id .'" name="'. $id .'" value="'. $value .'" '. $other .'>';
        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /**
     * Gera um elemento HTML de textarea basico seguindo padrões do bootstrap
     * @param $id
     * @param $label
     * @param $colsm
     * @param $colmd
     * @param int $maxlength
     * @param int $rows
     * @param string $placeholder
     * @param string $class
     * @param string $other
     * @param boolean $echo
     * @return void|string
     */
    public function basicTextarea( $id, $label, $colsm, $colmd, $maxlength=200,$rows=3, $placeholder="", $class="", $other="", $echo=true ){
        $html = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <textarea id="'. $id .'" name="'. $id .'" class="maxlength-textarea form-control '. $class .'" data-plugin="maxlength" data-placement="bottom-right-inside"
                  maxlength="'. $maxlength .'" rows="'. $rows .'" placeholder="'. $placeholder .'" '. $other .'></textarea>
                </div>';
        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /**
     * Gera um elemento HTML de checkbox basico seguindo padrões do bootstrap
     * @param $id
     * @param string $label
     * @param string $color
     * @param boolean $echo
     * @return void|string
     */
    public function basicCheckbox( $id, $label, $colsm, $colmd, $color="default", $class="", $other="", $echo=true ){
        $html = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                 <div class="checkbox-custom checkbox-'. $color . ' ' . $class .'">
                      <input id="'. $id .'" name="'. $id .'" type="checkbox" name="'. $id .'" ' . $other . '/>
                      <label for="'. $id .'">'. $label .'</label>
                 </div>
                 </div>';
        if($echo)
            echo trim($html);
        else
            return trim($html);
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
     * @param boolean $echo
     * @return void|string
     */
    public function basicSelect( $id, $label, $colsm, $colmd, $values, $labels, $class="", $other="", $echo=true ){
        $html   = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <select class="form-control '. $class .'" id="'. $id .'" name="'. $id .'" '. $other .'>';
        $i      = 0;

        foreach($values as $v){
            $html .= '<option value="'. $v .'" >' . $labels[$i] . '</option>';
            $i++;
        }
        $html .= '</select>';
        $html .= '</div>';

        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /** Gera um elemento html usando a propiedade angular ng-repeat
     * @param $id
     * @param $label
     * @param $colsm
     * @param $colmd
     * @param $ngrepeat
     * @param $value
     * @param $labelan
     * @param string $class
     * @param string $other
     * @param string $ngselected
     * @param bool $echo
     * @return string
     */
    public function angularSelect( $id, $label, $colsm, $colmd, $ngrepeat, $value, $labelan, $class="", $other="", $ngselected="", $echo=true ){
        if($ngselected <> ""){
            $ngselected = 'ng-selected="'. $ngselected .'"';
        }

        $html   = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <select class="form-control '. $class .'" id="'. $id .'" name="'. $id .'" '. $other .'>';
        $html .=   '<option ng-repeat="'. $ngrepeat .'" '. $ngselected .' value="'. $value .'" >' . $labelan . '</option>';

        $html .= '</select>';
        $html .= '</div>';

        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /** Gera um elemento html usando a propieda angular ng-options
     * @param $id
     * @param $label
     * @param $colsm
     * @param $colmd
     * @param $ngoptions
     * @param string $class
     * @param string $other
     * @param bool $echo
     * @return string
     */
    public function angularSelect2( $id, $label, $colsm, $colmd, $ngoptions, $class="", $other="", $echo=true ){
        $html   = '<div class="col-sm-'. $colsm .' col-md-'. $colmd .'">
                    <label class="control-label">'. $label .'</label>
                    <select ng-options="'. $ngoptions .'" class="form-control '. $class .'" id="'. $id .'" name="'. $id .'" '. $other .'>';

        $html .= '</select>';
        $html .= '</div>';

        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /**
     * Gera um elemento HTML de button basico seguindo padrões do bootstrap
     * @param $id
     * @param $label
     * @param string $icon
     * @param string $color
     * @param string $type
     * @param string $href
     * @param string $class
     * @param string $other
     * @param boolean $echo
     * @return void|string
     */
    public function basicButton( $id, $label, $icon="", $color="default", $type="button", $href="#", $class="", $other="", $echo=true ){
        $htmlicon = "";
        $html     = "";

        if($icon <> ""){
            $htmlicon = '<i class="'. $icon .'" aria-hidden="true"></i> ';
        }

        if($type=="button"){
            $html = '<button id="'. $id .'" name="'. $id .'" type="button" class="btn btn-'. $color .' ' . $class .'" ' . $other . '>'. $htmlicon . $label .'</button>';
        }
        else if( $type=="a" ) {
            $html = '<a id="'. $id .'" href="'. $href .'" class="btn btn-'. $color .' ' . $class .'" ' . $other . '>'. $htmlicon .$label .'</a>';
        }

        if($echo)
            echo trim($html);
        else
            return trim($html);
    }

    /**
     * Gera um elemento HTML de button de ação seguindo padrões do bootstrap
     * Verifique a compatibilidade com o template utilizado
     * @param $id
     * @param $icon
     * @param string $color
     * @param string $tooltip
     * @param string $class
     * @param string $other
     * @param boolean $echo
     * @return void|string
     */
    public function actionButton( $id, $icon, $color="default", $tooltip="", $class="", $other="", $echo=true ){
        $htmltooltip = "";
        if( $tooltip <> "" ){
            $htmltooltip = 'data-toggle="tooltip" data-placement="top" data-original-title="'. $tooltip .'"';
            $class       .= ' tooltip-' . $color;
        }

        $html = '<button id="'. $id .'" type="button" name="'. $id .'" class="btn-raised btn btn-'. $color .' btn-floating ' . $class . '" '. $other .' '. $htmltooltip. '>
                    <i class="'. $icon .'" aria-hidden="true"></i>
                </button>';
        if($echo)
            echo trim($html);
        else
            return trim($html);
    }


}