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
    <p>Ett objekt ärver av en klass, när man skapar ett objekt. 
    En klass i PHP är som en blueprint för att skapa objekt. Den definierar variabler
     och funktioner som objekten skapade från klassen kommer att ha.</p>

    <p>Exempelvis om jag har en class som innehåller en fyrkant (längd & bredd) och sen skapar jag ett fyrkants objekt, då ärver det objektet från 
    klassen (längd och bredd)</p>


    <h2>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h2>
    <p>Väldigt stökig och rörig, strukturen på hela grejen är väldigt utsprid och oorganiserad enligt mitt tycke. Det tar längre tid än vad 
    det borde göra för att åstadkomma enkla saker, visst det löser sig efter att man kommit in i det men från en första blick så finns det inte 
    mycket mer att säga än att det är en enda stor röra.</p>

    <p>Något jag fick väldigt stora problem med var \"övningen\" och följande uppgift, övningen la all sin kod i \"app\" folder men 
    uppgiften och \"dbwebb test kmom01\" förväntade sig att alla filer låg i roten av /report och inte report/app. Tog många svordommar 
    och mycket extra tid för att flytta allt till rooten och få det att fungera igen. Min poäng är att övningen vägledde mig in på något som 
    inte fungerade i uppgiften och skapade otrolig frustration.</p>

    <h2>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? 
    Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h2>
    <p>Date and Time, \"Calculating with DateTime is possible with the DateInterval class\". Artikeln och just den sektionen highlightar hur ma arbetar med tid
    och hur man kan beräknar tid (exempelvis skillnad på x och y tid), vilket säkert kan komma till användning. Även kapitell 9 (templating) skrivs det om olika fördelar
    med templating och varför man använder det, vilket självklart är relevant just för detta kmom med twig. De går även in på att just PHP inte är särskilt
    utvecklat för templating och att vi därför använder twig \"While PHP has evolved into a mature, object oriented language, it hasn’t improved much as a templating language.\"</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket repition med exempelvis SASS, Twig och självklart PHP.</p>

    <h2 id=\"kmom02\">Kmom02</h2>
    <h2>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP.</h2>
    <p>Arv är som det låter något som en klass ärver från en annan, exempelvis ärver min 
    CardSort från CardValue för att kunna sortera på just \"value\" eller vad korten är värda (Ess>Kung>Dam osv).</p>
    <p>En komposition är när en klass kan använda en annan klass variabler i sin egna kod. Samma gäller för interface, 
    interface låter olika komponenter från klasser att interagera med varandra. Traits är något som låter dig återanvända saker från 
    en klass i en annan klass (återanvänd kod).</p>

    <h2>Berätta om din implementation från uppgiften. 
    Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden och dina klasser?</h2>
    <p>Det tog extremt lång tid att få färdigt denna uppgiften och nej jag är nog inte helt nöjd med allt 
    (framförallt utseendet). Jag hade kunnat dela upp exempelvis DeckOfCards i fler små klasser, även om jag gjorde det till 
    viss del med exempelvis Draw och CardValue samt CardSort.</p>

    <h2>Vilka är dina reflektioner så här långt med att jobb i Symfony med applikationskod enligt MVC?</h2>
    <p>Jag tycker själva interfacet är ovänligt i många fall, det är många gånger som det inte är helt uppenbart varför 
    något inte fungerar och man kan spendera mycket tid på något som senare visar sig faktiskt ha fungerat men symfony förväntat 
    sig på ett annat sätt, lite svårt att ge konkret exempel men det är hur jag upplever det just nu i alla fall.</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>mycket php och klasser, repition om hur man hanterar klasser och arv.</p>


    <h2 id=\"kmom03\">Kmom03</h2>
    <h2>Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. 
    Var det något som du tror stödjer dig i din problemlösning och tankearbete för att 
    strukturera koden kring en applikation?</h2>
    <p>Jag tyckte det hjälpte rätt så mycket eftersom man redan innan påbörjandet av kodandet såg vilka problem man 
    hade kommit att fastna i för att man inte \"tänkt så långt\" vilket ledde till att jag undvek dem problemen när jag skrev 
    själva koden. Exempelvis hur det hela skulle fungera när man valde att dra fler kort och titta upp om korte översteg 21 eller inte
     och vad man då skulle göra.</p>

    <h2>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, 
    vilken förbättringspotential ser du i din koden, dina klasser och applikationen som helhet?</h2>
    <p>Självklart så är det inte \"snyggt\" det är alltid något som kan förbättras (utseendemässigt) men hur det funkar är 
    jag rätt nöjd med. Hela saken funkar nästintill exakt som mitt flödeschema är uppställd innan jag började skriva koden.
    Dealern får två kort vilken en av dem är gömt för spelaren, spelaren får två kort och sen får spelaren välja vad den vill göra.
    Stanna eller dra mer kort. Dealern drar alltid kort till minst 17 poäng är nådda efter att spelaren valt att stanna och sen 
    summeras spelet och ett resultat visas.</p>

    <h2>Vilken är din känsla för att koda i ett ramverk som Symfony, så här långt in i kursen?</h2>
    <p>I början tyckte jag det var otroligt rörigt men nu börjar det \"falla på plats\" lite mera och jag har börjat 
    tycka exemeplvis twig osv är rätt smidigt för att göra olika saker på samma sida beroende på x och y.</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket php och twig.</p>

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
    <p>Ett objekt ärver av en klass, när man skapar ett objekt. 
    En klass i PHP är som en blueprint för att skapa objekt. Den definierar variabler
     och funktioner som objekten skapade från klassen kommer att ha.</p>

    <p>Exempelvis om jag har en class som innehåller en fyrkant (längd & bredd) och sen skapar jag ett fyrkants objekt, då ärver det objektet från 
    klassen (längd och bredd)</p>


    <h2>Reflektera kort över den kodbas, koden, strukturen som användes till uppgiften me/report, hur uppfattar du den?</h2>
    <p>Väldigt stökig och rörig, strukturen på hela grejen är väldigt utsprid och oorganiserad enligt mitt tycke. Det tar längre tid än vad 
    det borde göra för att åstadkomma enkla saker, visst det löser sig efter att man kommit in i det men från en första blick så finns det inte 
    mycket mer att säga än att det är en enda stor röra.</p>

    <p>Något jag fick väldigt stora problem med var \"övningen\" och följande uppgift, övningen la all sin kod i \"app\" folder men 
    uppgiften och \"dbwebb test kmom01\" förväntade sig att alla filer låg i roten av /report och inte report/app. Tog många svordommar 
    och mycket extra tid för att flytta allt till rooten och få det att fungera igen. Min poäng är att övningen vägledde mig in på något som 
    inte fungerade i uppgiften och skapade otrolig frustration.</p>

    <h2>Med tanke på artikeln “PHP The Right Way”, vilka delar in den finner du extra intressanta och värdefulla? 
    Är det några särskilda områden som du känner att du vill veta mer om? Lyft fram några delar av artikeln som du känner mer värdefulla.</h2>
    <p>Date and Time, \"Calculating with DateTime is possible with the DateInterval class\". Artikeln och just den sektionen highlightar hur ma arbetar med tid
    och hur man kan beräknar tid (exempelvis skillnad på x och y tid), vilket säkert kan komma till användning. Även kapitell 9 (templating) skrivs det om olika fördelar
    med templating och varför man använder det, vilket självklart är relevant just för detta kmom med twig. De går även in på att just PHP inte är särskilt
    utvecklat för templating och att vi därför använder twig \"While PHP has evolved into a mature, object oriented language, it hasn’t improved much as a templating language.\"</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket repition med exempelvis SASS, Twig och självklart PHP.</p>

    <h2 id=\"kmom02\">Kmom02</h2>
    <h2>Förklara kort de objektorienterade konstruktionerna arv, komposition, interface och trait och hur de används i PHP.</h2>
    <p>Arv är som det låter något som en klass ärver från en annan, exempelvis ärver min 
    CardSort från CardValue för att kunna sortera på just \"value\" eller vad korten är värda (Ess>Kung>Dam osv).</p>
    <p>En komposition är när en klass kan använda en annan klass variabler i sin egna kod. Samma gäller för interface, 
    interface låter olika komponenter från klasser att interagera med varandra. Traits är något som låter dig återanvända saker från 
    en klass i en annan klass (återanvänd kod).</p>

    <h2>Berätta om din implementation från uppgiften. 
    Hur löste du uppgiften, är du nöjd/missnöjd, vilken förbättringspotential ser du i din koden och dina klasser?</h2>
    <p>Det tog extremt lång tid att få färdigt denna uppgiften och nej jag är nog inte helt nöjd med allt 
    (framförallt utseendet). Jag hade kunnat dela upp exempelvis DeckOfCards i fler små klasser, även om jag gjorde det till 
    viss del med exempelvis Draw och CardValue samt CardSort.</p>

    <h2>Vilka är dina reflektioner så här långt med att jobb i Symfony med applikationskod enligt MVC?</h2>
    <p>Jag tycker själva interfacet är ovänligt i många fall, det är många gånger som det inte är helt uppenbart varför 
    något inte fungerar och man kan spendera mycket tid på något som senare visar sig faktiskt ha fungerat men symfony förväntat 
    sig på ett annat sätt, lite svårt att ge konkret exempel men det är hur jag upplever det just nu i alla fall.</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>mycket php och klasser, repition om hur man hanterar klasser och arv.</p>


    <h2 id=\"kmom03\">Kmom03</h2>
    <h2>Berätta hur det kändes att modellera ett kortspel med flödesdiagram och psuedokod. 
    Var det något som du tror stödjer dig i din problemlösning och tankearbete för att 
    strukturera koden kring en applikation?</h2>
    <p>Jag tyckte det hjälpte rätt så mycket eftersom man redan innan påbörjandet av kodandet såg vilka problem man 
    hade kommit att fastna i för att man inte \"tänkt så långt\" vilket ledde till att jag undvek dem problemen när jag skrev 
    själva koden. Exempelvis hur det hela skulle fungera när man valde att dra fler kort och titta upp om korte översteg 21 eller inte
     och vad man då skulle göra.</p>

    <h2>Berätta om din implementation från uppgiften. Hur löste du uppgiften, är du nöjd/missnöjd, 
    vilken förbättringspotential ser du i din koden, dina klasser och applikationen som helhet?</h2>
    <p>Självklart så är det inte \"snyggt\" det är alltid något som kan förbättras (utseendemässigt) men hur det funkar är 
    jag rätt nöjd med. Hela saken funkar nästintill exakt som mitt flödeschema är uppställd innan jag började skriva koden.
    Dealern får två kort vilken en av dem är gömt för spelaren, spelaren får två kort och sen får spelaren välja vad den vill göra.
    Stanna eller dra mer kort. Dealern drar alltid kort till minst 17 poäng är nådda efter att spelaren valt att stanna och sen 
    summeras spelet och ett resultat visas.</p>

    <h2>Vilken är din känsla för att koda i ett ramverk som Symfony, så här långt in i kursen?</h2>
    <p>I början tyckte jag det var otroligt rörigt men nu börjar det \"falla på plats\" lite mera och jag har börjat 
    tycka exemeplvis twig osv är rätt smidigt för att göra olika saker på samma sida beroende på x och y.</p>

    <h2>Vilken är din TIL för detta kmom?</h2>
    <p>Mycket php och twig.</p>

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
