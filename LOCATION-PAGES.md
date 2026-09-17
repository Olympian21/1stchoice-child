# Location / Service Area Pages

Location pages are generated from block patterns registered in
`inc/location-patterns.php`. Copy comes from the Afflecto Media Marketing
location page docs; the layout follows the 1st Choice location page mockup.

## Building a page

1. Create a new WordPress page.
2. Set the **page title** to the city's H1 (see tables below).
3. Set the **URL slug** per the tables below.
4. In the editor, open the inserter → **Patterns** → **1st Choice — Location
   Pages** → pick `Location Page — <City>, <ST>`.
5. Fill in the Yoast fields from the tables below.
6. Replace the testimonial placeholder with a real Google review.
7. Replace the four gallery placeholders with real job photos.
8. Choose and insert the hero photo (see "Hero photo" below).
9. Add internal links to the Residential, Storm Damage, and Contact pages.
10. Run Yoast and aim for green before publishing.

### The H1 and the red title band

The hero section contains the page `<h1>`, so these pages **suppress the
theme's red title band**. That happens automatically: `functions.php` adds a
`location-page` body class whenever the page content contains the hero markup,
and the CSS hides `.entry-header-wrap` for that class. No page template to
select and no naming convention to follow.

Because the H1 is in the pattern, keep the WordPress page title identical to
the hero heading so the browser tab, admin list, and visible H1 all agree.

### Hero photo

The hero currently shows a diagonal texture and the note "Photo to be selected
— hero photo, shingle or local job site". To use a real photo, set a background
image on `.location-hero` (or add a cover block) and delete the
`.location-hero-photo-note` paragraph. Keep the overlay dark enough that the
white H1 and grey intro copy stay legible.

## Page structure

| Section | Class | Treatment |
|---|---|---|
| Hero | `.location-hero` | Dark textured band: red badge, H1, intro, red + outlined buttons |
| Trust bar | `.location-trustbar` | Black strip of gold-dotted proof points |
| Local / community | `.location-community` | White, red eyebrow, H2, copy, red-rule pull-quote |
| Storm damage | `.location-storm` | Red band; gains a card column when the city supplies `cards`; gold CTA |
| Services | `.location-services` | Light band, centered, white service cards, italic closing |
| Closing CTA | `.location-cta` | Dark band, centered, red button, phone line |
| Warranty | `.location-warranty` | White, three bordered cards with gold term badges |
| Testimonial | `.location-testimonial` | Light band, white card with gold rule |
| Recent work | `.location-gallery` | White, four dashed photo placeholders |
| Trust badges | `.location-badges` | Credential pills |

Arnold runs storm damage **before** services (its doc leads with storm); every
other city runs services first. That ordering is per-city via `order`.

Patterns are registered only on admin and REST requests, since they are used
solely by the block editor. Building twenty-plus pattern strings on every
front-end request would be wasted work.

## SEO metadata

### Arnold — home base

Arnold is 1st Choice's home city, so its hero badge reads "Home base — Arnold,
MO" and its trust bar opens with "Based in Arnold, MO". It is also the only page
with the storm damage card column. This should be the strongest, most locally
specific page on the site.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Arnold, MO |
| SEO title | Roofing Company in Arnold, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-arnold-mo` |
| Meta description | 1st Choice Roofing and Construction is Arnold's local roofing company — storm damage repair, roof replacement, and free inspections for Jefferson County homeowners. Call today. |
| Keywords | roofing company Arnold MO, storm damage roofing Arnold, roof repair Arnold MO, Arnold MO roofing contractor, hail damage roof Arnold, Jefferson County roofing |

Still outstanding for Arnold, per its content doc: a Google Map embed.

### Affton

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Affton, MO |
| SEO title | Roofing Company in Affton, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-affton-mo` |
| Meta description | Looking for a trusted roofing company in Affton, MO? 1st Choice Roofing and Construction delivers expert repairs, replacements, and storm damage service to Affton homeowners. Free estimates. |
| Keywords | roofing company Affton MO, roof repair Affton, roof replacement Affton MO, Affton roofing contractor, storm damage roofing Affton |

Affton's doc uses a different Section 1 headline than its SEO H1, so its
`intro_heading` renders as a gold kicker line under the hero H1. Affton has no
storm damage section.

### Ballwin

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Ballwin, MO |
| SEO title | Roofing Company in Ballwin, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-ballwin-mo` |
| Meta description | 1st Choice Roofing and Construction serves Ballwin homeowners and businesses with expert roof repair, replacement, and storm damage service. Local crew, free estimates. |
| Keywords | roofing company Ballwin MO, roof repair Ballwin, roof replacement Ballwin MO, commercial roofing Ballwin, storm damage roofing Ballwin, Ballwin MO roofing contractor |

### Brentwood

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Brentwood, MO |
| SEO title | Roofing Company in Brentwood, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-brentwood-mo` |
| Meta description | 1st Choice Roofing and Construction serves Brentwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Brentwood MO, commercial roofing Brentwood, roof repair Brentwood, roof replacement Brentwood MO, Brentwood roofing contractor, storm damage roofing Brentwood |

### Bridgeton

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Bridgeton, MO |
| SEO title | Roofing Company in Bridgeton, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-bridgeton-mo` |
| Meta description | 1st Choice Roofing and Construction serves Bridgeton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Bridgeton MO, commercial roofing Bridgeton, roof repair Bridgeton, roof replacement Bridgeton MO, Bridgeton roofing contractor, storm damage roofing Bridgeton |

### Chesterfield

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Chesterfield, MO |
| SEO title | Roofing Company in Chesterfield, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-chesterfield-mo` |
| Meta description | 1st Choice Roofing and Construction serves Chesterfield with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Chesterfield MO, commercial roofing Chesterfield, roof repair Chesterfield, roof replacement Chesterfield MO, Chesterfield roofing contractor, storm damage roofing Chesterfield |

### Clayton

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Clayton, MO |
| SEO title | Roofing Company in Clayton, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-clayton-mo` |
| Meta description | 1st Choice Roofing and Construction serves Clayton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Clayton MO, commercial roofing Clayton, roof repair Clayton, roof replacement Clayton MO, Clayton roofing contractor, storm damage roofing Clayton |

### Collinsville — Illinois

**Before publishing, confirm 1st Choice is licensed and insured to work in
Illinois and serves the Metro East.** Licensing and contractor requirements
differ from Missouri. This is the only page outside Missouri, and the reason the
data carries a `state` key — every "MO" on a page comes from that field.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Collinsville, IL |
| SEO title | Roofing Company in Collinsville, IL \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-collinsville-il` |
| Meta description | 1st Choice Roofing and Construction serves Collinsville, IL with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Collinsville IL, commercial roofing Collinsville, roof repair Collinsville, roof replacement Collinsville IL, Collinsville roofing contractor, Metro East roofing |

### Crestwood

Its doc drops the state from the title and H1 — kept verbatim, so this page
reads "Roofing Company in Crestwood" while the slug still ends `-mo`.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Crestwood |
| SEO title | Roofing Company in Crestwood \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-crestwood-mo` |
| Meta description | 1st Choice Roofing and Construction serves Crestwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Crestwood, commercial roofing Crestwood, roof repair Crestwood, roof replacement Crestwood, Crestwood roofing contractor, storm damage roofing Crestwood |

### Creve Coeur

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Creve Coeur, MO |
| SEO title | Roofing Company in Creve Coeur, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-creve-coeur-mo` |
| Meta description | 1st Choice Roofing and Construction serves Creve Coeur with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Creve Coeur MO, commercial roofing Creve Coeur, roof repair Creve Coeur, roof replacement Creve Coeur MO, Creve Coeur roofing contractor, storm damage roofing Creve Coeur |

### Des Peres

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Des Peres, MO |
| SEO title | Roofing Company in Des Peres, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-des-peres-mo` |
| Meta description | 1st Choice Roofing and Construction serves Des Peres with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Des Peres MO, commercial roofing Des Peres, roof repair Des Peres, roof replacement Des Peres MO, Des Peres roofing contractor, storm damage roofing Des Peres |

### Earth City — commercial focus

Earth City is an all-commercial industrial district with essentially no
residential population, so this page is commercial-first by design: its own
service list, no residential copy, a "Request a Free Commercial Roof
Inspection" button via `cta_button`, and a testimonial citation that names a
company via `testimonial_cite`. Its visible H1 uses "Commercial & Flat
Roofing"; the SEO title drops the ampersand, per the doc.

| Field | Value |
|---|---|
| Page title / H1 | Commercial Flat Roofing in Earth City, MO |
| SEO title | Commercial Flat Roofing in Earth City, MO \| 1st Choice Roofing and Construction |
| URL slug | `/commercial-flat-roofing-earth-city-mo` |
| Meta description | 1st Choice Roofing and Construction provides commercial and flat roofing for Earth City businesses — warehouses, offices, and industrial buildings. Repairs, replacements, and free inspections. |
| Keywords | commercial roofing Earth City MO, flat roofing Earth City, commercial roof repair Earth City, warehouse roofing Earth City, industrial roofing Earth City MO, flat roof replacement Earth City |

### Ellisville

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Ellisville, MO |
| SEO title | Roofing Company in Ellisville, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-ellisville-mo` |
| Meta description | 1st Choice Roofing and Construction serves Ellisville with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Ellisville MO, commercial roofing Ellisville, roof repair Ellisville, roof replacement Ellisville MO, Ellisville roofing contractor, storm damage roofing Ellisville |

### Fenton

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Fenton, MO |
| SEO title | Roofing Company in Fenton, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-fenton-mo` |
| Meta description | 1st Choice Roofing and Construction serves Fenton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Fenton MO, commercial roofing Fenton, roof repair Fenton, roof replacement Fenton MO, Fenton roofing contractor, storm damage roofing Fenton |

### Hazelwood

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Hazelwood, MO |
| SEO title | Roofing Company in Hazelwood, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-hazelwood-mo` |
| Meta description | 1st Choice Roofing and Construction serves Hazelwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Hazelwood MO, commercial roofing Hazelwood, roof repair Hazelwood, roof replacement Hazelwood MO, Hazelwood roofing contractor, industrial roofing Hazelwood, storm damage roofing Hazelwood |

### High Ridge

Like Arnold, High Ridge is in Jefferson County and its doc asks to lean into
storm response. It currently follows its doc's own order (services, then
storm). If you want it to lead with storm damage the way Arnold does, that is a
one-line `order` change.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in High Ridge, MO |
| SEO title | Roofing Company in High Ridge, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-high-ridge-mo` |
| Meta description | 1st Choice Roofing and Construction serves High Ridge with expert residential and commercial roofing — storm damage repair, replacements, and free inspections. Jefferson County's local roofer. |
| Keywords | roofing company High Ridge MO, roof repair High Ridge, roof replacement High Ridge MO, High Ridge roofing contractor, storm damage roofing High Ridge, Jefferson County roofing |

### Kirkwood

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Kirkwood, MO |
| SEO title | Roofing Company in Kirkwood, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-kirkwood-mo` |
| Meta description | 1st Choice Roofing and Construction serves Kirkwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Kirkwood MO, commercial roofing Kirkwood, roof repair Kirkwood, roof replacement Kirkwood MO, Kirkwood roofing contractor, historic home roofing Kirkwood, storm damage roofing Kirkwood |

### Ladue

Like Affton, its Section 1 headline differs from its H1, so "An Experienced
Roofing Company in Ladue" renders as the gold kicker under the hero heading.
Its H1 also omits the state, kept verbatim.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Ladue |
| SEO title | Roofing Company in Ladue \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-ladue-mo` |
| Meta description | 1st Choice Roofing and Construction serves Ladue with expert residential and commercial roofing — repairs, replacements, and storm damage service for the area's finest homes. Free estimates. |
| Keywords | roofing company Ladue, roof repair Ladue, roof replacement Ladue, Ladue roofing contractor, luxury home roofing Ladue, estate roofing Ladue, storm damage roofing Ladue |

### Manchester

**Its source doc is unfinished.** The storm damage section ends mid-sentence
("...offers free inspections for Manchester homeowners and businesses"). Rather
than invent an ending, the page carries a visible `[ COPY INCOMPLETE ]` marker
at that point. Someone needs to finish that paragraph before this page goes
live.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Manchester, MO |
| SEO title | Roofing Company in Manchester, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-manchester-mo` |
| Meta description | 1st Choice Roofing and Construction serves Manchester with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Manchester MO, commercial roofing Manchester, roof repair Manchester, roof replacement Manchester MO, Manchester roofing contractor, storm damage roofing Manchester |

### Maryland Heights

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Maryland Heights, MO |
| SEO title | Roofing Company in Maryland Heights, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-maryland-heights-mo` |
| Meta description | 1st Choice Roofing and Construction serves Maryland Heights with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Maryland Heights MO, commercial roofing Maryland Heights, roof repair Maryland Heights, roof replacement Maryland Heights MO, Maryland Heights roofing contractor, storm damage roofing Maryland Heights |

## Adding another city

Add one entry to `firstchoice_location_data()` in
`inc/location-patterns.php`. Everything shared — hero buttons, trust bar,
warranty cards, gallery placeholders, trust badges, phone number — is generated
automatically, so no new CSS or markup is needed.

Required keys: `city`, `slug`, `h1`, `seo`, `service_area`, `intro`,
`community`, `services`, `cta`, `region`.

Optional keys that absorb the variation between content docs:

| Key | Use |
|---|---|
| `state` | Two-letter abbreviation, defaults to `MO`. Set `IL` for Collinsville |
| `cta_button` | Closing CTA and hero button label; Earth City uses a commercial one |
| `testimonial_cite` | Text after the reviewer name; Earth City names a company |
| `home_base` | Arnold only; changes the hero badge and first trust bar item |
| `intro_heading` | Gold kicker under the H1, when Section 1's headline differs from the H1 |
| `community.eyebrow` | Overrides the default "Proud to serve &lt;City&gt;" |
| `community.pull_quote` | Paragraph promoted to the red-rule callout |
| `services.eyebrow` | Overrides the default "Our services" |
| `services.difference` | A string, or an array for multiple closing paragraphs |
| `storm` | Omit for cities with no storm copy; `cards` and `closing` are each optional |
| `order` | Reorder sections when a doc doesn't follow the default flow |

Shared company details (phone, email, estimate and warranty link targets) live
in `firstchoice_location_company()` — update them in that one place. The
credential list is in `firstchoice_location_trust_badges()`, and the warranty
terms are in `firstchoice_location_warranty_terms()`.

## A note on the CSS

The parent theme sets `width: 100%` on a broad `div:not(.alignwide):not(.alignfull)`
selector, and boxes are content-box. Location components that carry padding or
need an intrinsic width therefore either set `box-sizing: border-box`, or use a
`div.class:not(.alignfull):not(.alignwide)` selector to outrank that rule. Flex
containers declare `display: flex` directly rather than relying on WordPress's
`is-layout-flex` class, so the layout holds even if block attributes are edited.
