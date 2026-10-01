<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\MacroNamespace;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/contrib/commerce/templates/commerce-dashboard-management-links.html.twig */
class __TwigTemplate_a6e810a99fe608f0e0ba711e74314b8c extends Template
{
    private Source $source;
    /**
     * @var array<string, MacroNamespace>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        $this->sandbox = $env->getExtension(SandboxExtension::class)->getChecker();
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"commerce-dashboard--management-links\">
  <button class=\"management-links-toggle\" type=\"button\" aria-controls=\"management-links\" aria-label=\"Toggle management menu\">
    <span class=\"management-links-toggle__icon\"></span>
  </button>
  <div class=\"management-links\" aria-labelledby=\"management-links\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["link"]) {
            // line 7
            yield "    <div class=\"management-link management-link--";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["key"], "html", null, true);
            yield "\">
      <a class=\"card\" href=\"";
            // line 8
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["link"], "url", [], "any", false, false, true, 8), "html", null, true);
            yield "\" title=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["link"], "description", [], "any", false, false, true, 8), "html", null, true);
            yield "\"><span class=\"management-link__icon\"></span>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["link"], "title", [], "any", false, false, true, 8), "html", null, true);
            yield "</a>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['link'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 11
        yield "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["links"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/templates/commerce-dashboard-management-links.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefaultEscapeStrategy(): string|false
    {
        return "html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  75 => 11,  61 => 8,  56 => 7,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/templates/commerce-dashboard-management-links.html.twig", "/var/www/html/web/modules/contrib/commerce/templates/commerce-dashboard-management-links.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 6];
        static $filters = ["escape" => 7];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "for"],
                [0 => "escape"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
