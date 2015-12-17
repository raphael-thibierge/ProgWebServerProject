<?php

/* RTappBundle:Default:contact.html.twig */
class __TwigTemplate_e766f5ccc54dc766396a9cdf7402fc4529c7bd48227e9e11e0c344d98da042a7 extends Twig_Template
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
        echo "    Contact
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"jumbotron\">
        <h1 class=\"text-center\">Contact</h1>

        <div>Raphael Thibierge</div>
        <div>IUT Informatique de Bordeaux</div>
        <a href=\"http://raphael.thibierge.com\" class=\"btn btn-info\">Site perso</a>

    </div>
";
    }

    public function getTemplateName()
    {
        return "RTappBundle:Default:contact.html.twig";
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
