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

/* themes/contrib/bootstrap5/templates/content-edit/filter-tips.html.twig */
class __TwigTemplate_c6e8a9d7c129e24110264b492d11f5fc extends Template
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
        // line 19
        if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "  <h2>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Text Formats"));
            yield "</h2>
";
        }
        // line 22
        yield "
";
        // line 23
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["tips"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "  ";
            if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 25
                yield "    <div class=\"compose-tips\">
  ";
            }
            // line 27
            yield "
  ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["tips"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["tip"]) {
                // line 29
                yield "    ";
                if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 30
                    yield "      ";
                    // line 31
                    $context["tip_classes"] = ["filter-type", ("filter-" . \Drupal\Component\Utility\Html::getClass(                    // line 33
$context["name"]))];
                    // line 36
                    yield "      <div";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "attributes", [], "any", false, false, true, 36), "addClass", [($context["tip_classes"] ?? null)], "method", false, false, true, 36), "html", null, true);
                    yield ">
      <h3>";
                    // line 37
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "name", [], "any", false, false, true, 37), "html", null, true);
                    yield "</h3>
    ";
                }
                // line 39
                yield "
    ";
                // line 40
                if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "list", [], "any", false, false, true, 40))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 41
                    yield "      <ul class=\"tips\">
      ";
                    // line 42
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "list", [], "any", false, false, true, 42));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 43
                        yield "        ";
                        // line 44
                        $context["item_classes"] = [(((($tmp =                         // line 45
($context["long"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("filter-" . Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 45), ["/" => "-"]))) : (""))];
                        // line 48
                        yield "        <li";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 48), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 48), "html", null, true);
                        yield ">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "tip", [], "any", false, false, true, 48), "html", null, true);
                        yield "</li>
      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent);
                    $context += $_parent;
                    // line 50
                    yield "      </ul>
    ";
                }
                // line 52
                yield "
    ";
                // line 53
                if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 54
                    yield "      </div>
    ";
                }
                // line 56
                yield "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['name'], $context['tip'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 57
            yield "
  ";
            // line 58
            if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 59
                yield "    </div>
  ";
            }
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["multiple", "tips", "long"]);        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/bootstrap5/templates/content-edit/filter-tips.html.twig";
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
        return array (  144 => 59,  142 => 58,  139 => 57,  132 => 56,  128 => 54,  126 => 53,  123 => 52,  119 => 50,  107 => 48,  105 => 45,  104 => 44,  102 => 43,  98 => 42,  95 => 41,  93 => 40,  90 => 39,  85 => 37,  80 => 36,  78 => 33,  77 => 31,  75 => 30,  72 => 29,  68 => 28,  65 => 27,  61 => 25,  58 => 24,  56 => 23,  53 => 22,  47 => 20,  45 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/bootstrap5/templates/content-edit/filter-tips.html.twig", "/var/www/html/web/themes/contrib/bootstrap5/templates/content-edit/filter-tips.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 19, "for" => 28, "set" => 31];
        static $filters = ["t" => 20, "length" => 23, "clean_class" => 33, "escape" => 36, "replace" => 45];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "for", 2 => "set"],
                [0 => "t", 1 => "length", 2 => "clean_class", 3 => "escape", 4 => "replace"],
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
