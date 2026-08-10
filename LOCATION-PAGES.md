# Location / Service Area Pages

Location pages are generated from block patterns registered in
`inc/location-patterns.php`. Copy comes from the Afflecto Media Marketing
location page docs; the layout follows the 1st Choice location page mockup.

## Building a page

1. Create a new WordPress page.
2. Set the **page title** to the city's H1 (see tables below).
3. Set the **URL slug** per the tables below.
4. In the editor, open the inserter → **Patterns** → **1st Choice — Location
   Pages** → pick `Location Page — <City>, MO`.
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
