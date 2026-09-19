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

### Oakville

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Oakville, MO |
| SEO title | Roofing Company in Oakville, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-oakville-mo` |
| Meta description | 1st Choice Roofing and Construction serves Oakville, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Oakville MO, roof repair Oakville, roof replacement Oakville MO, Oakville roofing contractor, storm damage roofing Oakville, South County roofing |

### O'Fallon, IL

**Second Illinois page — confirm IL licensing before publishing**, same as Collinsville. This O'Fallon is in St. Clair County, Illinois; do not confuse it with O'Fallon, MO. The two are separate pages with separate slugs, and their patterns are labelled "(Illinois)" and "(Missouri)" so they can be told apart in the inserter.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in O'Fallon, IL |
| SEO title | Roofing Company in O'Fallon, IL \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-ofallon-il` |
| Meta description | 1st Choice Roofing and Construction serves O'Fallon, IL with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company O'Fallon IL, commercial roofing O'Fallon, roof repair O'Fallon IL, roof replacement O'Fallon, O'Fallon roofing contractor, Metro East roofing, storm damage roofing O'Fallon |

### O'Fallon, MO

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in O'Fallon, MO |
| SEO title | Roofing Company in O'Fallon, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-ofallon-mo` |
| Meta description | 1st Choice Roofing and Construction serves O'Fallon, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company O'Fallon MO, commercial roofing O'Fallon, roof repair O'Fallon, roof replacement O'Fallon MO, O'Fallon roofing contractor, storm damage roofing O'Fallon |

### Overland

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Overland, MO |
| SEO title | Roofing Company in Overland, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-overland-mo` |
| Meta description | 1st Choice Roofing and Construction serves Overland, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Overland MO, roof repair Overland, roof replacement Overland MO, Overland roofing contractor, storm damage roofing Overland, brick home roofing Overland |

### Richmond Heights

Richmond Heights has **two pages** — this standard one and a commercial-focused one below. Its doc states they are deliberately separate.

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Richmond Heights, MO |
| SEO title | Roofing Company in Richmond Heights, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-richmond-heights-mo` |
| Meta description | 1st Choice Roofing and Construction serves Richmond Heights, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Richmond Heights MO, commercial roofing Richmond Heights, roof repair Richmond Heights, roof replacement Richmond Heights MO, Richmond Heights roofing contractor, storm damage roofing Richmond Heights |

### Richmond Heights — commercial focus

The second Richmond Heights page, aimed at property and facility managers. Like Earth City it has its own service list, a commercial CTA button, and a testimonial citation that names a company. Its pattern is labelled "(Commercial focus)" to distinguish it from the standard page.

| Field | Value |
|---|---|
| Page title / H1 | Commercial & Flat Roofing in Richmond Heights, MO |
| SEO title | Commercial & Flat Roofing in Richmond Heights, MO \| 1st Choice Roofing and Construction |
| URL slug | `/commercial-flat-roofing-richmond-heights-mo` |
| Meta description | 1st Choice Roofing and Construction provides commercial and flat roofing for Richmond Heights businesses — retail centers, offices, and mixed-use buildings. Repairs, replacements, and free inspections. |
| Keywords | commercial roofing Richmond Heights MO, flat roofing Richmond Heights, commercial roof repair Richmond Heights, retail roofing Richmond Heights, office building roofing Richmond Heights MO, flat roof replacement Richmond Heights |

### St. Charles

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in St. Charles, MO |
| SEO title | Roofing Company in St. Charles, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-st-charles-mo` |
| Meta description | 1st Choice Roofing and Construction serves St. Charles, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company St. Charles MO, commercial roofing St. Charles, roof repair St. Charles, roof replacement St. Charles MO, St. Charles roofing contractor, historic home roofing St. Charles, storm damage roofing St. Charles |

### St. Louis — the city

Covers the City of St. Louis rather than a suburb, so it uses a `gallery_heading` override — the default "<City> & <service area>" would have read "St. Louis & the City of St. Louis".

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in St. Louis, MO |
| SEO title | Roofing Company in St. Louis, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-st-louis-mo` |
| Meta description | 1st Choice Roofing and Construction serves the City of St. Louis with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company St. Louis MO, commercial roofing St. Louis, roof repair St. Louis, roof replacement St. Louis MO, St. Louis roofing contractor, brick home roofing St. Louis, historic home roofing St. Louis, storm damage roofing St. Louis |

### St. Peters

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in St. Peters, MO |
| SEO title | Roofing Company in St. Peters, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-st-peters-mo` |
| Meta description | 1st Choice Roofing and Construction serves St. Peters, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company St. Peters MO, commercial roofing St. Peters, roof repair St. Peters, roof replacement St. Peters MO, St. Peters roofing contractor, storm damage roofing St. Peters |

### Sunset Hills

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Sunset Hills, MO |
| SEO title | Roofing Company in Sunset Hills, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-sunset-hills-mo` |
| Meta description | 1st Choice Roofing and Construction serves Sunset Hills, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Sunset Hills MO, commercial roofing Sunset Hills, roof repair Sunset Hills, roof replacement Sunset Hills MO, Sunset Hills roofing contractor, storm damage roofing Sunset Hills |

### Town and Country

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Town and Country, MO |
| SEO title | Roofing Company in Town and Country, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-town-and-country-mo` |
| Meta description | 1st Choice Roofing and Construction serves Town and Country, MO with expert residential roofing for the area's finest homes — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Town and Country MO, roof repair Town and Country, roof replacement Town and Country MO, Town and Country roofing contractor, luxury home roofing Town and Country, estate roofing Town and Country, storm damage roofing Town and Country |

### University City

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in University City, MO |
| SEO title | Roofing Company in University City, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-university-city-mo` |
| Meta description | 1st Choice Roofing and Construction serves University City, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company University City MO, commercial roofing University City, roof repair University City, roof replacement University City MO, U City roofing contractor, historic home roofing University City, storm damage roofing University City |

### Valley Park

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Valley Park, MO |
| SEO title | Roofing Company in Valley Park, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-valley-park-mo` |
| Meta description | 1st Choice Roofing and Construction serves Valley Park, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Valley Park MO, commercial roofing Valley Park, roof repair Valley Park, roof replacement Valley Park MO, Valley Park roofing contractor, storm damage roofing Valley Park |

### Webster Groves

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Webster Groves, MO |
| SEO title | Roofing Company in Webster Groves, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-webster-groves-mo` |
| Meta description | 1st Choice Roofing and Construction serves Webster Groves, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Webster Groves MO, commercial roofing Webster Groves, roof repair Webster Groves, roof replacement Webster Groves MO, Webster Groves roofing contractor, historic home roofing Webster Groves, storm damage roofing Webster Groves |

### Wentzville

Its doc reads "a expanding base" in the services intro; corrected to "an expanding base".

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Wentzville, MO |
| SEO title | Roofing Company in Wentzville, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-wentzville-mo` |
| Meta description | 1st Choice Roofing and Construction serves Wentzville, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Wentzville MO, commercial roofing Wentzville, roof repair Wentzville, roof replacement Wentzville MO, Wentzville roofing contractor, storm damage roofing Wentzville |

### Wildwood

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Wildwood, MO |
| SEO title | Roofing Company in Wildwood, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-wildwood-mo` |
| Meta description | 1st Choice Roofing and Construction serves Wildwood, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates. |
| Keywords | roofing company Wildwood MO, commercial roofing Wildwood, roof repair Wildwood, roof replacement Wildwood MO, Wildwood roofing contractor, storm damage roofing Wildwood |

## The Service Areas hub page

`Service Areas — all locations` is a pattern like any other, but it builds its
directory from the same `firstchoice_location_data()` the city pages use. Add a
city and it appears here automatically — there is no second list to maintain.

Build it the same way as a city page:

1. New page, title **Service Areas**, slug **`/service-areas`**.
2. Insert the `Service Areas — all locations` pattern.
3. Fill in Yoast. Suggested title: *Service Areas | 1st Choice Roofing and
   Construction*. Suggested description: *1st Choice Roofing and Construction
   serves 36 communities across Jefferson County, St. Louis County and the city,
   St. Charles County, and the Metro East. Find your community.*

### Grouping

Cities are grouped by a `group` key, ordered by
`firstchoice_location_group_order()` — closest to home first — with cities
alphabetical inside each group. The groups are:

| Group | Cities |
|---|---|
| Jefferson County | 2 |
| City of St. Louis | 1 |
| South St. Louis County | 4 |
| West St. Louis County | 9 |
| Mid &amp; Central St. Louis County | 10 |
| North &amp; Northwest St. Louis County | 4 |
| St. Charles County | 4 |
| Metro East, Illinois | 2 |

The county names come from the content docs, but **which group each city falls
into is an editorial judgement, not something the docs state** — particularly
the "Mid &amp; Central" and "North &amp; Northwest" groupings. Change any city's
`group` value to re-file it; the hub and its ordering follow automatically.

Cities outside Missouri get their state appended in the directory, and the
second Richmond Heights page is labelled with its `pattern_note`, so the two
entries are distinguishable.

### Putting the pages in the menu

The location pages keep their own top-level slugs (`/roofing-arnold-mo`, not
`/service-areas/roofing-arnold-mo`), because those slugs are fixed by the SEO
fields in the tables below. **Do not set the location pages' Page Parent to
Service Areas** — that would rewrite every URL and break the SEO plan.

Nest them in the menu instead: **Appearance → Menus**, add the Service Areas
page, then add the location pages beneath it and drag each one right to indent
it as a sub-item. The menu structure is independent of the URL structure.

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
| `cta_button` | Closing CTA and hero button label; the commercial pages use their own |
| `pattern_note` | Appended to the pattern name, to tell two patterns for one city apart |
| `gallery_heading` | Overrides the default "Recent Work in &lt;City&gt; &amp; &lt;service area&gt;" |
| `group` | Which region the city files under on the Service Areas hub; defaults to `service_area` |
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

## Apostrophes

Fields printed with `esc_html()` — `city`, `cta_button`, `pattern_note` — must
use a literal `’` character, not the `&#8217;` entity, or WordPress escapes the
ampersand and the raw entity shows on the page. Body copy goes through
`wp_kses_post()`, where either form is fine.

## A note on the CSS

The parent theme sets `width: 100%` on a broad `div:not(.alignwide):not(.alignfull)`
selector, and boxes are content-box. Location components that carry padding or
need an intrinsic width therefore either set `box-sizing: border-box`, or use a
`div.class:not(.alignfull):not(.alignwide)` selector to outrank that rule. Flex
containers declare `display: flex` directly rather than relying on WordPress's
`is-layout-flex` class, so the layout holds even if block attributes are edited.
