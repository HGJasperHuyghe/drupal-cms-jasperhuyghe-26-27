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

/* themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig */
class __TwigTemplate_4d0ac1111384d091d028eeb285bcfa58 extends Template
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
        // line 21
        $macros["menus"] = $this->macros["menus"] = $this->getMacroNamespace();
        // line 22
        yield "
";
        // line 27
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($macros["menus"] ?? $this->throwUninitializedMacroNamespace(27))->call("build_menu", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], $context, 27, $this->source));
        yield "

";
        // line 46
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        return; yield;
    }

    protected function loadDeclaredMacros(): array
    {
        return [
            "build_menu" => new \Twig\TwigMacro("build_menu", function ($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup {
                // line 29
                $macros = $this->macros;
                $context = [
                    "items" => $items,
                    "attributes" => $attributes,
                    "menu_level" => $menu_level,
                    "varargs" => $varargs,
                ] + $this->env->getGlobals();

                $blocks = [];

                return ('' === $tmp = implode('', iterator_to_array((function () use (&$context, $macros, $blocks) {
                    // line 30
                    yield "  ";
                    $macros["menus"] = $this->getMacroNamespace();
                    // line 31
                    yield "  ";
                    if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 32
                        yield "    ";
                        // line 33
                        $context["ul_classes"] = [(((                        // line 34
($context["menu_level"] ?? null) == 0)) ? ("navbar-nav justify-content-end flex-wrap") : ("")), (((                        // line 35
($context["menu_level"] ?? null) > 0)) ? ("dropdown-menu") : ("")), ("nav-level-" .                         // line 36
($context["menu_level"] ?? null))];
                        // line 39
                        yield "    <ul";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["ul_classes"] ?? null)], "method", false, false, true, 39), "html", null, true);
                        yield ">
    ";
                        // line 40
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                            // line 41
                            yield "      ";
                            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($macros["menus"] ?? $this->throwUninitializedMacroNamespace(41))->call("add_link", [$context["item"], CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", [($context["ul_classes"] ?? null)], "method", false, false, true, 41), ($context["menu_level"] ?? null)], $context, 41, $this->source));
                            yield "
    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent);
                        $context += $_parent;
                        // line 43
                        yield "    </ul>
  ";
                    }
                    return; yield;
                })(), false))) ? '' : new Markup($tmp, $this->env->getCharset());
            }, ["items" => false, "attributes" => false, "menu_level" => false], false),
            "add_link" => new \Twig\TwigMacro("add_link", function ($item = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup {
                // line 47
                $macros = $this->macros;
                $context = [
                    "item" => $item,
                    "attributes" => $attributes,
                    "menu_level" => $menu_level,
                    "varargs" => $varargs,
                ] + $this->env->getGlobals();

                $blocks = [];

                return ('' === $tmp = implode('', iterator_to_array((function () use (&$context, $macros, $blocks) {
                    // line 48
                    yield "  ";
                    $macros["menus"] = $this->getMacroNamespace();
                    // line 49
                    yield "  ";
                    // line 50
                    $context["list_item_classes"] = ["nav-item", (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 52
($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("dropdown") : (""))];
                    // line 55
                    yield "  ";
                    // line 56
                    $context["link_class"] = [(((                    // line 57
($context["menu_level"] ?? null) == 0)) ? ("nav-link") : ("")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 58
($context["item"] ?? null), "in_active_trail", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("")), ((((                    // line 59
($context["menu_level"] ?? null) == 0) && ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_expanded", [], "any", false, false, true, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "is_collapsed", [], "any", false, false, true, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)))) ? ("dropdown-toggle") : ("")), (((                    // line 60
($context["menu_level"] ?? null) > 0)) ? ("dropdown-item") : (""))];
                    // line 63
                    yield "  ";
                    // line 64
                    $context["toggle_class"] = [];
                    // line 67
                    yield "  <li";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "attributes", [], "any", false, false, true, 67), "addClass", [($context["list_item_classes"] ?? null)], "method", false, false, true, 67), "html", null, true);
                    yield ">
    ";
                    // line 68
                    if (((($context["menu_level"] ?? null) == 0) && (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
                        // line 69
                        yield "      ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 69), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 69), ["class" => ($context["link_class"] ?? null), "role" => "button", "data-bs-toggle" => "dropdown", "aria-expanded" => "false", "title" => ((t("Expand menu") . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 69))]), "html", null, true);
                        yield "
      ";
                        // line 70
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($macros["menus"] ?? $this->throwUninitializedMacroNamespace(70))->call("build_menu", [CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "below", [], "any", false, false, true, 70), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], $context, 70, $this->source));
                        yield "
    ";
                    } else {
                        // line 72
                        yield "      ";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, true, 72), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "url", [], "any", false, false, true, 72), ["class" => ($context["link_class"] ?? null)]), "html", null, true);
                        yield "
    ";
                    }
                    // line 74
                    yield "  </li>
";
                    return; yield;
                })(), false))) ? '' : new Markup($tmp, $this->env->getCharset());
            }, ["item" => false, "attributes" => false, "menu_level" => false], false),
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig";
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
        return array (  173 => 74,  167 => 72,  162 => 70,  157 => 69,  155 => 68,  150 => 67,  148 => 64,  146 => 63,  144 => 60,  143 => 59,  142 => 58,  141 => 57,  140 => 56,  138 => 55,  136 => 52,  135 => 50,  133 => 49,  130 => 48,  118 => 47,  110 => 43,  100 => 41,  96 => 40,  91 => 39,  89 => 36,  88 => 35,  87 => 34,  86 => 33,  84 => 32,  81 => 31,  78 => 30,  66 => 29,  55 => 46,  50 => 27,  47 => 22,  45 => 21,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig", "/var/www/html/web/themes/contrib/bootstrap5/templates/navigation/menu--main.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 21, "macro" => 29, "if" => 31, "set" => 33, "for" => 40];
        static $filters = ["escape" => 39, "t" => 69];
        static $functions = ["link" => 69];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "import", 1 => "macro", 2 => "if", 3 => "set", 4 => "for"],
                [0 => "escape", 1 => "t"],
                [0 => "link"],
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
