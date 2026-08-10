# Location / Service Area Pages

Location pages are generated from block patterns registered in
`inc/location-patterns.php`. All copy comes from the Afflecto Media Marketing
location page template (v2) and the per-city content docs.

## Building a page

1. Create a new WordPress page.
2. Set the **page title** to the city's H1 (see table below). The theme renders
   the page title as the `<h1>` in the red header band, so the pattern content
   deliberately does **not** repeat it.
3. Set the **URL slug** per the table below.
4. In the editor, open the inserter → **Patterns** → **1st Choice — Location
   Pages** → pick `Location Page — <City>, MO`.
5. Fill in the Yoast fields from the table below.
6. Replace the testimonial placeholder with a real Google review.
7. Add internal links to the Residential, Storm Damage, and Contact pages.
8. Run Yoast and aim for green before publishing.

## SEO metadata

### Arnold (home base — should be the strongest local page on the site)

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Arnold, MO |
| SEO title | Roofing Company in Arnold, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-arnold-mo` |
| Meta description | 1st Choice Roofing and Construction is Arnold's local roofing company — storm damage repair, roof replacement, and free inspections for Jefferson County homeowners. Call today. |
| Keywords | roofing company Arnold MO, storm damage roofing Arnold, roof repair Arnold MO, Arnold MO roofing contractor, hail damage roof Arnold, Jefferson County roofing |

Still to add for Arnold, per the content doc: a Google Map embed and a photo of
the Arnold area or a local job site. Arnold also carries an extra storm damage
section that other cities don't.

### Affton

| Field | Value |
|---|---|
| Page title / H1 | Roofing Company in Affton, MO |
| SEO title | Roofing Company in Affton, MO \| 1st Choice Roofing and Construction |
| URL slug | `/roofing-affton-mo` |
| Meta description | Looking for a trusted roofing company in Affton, MO? 1st Choice Roofing and Construction delivers expert repairs, replacements, and storm damage service to Affton homeowners. Free estimates. |
| Keywords | roofing company Affton MO, roof repair Affton, roof replacement Affton MO, Affton roofing contractor, storm damage roofing Affton |

## Page structure

| Section | Class | Treatment |
|---|---|---|
| Intro lead | `.location-intro` | White, constrained, larger lead paragraph |
| Local / community paragraph | `.location-community` | Light grey full-width band |
| Storm damage (Arnold only) | `.location-storm` | White, red H2, checkmark list |
| Services | `.location-services` | White, two-column checkmark list |
| What sets us apart | `.location-difference` | Dark full-width band, white text |
| Warranty | `.location-warranty` | Light band, three-column terms |
| Closing CTA | `.location-cta` + `.big-red-box` | Red band, white button, phone |
| Testimonial | `.location-testimonial` + `.testimonials-section` | Reuses site testimonial styling |

## Adding another city

Add one entry to `firstchoice_location_data()` in
`inc/location-patterns.php`. The `storm` key is optional — include it only for
cities that have storm-specific copy. Everything else (warranty band, CTA
button, phone number, testimonial scaffold) is generated automatically, so no
new CSS or markup is needed.

Shared company details (phone, email, estimate and warranty link targets) live
in `firstchoice_location_company()` — update them in that one place.
