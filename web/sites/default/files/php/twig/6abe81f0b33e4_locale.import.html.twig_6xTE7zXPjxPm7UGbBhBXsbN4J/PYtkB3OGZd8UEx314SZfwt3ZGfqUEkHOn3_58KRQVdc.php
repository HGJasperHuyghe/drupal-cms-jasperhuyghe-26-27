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

/* @help_topics/locale.import.html.twig */
class __TwigTemplate_05b5b4f347b1a277ef2456593f2bcfd1 extends Template
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
        // line 8
        $context["import_text"] = ('' === $tmp = implode('', iterator_to_array((function () use (&$context, $macros, $blocks) {
            yield t("Import", []);
            return; yield;
        })(), false))) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 9
        $context["import_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink(($context["import_text"] ?? null), "locale.translate_import"));
        // line 10
        yield "<h2>";
        yield t("Goal", []);
        yield "</h2>
<p>";
        // line 11
        yield t("Import a file (.po extension) containing translations for user interface text.", []);
        yield "</p>
<h2>";
        // line 12
        yield t("Steps", []);
        yield "</h2>
<ol>
  <li>";
        // line 14
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>Configuration</em> &gt; <em>Region and language</em> &gt; <em>User interface translation</em> &gt; @import_link.", ["@import_link" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(($context["import_link"] ?? null)), ]);
        yield "</li>
  <li>";
        // line 15
        yield t("Browse to find the <em>Translation file</em> you want to import. Select the language and check the desired import options.", []);
        yield "</li>
  <li>";
        // line 16
        yield t("Click <em>Import</em> and wait for your file to be imported.", []);
        yield "</li>
</ol>";
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@help_topics/locale.import.html.twig";
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
        return array (  74 => 16,  70 => 15,  66 => 14,  61 => 12,  57 => 11,  52 => 10,  50 => 9,  45 => 8,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@help_topics/locale.import.html.twig", "/var/www/html/web/core/modules/locale/help_topics/locale.import.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 8, "trans" => 8];
        static $filters = ["escape" => 14];
        static $functions = ["render_var" => 9, "help_route_link" => 9];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "trans"],
                [0 => "escape"],
                [0 => "render_var", 1 => "help_route_link"],
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
