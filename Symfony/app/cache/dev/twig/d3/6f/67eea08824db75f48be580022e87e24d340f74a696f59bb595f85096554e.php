<?php

/* RTMusicBundle::musiciens.html.twig */
class __TwigTemplate_d36f67eea08824db75f48be580022e87e24d340f74a696f59bb595f85096554e extends Twig_Template
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
        echo "    Musiciens
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "

    <div class=\"row\">
        <h1 class=\"text-center\">Liste des musiciens</h1>
    </div>

    <div class=\"row\">
        <table class=\"table\">
            <tr><td><h4>Nom</h4></td><td><h4>Prénom</h4></td></tr>
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["musiciens"]) ? $context["musiciens"] : $this->getContext($context, "musiciens")));
        foreach ($context['_seq'] as $context["_key"] => $context["musicien"]) {
            // line 18
            echo "                <tr><td><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rt_music_musicien_details_page", array("id" => $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "codeMusicien"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "nomMusicien"), "html", null, true);
            echo "</a></td><td>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["musicien"]) ? $context["musicien"] : $this->getContext($context, "musicien")), "prénomMusicien"), "html", null, true);
            echo "</td></tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['musicien'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
        </table>
    </div>

    ";
        // line 25
        echo "
    <div class=\"row\">
        <div class=\"col-md-10 col-md-offset-1\">

            <nav>
                <ul class=\"pagination\">
                    ";
        // line 31
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1)) {
            // line 32
            echo "                        <li>
                            <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rt_music_musicienspage", array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1))), "html", null, true);
            echo "\" aria-label=\"Previous\">
                                <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                        </li>
                    ";
        }
        // line 38
        echo "
                    ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["nbPages"]) ? $context["nbPages"] : $this->getContext($context, "nbPages"))));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 40
            echo "
                        <li ";
            // line 41
            if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                echo " class=\"active\" ";
            }
            echo "><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rt_music_musicienspage", array("page" => (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
                    ";
        // line 44
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nbPages"]) ? $context["nbPages"] : $this->getContext($context, "nbPages")))) {
            // line 45
            echo "                        <li>
                            <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rt_music_musicienspage", array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1))), "html", null, true);
            echo "\" aria-label=\"Next\">
                                <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                        </li>
                    ";
        }
        // line 51
        echo "                </ul>
            </nav>
        </div>
    </div>


    ";
    }

    public function getTemplateName()
    {
        return "RTMusicBundle::musiciens.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 51,  127 => 46,  124 => 45,  122 => 44,  119 => 43,  105 => 41,  102 => 40,  98 => 39,  95 => 38,  87 => 33,  84 => 32,  82 => 31,  74 => 25,  68 => 20,  55 => 18,  51 => 17,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
