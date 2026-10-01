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

/* modules/contrib/commerce/templates/commerce-dashboard-metrics-item.html.twig */
class __TwigTemplate_57bd418b5f85bb3dcb499022b7d7e092 extends Template
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
        // line 2
        $context["classes"] = ["metrics-item"];
        // line 7
        $context["metric_value_classes"] = ["metrics-item__value"];
        // line 11
        yield "<div";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 11), "html", null, true);
        yield ">
  <span class=\"metrics-item__icon\"></span>
  <div class=\"metrics-item__data\">
    <h5 class=\"metrics-item__label\">";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</h5>
    ";
        // line 15
        if ((($tmp = ($context["values"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "      ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["values"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 17
                yield "        <span";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(($context["metric_value_attributes"] ?? null)), "addClass", [($context["metric_value_classes"] ?? null)], "method", false, false, true, 17), "html", null, true);
                yield ">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["value"], "html", null, true);
                yield "</span>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 19
            yield "    ";
        } else {
            // line 20
            yield "      <span class=\"metrics-item__value\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("-"));
            yield "</span>
    ";
        }
        // line 22
        yield "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title", "values", "metric_value_attributes"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/commerce/templates/commerce-dashboard-metrics-item.html.twig";
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
        return array (  88 => 22,  82 => 20,  79 => 19,  67 => 17,  62 => 16,  60 => 15,  56 => 14,  49 => 11,  47 => 7,  45 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/commerce/templates/commerce-dashboard-metrics-item.html.twig", "/var/www/html/web/modules/contrib/commerce/templates/commerce-dashboard-metrics-item.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 15, "for" => 16];
        static $filters = ["escape" => 11, "t" => 20];
        static $functions = ["create_attribute" => 17];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "for"],
                [0 => "escape", 1 => "t"],
                [0 => "create_attribute"],
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
