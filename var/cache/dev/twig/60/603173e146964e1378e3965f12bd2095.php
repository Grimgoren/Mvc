<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* report.html.twig */
class __TwigTemplate_3b508d9778b66a6f6a8fe7cd52d4db13 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "report.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "report.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Report";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<h1>Report</h1>
    <h2 id=\"kmom01\">Kmom01</h2>
    <h2>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.</h2>
    <p>I stort sätt inga förkunskaper (gått men ännu inte färdig med objektorienterad python)</p>

    <h2>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå 
    för att kunna komma igång och skapa sina första klasser?</h2>
    <p>Ett objekt är en instans av en klass. När du skapar ett objekt, använder du 
    klassens definition för att tilldela det egenskaper och möjliggöra att det kan utföra handlingar genom dess metoder.
    En klass i PHP är som en blueprint för att skapa objekt. Den definierar variabler
     och funktioner som objekten skapade från klassen kommer att ha.</p>


    <h2>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h2>
    <p>Väldigt stökig och rörig, strukturen på hela grejen är väldigt utsprid och oorganiserad enligt mitt tycke. Det tar längre tid än vad 
    det borde göra för att åstadkomma enkla saker, visst det löser sig efter att man kommit in i det men från en första blick så finns det inte 
    mycket mer att säga än att det är en enda stor röra.</p>

    <h2>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? 
    Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h2>
    <p>Date and Time, \"Calculating with DateTime is possible with the DateInterval class\". Artikeln och just den sektionen highlightar hur ma arbetar med tid
    och hur man kan beräknar tid (exempelvis skillnad på x och y tid), vilket säkert kan komma till användning. Även kapitell 9 (templating) skrivs det om olika fördelar
    med templating och varför man använder det, vilket självklart är relevant just för detta kmom med twig. De går även in på att just PHP inte är särskilt
    utvecklat för templating och att vi därför använder twig \"While PHP has evolved into a mature, object oriented language, it hasn’t improved much as a templating language.\"</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket repition med exempelvis SASS, Twig och självklart PHP.</p>

    <h2 id=\"kmom02\">Kmom02</h2>
    <p></p>
    <h2 id=\"kmom03\">Kmom03</h2>
    <p></p>
    <h2 id=\"kmom04\">Kmom04</h2>
    <p></p>
    <h2 id=\"kmom05\">Kmom05</h2>
    <p></p>
    <h2 id=\"kmom06>Kmom06</h2>
    <p></p>
    <h2 id=\"kmom07\">Kmom07</h2>
    <p></p>
    <h2 id=\"kmom08\">Kmom08</h2>
    <p></p>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "report.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Report{% endblock %}

{% block body %}
<h1>Report</h1>
    <h2 id=\"kmom01\">Kmom01</h2>
    <h2>Berätta kort om dina förkunskaper och tidigare erfarenheter kring objektorientering.</h2>
    <p>I stort sätt inga förkunskaper (gått men ännu inte färdig med objektorienterad python)</p>

    <h2>Berätta kort om PHPs modell för klasser och objekt. Vilka är de grunder man behöver veta/förstå 
    för att kunna komma igång och skapa sina första klasser?</h2>
    <p>Ett objekt är en instans av en klass. När du skapar ett objekt, använder du 
    klassens definition för att tilldela det egenskaper och möjliggöra att det kan utföra handlingar genom dess metoder.
    En klass i PHP är som en blueprint för att skapa objekt. Den definierar variabler
     och funktioner som objekten skapade från klassen kommer att ha.</p>


    <h2>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h2>
    <p>Väldigt stökig och rörig, strukturen på hela grejen är väldigt utsprid och oorganiserad enligt mitt tycke. Det tar längre tid än vad 
    det borde göra för att åstadkomma enkla saker, visst det löser sig efter att man kommit in i det men från en första blick så finns det inte 
    mycket mer att säga än att det är en enda stor röra.</p>

    <h2>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? 
    Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h2>
    <p>Date and Time, \"Calculating with DateTime is possible with the DateInterval class\". Artikeln och just den sektionen highlightar hur ma arbetar med tid
    och hur man kan beräknar tid (exempelvis skillnad på x och y tid), vilket säkert kan komma till användning. Även kapitell 9 (templating) skrivs det om olika fördelar
    med templating och varför man använder det, vilket självklart är relevant just för detta kmom med twig. De går även in på att just PHP inte är särskilt
    utvecklat för templating och att vi därför använder twig \"While PHP has evolved into a mature, object oriented language, it hasn’t improved much as a templating language.\"</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket repition med exempelvis SASS, Twig och självklart PHP.</p>

    <h2 id=\"kmom02\">Kmom02</h2>
    <p></p>
    <h2 id=\"kmom03\">Kmom03</h2>
    <p></p>
    <h2 id=\"kmom04\">Kmom04</h2>
    <p></p>
    <h2 id=\"kmom05\">Kmom05</h2>
    <p></p>
    <h2 id=\"kmom06>Kmom06</h2>
    <p></p>
    <h2 id=\"kmom07\">Kmom07</h2>
    <p></p>
    <h2 id=\"kmom08\">Kmom08</h2>
    <p></p>
{% endblock %}
", "report.html.twig", "/home/grimgoren/dbwebb-kurser/mvc/me/report/templates/report.html.twig");
    }
}
