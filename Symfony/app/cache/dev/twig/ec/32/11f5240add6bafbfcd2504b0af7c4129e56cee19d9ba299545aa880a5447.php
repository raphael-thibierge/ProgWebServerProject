<?php

/* RTMusicBundle:Default:index.html.twig */
class __TwigTemplate_ec3211f5240add6bafbfcd2504b0af7c4129e56cee19d9ba299545aa880a5447 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("RTappBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "RTappBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Musiciens
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "         ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "nomMusicien"), "html", null, true);
        echo "


";
    }

    public function getTemplateName()
    {
        return "RTMusicBundle:Default:index.html.twig";
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
