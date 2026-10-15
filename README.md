# Biershop – Drupal 11 webshop



- Lokale omgeving: DDEV – <https://cms-jasperhuyghe.ddev.site>
- Gebruikershandleiding voor beheerders: [`handleiding/handleiding.html`](handleiding/handleiding.html)

## Inhoud

1. [Rollen en rechten](#rollen-en-rechten)
2. [Configuratiebeheer](#configuratiebeheer)

---



### Rollen

| Rol | Wie | Taken | Drupal-rol |
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



#### Geverifieerde gebruiker (`authenticated`)
Iedereen die ingelogd is, dus ook medewerkers. Krijgt dezelfde rechten als de anonieme gebruiker, plus:

| Recht | Waarom |
|---|---|
| `view own commerce_order` | Eigen bestellingen bekijken onder *Mijn account* (overzicht, lijst en detail) |


#### Productbeheerder (`productbeheerder`) – testaccount `productadmin`

| Groep | Rechten | Waarom |
|---|---|---|
| Producten | `access commerce_product overview`, `create/update/delete … default commerce_product`, `manage default commerce_product_variation`, `view own unpublished commerce_product` | Bieren en hun verpakkingen (variaties met prijs) beheren, ook nog niet gepubliceerde |
| Attributen | `create/update/delete/view commerce_product_attribute` | Verpakkingseenheden (fles, krat, bak) beheren |
| Indeling | `access taxonomy overview`, `create/edit terms in brouwerij, bierstijl, land_van_herkomst` | Nieuwe brouwerijen, stijlen en landen toevoegen. Bewust geen `delete terms`: een term verwijderen kan producten zonder brouwerij of stijl achterlaten. |
| Media | `access media overview`, `create image media` | Productfoto's uploaden via *Add media* |
| Beheeromgeving | `access toolbar`, `view the administration theme`, `access contextual links` | Werken in de beheeromgeving |



#### Blogbeheerder (`blogbeheerder`) – testaccount `content`

| Groep | Rechten | Waarom |
|---|---|---|
| Blog | `create/edit any/delete any blogbericht content` | Blogberichten schrijven, aanpassen en verwijderen, ook die van collega's |
| Pagina's | `create/edit any/delete any normal_page content`, `create/edit any/delete any gutenberg_page content`, `edit any landingpage content`, `edit any homepage content` | Gewone pagina's en Gutenberg-pagina's beheren. Home en de landingspagina mogen aangepast worden, maar niet aangemaakt of verwijderd: die zijn er maar één keer. |
| Editor | `use gutenberg`, `use text format basic_html`, `use text format full_html`, `use text format gutenberg` | De editors en tekstformaten gebruiken die de pagina's nodig hebben |
| Media | `access media overview`, `create image media` | Afbeeldingen uploaden |
| Overzicht en historiek | `access content overview`, `view own unpublished content`, `view all revisions` | Inhoud vinden, concepten bekijken en eerdere versies terugzien |
| Beheeromgeving | `access toolbar`, `view the administration theme`, `access contextual links` | Werken in de beheeromgeving en met het potloodje op de site |


#### Beheerder (`administrator`) – account `jasperhuyghe`
Heeft alle rechten (*is admin*). Alleen voor de eigenaar of de technische beheerder, en niet voor dagelijks werk: gebruik daarvoor een account met een van de rollen hierboven.


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



---

