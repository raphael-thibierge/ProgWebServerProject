<?php

/* RTappBundle:Default:index.html.twig */
class __TwigTemplate_22d6ed75a0ce02798cc8826fed35258f709c265d52ef9bf784c61de6de572106 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@RTapp/layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@RTapp/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Bienvenue
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"jumbotron\">
        <h1 class=\"text-center\">Bienvenue</h1>

        <div class=\"text-center\">Ce site a pour rôle de présenter les exercices réalisés en PHP avec le framework Symfony2</div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "RTappBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
