# Biershop – Drupal 11 webshop

Webshop voor Belgische speciaalbieren, gebouwd met Drupal 11, Drupal Commerce 3 en een eigen thema (`biershop_thema`, gebaseerd op Bootstrap 5).

- Lokale omgeving: DDEV – <https://cms-jasperhuyghe.ddev.site>
- Gebruikershandleiding voor beheerders: [`handleiding/handleiding.html`](handleiding/handleiding.html)

## Inhoud

1. [Rollen en rechten](#rollen-en-rechten)
2. [Configuratiebeheer](#configuratiebeheer)

---

## Rollen en rechten

### Uitgangspunten

- **Minste rechten (least privilege).** Elke rol krijgt alleen wat nodig is voor de eigen taak. Wie producten beheert, kan geen blogberichten aanpassen, en omgekeerd.
- **Scheiding tussen winkel en inhoud.** Het assortiment (prijzen, verpakkingen, brouwerijen) en de redactionele inhoud (blog, pagina's) zijn aparte verantwoordelijkheden met elk een eigen rol.
- **De klant krijgt nooit beheerrechten.** Wat een klant mag (kopen, eigen bestellingen zien), hoort bij de basisrollen *Anonieme gebruiker* en *Geverifieerde gebruiker*. Klanten zien geen beheeromgeving.
- **Beheeromgeving apart.** Medewerkers werken in het beheerthema (Claro) en zien die omgeving in het Engels. De website zelf is voor iedereen Nederlandstalig.

### Rollen in het bedrijf

| Rol in het bedrijf | Wie | Taken | Drupal-rol |
|---|---|---|---|
| Bezoeker | Iedereen die de site bezoekt zonder in te loggen | Bieren bekijken en zoeken, blog lezen, bestellen als gast | *Anonieme gebruiker* |
| Klant | Bezoeker met een account | Alles van een bezoeker, plus eigen bestellingen bekijken en e-mailadres of wachtwoord wijzigen | *Geverifieerde gebruiker* (+ *klant*) |
| Productbeheerder | Medewerker die het assortiment beheert | Bieren, prijzen en verpakkingen toevoegen, aanpassen of verwijderen; brouwerijen, bierstijlen en landen beheren; productfoto's uploaden | *Productbeheerder* |
| Contentbeheerder | Medewerker die de communicatie verzorgt | Blogberichten schrijven, pagina's (ook met Gutenberg) maken en aanpassen, afbeeldingen uploaden | *Blogbeheerder* |
| Eigenaar / websitebeheerder | De eigenaar of de technische beheerder | Alles: instellingen, betaal- en verzendmethodes, rollen en gebruikers, modules | *Beheerder* |

### Drupal-rollen in detail

#### Anonieme gebruiker (`anonymous`)
Bezoekers die niet ingelogd zijn.

| Recht | Waarom |
|---|---|
| `access content`, `view commerce_product`, `view media` | De website, de bieren en hun foto's bekijken |
| `search content` | De zoekbalk gebruiken |
| `access checkout`, `view commerce_shipping_method` | Afrekenen als gast, inclusief de keuze van verzending |

Bewust **niet**: een account aanmaken via `/user/register`. Registratie staat op *Admins only*; klanten kunnen wel een account aanmaken na hun eerste bestelling, op de bevestigingspagina.

#### Geverifieerde gebruiker (`authenticated`)
Iedereen die ingelogd is, dus ook medewerkers. Krijgt dezelfde rechten als de anonieme gebruiker, plus:

| Recht | Waarom |
|---|---|
| `view own commerce_order` | Eigen bestellingen bekijken onder *Mijn account* (overzicht, lijst en detail) |

Het wijzigen van het eigen e-mailadres en wachtwoord hoeft niet als recht toegekend te worden: Drupal laat elke gebruiker het eigen account bewerken, mits het huidige wachtwoord ingevuld wordt.

#### Productbeheerder (`productbeheerder`) – testaccount `productadmin`

| Groep | Rechten | Waarom |
|---|---|---|
| Producten | `access commerce_product overview`, `create/update/delete … default commerce_product`, `manage default commerce_product_variation`, `view own unpublished commerce_product` | Bieren en hun verpakkingen (variaties met prijs) beheren, ook nog niet gepubliceerde |
| Attributen | `create/update/delete/view commerce_product_attribute` | Verpakkingseenheden (fles, krat, bak) beheren |
| Indeling | `access taxonomy overview`, `create/edit terms in brouwerij, bierstijl, land_van_herkomst` | Nieuwe brouwerijen, stijlen en landen toevoegen. Bewust geen `delete terms`: een term verwijderen kan producten zonder brouwerij of stijl achterlaten. |
| Media | `access media overview`, `create image media` | Productfoto's uploaden via *Add media* |
| Beheeromgeving | `access toolbar`, `view the administration theme`, `access contextual links` | Werken in de beheeromgeving |

Bewust **niet**: inhoud (blog, pagina's), gebruikers, rollen, modules, betaal- of verzendmethodes.

> **Aandachtspunt.** Deze rol heeft momenteel ook een aantal brede beheerrechten die niet nodig zijn voor het dagelijkse productbeheer: `administer commerce_order`, `administer commerce_checkout_flow`, `administer commerce_order_type`, `administer commerce_product_type`, `administer commerce_store(_type)` en de rechten om velden en weergaves van entiteiten te beheren (`administer … fields / display / form display`). Daarmee kan een productbeheerder de structuur van de winkel of de checkout wijzigen. **Aanbeveling:** die rechten weghalen, of verplaatsen naar een aparte rol *Orderbeheerder* (zie verder).

#### Blogbeheerder (`blogbeheerder`) – testaccount `content`

| Groep | Rechten | Waarom |
|---|---|---|
| Blog | `create/edit any/delete any blogbericht content` | Blogberichten schrijven, aanpassen en verwijderen, ook die van collega's |
| Pagina's | `create/edit any/delete any normal_page content`, `create/edit any/delete any gutenberg_page content`, `edit any landingpage content`, `edit any homepage content` | Gewone pagina's en Gutenberg-pagina's beheren. Home en de landingspagina mogen aangepast worden, maar niet aangemaakt of verwijderd: die zijn er maar één keer. |
| Editor | `use gutenberg`, `use text format basic_html`, `use text format full_html`, `use text format gutenberg` | De editors en tekstformaten gebruiken die de pagina's nodig hebben |
| Media | `access media overview`, `create image media` | Afbeeldingen uploaden |
| Overzicht en historiek | `access content overview`, `view own unpublished content`, `view all revisions` | Inhoud vinden, concepten bekijken en eerdere versies terugzien |
| Beheeromgeving | `access toolbar`, `view the administration theme`, `access contextual links` | Werken in de beheeromgeving en met het potloodje op de site |

Bewust **niet**: producten, prijzen, bestellingen, gebruikers en instellingen. `full_html` is toegestaan omdat de footer en enkele pagina's het gebruiken. Dit formaat laat alle HTML toe en hoort daarom alleen bij vertrouwde medewerkers.

#### Beheerder (`administrator`) – account `jasperhuyghe`
Heeft alle rechten (*is admin*). Alleen voor de eigenaar of de technische beheerder, en niet voor dagelijks werk: gebruik daarvoor een account met een van de rollen hierboven.

#### Niet (meer) gebruikte rollen

| Rol | Stand | Aanbeveling |
|---|---|---|
| `klant` | Bestaat, 0 rechten, 0 gebruikers. Klanten krijgen hun rechten via *Geverifieerde gebruiker*. | Behouden als label om klanten te onderscheiden van medewerkers, of verwijderen |
| `content_editor` (*Redacteur*) | Standaardrol van Drupal, 0 rechten, 0 gebruikers. Vervangen door *Blogbeheerder*. | Verwijderen |
| `werknemer` | 0 rechten, 0 gebruikers | Verwijderen, of omvormen tot *Orderbeheerder* |

### Mogelijke uitbreiding: Orderbeheerder

Bestellingen verwerken is nu alleen mogelijk voor de beheerder (en, te ruim, voor de productbeheerder). In een groeiende winkel is dat een aparte taak:

| Recht | Waarom |
|---|---|
| `access commerce_order overview`, `view commerce_order` | Bestellingen opzoeken en bekijken |
| `update default commerce_order` | Status aanpassen, bijvoorbeeld verzonden of geannuleerd |
| `access toolbar`, `view the administration theme` | Werken in de beheeromgeving |

### Rechtenoverzicht

| Kan… | Bezoeker | Klant | Productbeheerder | Blogbeheerder | Beheerder |
|---|:-:|:-:|:-:|:-:|:-:|
| Bieren bekijken, zoeken en filteren | ✓ | ✓ | ✓ | ✓ | ✓ |
| Bestellen (gast of met account) | ✓ | ✓ | ✓ | ✓ | ✓ |
| Eigen bestellingen bekijken | – | ✓ | ✓ | ✓ | ✓ |
| Eigen e-mailadres en wachtwoord wijzigen | – | ✓ | ✓ | ✓ | ✓ |
| Producten, prijzen en verpakkingen beheren | – | – | ✓ | – | ✓ |
| Brouwerijen, stijlen en landen toevoegen | – | – | ✓ | – | ✓ |
| Blogberichten en pagina's beheren | – | – | – | ✓ | ✓ |
| Afbeeldingen uploaden | – | – | ✓ | ✓ | ✓ |
| Drempel gratis levering en overzicht | – | – | – | – | ✓ |
| Betaal- en verzendmethodes, gebruikers, rollen, modules | – | – | – | – | ✓ |

Alle toegangen zijn getest door met elk testaccount de beheerpagina's op te vragen. Pagina's buiten de eigen taak geven *403 Geen toegang*.

---

## Configuratiebeheer

De configuratie van de site (inhoudstypes, views, blokken, rollen, betaal- en verzendmethodes, vertalingen, …) staat als YAML in [`config/sync`](config/sync), buiten de webroot.

```bash
# Na een wijziging in de beheeromgeving: configuratie exporteren
ddev drush config:export

# Na het binnenhalen van code: database-updates en configuratie importeren
ddev composer install
ddev drush deploy        # updatedb + config:import + cache:rebuild
```

Geheimen staan **niet** in de configuratie. De PayPal-sandbox (Client ID en Secret) staat in `web/sites/default/settings.local.php`, dat niet in Git staat. Voor een nieuwe omgeving maak je dat bestand aan met:

```php
$config['commerce_payment.commerce_payment_gateway.paypal']['configuration']['client_id'] = '…';
$config['commerce_payment.commerce_payment_gateway.paypal']['configuration']['secret'] = '…';
```
