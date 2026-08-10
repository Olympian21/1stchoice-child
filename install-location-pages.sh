#!/bin/sh
# Self-contained installer for the 1st Choice location page patterns.
#
#   1. Put this ONE file anywhere inside your 1stchoice-child folder.
#   2. Run:  sh install-location-pages.sh
#
# Everything it needs is embedded, so the filename does not matter and there
# are no other files to download. Safe to run more than once.

set -e

if [ ! -f style.css ] || [ ! -f functions.php ]; then
	echo "ERROR: run this from inside the 1stchoice-child folder"
	echo "       (the one containing style.css and functions.php)."
	exit 1
fi

if ! grep -q "1st Choice Child" style.css; then
	echo "ERROR: style.css does not look like the 1st Choice child theme."
	exit 1
fi

if ! command -v python3 >/dev/null 2>&1; then
	echo "ERROR: python3 is required. Install it with:  sudo apt install python3 -y"
	exit 1
fi

WORK=$(mktemp -d)
trap 'rm -rf "$WORK"' EXIT

# ---------------------------------------------------------------- pattern file
cat > "$WORK/location-patterns.php" <<'__FC_PATTERNS_EOF__'
<?php
/**
 * Location / service area page block patterns.
 *
 * Each city is a data array; the pattern markup is generated from it, so adding
 * a new service area page means adding one entry to firstchoice_location_data().
 *
 * Content source: Afflecto Media Marketing location page docs.
 * Design source: 1st Choice location page mockup (hero, trust bar, red storm
 * band, service cards, dark CTA, warranty cards, gallery, trust badges).
 *
 * @package Yo_Base_Layer
 */

/**
 * Shared company details used across every location page.
 */
function firstchoice_location_company() {
	return array(
		'phone'      => '636-282-0090',
		'phone_href' => '+16362820090',
		'email'      => 'first@1stchoicestl.com',
		'estimate'   => '/contact/',
		'warranty'   => '/warranty/',
	);
}

/**
 * Warranty terms shown in the design block on every location page.
 */
function firstchoice_location_warranty_terms() {
	return array(
		array(
			'num'   => '10',
			'term'  => __( '10 years', 'firstchoice' ),
			'label' => __( 'Roof replacements', 'firstchoice' ),
		),
		array(
			'num'   => '3',
			'term'  => __( '3 years', 'firstchoice' ),
			'label' => __( 'Siding', 'firstchoice' ),
		),
		array(
			'num'   => '1',
			'term'  => __( '1 year', 'firstchoice' ),
			'label' => __( 'Gutters &amp; repairs', 'firstchoice' ),
		),
	);
}

/**
 * Credentials shown in the trust badge bar at the foot of every location page.
 */
function firstchoice_location_trust_badges() {
	return array(
		'GAF Certified',
		'BBB A+ Rating',
		'Owens Corning',
		'National Roofing Contractors Assoc.',
		'St. Louis Apartment Assoc.',
	);
}

/**
 * Placeholder captions for the "recent work" gallery.
 *
 * These are intentionally obvious — swap in real job photos before publishing.
 */
function firstchoice_location_gallery_slots( $city ) {
	return array(
		array(
			'caption' => sprintf( 'Real photo — completed %s job site', $city ),
			'size'    => 'wide',
		),
		array(
			'caption' => 'Real photo — crew on site',
			'size'    => 'wide',
		),
		array(
			'caption' => 'Real photo — before / after',
			'size'    => 'narrow',
		),
		array(
			'caption' => 'Real photo — storm damage repair',
			'size'    => 'narrow',
		),
	);
}

/**
 * Per-city page content.
 *
 * Required keys:
 *   city, slug, h1, seo, intro, community, services, cta, region, service_area
 *
 * Optional keys:
 *   home_base         - true for Arnold; changes the hero badge and trust bar
 *   intro_heading     - H2 above the intro, when Section 1's headline differs
 *                       from the H1
 *   community_eyebrow - defaults to "Proud to serve <City>"
 *   pull_quote        - community paragraph promoted to a red-rule callout
 *   services_eyebrow  - defaults to "Our services"
 *   storm             - omit for cities with no storm copy; its `cards` and
 *                       `closing` are each optional
 *   order             - section order. Docs vary: Arnold runs storm before
 *                       services, the rest run services first.
 */
function firstchoice_location_data() {
	$cities = array();

	/* Shared service list used by the commercial-corridor cities. */
	$commercial_services = array(
		'Commercial roof replacement and repair',
		'Flat and low-slope roofing systems for commercial properties',
		'Roof inspections and maintenance plans for property managers and owners',
		'Residential roof replacement and repair',
		'Storm and hail damage repair — residential and commercial',
		'Siding replacement',
		'Gutters and downspouts',
		'Free inspections and estimates',
	);

	/* Services-first order, used by every city except Arnold. */
	$services_first = array( 'hero', 'trustbar', 'community', 'services', 'storm', 'cta', 'warranty', 'testimonial', 'gallery', 'badges' );

	$cities['arnold'] = array(
		'city'         => 'Arnold',
		'slug'         => 'arnold',
		'h1'           => 'Roofing Company in Arnold, MO',
		'home_base'    => true,
		'service_area' => 'Jefferson County',
		'seo'          => array(
			'title'       => 'Roofing Company in Arnold, MO | 1st Choice Roofing and Construction',
			'description' => "1st Choice Roofing and Construction is Arnold's local roofing company — storm damage repair, roof replacement, and free inspections for Jefferson County homeowners. Call today.",
			'slug'        => '/roofing-arnold-mo',
			'keywords'    => 'roofing company Arnold MO, storm damage roofing Arnold, roof repair Arnold MO, Arnold MO roofing contractor, hail damage roof Arnold, Jefferson County roofing',
		),
		'intro'        => array(
			'Arnold homeowners and commercial property owners know better than most what Missouri storms can do to a roof. 1st Choice Roofing and Construction is based right here in Arnold, protecting Jefferson County homes and businesses with quality craftsmanship and honest service.',
		),
		'community'    => array(
			'eyebrow'    => 'Arnold&#8217;s hometown roofing company',
			'heading'    => 'Arnold&#8217;s Hometown Roofing Company',
			'paragraphs' => array(
				'Arnold is Jefferson County&#8217;s largest city — a family-friendly community where well-kept neighborhoods, top-rated Fox C-6 schools, and easy access to I-55 make it one of the best places to live in the St. Louis area. Residents here own their homes, invest in their properties, and expect the same high standards from the contractors they hire.',
				'They also know the weather. Arnold sits in a corridor that takes a direct hit from Missouri&#8217;s worst storms season after season. In March 2025 alone, an EF-2 tornado tracked from Hillsboro directly through Jefferson County into Arnold. It tore roofs off homes, snapped trees, and left hundreds of structures damaged in a single night. The destruction was severe enough that Governor Kehoe personally toured the area to assess the damage.',
			),
			'pull_quote' => 'When Arnold gets hit, 1st Choice is on the ground fast — inspecting damage, documenting it for insurance, and getting to work before the next round of rain comes through.',
		),
		'storm'        => array(
			'heading' => 'Arnold&#8217;s Storm Damage Roofing Specialists',
			'intro'   => array(
				'Storm damage doesn&#8217;t always look like a missing roof. Often it&#8217;s subtler — cracked or bruised shingles from hail, lifted flashing from high winds, damaged decking that won&#8217;t show up as a leak until the next heavy rain. If you experienced a storm and haven&#8217;t had your roof inspected, you may be sitting on damage you don&#8217;t know about yet.',
				'1st Choice Roofing and Construction provides free post-storm roof inspections for Arnold and Jefferson County homeowners. We document everything, walk you through what we find, and work directly with your insurance adjuster to make the claims process as smooth as possible.',
			),
			'closing' => 'We&#8217;ve helped Arnold homeowners and property owners navigate storm damage claims and get back under a solid roof. If your home or business was in the path of a recent storm, don&#8217;t wait — call us for a free inspection before filing your claim.',
			'cards'   => array(
				'Free storm damage inspections',
				'Hail and wind damage assessment and repair',
				'Emergency tarping and temporary protection',
				'Full roof replacement for storm-totaled roofs',
				'Insurance claim documentation and adjuster coordination',
				'Residential and commercial storm damage repair',
			),
		),
		'services'     => array(
			'eyebrow'    => 'Beyond storm response',
			'heading'    => 'Complete Roofing Services for Arnold, MO',
			'intro'      => 'Beyond storm response, we offer a full range of roofing services to keep Arnold properties protected year-round:',
			'list'       => array(
				'Residential roof replacement',
				'Roof repair — leaks, missing shingles, flashing',
				'Commercial roofing',
				'Flat roofing systems',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => 'Every job comes with transparent estimates, premium materials backed by manufacturer warranties, and a crew that stands behind their work. No surprises on your invoice. No shortcuts on your roof.',
		),
		'cta'          => array(
			'heading'   => 'Arnold&#8217;s Roofing Company — Right Here When You Need Us',
			'paragraph' => 'Whether you&#8217;re dealing with fresh storm damage or your roof has simply reached the end of its lifespan, 1st Choice Roofing and Construction is ready to help. We&#8217;re local, we&#8217;re experienced, and we&#8217;re committed to doing the job right the first time — every time.',
		),
		'region'       => 'Proudly serving Arnold and Jefferson County',
		// Arnold leads with storm damage; every other city leads with services.
		'order'        => array( 'hero', 'trustbar', 'community', 'storm', 'services', 'cta', 'warranty', 'testimonial', 'gallery', 'badges' ),
	);

	$cities['affton'] = array(
		'city'          => 'Affton',
		'slug'          => 'affton',
		'h1'            => 'Roofing Company in Affton, MO',
		'service_area'  => 'South St. Louis County',
		'seo'           => array(
			'title'       => 'Roofing Company in Affton, MO | 1st Choice Roofing and Construction',
			'description' => 'Looking for a trusted roofing company in Affton, MO? 1st Choice Roofing and Construction delivers expert repairs, replacements, and storm damage service to Affton homeowners. Free estimates.',
			'slug'        => '/roofing-affton-mo',
			'keywords'    => 'roofing company Affton MO, roof repair Affton, roof replacement Affton MO, Affton roofing contractor, storm damage roofing Affton',
		),
		'intro_heading' => 'Residential and Commercial Roofing in Affton',
		'intro'         => array(
			'Missouri weather doesn&#8217;t take it easy on a roof — hail, high winds, ice, and long stretches of summer heat add up fast. When it&#8217;s time for a repair or a full residential or commercial roof replacement, Affton homeowners need a roofing company they can count on.',
		),
		'community'     => array(
			'heading'    => 'Proud to Serve Affton for Residential and Commercial Roof Repair and Replacement',
			'paragraphs' => array(
				'Affton has always been one of those south St. Louis County communities that people don&#8217;t leave — and for good reason. It&#8217;s a neighborhood where families put down roots, homeowners take pride in their properties, and the community feel is something you don&#8217;t easily find closer to the city. From well-kept ranches and brick homes built in the mid-century to newer builds near Grant&#8217;s Farm, Affton&#8217;s housing stock reflects the kind of community that invests in where they live.',
			),
			'pull_quote' => 'That&#8217;s exactly the kind of neighborhood 1st Choice Roofing and Construction is proud to serve. Whether you&#8217;re dealing with storm damage, an aging roof that&#8217;s past its prime, or just want a straight answer about what your roof actually needs — our team is ready to help Affton homeowners protect what they&#8217;ve worked hard for.',
		),
		'services'      => array(
			'heading'    => 'Roofing Services in Affton',
			'intro'      => 'We offer a full range of residential and commercial roofing services to Affton homeowners and property owners, including:',
			'list'       => array(
				'Residential roof replacement',
				'Roof repair — leaks, flashing, missing shingles',
				'Storm and hail damage repair',
				'Commercial roof replacement',
				'Flat roofing systems',
				'Free inspections and estimates',
			),
			'difference' => 'What sets us apart: an experienced crew, transparent estimates with no surprise charges, premium materials backed by manufacturer warranties, and insurance claim assistance when you need it. When you call 1st Choice, you get accountability from the first call to the final walkthrough.',
		),
		'cta'           => array(
			'heading'   => 'Serving Affton and the Greater St. Louis Area',
			'paragraph' => 'Don&#8217;t wait on roofing problems — they only get worse. Contact 1st Choice Roofing and Construction today for your free estimate and experience the difference of working with a crew that does the job right the first time.',
		),
		'region'        => 'Proudly serving Affton and south St. Louis County',
		'order'         => $services_first,
	);

	$cities['ballwin'] = array(
		'city'         => 'Ballwin',
		'slug'         => 'ballwin',
		'h1'           => 'Roofing Company in Ballwin, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Ballwin, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Ballwin homeowners and businesses with expert roof repair, replacement, and storm damage service. Local crew, free estimates.',
			'slug'        => '/roofing-ballwin-mo',
			'keywords'    => 'roofing company Ballwin MO, roof repair Ballwin, roof replacement Ballwin MO, commercial roofing Ballwin, storm damage roofing Ballwin, Ballwin MO roofing contractor',
		),
		'intro'        => array(
			'Ballwin is one of St. Louis County&#8217;s most sought-after communities — well-maintained neighborhoods, top-rated schools, and the kind of pride in property that raises the bar for every contractor who works here. Ballwin homeowners and business owners aren&#8217;t just looking for the lowest bid. They&#8217;re looking for a crew they can trust to do the job right and stand behind it.',
		),
		'community'    => array(
			'heading'    => 'Roofing Ballwin Homeowners and Businesses Can Count On',
			'paragraphs' => array(
				'Ballwin has been one of West County&#8217;s premier communities for decades — a place where tree-lined streets, classic brick and Colonial Revival homes, and a genuine sense of community make it easy to see why families put down roots and stay. With top-performing Rockwood and Parkway school districts, beautiful parks like Castlewood and Queeny, and a thriving commercial corridor along Manchester Road, Ballwin has everything residents need close by.',
			),
			'pull_quote' => 'That same investment in quality extends to the properties themselves. Whether it&#8217;s a full residential replacement or a commercial flat roof that needs attention, we bring the craftsmanship and accountability that Ballwin expects.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Ballwin, MO',
			'intro'      => 'From single-family homes to retail centers, office buildings, and multi-unit properties along the West County corridor, 1st Choice handles roofing for both residential and commercial clients in Ballwin. Our full range of services includes:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Storm and hail damage repair — residential and commercial',
				'Roof inspections and assessments for property managers and owners',
				'Siding replacement',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => array(
				'Commercial property owners and managers in Ballwin know that a roofing problem doesn&#8217;t just affect one unit — it affects tenants, operations, and the bottom line. We work efficiently to minimize disruption, communicate clearly throughout the project, and deliver results that protect your investment for the long haul.',
				'For residential clients, every job comes with transparent estimates, premium materials backed by manufacturer warranties, and a crew that shows up and follows through. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing for Ballwin Homes and Businesses',
			'intro'   => array(
				'West St. Louis County isn&#8217;t immune to Missouri&#8217;s severe weather. Hail, high winds, and fast-moving storms can leave behind damage that&#8217;s not always obvious from the ground — bruised shingles, lifted flashing, and compromised decking that won&#8217;t reveal itself until the next heavy rain.',
				'1st Choice Roofing and Construction provides free post-storm inspections for Ballwin homeowners and commercial property owners. We document all damage thoroughly, walk you through our findings, and work directly with your insurance adjuster to help the claims process move as smoothly as possible. If your property took a hit, don&#8217;t wait — call us before you file.',
			),
		),
		'cta'          => array(
			'heading'   => 'Serving Ballwin Homes and Businesses — Done Right the First Time',
			'paragraph' => 'Whether you&#8217;re a Ballwin homeowner due for a roof replacement, a property manager with a commercial building that needs attention, or a business owner dealing with post-storm damage, 1st Choice Roofing and Construction is ready to help. We&#8217;re local, experienced, and committed to the kind of quality that Ballwin expects.',
		),
		'region'       => 'Serving Ballwin and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['brentwood'] = array(
		'city'         => 'Brentwood',
		'slug'         => 'brentwood',
		'h1'           => 'Roofing Company in Brentwood, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Brentwood, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Brentwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-brentwood-mo',
			'keywords'    => 'roofing company Brentwood MO, commercial roofing Brentwood, roof repair Brentwood, roof replacement Brentwood MO, Brentwood roofing contractor, storm damage roofing Brentwood',
		),
		'intro'        => array(
			'Brentwood may be one of St. Louis County&#8217;s smaller cities, but it punches well above its size — home to quiet residential streets and one of the busiest business districts in the entire metro area. Whether you own a home near Mark Twain Elementary or manage a commercial property along the Eager Road and Brentwood Boulevard corridor, you need a roofing company that understands both worlds.',
		),
		'community'    => array(
			'heading'    => 'Roofing Brentwood Homes and Businesses Trust',
			'paragraphs' => array(
				'Known as the &#8220;City of Warmth,&#8221; Brentwood blends serene residential neighborhoods with a thriving commercial center just minutes from downtown St. Louis and Clayton. It&#8217;s a community that takes pride in itself — from its well-maintained brick and two-story homes to its award-winning school district. In fact, Brentwood has been recognized as one of the best places to live in Missouri, a reflection of just how much residents and business owners care about their community.',
			),
			'pull_quote' => 'That pride shows in how people maintain their properties — and it&#8217;s the standard 1st Choice Roofing and Construction brings to every job. We deliver roofing work that holds up and reflects the quality Brentwood is known for.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Brentwood, MO',
			'intro'      => 'Brentwood&#8217;s north end is packed with shopping centers, big-box retailers, and specialty stores — including major destinations like the Promenade at Brentwood. That makes commercial roofing a core part of what we do here. From retail centers and office buildings to restaurants and multi-tenant properties, 1st Choice handles commercial roofing projects of all sizes, alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For commercial clients in Brentwood, we understand the stakes: a roofing issue can disrupt tenants, interrupt business, and put inventory or equipment at risk. We work efficiently and communicate clearly to minimize downtime, scheduling around your operations whenever possible and keeping your project on track. Whether it&#8217;s a flat roof on a retail building or a maintenance plan to protect a property long-term, we treat your building like the investment it is.',
				'Our residential clients get that same commitment — transparent estimates, premium materials backed by manufacturer warranties, and a crew that shows up and follows through. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing for Brentwood Properties',
			'intro'   => array(
				'Missouri&#8217;s severe weather doesn&#8217;t skip the inner-ring suburbs. Hail, high winds, and powerful storms can damage residential and commercial roofs alike — and the damage isn&#8217;t always visible from the ground. Bruised shingles, lifted flashing, and compromised flat-roof membranes can go unnoticed until a leak shows up inside.',
				'1st Choice Roofing and Construction offers free post-storm inspections for Brentwood homeowners and commercial property owners. We document all damage, walk you through what we find, and work directly with your insurance adjuster to keep the claims process moving. For commercial properties especially, a fast, thorough storm assessment can prevent a small problem from becoming a costly one. If your property took a hit, call us before you file.',
			),
		),
		'cta'          => array(
			'heading'   => 'Serving Brentwood Homes and Businesses — Done Right the First Time',
			'paragraph' => 'Whether you&#8217;re a Brentwood homeowner due for a new roof, a property manager responsible for a commercial building, or a business owner dealing with storm damage, 1st Choice Roofing and Construction is ready to help. We&#8217;re local, experienced, and committed to the kind of quality that the City of Warmth expects.',
		),
		'region'       => 'Serving Brentwood and St. Louis County',
		'order'        => $services_first,
	);

	$cities['bridgeton'] = array(
		'city'         => 'Bridgeton',
		'slug'         => 'bridgeton',
		'h1'           => 'Roofing Company in Bridgeton, MO',
		'service_area' => 'North St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Bridgeton, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Bridgeton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-bridgeton-mo',
			'keywords'    => 'roofing company Bridgeton MO, commercial roofing Bridgeton, roof repair Bridgeton, roof replacement Bridgeton MO, Bridgeton roofing contractor, storm damage roofing Bridgeton',
		),
		'intro'        => array(
			'Bridgeton sits at one of the busiest crossroads in North St. Louis County — where Interstates 270 and 70 meet, St. Charles Rock Road hums with business activity, and Lambert International Airport keeps the area moving. It&#8217;s a community of established homes, longtime residents, and a strong commercial presence.',
		),
		'community'    => array(
			'heading'    => 'Roofing Bridgeton Homes and Businesses Can Rely On',
			'paragraphs' => array(
				'Bridgeton is one of St. Louis County&#8217;s most historic communities, with roots stretching back to the 1700s and landmarks like the Payne-Gentry House and Fee Fee Baptist Church still standing today. It&#8217;s a place where many residents own their homes and have stayed for years, and where a busy commercial corridor along St. Charles Rock Road and the interstates supports a thriving local business community.',
			),
			'pull_quote' => 'Much of Bridgeton&#8217;s housing stock was built decades ago, which means a lot of homes here are reaching the age where roofs need attention. 1st Choice Roofing and Construction brings the experience and straight talk that Bridgeton property owners deserve, with work that&#8217;s built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Bridgeton, MO',
			'intro'      => 'With a commercial corridor as active as Bridgeton&#8217;s, commercial roofing is a major part of what we do here — from retail storefronts and office buildings along St. Charles Rock Road to warehouses and service businesses near the airport. We handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For commercial property owners in Bridgeton, we know a roof issue is a business issue — it affects tenants, customers, inventory, and your bottom line. We work efficiently, schedule around your operations, and keep you informed at every stage so a roofing project never becomes a roadblock. From flat commercial roofs to long-term maintenance plans, we protect the buildings your business depends on.',
				'Homeowners get that same level of care — transparent estimates, premium materials backed by manufacturer warranties, and a crew that does what it says it will. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'When Tornado Alley Comes Through Bridgeton',
			'intro'   => array(
				'Bridgeton sits squarely inside Missouri&#8217;s Tornado Alley, and St. Louis County averages around seven tornadoes a year. Add in the hailstorms and straight-line winds that roll through every spring and summer, and it&#8217;s no surprise that local roofs take a beating. The tricky part? After a storm passes and the sky clears, a roof can look perfectly fine from the driveway while hiding real damage up top — the kind that turns into a leak weeks or months down the road.',
				'That&#8217;s why a professional inspection matters. 1st Choice Roofing and Construction provides free post-storm roof inspections for Bridgeton homeowners and commercial property owners. We get up on the roof, document everything we find, and explain it in plain terms — then we work directly with your insurance adjuster to keep your claim moving. If a storm just rolled through your neighborhood, let us take a look before small damage becomes a big repair.',
			),
		),
		'cta'          => array(
			'heading'   => 'Bridgeton&#8217;s Crossroads. Your Roof. Our Job to Get It Right.',
			'paragraph' => 'From historic homes to the busy businesses along St. Charles Rock Road, Bridgeton runs on properties that need to stay protected year-round. Whether you&#8217;re facing storm damage, an aging roof, or a commercial building that needs a trusted hand, 1st Choice Roofing and Construction is local, experienced, and ready to help. Reach out today for your free estimate — and let&#8217;s get it done right the first time.',
		),
		'region'       => 'Serving Bridgeton and North St. Louis County',
		'order'        => $services_first,
	);

	$cities['chesterfield'] = array(
		'city'         => 'Chesterfield',
		'slug'         => 'chesterfield',
		'h1'           => 'Roofing Company in Chesterfield, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Chesterfield, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Chesterfield with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-chesterfield-mo',
			'keywords'    => 'roofing company Chesterfield MO, commercial roofing Chesterfield, roof repair Chesterfield, roof replacement Chesterfield MO, Chesterfield roofing contractor, storm damage roofing Chesterfield',
		),
		'intro'        => array(
			'Chesterfield is one of West St. Louis County&#8217;s premier communities — known for luxury homes, top-rated schools, and one of the largest retail and commercial corridors in the entire state. Property owners here expect quality, and they expect it done right.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Chesterfield Homes and Businesses',
			'paragraphs' => array(
				'Chesterfield consistently ranks among the best places to live in Missouri, and it&#8217;s easy to see why. With elite Parkway and Rockwood schools, more than 500 acres of parkland, the Monarch-Chesterfield Levee Trail along the Missouri River, and proximity to Missouri&#8217;s wine country in Augusta and Defiance, Chesterfield offers a quality of life that&#8217;s hard to match. Its luxury estate neighborhoods and strong corporate base — anchored by major employers like RGA and Bayer Crop Science — make it one of West County&#8217;s most desirable addresses.',
			),
			'pull_quote' => 'Homeowners in a community like this take pride in their properties, and they don&#8217;t settle for less than quality work. Whether it&#8217;s a high-end residential replacement or a commercial roof in Chesterfield Valley, we bring the attention to detail and long-term durability that Chesterfield property owners expect.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Chesterfield, MO',
			'intro'      => 'Chesterfield Valley is home to one of the largest shopping corridors in Missouri — including Chesterfield Commons and the St. Louis Premium Outlets — which makes commercial roofing a significant part of our work here. From retail centers and restaurants to office buildings and corporate properties, we handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For commercial property owners and managers in Chesterfield, downtime is expensive. A roofing issue can disrupt tenants, deter customers, and put inventory at risk. We work efficiently, schedule around your business, and keep communication clear from the first inspection to the final walkthrough — so your project stays on track and your operations keep running. From flat commercial roofs to ongoing maintenance plans, we protect the buildings your business depends on.',
				'Our residential clients receive that same level of care — honest, upfront estimates, premium materials backed by manufacturer warranties, and a crew that takes pride in the finished product. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'Protecting Chesterfield Roofs Through Every Storm Season',
			'intro'   => array(
				'Even in a community as well-established as Chesterfield, no roof is beyond the reach of Missouri&#8217;s weather. Spring and summer bring hail, damaging winds, and the kind of fast-moving storms that can leave a roof looking untouched while quietly causing damage underneath. On larger homes and commercial buildings especially, problems in one area can go unnoticed for a long time — until a leak finally makes itself known indoors.',
				'A thorough inspection is the smartest move after any major storm. 1st Choice Roofing and Construction offers free post-storm inspections for Chesterfield homeowners and commercial property owners. We climb up, assess the full scope of any damage, document it carefully, and walk you through exactly what we find — then coordinate directly with your insurance adjuster to keep your claim on track. If a storm recently swept through, reach out before minor damage has a chance to become a major expense.',
			),
		),
		'cta'          => array(
			'heading'   => 'The Standard Chesterfield Expects — On Every Roof',
			'paragraph' => 'Chesterfield property owners don&#8217;t compromise on quality, and neither do we. Whether you&#8217;re protecting a luxury home, managing a commercial building in Chesterfield Valley, or recovering from a recent storm, 1st Choice Roofing and Construction brings the experience, craftsmanship, and follow-through to get it right. Contact us today for your free estimate.',
		),
		'region'       => 'Serving Chesterfield and West St. Louis County',
		'order'        => $services_first,
	);

	return $cities;
}

/**
 * Register one block pattern per service area.
 */
function firstchoice_register_location_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	register_block_pattern_category(
		'firstchoice-locations',
		array( 'label' => __( '1st Choice — Location Pages', 'firstchoice' ) )
	);

	foreach ( firstchoice_location_data() as $data ) {
		register_block_pattern(
			'firstchoice/location-' . $data['slug'],
			array(
				'title'       => sprintf(
					/* translators: %s: city name */
					__( 'Location Page — %s, MO', 'firstchoice' ),
					$data['city']
				),
				'description' => sprintf(
					/* translators: 1: page title, 2: URL slug */
					__( 'Full service area page. Page title / H1: "%1$s". Suggested URL: %2$s', 'firstchoice' ),
					$data['h1'],
					$data['seo']['slug']
				),
				'categories'  => array( 'firstchoice-locations' ),
				'content'     => firstchoice_build_location_pattern( $data ),
			)
		);
	}
}
add_action( 'init', 'firstchoice_register_location_patterns' );

/**
 * Build the complete block markup for one location page.
 *
 * @param array $data One entry from firstchoice_location_data().
 * @return string Block markup.
 */
function firstchoice_build_location_pattern( $data ) {
	$company = firstchoice_location_company();

	$order = ! empty( $data['order'] )
		? $data['order']
		: array( 'hero', 'trustbar', 'community', 'services', 'storm', 'cta', 'warranty', 'testimonial', 'gallery', 'badges' );

	$out = '';

	foreach ( $order as $section ) {
		switch ( $section ) {
			case 'hero':
				$out .= firstchoice_location_hero( $data, $company );
				break;
			case 'trustbar':
				$out .= firstchoice_location_trustbar( $data );
				break;
			case 'community':
				$out .= firstchoice_location_community( $data );
				break;
			case 'storm':
				// Only cities with storm-specific copy get this section.
				if ( ! empty( $data['storm'] ) ) {
					$out .= firstchoice_location_storm( $data, $company );
				}
				break;
			case 'services':
				$out .= firstchoice_location_services( $data );
				break;
			case 'cta':
				$out .= firstchoice_location_cta( $data, $company );
				break;
			case 'warranty':
				$out .= firstchoice_location_warranty( $company );
				break;
			case 'testimonial':
				$out .= firstchoice_location_testimonial( $data );
				break;
			case 'gallery':
				$out .= firstchoice_location_gallery( $data );
				break;
			case 'badges':
				$out .= firstchoice_location_badges();
				break;
		}
	}

	return $out;
}

/**
 * Hero — carries the page H1, so these pages suppress the theme's title band.
 */
function firstchoice_location_hero( $data, $company ) {
	$badge = ! empty( $data['home_base'] )
		? sprintf( 'Home base — %s, MO', $data['city'] )
		: sprintf( 'Serving %s, MO', $data['city'] );

	ob_start();
	?>
<!-- wp:group {"className":"location-hero alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-hero">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"className":"location-hero-badge"} -->
		<p class="location-hero-badge"><?php echo esc_html( $badge ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"location-hero-title"} -->
		<h1 class="wp-block-heading location-hero-title"><?php echo wp_kses_post( $data['h1'] ); ?></h1>
		<!-- /wp:heading -->

		<?php if ( ! empty( $data['intro_heading'] ) ) : ?>
		<!-- wp:paragraph {"className":"location-hero-kicker"} -->
		<p class="location-hero-kicker"><?php echo wp_kses_post( $data['intro_heading'] ); ?></p>
		<!-- /wp:paragraph -->
		<?php endif; ?>

		<?php foreach ( $data['intro'] as $paragraph ) : ?>
		<!-- wp:paragraph {"className":"location-hero-intro"} -->
		<p class="location-hero-intro"><?php echo wp_kses_post( $paragraph ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>

		<!-- wp:buttons {"className":"location-hero-buttons"} -->
		<div class="wp-block-buttons location-hero-buttons">
			<!-- wp:button {"className":"btn-primary-red"} -->
			<div class="wp-block-button btn-primary-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>">Request Your Free Estimate</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"btn-outline-white"} -->
			<div class="wp-block-button btn-outline-white"><a class="wp-block-button__link wp-element-button" href="tel:<?php echo esc_attr( $company['phone_href'] ); ?>"><?php echo esc_html( $company['phone'] ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"className":"location-hero-photo-note"} -->
		<p class="location-hero-photo-note">Photo to be selected — hero photo, shingle or local job site</p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Trust bar — dark band of short proof points under the hero.
 */
function firstchoice_location_trustbar( $data ) {
	$items = array(
		! empty( $data['home_base'] )
			? sprintf( 'Based in %s, MO', $data['city'] )
			: sprintf( 'Serving %s, MO', $data['city'] ),
		'Free storm damage inspections',
		'Insurance claim coordination',
		'Licensed &amp; insured',
		sprintf( 'Serving all of %s', $data['service_area'] ),
	);

	ob_start();
	?>
<!-- wp:group {"className":"location-trustbar alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-trustbar">
	<div class="wp-block-group__inner-container">
		<!-- wp:group {"className":"trustbar-items","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group trustbar-items">
			<?php foreach ( $items as $item ) : ?>
			<!-- wp:paragraph {"className":"trustbar-item"} -->
			<p class="trustbar-item"><?php echo wp_kses_post( $item ); ?></p>
			<!-- /wp:paragraph -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Community / local paragraph — the page's SEO heart, with a pull-quote callout.
 */
function firstchoice_location_community( $data ) {
	$eyebrow = ! empty( $data['community']['eyebrow'] )
		? $data['community']['eyebrow']
		: sprintf( 'Proud to serve %s', $data['city'] );

	ob_start();
	?>
<!-- wp:group {"className":"location-community alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-community">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"className":"section-eyebrow"} -->
		<p class="section-eyebrow"><?php echo wp_kses_post( $eyebrow ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php echo wp_kses_post( $data['community']['heading'] ); ?></h2>
		<!-- /wp:heading -->

		<?php foreach ( $data['community']['paragraphs'] as $paragraph ) : ?>
		<!-- wp:paragraph -->
		<p><?php echo wp_kses_post( $paragraph ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>

		<?php if ( ! empty( $data['community']['pull_quote'] ) ) : ?>
		<!-- wp:paragraph {"className":"location-pullquote"} -->
		<p class="location-pullquote"><?php echo wp_kses_post( $data['community']['pull_quote'] ); ?></p>
		<!-- /wp:paragraph -->
		<?php endif; ?>
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Storm damage — red band. Gains a second column of cards when the city
 * supplies a storm service list.
 */
function firstchoice_location_storm( $data, $company ) {
	$cards      = ! empty( $data['storm']['cards'] ) ? $data['storm']['cards'] : array();
	$has_cards  = ! empty( $cards );
	$copy_class = $has_cards ? 'storm-copy' : 'storm-copy is-full';

	ob_start();
	?>
<!-- wp:group {"className":"location-storm alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-storm">
	<div class="wp-block-group__inner-container">
		<!-- wp:group {"className":"storm-layout","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group storm-layout">

			<!-- wp:group {"className":"<?php echo esc_attr( $copy_class ); ?>","layout":{"type":"constrained"}} -->
			<div class="wp-block-group <?php echo esc_attr( $copy_class ); ?>">
				<!-- wp:heading -->
				<h2 class="wp-block-heading"><?php echo wp_kses_post( $data['storm']['heading'] ); ?></h2>
				<!-- /wp:heading -->

				<?php foreach ( $data['storm']['intro'] as $paragraph ) : ?>
				<!-- wp:paragraph -->
				<p><?php echo wp_kses_post( $paragraph ); ?></p>
				<!-- /wp:paragraph -->
				<?php endforeach; ?>

				<?php if ( ! empty( $data['storm']['closing'] ) ) : ?>
				<!-- wp:paragraph {"className":"storm-closing"} -->
				<p class="storm-closing"><?php echo wp_kses_post( $data['storm']['closing'] ); ?></p>
				<!-- /wp:paragraph -->
				<?php endif; ?>
			</div>
			<!-- /wp:group -->

			<?php if ( $has_cards ) : ?>
			<!-- wp:group {"className":"storm-cards","layout":{"type":"constrained"}} -->
			<div class="wp-block-group storm-cards">
				<?php foreach ( $cards as $i => $card ) : ?>
				<div class="storm-card">
					<span class="storm-card-icon"><?php echo firstchoice_get_storm_icon( $i ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
					<span class="storm-card-text"><?php echo wp_kses_post( $card ); ?></span>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
			<?php endif; ?>

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"storm-cta"} -->
		<div class="wp-block-buttons storm-cta">
			<!-- wp:button {"className":"btn-gold"} -->
			<div class="wp-block-button btn-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>">Get a Free Storm Inspection</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Services — light band, centered intro, white service cards.
 */
function firstchoice_location_services( $data ) {
	$eyebrow = ! empty( $data['services']['eyebrow'] )
		? $data['services']['eyebrow']
		: 'Our services';

	ob_start();
	?>
<!-- wp:group {"className":"location-services alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-services">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"align":"center","className":"section-eyebrow"} -->
		<p class="has-text-align-center section-eyebrow"><?php echo wp_kses_post( $eyebrow ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo wp_kses_post( $data['services']['heading'] ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","className":"services-intro"} -->
		<p class="has-text-align-center services-intro"><?php echo wp_kses_post( $data['services']['intro'] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"service-cards","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group service-cards">
			<?php foreach ( $data['services']['list'] as $item ) : ?>
			<div class="service-card"><?php echo wp_kses_post( $item ); ?></div>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<?php foreach ( (array) $data['services']['difference'] as $paragraph ) : ?>
		<!-- wp:paragraph {"align":"center","className":"services-difference"} -->
		<p class="has-text-align-center services-difference"><?php echo wp_kses_post( $paragraph ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Closing CTA — dark band.
 */
function firstchoice_location_cta( $data, $company ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-cta alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-cta">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo wp_kses_post( $data['cta']['heading'] ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo wp_kses_post( $data['cta']['paragraph'] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"btn-primary-red"} -->
			<div class="wp-block-button btn-primary-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>">Request Your Free Estimate</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"align":"center","className":"location-cta-phone"} -->
		<p class="has-text-align-center location-cta-phone">Call us: <a href="tel:<?php echo esc_attr( $company['phone_href'] ); ?>"><?php echo esc_html( $company['phone'] ); ?></a>  |  <?php echo esc_html( $data['region'] ); ?></p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Warranty design block — three bordered cards with gold term badges.
 */
function firstchoice_location_warranty( $company ) {
	$terms = firstchoice_location_warranty_terms();

	ob_start();
	?>
<!-- wp:group {"className":"location-warranty alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-warranty">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"align":"center","className":"section-eyebrow"} -->
		<p class="has-text-align-center section-eyebrow">Warranty</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">We Stand Behind Our Work</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","className":"warranty-subtitle"} -->
		<p class="has-text-align-center warranty-subtitle">We stand behind every job — because we&#8217;re not going anywhere.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"warranty-terms","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group warranty-terms">
			<?php foreach ( $terms as $term ) : ?>
			<!-- wp:group {"className":"warranty-term","layout":{"type":"constrained"}} -->
			<div class="wp-block-group warranty-term">
				<!-- wp:paragraph {"className":"warranty-term-badge"} -->
				<p class="warranty-term-badge"><?php echo esc_html( $term['num'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"warranty-term-value"} -->
				<p class="warranty-term-value"><?php echo esc_html( $term['term'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"warranty-term-label"} -->
				<p class="warranty-term-label"><?php echo wp_kses_post( $term['label'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","className":"warranty-note"} -->
		<p class="has-text-align-center warranty-note"><a href="<?php echo esc_url( $company['warranty'] ); ?>">View our full warranty details &rarr;</a></p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Testimonial — swap in a real Google review before publishing.
 */
function firstchoice_location_testimonial( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-testimonial alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-testimonial">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">What <?php echo esc_html( $data['city'] ); ?> Customers Say</h2>
		<!-- /wp:heading -->

		<!-- wp:quote -->
		<blockquote class="wp-block-quote">
			<!-- wp:paragraph -->
			<p>[ Pull a real Google review from a <?php echo esc_html( $data['city'] ); ?> customer before publishing. ]</p>
			<!-- /wp:paragraph -->
			<cite>&#8212; [First Name, Last Initial], <?php echo esc_html( $data['city'] ); ?>, MO</cite>
		</blockquote>
		<!-- /wp:quote -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Recent work gallery — dashed placeholders until real job photos are added.
 */
function firstchoice_location_gallery( $data ) {
	$slots = firstchoice_location_gallery_slots( $data['city'] );

	ob_start();
	?>
<!-- wp:group {"className":"location-gallery alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-gallery">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">Recent Work in <?php echo esc_html( $data['city'] ); ?> &amp; <?php echo esc_html( $data['service_area'] ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","className":"gallery-note"} -->
		<p class="has-text-align-center gallery-note">Placeholder gallery — swap in real completed job photos from <?php echo esc_html( $data['city'] ); ?>-area customers before publishing.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"gallery-grid","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group gallery-grid">
			<?php foreach ( $slots as $slot ) : ?>
			<div class="gallery-slot is-<?php echo esc_attr( $slot['size'] ); ?>"><span><?php echo esc_html( $slot['caption'] ); ?></span></div>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Trust badge bar — credentials strip.
 */
function firstchoice_location_badges() {
	$badges = firstchoice_location_trust_badges();

	ob_start();
	?>
<!-- wp:group {"className":"location-badges alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-badges">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"align":"center","className":"badges-label"} -->
		<p class="has-text-align-center badges-label">Trusted by homeowners, backed by industry leaders</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"badges-row","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group badges-row">
			<?php foreach ( $badges as $badge ) : ?>
			<div class="trust-badge"><?php echo esc_html( $badge ); ?></div>
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:group -->
	<?php
	return ob_get_clean();
}

/**
 * Small icons for the storm damage cards, keyed by position.
 */
function firstchoice_get_storm_icon( $index ) {
	$icons = array(
		// Magnifier — inspections.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10.5" cy="10.5" r="6" stroke="currentColor" stroke-width="2"/><path d="M15 15l4.5 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		// Cloud with hail.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 13a4 4 0 010-8 5 5 0 019-1.5A4 4 0 0119 13H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 17v1M12.5 18.5v1M16 17v1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		// Shield — temporary protection.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3l7 3v5c0 4-3 7-7 9-4-2-7-5-7-9V6l7-3z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		// Roof — full replacement.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 12l9-8 9 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 11v8h12v-8" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		// Document — claim paperwork.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 3h8l4 4v14H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		// Buildings — residential and commercial.
		'<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="9" width="8" height="12" stroke="currentColor" stroke-width="2"/><rect x="13" y="4" width="8" height="17" stroke="currentColor" stroke-width="2"/></svg>',
	);

	$fallback = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 13l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

	return isset( $icons[ $index ] ) ? $icons[ $index ] : $fallback;
}
__FC_PATTERNS_EOF__

# ------------------------------------------------------------------------ docs
cat > "$WORK/LOCATION-PAGES.md" <<'__FC_DOCS_EOF__'
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
__FC_DOCS_EOF__

# ------------------------------------------------------------------- css block
cat > "$WORK/location-block.css" <<'__FC_CSS_EOF__'
/* LOCATION / SERVICE AREA PAGES */
/* The H1 lives in the page's own hero, so hide the theme's red title band. */
.location-page .entry-header-wrap,
.location-page .page-header-wrap {
	display: none;
}
.location-page .site-main article:not(.has-post-thumbnail) .entry-content {
	padding-top: 0;
}

/* The theme sets width:100% broadly and box-sizing is content-box, so any
   location component that carries padding needs border-box or it overflows. */
.location-hero > .wp-block-group__inner-container,
.location-trustbar > .wp-block-group__inner-container,
.location-community > .wp-block-group__inner-container,
.location-storm > .wp-block-group__inner-container,
.location-services > .wp-block-group__inner-container,
.location-cta > .wp-block-group__inner-container,
.location-warranty > .wp-block-group__inner-container,
.location-testimonial > .wp-block-group__inner-container,
.location-gallery > .wp-block-group__inner-container,
.location-badges > .wp-block-group__inner-container,
.location-pullquote,
.storm-copy,
.storm-cards,
.storm-card,
.service-card,
.gallery-slot,
.trust-badge,
.location-testimonial .wp-block-quote {
	box-sizing: border-box;
}

/* Location page headings are title case, unlike the uppercase site default. */
.location-hero h1,
.location-community h2,
.location-storm h2,
.location-services h2,
.location-cta h2,
.location-warranty h2,
.location-testimonial h2,
.location-gallery h2 {
	text-transform: none;
	letter-spacing: 0;
}

/* Small red label above a section heading */
.section-eyebrow {
	font-size: var(--font-size-sm);
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 1.2px;
	color: var(--red);
	margin-bottom: 0.35em;
}

/* Shared button variants */
.btn-primary-red .wp-block-button__link {
	background: var(--red);
	border-color: var(--red);
	color: var(--white);
}
.btn-primary-red .wp-block-button__link:hover,
.btn-primary-red .wp-block-button__link:focus {
	background: var(--link-hover-color);
}
.btn-outline-white .wp-block-button__link {
	background: transparent;
	border: 2px solid var(--white);
	color: var(--white);
	filter: none;
}
.btn-outline-white .wp-block-button__link:hover,
.btn-outline-white .wp-block-button__link:focus {
	background: rgba(255, 255, 255, 0.15);
}
.btn-gold .wp-block-button__link {
	background: var(--gold);
	border-color: var(--gold);
	color: var(--grey-vdark);
}
.btn-gold .wp-block-button__link:hover,
.btn-gold .wp-block-button__link:focus {
	background: #d4b13c; /* darken(--gold, 8) */
	color: var(--grey-vdark);
}

/* HERO */
.location-hero {
	position: relative;
	background: var(--grey-dark);
	/* Diagonal texture stands in for the hero photo until one is selected. */
	background-image: repeating-linear-gradient(
		135deg,
		rgba(255, 255, 255, 0.035) 0px,
		rgba(255, 255, 255, 0.035) 2px,
		transparent 2px,
		transparent 9px
	);
	color: var(--white);
}
.location-hero > .wp-block-group__inner-container {
	max-width: var(--alignwide);
	margin-left: auto;
	margin-right: auto;
	padding: calc( 3 * var(--gap)) var(--page-margin) calc( 3 * var(--gap));
}
.location-hero-badge {
	display: inline-block;
	width: auto !important;
	background: var(--red);
	color: var(--white);
	font-size: var(--font-size-sm);
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 1px;
	padding: 0.4em 0.9em;
	border-radius: 3px;
	margin-bottom: var(--gap);
}
.location-hero-title {
	color: var(--white);
	font-size: var(--font-size-4);
	line-height: 1.1;
	max-width: 18em;
	margin-top: 0;
	margin-bottom: var(--gap);
}
.location-hero-kicker {
	font-size: var(--font-size-1);
	font-weight: 700;
	color: var(--gold);
	max-width: 34em;
}
.location-hero-intro {
	color: var(--grey-light);
	max-width: 34em;
	line-height: 1.6;
}
.location-hero-buttons {
	display: flex;
	gap: calc( var(--gap) * 0.75 );
	margin-top: calc( 1.5 * var(--gap));
	flex-wrap: wrap;
}
.location-hero-photo-note {
	font-size: var(--font-size-sm);
	text-transform: uppercase;
	letter-spacing: 1px;
	color: rgba(255, 255, 255, 0.45);
	margin-top: calc( 2 * var(--gap));
	margin-bottom: 0;
}
@media screen and (max-width: 781px) {
	.location-hero-title {
		font-size: var(--font-size-2);
	}
}

/* TRUST BAR */
.location-trustbar {
	background: var(--black);
	color: var(--white);
}
.location-trustbar > .wp-block-group__inner-container {
	max-width: var(--alignwide);
	margin-left: auto;
	margin-right: auto;
	padding: calc( var(--gap) * 0.85 ) var(--page-margin);
}
.location-trustbar .trustbar-items {
	display: flex;
	flex-wrap: wrap;
	gap: calc( var(--gap) * 0.6 ) calc( var(--gap) * 1.6 );
	align-items: center;
}
p.trustbar-item:not(.alignfull):not(.alignwide) {
	position: relative;
	width: auto;
	font-size: var(--font-size-sm);
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.8px;
	color: var(--white);
	padding-left: 1.1em;
	margin-bottom: 0;
}
.trustbar-item:before {
	content: '';
	position: absolute;
	left: 0;
	top: 0.45em;
	width: 0.5em;
	height: 0.5em;
	border-radius: 50%;
	background: var(--gold);
}

/* COMMUNITY */
.location-community {
	background: var(--white);
}
.location-community > .wp-block-group__inner-container,
.location-services > .wp-block-group__inner-container,
.location-cta > .wp-block-group__inner-container,
.location-warranty > .wp-block-group__inner-container,
.location-testimonial > .wp-block-group__inner-container,
.location-gallery > .wp-block-group__inner-container {
	max-width: var(--aligndefault);
	margin-left: auto;
	margin-right: auto;
	padding: calc( 2.5 * var(--gap)) var(--page-margin);
}
.location-community h2 {
	margin-top: 0;
}
.location-pullquote {
	background: var(--grey-vlight);
	border-left: 4px solid var(--red);
	padding: var(--gap) calc( 1.25 * var(--gap));
	font-weight: 700;
	margin-top: calc( 1.5 * var(--gap));
	margin-bottom: 0;
}

/* STORM — red band */
.location-storm {
	background: var(--red);
	color: var(--white);
}
.location-storm > .wp-block-group__inner-container {
	max-width: var(--alignwide);
	margin-left: auto;
	margin-right: auto;
	padding: calc( 2.5 * var(--gap)) var(--page-margin);
}
.location-storm h2 {
	color: var(--white);
	margin-top: 0;
}
.location-storm p {
	color: var(--white);
	line-height: 1.6;
}
.location-storm .storm-layout {
	display: flex;
	flex-wrap: wrap;
	gap: calc( 2 * var(--gap));
	align-items: flex-start;
}
div.storm-copy:not(.alignfull):not(.alignwide) {
	width: auto;
	flex: 1 1 380px;
}
div.storm-copy.is-full:not(.alignfull):not(.alignwide) {
	flex: 1 1 100%;
	max-width: 46em;
}
.storm-closing {
	font-weight: 700;
}
div.storm-cards:not(.alignfull):not(.alignwide) {
	width: auto;
	flex: 1 1 340px;
	display: flex;
	flex-direction: column;
	gap: calc( var(--gap) * 0.6 );
}
.storm-card {
	display: flex;
	align-items: center;
	gap: calc( var(--gap) * 0.7 );
	background: rgba(0, 0, 0, 0.22);
	border-radius: 4px;
	padding: calc( var(--gap) * 0.7 ) var(--gap);
}
.storm-card-icon {
	flex: 0 0 auto;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	border-radius: 50%;
	background: var(--gold);
	color: var(--grey-vdark);
}
.storm-card-text {
	font-size: var(--font-size-sm);
	font-weight: 700;
	line-height: 1.35;
}
.location-storm .storm-cta {
	margin-top: calc( 1.5 * var(--gap));
}

/* SERVICES — light band with white cards */
.location-services {
	background: var(--grey-vlight);
}
.location-services h2 {
	margin-top: 0;
}
.services-intro {
	max-width: 44em;
	margin-left: auto;
	margin-right: auto;
}
.location-services .service-cards {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: var(--gap);
	margin-top: calc( 1.5 * var(--gap));
	margin-bottom: calc( 1.5 * var(--gap));
}
.service-card {
	flex: 1 1 clamp( 220px, calc( 33% - var(--gap)), 300px);
	background: var(--white);
	border: 1px solid var(--grey-light);
	border-radius: 4px;
	padding: var(--gap);
	text-align: center;
	font-size: var(--font-size-sm);
	font-weight: 700;
	color: var(--grey-dark);
}
.services-difference {
	max-width: 46em;
	margin-left: auto;
	margin-right: auto;
	font-size: var(--font-size-sm);
	font-style: italic;
	color: var(--grey);
}
.services-difference:last-child {
	margin-bottom: 0;
}

/* CLOSING CTA — dark band */
.location-cta {
	background: var(--grey-vdark);
	color: var(--white);
	text-align: center;
}
.location-cta h2 {
	color: var(--white);
	margin-top: 0;
}
.location-cta p {
	color: var(--grey-light);
	max-width: 44em;
	margin-left: auto;
	margin-right: auto;
}
.location-cta .wp-block-buttons {
	margin-top: calc( 1.5 * var(--gap));
}
.location-cta-phone {
	margin-top: var(--gap);
	margin-bottom: 0;
	font-weight: 700;
	color: var(--white) !important;

	a {
		color: var(--gold);
		text-decoration: none;
	}
	a:hover,
	a:focus {
		text-decoration: underline;
	}
}

/* WARRANTY — bordered cards with gold badges */
.location-warranty {
	background: var(--white);
	text-align: center;
}
.location-warranty h2 {
	margin-top: 0;
}
.warranty-subtitle {
	color: var(--grey);
	margin-bottom: calc( 1.5 * var(--gap));
}
.location-warranty .warranty-terms {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: var(--gap);
	align-items: stretch;
}
div.warranty-term:not(.alignfull):not(.alignwide) {
	width: clamp( 190px, calc( 33.333% - var(--gap)), 260px);
	box-sizing: border-box;
	border: 1px solid var(--grey-light);
	border-radius: 4px;
	padding: calc( 1.25 * var(--gap)) var(--gap);
	text-align: center;
}
p.warranty-term-badge:not(.alignfull):not(.alignwide) {
	width: 40px;
	height: 40px;
	margin: 0 auto calc( var(--gap) * 0.6 );
	border-radius: 50%;
	background: var(--gold);
	color: var(--grey-vdark);
	font-weight: 700;
	line-height: 40px;
	text-align: center;
}
.warranty-term-value {
	font-family: var(--font-primary);
	font-size: var(--font-size-2);
	font-weight: 700;
	line-height: 1.1;
	color: var(--red);
	margin-bottom: 0.2em;
}
.warranty-term-label {
	font-size: var(--font-size-sm);
	text-transform: uppercase;
	letter-spacing: 0.6px;
	font-weight: 700;
	color: var(--grey);
	margin-bottom: 0;
}
.location-warranty .warranty-note {
	margin-top: calc( 1.5 * var(--gap));
	margin-bottom: 0;

	a {
		font-size: var(--font-size-sm);
		font-weight: 700;
		color: var(--red);
	}
}
@media screen and (max-width: 781px) {
	div.warranty-term:not(.alignfull):not(.alignwide) {
		width: 100%;
	}
}

/* TESTIMONIAL */
.location-testimonial {
	background: var(--grey-vlight);
	text-align: center;
}
.location-testimonial h2 {
	margin-top: 0;
	margin-bottom: calc( 1.5 * var(--gap));
}
.location-testimonial .wp-block-quote {
	background: var(--white);
	border-left: 4px solid var(--gold);
	border-radius: 0;
	padding: calc( 1.25 * var(--gap)) calc( 1.5 * var(--gap));
	margin: 0 auto;
	max-width: 44em;
	text-align: left;

	p {
		font-style: italic;
		color: var(--grey-dark);
	}
	cite {
		display: block;
		font-style: normal;
		font-weight: 700;
		text-transform: uppercase;
		font-size: var(--font-size-sm);
		color: var(--grey-dark);
		text-align: right;
	}
}

/* RECENT WORK GALLERY — placeholders until real photos land */
.location-gallery {
	background: var(--white);
	text-align: center;
}
.location-gallery h2 {
	margin-top: 0;
}
.gallery-note {
	font-size: var(--font-size-sm);
	color: var(--grey);
	max-width: 40em;
	margin-left: auto;
	margin-right: auto;
}
.location-gallery .gallery-grid {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: var(--gap);
	margin-top: calc( 1.5 * var(--gap));
	align-items: stretch;
}
.gallery-slot {
	display: flex;
	align-items: center;
	justify-content: center;
	background: var(--grey-vlight);
	border: 2px dashed var(--grey-light);
	border-radius: 4px;
	min-height: 190px;
	padding: var(--gap);

	span {
		font-size: var(--font-size-sm);
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.8px;
		color: var(--grey);
	}
}
.gallery-slot.is-wide {
	flex: 1 1 clamp( 260px, calc( 50% - var(--gap)), 520px);
}
.gallery-slot.is-narrow {
	flex: 1 1 clamp( 220px, calc( 33% - var(--gap)), 340px);
	min-height: 150px;
}

/* TRUST BADGE BAR */
.location-badges {
	background: var(--white);
	border-top: 1px solid var(--grey-light);
}
.location-badges > .wp-block-group__inner-container {
	max-width: var(--alignwide);
	margin-left: auto;
	margin-right: auto;
	padding: calc( 1.5 * var(--gap)) var(--page-margin);
}
.badges-label {
	font-size: var(--font-size-sm);
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 1px;
	color: var(--grey);
	margin-bottom: var(--gap);
}
.location-badges .badges-row {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: calc( var(--gap) * 0.6 );
	align-items: center;
}
div.trust-badge:not(.alignfull):not(.alignwide) {
	width: auto;
	background: var(--grey-vlight);
	border: 1px solid var(--grey-light);
	border-radius: 999px;
	padding: 0.5em 1.1em;
	font-size: var(--font-size-sm);
	font-weight: 700;
	color: var(--grey-dark);
	white-space: nowrap;
}
@media screen and (max-width: 781px) {
	.trust-badge {
		white-space: normal;
	}
}

__FC_CSS_EOF__

# --------------------------------------------------------------- install files
python3 - "$WORK" <<'__FC_PY_EOF__'
import hashlib, io, os, sys

work = sys.argv[1]

EXPECTED = {
    'location-patterns.php': '2a82851b98bcaa2a77ea529e24e647bd45a85682ee33a268baf74925f22abe4e',
    'LOCATION-PAGES.md': '78f2978b6e5299370bce3917a133da83d928ef4959b9e834a6bb5fb8b7e89974',
    'location-block.css': '3a40f4e0a58a9aedc52163d9e18dbb35e26fa2ab4ce3226dde4de67baf1f4102',
}

def read(path):
    return io.open(path, encoding='utf-8').read()

# Verify the embedded payloads survived transport intact.
for name, want in EXPECTED.items():
    got = hashlib.sha256(read(os.path.join(work, name)).encode('utf-8')).hexdigest()
    if got != want:
        raise SystemExit(
            'ERROR: embedded %s is corrupted (checksum mismatch).\n'
            'Nothing was changed. Re-download the script.' % name
        )

def write(path, text):
    d = os.path.dirname(path)
    if d and not os.path.isdir(d):
        os.makedirs(d)
    io.open(path, 'w', encoding='utf-8').write(text)

# 1. Pattern file and docs -- whole-file writes.
write(os.path.join('inc', 'location-patterns.php'), read(os.path.join(work, 'location-patterns.php')))
print('wrote inc/location-patterns.php')
write('LOCATION-PAGES.md', read(os.path.join(work, 'LOCATION-PAGES.md')))
print('wrote LOCATION-PAGES.md')

# 2. Splice the location CSS between its own markers, leaving the rest alone.
block = read(os.path.join(work, 'location-block.css'))
START = '/* LOCATION / SERVICE AREA PAGES */'
END = '/* TESTIMONIALS SECTION (NOT PAGE) */'
css = read('style.css')

if END not in css:
    raise SystemExit(
        'ERROR: could not find the "%s" marker in style.css.\n'
        'Nothing was changed to style.css. Send this message to Claude.' % END
    )

if START in css:
    head, tail, action = css[:css.index(START)], css[css.index(END):], 'replaced'
else:
    head, tail, action = css[:css.index(END)], css[css.index(END):], 'inserted'

write('style.css', head + block + tail)
print('%s the location CSS block in style.css' % action)

# 3. functions.php wiring, only if missing.
src = read('functions.php')
original = src
added = []

REQUIRE_LINE = (
    "\n/** Location / service area page patterns. */\n"
    "require get_stylesheet_directory() . '/inc/location-patterns.php';\n"
)

BODY_CLASS = (
    "\n/**\n"
    " * Flag location pages so the theme's red title band can be hidden -- the H1\n"
    " * lives inside the page's own hero section instead. Detected from the pattern\n"
    " * markup, so no page-naming convention is required.\n"
    " */\n"
    "function firstchoice_location_body_class( $classes ) {\n"
    "\tif ( is_page() ) {\n"
    "\t\t$post = get_post();\n\n"
    "\t\tif ( $post && false !== strpos( $post->post_content, 'location-hero' ) ) {\n"
    "\t\t\t$classes[] = 'location-page';\n"
    "\t\t}\n"
    "\t}\n\n"
    "\treturn $classes;\n"
    "}\n"
    "add_filter( 'body_class', 'firstchoice_location_body_class' );\n"
)

def append_php(text, chunk):
    stripped = text.rstrip()
    if stripped.endswith('?>'):
        return stripped[:-2].rstrip() + '\n' + chunk + '\n?>\n'
    return stripped + '\n' + chunk

if 'inc/location-patterns.php' not in src:
    anchor = "require get_stylesheet_directory() . '/inc/template-tags.php';"
    if anchor in src:
        src = src.replace(anchor, anchor + REQUIRE_LINE, 1)
    else:
        src = append_php(src, REQUIRE_LINE)
    added.append('require for inc/location-patterns.php')

if 'firstchoice_location_body_class' not in src:
    src = append_php(src, BODY_CLASS)
    added.append('location-page body class filter')

if src != original:
    write('functions.php', src)
    print('functions.php: added ' + ', '.join(added))
else:
    print('functions.php: already wired, no change needed')
__FC_PY_EOF__

# ------------------------------------------------------------- syntax check
if command -v php >/dev/null 2>&1; then
	php -l inc/location-patterns.php >/dev/null
	php -l functions.php >/dev/null
	echo "PHP syntax OK"
else
	echo "note: php is not installed locally, skipped the syntax check"
fi

echo ""
echo "Done. Six location page patterns installed. Next:"
echo "    git status"
echo "    git add -A && git commit -m \"Add location pages for six service areas\""
