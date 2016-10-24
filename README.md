# twig-tmv-bootstrap #
Biblioteca de funções para ser usada com twig para agilizar no desenvolvimento do html

## Requisitos ##
* PHP : >=5.6 
* Composer
* Template compativel com bootstrap
* Conhecimento no uso do micro framework Silex e Twig

## Instalação via composer ##
* Usar versão dev-master pois o projeto está em constante desenvolvimento e nenhuma release está estavel
* composer require ambientesoft/twig-tmv-bootstrap

## Forma de uso ##
* Todas as funções foram desenvolvidas para uso juntamente com bootstrap, sendo que algumas podem ter resultados diferentes dependendo do template utilizado
* O template usado para o desenvolvimento da biblioteca foi o Remark - Responsive Bootstrap 4 Admin Template, pode ser encontrado no themeforest

## Funções ##
Todas as funções gerar elemento seguindo padrões bootstrap

### Parametros importantes ###
Os parametros abaixo estão presentes em quase todas as funções, portanto esteja atento ao seu uso

* $class : utilizado para acrescentar classes CSS ao elemento - valor padrão : ""
* $other : utilizado para adicionar html ao elemento, propiedade ou codigo extra para funcionamento de algum plugin - valor padrão : ""
* $echo : utilzado para informar para a função se a mesma deve escrever o html (true) ou apenas retornar (false) - valor padrão : true

### Funções para formulário ###
_veja class/TwigForm.php_

* basicInput - gera um elemento básico de input 
* basicSelect - gera um elemento básico de select 
* basicButton - gera um elemento básico de botão utilizando tag "button" ou "a" 
* actionButton - gera um botão de ação - verifique a disponibilidade do recurso no template utilizado
* basicTextarea - gera um elemento basico de textarea 
* basicCheckbox - gera um elemento basico checkbox
* basicHidden - gera um input hidden

## Links importantes ##
[Documentação Micro Framework Silex](http://silex.sensiolabs.org/doc/master/)

[Documentação Twig](http://twig.sensiolabs.org/documentation)

[Usando Twig com Silex](http://silex.sensiolabs.org/doc/master/providers/twig.html)

[Template Remark](https://themeforest.net/item/remark-responsive-bootstrap-4-admin-template/11989202?s_rank=1)

## Desenvolvimento ##
Desenvolvedor : Thalles Mendes Valeriano - thallesmendes123@gmail.com







 
