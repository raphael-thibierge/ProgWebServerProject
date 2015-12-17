<?php

/* RTMusicBundle::details.html.twig */
class __TwigTemplate_42e5c28c03fc42174b0533e5cfcb2a82031f7ea400a5f3971a9e32380ffe018c extends Twig_Template
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
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "prénomMusicien"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "nomMusicien"), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"row\">
        <h1 class=\"text-center\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "prénomMusicien"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "nomMusicien"), "html", null, true);
        echo "</h1>
    </div>

    <div class=\"row\">
        <p>Prénom : ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "prénomMusicien"), "html", null, true);
        echo "</p>
        <p>Nom : ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "nomMusicien"), "html", null, true);
        echo "</p>
        <p>Année de naissance : ";
        // line 16
        if (($this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "annéeNaissance") != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "annéeNaissance"), "html", null, true);
        } else {
            echo " <span class=\"text-danger\">Non renseigné</span>";
        }
        echo "</p>
        <p>Année de mort : ";
        // line 17
        if (($this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "annéeMort") != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "annéeMort"), "html", null, true);
        } else {
            echo " <span class=\"text-danger\">Non renseigné</span>";
        }
        echo "</p>
        <p>Pays : ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "codePays"), "html", null, true);
        echo "</p>
        
        <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rt_music_generatePicture", array("class" => "Musicien", "id" => $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "codeMusicien"))), "html", null, true);
        echo "\" alt=\"\">



    </div>



";
    }

    public function getTemplateName()
    {
        return "RTMusicBundle::details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 20,  81 => 18,  73 => 17,  65 => 16,  61 => 15,  57 => 14,  48 => 10,  44 => 8,  41 => 7,  32 => 4,  29 => 3,);
    }
}
