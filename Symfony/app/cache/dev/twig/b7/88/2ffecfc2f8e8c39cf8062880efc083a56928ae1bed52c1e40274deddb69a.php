<?php

/* RTappBundle::layout.html.twig */
class __TwigTemplate_b7882ffecfc2f8e8c39cf8062880efc083a56928ae1bed52c1e40274deddb69a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" integrity=\"sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7\" crossorigin=\"anonymous\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

</head>

<body>
    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\">Projet Symfony</a>
            </div>
            <div id=\"navbar\" class=\"collapse navbar-collapse\">
                <ul class=\"nav navbar-nav\">
                    <li class=\"active\"><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("r_tapp_homepage");
        echo "\">Home</a></li>
                    <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("r_tapp_contactpage");
        echo "\">Contact</a></li>
                    <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("rt_music_homepage");
        echo "\">Musiciens</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class=\"container\" style=\"padding-top: 70px;\">
        ";
        // line 36
        $this->displayBlock('body', $context, $blocks);
        // line 37
        echo "    </div>
    ";
        // line 38
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
        echo "</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 36
    public function block_body($context, array $blocks = array())
    {
    }

    // line 38
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "RTappBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 38,  101 => 36,  96 => 8,  90 => 7,  84 => 39,  82 => 38,  79 => 37,  77 => 36,  67 => 29,  63 => 28,  59 => 27,  35 => 8,  31 => 7,  23 => 1,  40 => 8,  37 => 9,  32 => 4,  29 => 3,);
    }
}
