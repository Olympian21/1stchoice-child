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
 *   state             - two-letter abbreviation, defaults to MO. Collinsville
 *                       is in Illinois.
 *   pattern_note      - appended to the pattern name, to tell two patterns for
 *                       the same city apart (Richmond Heights has two).
 *   gallery_heading   - overrides the default "Recent Work in <City> &
 *                       <service area>" heading.
 *   cta_button        - closing CTA button label. Defaults to "Request Your
 *                       Free Estimate"; Earth City asks for a commercial one.
 *   testimonial_cite  - text after the reviewer name in the citation. Defaults
 *                       to "<City>, <ST>".
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
		'group'         => 'Jefferson County',
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
		'group'          => 'South St. Louis County',
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
		'group'         => 'West St. Louis County',
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
		'group'         => 'Mid &amp; Central St. Louis County',
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
		'group'         => 'North &amp; Northwest St. Louis County',
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
		'group'         => 'West St. Louis County',
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

	$cities['clayton'] = array(
		'city'         => 'Clayton',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'clayton',
		'h1'           => 'Roofing Company in Clayton, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Clayton, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Clayton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-clayton-mo',
			'keywords'    => 'roofing company Clayton MO, commercial roofing Clayton, roof repair Clayton, roof replacement Clayton MO, Clayton roofing contractor, storm damage roofing Clayton',
		),
		'intro'        => array(
			'Clayton is the heart of St. Louis County — the county seat, the region&#8217;s financial center, and home to some of the most prestigious commercial and residential properties in the metro area. It&#8217;s a community where corporate headquarters share the map with stately historic homes and tree-lined neighborhoods. Property owners here hold their buildings to a high standard, and they expect the same from the people who work on them.',
			'We provide residential and commercial roofing throughout Clayton and the surrounding St. Louis County area, bringing the craftsmanship, professionalism, and accountability that a community like Clayton demands — on every property, large or small.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Clayton Homes and Businesses',
			'paragraphs' => array(
				'Clayton blends a bustling business district with charming residential neighborhoods, all within about two and a half square miles. It&#8217;s home to the #1-ranked Clayton School District, beautiful green spaces like Shaw Park, and a downtown that hosts the renowned St. Louis Art Fair each year. Its historic neighborhoods — with their 1920s architecture and tree-lined streets — sit alongside a modern skyline of office towers, making Clayton one of the most distinctive communities in the region.',
			),
			'pull_quote' => 'That mix of historic homes and high-profile commercial buildings means roofing in Clayton calls for real versatility. 1st Choice Roofing and Construction brings the experience to handle both — from preserving the character of an older home to delivering the reliable, professional service a commercial property owner expects. Whatever the project, we hold our work to the standard Clayton is known for.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Clayton, MO',
			'intro'      => 'As St. Louis County&#8217;s central business district — with millions of square feet of office and retail space and the headquarters of several Fortune 500 companies — Clayton is a community where commercial roofing is a major focus of our work. From office buildings and retail spaces to restaurants and mixed-use properties, we handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For commercial property owners and managers in Clayton, a roof issue is never just a roof issue — it affects tenants, businesses, and the professional image of the property. We work efficiently and discreetly, schedule around your operations, and keep communication clear at every stage, so your project never disrupts the day-to-day. From flat commercial roofs to long-term maintenance plans, we protect the investments that keep Clayton running.',
				'Our residential clients receive that same level of care — honest estimates, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm-Ready Roofing for Clayton Properties',
			'intro'   => array(
				'Clayton&#8217;s mature, tree-lined streets are part of its charm — but those same large trees, combined with Missouri&#8217;s severe storms, can spell trouble for a roof. High winds bring down limbs, hail bruises and cracks shingles, and heavy rain finds every weak point. The damage isn&#8217;t always obvious from street level, which is why so many roof problems go unnoticed until water is already making its way inside.',
				'After a storm, the safest move is a professional set of eyes on your roof. 1st Choice Roofing and Construction provides free post-storm inspections for Clayton homeowners and commercial property owners. We assess the full extent of the damage, document everything thoroughly, and explain our findings clearly — then we work directly with your insurance adjuster to keep your claim moving smoothly. If a storm recently passed through Clayton, let us take a look before a small issue turns costly.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of St. Louis County&#8217;s Capital',
			'paragraph' => 'As the county seat and the professional heart of the region, Clayton sets a high bar — and 1st Choice Roofing and Construction is built to meet it. Whether you&#8217;re caring for a historic home, managing a downtown commercial property, or recovering from storm damage, we bring the experience and professionalism the job deserves. Reach out today for your free estimate and find out what it&#8217;s like to work with a roofing company that gets it right the first time.',
		),
		'region'       => 'Serving Clayton and St. Louis County',
		'order'        => $services_first,
	);

	$cities['collinsville'] = array(
		'city'         => 'Collinsville',
		'group'         => 'Metro East, Illinois',
		'slug'         => 'collinsville',
		'h1'           => 'Roofing Company in Collinsville, IL',
		'state'        => 'IL',
		'service_area' => 'the Metro East',
		'seo'          => array(
			'title'       => 'Roofing Company in Collinsville, IL | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Collinsville, IL with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-collinsville-il',
			'keywords'    => 'roofing company Collinsville IL, commercial roofing Collinsville, roof repair Collinsville, roof replacement Collinsville IL, Collinsville roofing contractor, Metro East roofing',
		),
		'intro'        => array(
			'Just across the river from St. Louis, Collinsville sits at the heart of the Metro East — a growing community that blends small-town character with easy access to the wider metro area. From historic downtown storefronts to established neighborhoods and newer subdivisions, Collinsville property owners take pride in where they live and work.',
			'We provide residential and commercial roofing throughout Collinsville and the Metro East, bringing the same craftsmanship and accountability to every project — whether it&#8217;s a family home on a shaded street or a commercial property along one of the city&#8217;s busy corridors.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Collinsville Homes and Businesses',
			'paragraphs' => array(
				'Collinsville is one of the oldest and most characterful communities in the St. Louis area, founded in 1818 and known for landmarks like the World&#8217;s Largest Catsup Bottle and the Cahokia Mounds State Historic Site — a National Historic Landmark and UNESCO World Heritage Site. With its rolling hills, shaded streets, and a mix of historic homes and newer construction, Collinsville offers the kind of small-town atmosphere that keeps residents rooted here for generations.',
			),
			'pull_quote' => 'That sense of pride extends to the properties themselves — and it&#8217;s the standard 1st Choice Roofing and Construction brings to every job. Whether you&#8217;re maintaining an older home, protecting a newer build, or caring for a commercial property, we deliver roofing work that holds up and reflects the quality this community expects.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Collinsville, IL',
			'intro'      => 'Collinsville has a strong commercial presence — from its historic downtown shops to a growing hospitality district and businesses spread along Route 159 and the interstate corridors. That makes commercial roofing a key part of our work here. From retail storefronts and restaurants to office buildings and hospitality properties, we handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For commercial property owners in Collinsville, we understand that a roofing problem is a business problem — it affects customers, tenants, and your bottom line. We work efficiently, schedule around your operations, and communicate clearly from the first inspection through the final walkthrough, keeping disruption to a minimum. From flat commercial roofs to ongoing maintenance plans, we protect the buildings your business depends on.',
				'Homeowners get that same dedication — honest, upfront estimates, premium materials backed by manufacturer warranties, and a crew that treats your property with respect from start to finish. No surprises. No shortcuts.',
			),
		),
		'storm'        => array(
			'heading' => 'Metro East Storms Don&#8217;t Stop at the River',
			'intro'   => array(
				'The severe weather that batters the Missouri side of the metro hits the Illinois side just as hard. Collinsville sees its share of spring and summer storms — hail, damaging winds, and downpours that test every roof in the Metro East. And because storm damage often hides in plain sight, a roof can look perfectly fine from the yard while shingles, flashing, or seams have already been compromised. The first sign of trouble is frequently a leak that shows up long after the storm has passed.',
				'That&#8217;s why a professional inspection is worth its weight after any major storm. 1st Choice Roofing and Construction provides free post-storm roof inspections for Collinsville homeowners and commercial property owners. We get up top, document everything we find, walk you through it in plain language, and coordinate directly with your insurance adjuster to keep your claim on track. If a storm recently rolled through the Metro East, let us take a look before minor damage becomes a major repair.',
			),
		),
		'cta'          => array(
			'heading'   => 'Your Metro East Roofing Partner — Right Across the River',
			'paragraph' => 'From Collinsville&#8217;s historic downtown to its newest neighborhoods, the properties here deserve roofing that lasts. Whether you&#8217;re dealing with storm damage, an aging roof, or a commercial building that needs a dependable hand, 1st Choice Roofing and Construction has the experience and the local commitment to get it right. Reach out today for your free estimate — and let&#8217;s do it right the first time.',
		),
		'region'       => 'Serving Collinsville and the Metro East',
		'order'        => $services_first,
	);

	$cities['crestwood'] = array(
		'city'         => 'Crestwood',
		'group'         => 'South St. Louis County',
		'slug'         => 'crestwood',
		'h1'           => 'Roofing Company in Crestwood',
		'service_area' => 'South St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Crestwood | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Crestwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-crestwood-mo',
			'keywords'    => 'roofing company Crestwood, commercial roofing Crestwood, roof repair Crestwood, roof replacement Crestwood, Crestwood roofing contractor, storm damage roofing Crestwood',
		),
		'intro'        => array(
			'Crestwood is one of South St. Louis County&#8217;s most beloved communities. It&#8217;s a friendly, family-oriented city built along the historic Route 66 corridor, with award-winning schools and a strong sense of pride that runs deep. Homeowners and business owners here care about their properties and their community, and they expect quality from anyone they hire.',
			'We provide residential and commercial roofing throughout Crestwood and South County, bringing the same craftsmanship and accountability to every project — from a family home near Whitecliff Park to a business along the Watson Road corridor.',
		),
		'community'    => array(
			'heading'    => 'Residential and Commercial Roofing for Crestwood Homes and Businesses',
			'paragraphs' => array(
				'Crestwood has a character all its own. Once named the &#8220;Best Place to Raise Kids in Missouri&#8221; for its top-tier schools and excellent city services, it&#8217;s a community where residents put down roots and stay. The historic Route 66 — known locally as Watson Road — runs through the heart of the city, anchoring a business corridor that has grown from classic drive-ins and motels into a thriving commercial hub, all while Grant&#8217;s Trail keeps residents connected to the city&#8217;s history and outdoors.',
			),
			'pull_quote' => 'That blend of pride and longevity shapes how Crestwood residents care for their homes — and it&#8217;s exactly the standard we bring to every roof we work on. Whether you&#8217;re protecting a long-held family home or maintaining a commercial building, we deliver roofing work built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Crestwood, MO',
			'intro'      => 'The Watson Road business corridor gives Crestwood a steady commercial presence — from big-box stores and retail centers to restaurants and service businesses — which makes commercial roofing an important part of our work here. We handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'A leaking roof or a failing flat membrane sends a message to everyone who walks into your business — and it&#8217;s never the one you want. For Crestwood&#8217;s Watson Road retailers, restaurants, and service businesses, we handle commercial roofing with as little interruption to your customers and tenants as possible, timing the work around your busiest hours and keeping you in the loop at every step.',
				'And for homeowners, the same care applies on a smaller scale — a clear estimate, materials chosen to last, and a crew that treats your house like it&#8217;s the only job on the schedule. Honest work, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Keeping Crestwood Roofs Ready for Whatever Rolls In',
			'intro'   => array(
				'Missouri weather has a way of testing every roof in South County, and Crestwood is no exception. Spring and summer bring hail, gusting winds, and heavy downpours that can leave a roof compromised in ways that aren&#8217;t visible from the ground. A few cracked shingles or a section of lifted flashing might not seem like much — until the next storm drives water through the gap and into your home or building.',
				'The smartest response after severe weather is a professional inspection. 1st Choice Roofing and Construction offers free post-storm roof inspections for Crestwood homeowners and commercial property owners. We get up on the roof, document every issue we find, explain it in plain terms, and work directly with your insurance adjuster to keep your claim moving. If the weather&#8217;s been rough lately, let us check your roof while any damage is still easy to fix.',
			),
		),
		'cta'          => array(
			'heading'   => 'A Roofing Company as Dependable as Crestwood Itself',
			'paragraph' => 'Crestwood was built on community pride and staying power — values 1st Choice Roofing and Construction shares. Whether you&#8217;re repairing storm damage, replacing an aging roof, or caring for a commercial property along Watson Road, we bring the experience and follow-through to get it right. Contact us today for your free estimate and find out what it means to work with a roofing company that does the job right the first time.',
		),
		'region'       => 'Serving Crestwood and South St. Louis County',
		'order'        => $services_first,
	);

	$cities['creve-coeur'] = array(
		'city'         => 'Creve Coeur',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'creve-coeur',
		'h1'           => 'Roofing Company in Creve Coeur, MO',
		'service_area' => 'Central St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Creve Coeur, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Creve Coeur with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-creve-coeur-mo',
			'keywords'    => 'roofing company Creve Coeur MO, commercial roofing Creve Coeur, roof repair Creve Coeur, roof replacement Creve Coeur MO, Creve Coeur roofing contractor, storm damage roofing Creve Coeur',
		),
		'intro'        => array(
			'Creve Coeur sits at the center of St. Louis County — a thriving community known for beautiful homes, abundant parkland, and one of the strongest business and high-tech corridors in the region. It&#8217;s a place where established neighborhoods meet corporate headquarters and office parks, and where property owners hold high expectations for the work done on their buildings.',
			'We provide residential and commercial roofing throughout Creve Coeur and central St. Louis County, bringing the same craftsmanship and accountability to every project — whether it&#8217;s a ranch home on a tree-lined street or a commercial building along the Olive Boulevard corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Creve Coeur Homes and Businesses',
			'paragraphs' => array(
				'Creve Coeur — French for &#8220;broken heart,&#8221; named for the nearby lake — has grown from a quiet farming settlement along an old Indian trail into one of central St. Louis County&#8217;s most desirable communities. Today it pairs cozy ranch homes and peaceful, tree-lined avenues with acres of parkland, seven public parks, and a strong corporate presence that includes the headquarters of Drury Hotels. It consistently ranks among the highest-valued communities in the county — a reflection of just how much residents and businesses invest in this area.',
			),
			'pull_quote' => 'That level of investment calls for roofing that measures up. From maintaining the character of an established home to delivering dependable service for a commercial property, 1st Choice Roofing and Construction brings the experience and attention to detail Creve Coeur expects — and the kind of quality we stand behind on every job.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Creve Coeur, MO',
			'intro'      => 'With hundreds of businesses, high-tech office parks, and a busy retail corridor along Olive Boulevard, Creve Coeur has one of the most active commercial landscapes in the county — which makes commercial roofing a major focus of our work here. From office buildings and corporate properties to retail centers and restaurants, we handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For the office parks and businesses along Olive Boulevard, a roof is part of the professional impression a property makes — and the last thing any owner wants is a leak interrupting operations or a worn roof signaling neglect. We handle commercial roofing with the discretion and precision that environment calls for: thorough inspections, clean job sites, scheduling that respects your business hours, and clear updates from start to finish. From flat commercial systems to ongoing maintenance plans, we keep your property performing and looking its best.',
				'Homeowners receive the same straightforward approach we&#8217;re known for — a clear estimate, premium materials backed by manufacturer warranties, and a finished roof we&#8217;re proud to put our name on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Protection for Creve Coeur&#8217;s Homes and Businesses',
			'intro'   => array(
				'No part of St. Louis County escapes Missouri&#8217;s storm seasons, and Creve Coeur&#8217;s leafy, well-shaded neighborhoods come with an added risk: mature trees that can drop heavy limbs in high winds. Combine that with hail and driving rain, and even a sturdy roof can take damage that stays hidden until a leak appears inside. Commercial flat roofs are especially prone to quiet problems — a small puncture or a pooling area can go unnoticed for months.',
				'After severe weather, the wisest step is a professional inspection. 1st Choice Roofing and Construction provides free post-storm roof inspections for Creve Coeur homeowners and commercial property owners. We assess the full scope of any damage, document it carefully, explain what we find without the jargon, and coordinate directly with your insurance adjuster to keep your claim on track. Caught in a recent storm? Let us take a look before a small issue becomes an expensive one.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Creve Coeur Can Believe In',
			'paragraph' => 'In a community that invests in quality, 1st Choice Roofing and Construction delivers it. Whether you&#8217;re protecting a family home, managing a commercial property along Olive Boulevard, or dealing with the aftermath of a storm, we bring the experience, professionalism, and follow-through to get the job done right. Reach out today for your free estimate — and see why so many St. Louis-area property owners trust us to do it right the first time.',
		),
		'region'       => 'Serving Creve Coeur and Central St. Louis County',
		'order'        => $services_first,
	);

	$cities['des-peres'] = array(
		'city'         => 'Des Peres',
		'group'         => 'West St. Louis County',
		'slug'         => 'des-peres',
		'h1'           => 'Roofing Company in Des Peres, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Des Peres, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Des Peres with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-des-peres-mo',
			'keywords'    => 'roofing company Des Peres MO, commercial roofing Des Peres, roof repair Des Peres, roof replacement Des Peres MO, Des Peres roofing contractor, storm damage roofing Des Peres',
		),
		'intro'        => array(
			'Des Peres is one of West County&#8217;s most established and upscale communities — known for expansive properties, well-manicured lawns, and traditional homes set along quiet, tree-lined streets. It&#8217;s also a central retail hub for the area, anchored by the West County Center and the busy Manchester Road corridor. Property owners here expect a high standard.',
			'We provide residential and commercial roofing throughout Des Peres and West St. Louis County, bringing the same craftsmanship and accountability to every project — from a stately home near Des Peres Park to a commercial property along Manchester Road.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Des Peres Homes and Businesses',
			'paragraphs' => array(
				'First settled by German immigrants and Southern pioneers in the 1830s, Des Peres has grown into one of West County&#8217;s most established communities. With highly regarded Kirkwood and Parkway schools, more than 100 acres of parkland, and a residential character defined by mature landscaping, Des Peres homeowners take real pride in their properties.',
			),
			'pull_quote' => 'That pride sets a high bar, and it&#8217;s one 1st Choice Roofing and Construction is glad to meet. Whether you&#8217;re protecting a traditional family home or caring for a commercial building, we bring the experience and attention to detail Des Peres expects with roofing work built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Des Peres, MO',
			'intro'      => 'As the retail center of West County — home to the West County Center and a dense commercial corridor along Manchester Road — Des Peres keeps commercial roofing front and center in our work here. From the enclosed regional mall&#8217;s surrounding retailers to restaurants, big-box stores, and office space, we handle commercial projects of all sizes alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'Commercial roofs rarely fail all at once. The Des Peres property owners who keep costs down are almost always the ones who stayed ahead of the problem, which is why inspections and maintenance plans are as central to our work as replacements. Stay ahead of it, and a roofing issue never has to turn into closed doors or lost business. When a repair or replacement is needed, we work cleanly and on a schedule that keeps your property running.',
				'Homeowners get that same proactive approach — we&#8217;ll tell you honestly whether you need a full replacement or a targeted repair, back our materials with manufacturer warranties, and leave your property cleaner than we found it.',
			),
		),
		'storm'        => array(
			'heading' => 'When Storms Roll Through West County',
			'intro'   => array(
				'Des Peres may feel like a calm, settled corner of West County, but it sits under the same Missouri skies as everywhere else. And those skies deliver hail, straight-line winds, and heavy rain every storm season. Damage from these events is often invisible from ground level: a few bruised shingles, a length of lifted flashing, or a hairline gap that does nothing until the next downpour drives water straight through it.',
				'That&#8217;s why a professional inspection after a storm is always worth it. 1st Choice Roofing and Construction offers free post-storm roof inspections for Des Peres homeowners and commercial property owners. We climb up, assess the full extent of any damage, document it clearly, and coordinate directly with your insurance adjuster to keep your claim moving. If severe weather just rolled through, a quick inspection now can save you a major repair later.',
			),
		),
		'cta'          => array(
			'heading'   => 'West County&#8217;s Standard, Met on Every Roof',
			'paragraph' => 'Des Peres has built its reputation on quality and care — and that&#8217;s exactly what 1st Choice Roofing and Construction brings to every home and business we serve. Whether you&#8217;re repairing storm damage, replacing an aging roof, or maintaining a commercial property along Manchester Road, we have the experience and the follow-through to get it right. Contact us today for your free estimate and see what it means to work with a roofing company that does the job right the first time.',
		),
		'region'       => 'Serving Des Peres and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['earth-city'] = array(
		'city'         => 'Earth City',
		'group'         => 'North &amp; Northwest St. Louis County',
		'slug'         => 'earth-city',
		'h1'           => 'Commercial &amp; Flat Roofing in Earth City, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Commercial Flat Roofing in Earth City, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction provides commercial and flat roofing for Earth City businesses — warehouses, offices, and industrial buildings. Repairs, replacements, and free inspections.',
			'slug'        => '/commercial-flat-roofing-earth-city-mo',
			'keywords'    => 'commercial roofing Earth City MO, flat roofing Earth City, commercial roof repair Earth City, warehouse roofing Earth City, industrial roofing Earth City MO, flat roof replacement Earth City',
		),
		'intro'        => array(
			'Earth City is one of the largest business parks in the Midwest — a 1,360-acre commercial and industrial hub along Interstate 70 with roughly five million square feet of office, manufacturing, distribution, and warehouse space, home to numerous Fortune 500 companies. Buildings at this scale share one thing in common: large, flat, low-slope roofs that demand specialized expertise.',
			'We deliver commercial and flat roofing services throughout Earth City and the surrounding St. Louis County area, helping property owners, facility managers, and businesses protect the buildings their operations depend on.',
		),
		'community'    => array(
			'eyebrow'    => 'Why Earth City businesses choose 1st Choice',
			'heading'    => 'Flat and Commercial Roofing Built for Earth City&#8217;s Scale',
			'paragraphs' => array(
				'Earth City was designed from the ground up as a master-planned business park, home to office buildings, manufacturing plants, distribution centers, and warehouses, along with the hotels and restaurants that support them. With nearly 3,000 acres of industrial space in and around the district, it&#8217;s one of the most concentrated commercial roofing markets in the region — and the kind of environment where roofing problems carry real consequences for business.',
			),
			'pull_quote' => 'A failing roof over a warehouse or distribution center isn&#8217;t just a maintenance issue — it puts inventory, equipment, and operations directly at risk. 1st Choice Roofing and Construction understands the stakes. We bring the experience, the materials, and the project management to handle large-scale commercial and flat roofing work with minimal disruption to your business.',
		),
		'services'     => array(
			'eyebrow'    => 'Commercial roofing services',
			'heading'    => 'Commercial &amp; Flat Roofing Services in Earth City, MO',
			'intro'      => 'From sprawling warehouses and distribution centers to office buildings and industrial facilities, we handle commercial roofing projects of every size and type across Earth City:',
			'list'       => array(
				'Flat and low-slope commercial roofing systems',
				'Commercial roof replacement and repair',
				'Warehouse, distribution center, and industrial roofing',
				'Office and mixed-use building roofing',
				'Roof inspections and preventive maintenance plans',
				'Storm, hail, and wind damage repair',
				'Emergency roof repair and temporary protection',
				'Free inspections and estimates for property owners and managers',
			),
			'difference' => array(
				'Flat and low-slope roofs come with their own challenges — ponding water, seam separation, membrane punctures, and drainage issues that can quietly worsen for months before anyone notices. For facility managers overseeing large buildings or multiple properties, staying ahead of these problems is far cheaper than reacting to them. That&#8217;s why we put heavy emphasis on routine inspections and preventive maintenance plans tailored to commercial and industrial roofs.',
				'When a repair or replacement is needed, we work efficiently and on a schedule that respects your operations — coordinating around shipping, production, and business hours, keeping the job site clean and safe, and communicating clearly from the first inspection through the final walkthrough. From a single building to an entire facility portfolio, we protect the roofs your business runs under.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm and Weather Damage on Earth City&#8217;s Commercial Roofs',
			'intro'   => array(
				'Large flat roofs are especially vulnerable to Missouri&#8217;s severe weather. Hail can bruise and fracture a membrane, high winds can lift flashing and edge metal, and heavy rain exposes every drainage weakness at once. On a sprawling commercial roof, damage in one section can go undetected for a long time — until it shows up as a leak over a warehouse floor, an office, or critical equipment below.',
				'After any major storm, a professional inspection is the smartest investment a facility manager can make. 1st Choice Roofing and Construction provides free post-storm roof inspections for Earth City businesses. We assess the full roof system, document all damage thoroughly, and coordinate directly with your insurance carrier or adjuster to keep your claim on track. If severe weather recently moved through, let us evaluate your roof before a small problem disrupts your operations.',
			),
		),
		'cta'          => array(
			'heading'   => 'Earth City&#8217;s Commercial Roofing Partner',
			'paragraph' => 'In a business park built on keeping operations running, 1st Choice Roofing and Construction is the roofing partner that helps you stay up and running. Whether you manage a single warehouse or a portfolio of commercial buildings, we bring the expertise, the responsiveness, and the follow-through to keep your roofs performing year-round. Contact us today for a free inspection or estimate — and protect your investment with a team that does the job right the first time.',
		),
		'cta_button'   => 'Request a Free Commercial Roof Inspection',
		'testimonial_cite' => '[Company/Property], Earth City, MO',
		'region'       => 'Serving Earth City and St. Louis County businesses',
		'order'        => $services_first,
	);

	$cities['ellisville'] = array(
		'city'         => 'Ellisville',
		'group'         => 'West St. Louis County',
		'slug'         => 'ellisville',
		'h1'           => 'Roofing Company in Ellisville, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Ellisville, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Ellisville with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-ellisville-mo',
			'keywords'    => 'roofing company Ellisville MO, commercial roofing Ellisville, roof repair Ellisville, roof replacement Ellisville MO, Ellisville roofing contractor, storm damage roofing Ellisville',
		),
		'intro'        => array(
			'Ellisville is a welcoming West County community known for its great neighborhoods, acclaimed Rockwood schools, and an outstanding system of parks and trails. Centered around the intersection of Manchester Road and Clarkson Road, it pairs quiet, established residential streets with a busy commercial corridor. Property owners here take pride in their community, and they expect quality from the people they hire.',
			'We provide residential and commercial roofing throughout Ellisville and West St. Louis County, bringing the same craftsmanship and accountability to every project — from a family home near Bluebird Park to a business along the Manchester corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Ellisville Homes and Businesses',
			'paragraphs' => array(
				'First settled in 1837 and grown from farmland into a thriving suburb, Ellisville has held onto its natural character even as it&#8217;s developed — so much so that it&#8217;s been named a &#8220;Tree City USA&#8221; by the National Arbor Day Foundation for more than three decades, a streak unmatched anywhere in Missouri. With more than 200 acres of parkland, connected walking trails, and well-kept neighborhoods, it&#8217;s consistently recognized as one of the best places to live in the region.',
			),
			'pull_quote' => 'Residents of a community this proud of its surroundings tend to care just as much about their homes — and that&#8217;s the standard 1st Choice Roofing and Construction is glad to meet. Whether you&#8217;re maintaining an established home or caring for a commercial property, we bring the experience and attention to detail Ellisville expects, with roofing built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Ellisville, MO',
			'intro'      => 'The Manchester Road and Clarkson Road corridors give Ellisville a steady commercial base — strip centers, standalone businesses, restaurants, and retail that serve the whole community. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For business owners along Manchester and Clarkson, a roof problem rarely stays just a roof problem — it can interrupt customers, tenants, and daily operations. We keep that disruption to a minimum: scheduling around your hours, working cleanly and safely on site, and communicating clearly from the first inspection to the final walkthrough. From flat commercial roofs to ongoing maintenance plans, we protect the buildings your business relies on.',
				'And for homeowners, the standard holds steady — a fair estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like it&#8217;s on their own street. Honest work, from start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Ellisville Storms and the Damage You Don&#8217;t See',
			'intro'   => array(
				'Out on the western edge of the county, Ellisville gets the full force of Missouri&#8217;s storm seasons — hail, hard winds, and heavy rain that test every roof in town. And with all those mature trees the city is famous for, high winds can bring down limbs that damage shingles and flashing. The trouble is, a lot of storm damage hides in plain sight: your roof can look fine from the yard while water has already found a way past the surface.',
				'A professional inspection is the surest way to know. 1st Choice Roofing and Construction provides free post-storm roof inspections for Ellisville homeowners and commercial property owners. We climb up, document everything we find, explain it in plain language, and coordinate directly with your insurance adjuster to keep the claim moving. If the weather&#8217;s been rough lately, let us check your roof while any damage is still easy to fix.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing That Lives Up to Ellisville',
			'paragraph' => 'Ellisville takes pride in its homes, its businesses, and its community — and 1st Choice Roofing and Construction takes that same pride in its work. Whether you&#8217;re recovering from a storm, replacing an aging roof, or maintaining a commercial property along the Manchester corridor, we bring the experience and the follow-through to get it right. Contact us today for your free estimate, and find out what it means to work with a roofing company that does the job right the first time.',
		),
		'region'       => 'Serving Ellisville and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['fenton'] = array(
		'city'         => 'Fenton',
		'group'         => 'West St. Louis County',
		'slug'         => 'fenton',
		'h1'           => 'Roofing Company in Fenton, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Fenton, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Fenton with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-fenton-mo',
			'keywords'    => 'roofing company Fenton MO, commercial roofing Fenton, roof repair Fenton, roof replacement Fenton MO, Fenton roofing contractor, storm damage roofing Fenton',
		),
		'intro'        => array(
			'Fenton sits along the Meramec River in West St. Louis County — a city that balances established residential neighborhoods with one of the most active commercial and industrial bases in the area. From the shops and big-box retailers at Gravois Bluffs to the businesses in Fenton&#8217;s industrial and logistics parks, this is a community where roofs work hard, and where property owners expect work that holds up.',
			'We deliver residential and commercial roofing throughout Fenton and the surrounding area, bringing the same craftsmanship and accountability to every project — from a family home in Old Town Fenton to a warehouse or retail building near Highway 141 and I-44.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Fenton Homes and Businesses',
			'paragraphs' => array(
				'Fenton has deep roots — founded in 1818 by William Lindsay Long along the Meramec River, with the heart of &#8220;Old Town Fenton&#8221; still standing today. Over the decades it&#8217;s grown into a thriving, family-friendly suburb served by the well-regarded Rockwood and Lindbergh school districts, with an excellent park system and the Meramec River Greenway running through it. It&#8217;s also a notable economic hub, home to corporate names like UniGroup, Maritz, and Fabick alongside its industrial and retail centers.',
			),
			'pull_quote' => 'That mix of long-standing homes and major commercial activity means roofing in Fenton calls for real versatility — and it&#8217;s exactly what 1st Choice Roofing and Construction delivers. Whether we&#8217;re protecting a family home or maintaining a commercial building, we bring the experience and lasting workmanship that Fenton property owners count on.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Fenton, MO',
			'intro'      => 'Fenton&#8217;s commercial footprint is substantial — the Gravois Bluffs shopping center, a large industrial park, a growing logistics park, and corporate offices all call the city home. That makes commercial roofing a major part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial and industrial buildings',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => array(
				'For Fenton&#8217;s retailers, warehouses, and industrial buildings, a roof problem can put inventory, equipment, and daily operations at risk — and on large flat roofs, trouble often starts small and spreads unseen. We stay ahead of it with thorough inspections and preventive maintenance plans, and when a repair or replacement is needed, we work efficiently and on a schedule that keeps your business moving. From flat commercial systems to long-term maintenance, we protect the buildings your operation depends on.',
				'Homeowners receive that same dependable service — honest estimates, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality work you can count on, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'River-Valley Weather and Your Fenton Roof',
			'intro'   => array(
				'Sitting in the Meramec River valley, Fenton sees the full range of Missouri&#8217;s severe weather — hail, powerful winds, and heavy rain that can test any roof, residential or commercial. The damage often isn&#8217;t obvious right away: a few bruised shingles, a section of lifted flashing, or a small breach in a flat-roof membrane can sit quietly until the next storm sends water through it and into the building below.',
				'The smartest move after severe weather is a professional inspection. 1st Choice Roofing and Construction offers free post-storm roof inspections for Fenton homeowners and commercial property owners. We document any damage thoroughly, explain what we find in plain terms, and coordinate directly with your insurance adjuster to keep your claim on track. Caught in a recent storm? Let us take a look before a small issue becomes an expensive one.',
			),
		),
		'cta'          => array(
			'heading'   => 'From Old Town to the Industrial Park — Fenton&#8217;s Roofing Company',
			'paragraph' => 'Whether you own a home in one of Fenton&#8217;s established neighborhoods, manage a retail space at Gravois Bluffs, or run a warehouse near I-44, 1st Choice Roofing and Construction has the experience to handle it. We&#8217;re local, dependable, and committed to getting the job done right. Reach out today for your free estimate — and see what it means to work with a roofing company that does it right the first time.',
		),
		'region'       => 'Serving Fenton and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['hazelwood'] = array(
		'city'         => 'Hazelwood',
		'group'         => 'North &amp; Northwest St. Louis County',
		'slug'         => 'hazelwood',
		'h1'           => 'Roofing Company in Hazelwood, MO',
		'service_area' => 'North St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Hazelwood, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Hazelwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-hazelwood-mo',
			'keywords'    => 'roofing company Hazelwood MO, commercial roofing Hazelwood, roof repair Hazelwood, roof replacement Hazelwood MO, Hazelwood roofing contractor, industrial roofing Hazelwood, storm damage roofing Hazelwood',
		),
		'intro'        => array(
			'Hazelwood is one of North County&#8217;s busiest communities — a major regional hub for manufacturing, distribution, and logistics that&#8217;s also home to established residential neighborhoods and vibrant subdivisions. With more than 1,000 businesses and miles of rooftops across its industrial parks, retail centers, and homes, Hazelwood is a place where roofs do serious work.',
			'We provide residential and commercial roofing throughout Hazelwood and North St. Louis County, bringing the same craftsmanship and accountability to every project — from a family home in an established neighborhood to a warehouse or office along the I-270 corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Hazelwood Homes and Businesses',
			'paragraphs' => array(
				'Hazelwood grew up fast — from a village of a few hundred people in 1950 into a thriving community of roughly 26,000, powered for decades by major employers and a steady wave of postwar housing. Much of that residential development happened mid-century, which means a lot of Hazelwood homes are now at the age where roofs need real attention. The city&#8217;s strong commercial tax base keeps it economically healthy, and its AAA-rated schools and convenient North County location continue to draw families and businesses alike.',
			),
			'pull_quote' => 'With so many homes reaching the point of needing repairs or replacement — and a commercial sector that never slows down — Hazelwood property owners need a roofer they can count on. 1st Choice Roofing and Construction brings the experience and lasting workmanship to handle both, with honest guidance about what your roof actually needs.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Hazelwood, MO',
			'intro'      => 'Few St. Louis communities have a commercial and industrial footprint like Hazelwood&#8217;s — home to major operations including Boeing and Amazon facilities, the headquarters of Mallinckrodt Pharmaceuticals, and business parks with millions of square feet of warehouse and logistics space. That makes commercial and industrial roofing a major focus of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial and industrial buildings',
				'Warehouse, distribution, and logistics facility roofing',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'On the large flat roofs that cover Hazelwood&#8217;s warehouses, distribution centers, and office buildings, small problems — ponding water, a separated seam, a minor puncture — can spread unnoticed and threaten inventory, equipment, and operations. We help facility managers stay ahead of that with thorough inspections and preventive maintenance plans, and we handle repairs and replacements on a schedule that keeps your business running.',
				'Homeowners get that same dependable service — a clear estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and your time with respect. Honest work you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'North County Storms and Your Hazelwood Roof',
			'intro'   => array(
				'North County gets hit by the same hail, high winds, and heavy rain that move across the rest of the region every storm season — and those events leave their mark on roofs of every kind. Much of that damage hides in plain sight: cracked shingles, loosened flashing, or a small puncture in a flat roof can sit quietly for weeks, then give way the next time it rains hard.',
				'You can&#8217;t fix what you can&#8217;t see — which is why 1st Choice Roofing and Construction offers free post-storm inspections for Hazelwood homeowners and commercial property owners. We document the damage, walk you through it in plain terms, and coordinate directly with your insurance adjuster to keep your claim moving. If a storm just rolled through, let us take a look before a small problem grows.',
			),
		),
		'cta'          => array(
			'heading'   => 'Hazelwood&#8217;s Roofing Company for Home and Business',
			'paragraph' => 'From the neighborhoods that built Hazelwood to the warehouses and offices that keep it moving, every roof in the city deserves work that lasts. Whether you&#8217;re a homeowner, a facility manager, or a business owner facing storm damage, 1st Choice Roofing and Construction has the experience and the local commitment to get it right. Contact us today for your free estimate — we&#8217;ll handle the rest.',
		),
		'region'       => 'Serving Hazelwood and North St. Louis County',
		'order'        => $services_first,
	);

	$cities['high-ridge'] = array(
		'city'         => 'High Ridge',
		'group'         => 'Jefferson County',
		'slug'         => 'high-ridge',
		'h1'           => 'Roofing Company in High Ridge, MO',
		'service_area' => 'Jefferson County',
		'seo'          => array(
			'title'       => 'Roofing Company in High Ridge, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves High Ridge with expert residential and commercial roofing — storm damage repair, replacements, and free inspections. Jefferson County\'s local roofer.',
			'slug'        => '/roofing-high-ridge-mo',
			'keywords'    => 'roofing company High Ridge MO, roof repair High Ridge, roof replacement High Ridge MO, High Ridge roofing contractor, storm damage roofing High Ridge, Jefferson County roofing',
		),
		'intro'        => array(
			'High Ridge is a close-knit Jefferson County community of family homes and quiet, established neighborhoods, sitting on some of the highest ground in the county along Route 30. Like the rest of Jefferson County, it sees its share of rough Missouri weather — and homeowners here know the value of a roof that can take it. As a local roofing company based right next door in Arnold, 1st Choice Roofing and Construction is proud to serve High Ridge.',
			'We provide residential and commercial roofing throughout High Ridge and Jefferson County, bringing the same craftsmanship and accountability to every project — and because we&#8217;re local, we&#8217;re here fast when you need us, not driving in from across the metro.',
		),
		'community'    => array(
			'eyebrow'    => 'High Ridge&#8217;s hometown roofing company',
			'heading'    => 'High Ridge&#8217;s Hometown Roofing Company',
			'paragraphs' => array(
				'True to its name, High Ridge sits on a lofty stretch of northern Jefferson County — the second-highest point in the county — with a post office that&#8217;s served the area since 1856. Today it&#8217;s a family-oriented community where most residents own their homes and have put down deep roots, with the convenience of Route 30 connecting it to both St. Louis and the rest of Jefferson County.',
			),
			'pull_quote' => 'As a Jefferson County roofing company ourselves, we understand what local homeowners are up against — from aging roofs on long-held homes to the storm damage that comes with living in this part of Missouri. 1st Choice Roofing and Construction is right next door in Arnold, which means High Ridge homeowners get a roofer who knows the area, shows up quickly, and stands behind the work long after it&#8217;s done.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in High Ridge, MO',
			'intro'      => 'High Ridge is primarily residential, but we serve both homeowners and the local businesses along Route 30 and throughout the community. Our full range of services includes:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Storm and hail damage repair',
				'Roof inspections and free estimates',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial buildings',
				'Siding replacement',
				'Gutters and downspouts',
			),
			'difference' => array(
				'For High Ridge homeowners, your roof is your home&#8217;s first line of defense against everything Jefferson County weather throws at it. We&#8217;ll give you an honest assessment of what your roof actually needs — a targeted repair or a full replacement — back our work with premium materials and manufacturer warranties, and leave your property clean when we&#8217;re done. No upselling, no shortcuts, just straightforward work that lasts.',
				'For the area&#8217;s commercial property owners, we bring that same standard to flat and low-slope roofs, with repairs, replacements, and maintenance scheduled to keep your business running.',
			),
		),
		'storm'        => array(
			'heading' => 'Jefferson County Storm Damage Specialists',
			'intro'   => array(
				'Jefferson County takes some of the hardest hits in the St. Louis region when severe weather rolls through — the same storms that have torn roofs off homes just a few miles away in Arnold. Hail, straight-line winds, and tornado-strength gusts can damage a High Ridge roof in seconds, and not all of that damage is visible from the ground. Cracked shingles, lifted flashing, and loosened seals can hide until water finds its way inside.',
				'Because we&#8217;re a Jefferson County company, we&#8217;re on the ground fast after a storm — not waiting in line behind jobs across the metro. 1st Choice Roofing and Construction provides free post-storm inspections for High Ridge homeowners and businesses. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it after the next storm.',
			),
		),
		'cta'          => array(
			'heading'   => 'Your Local Jefferson County Roofer — Right Next Door',
			'paragraph' => 'When you hire 1st Choice Roofing and Construction, you&#8217;re hiring a neighbor — a Jefferson County roofing company that&#8217;s close by, quick to respond, and committed to doing right by the High Ridge community. Whether you&#8217;re dealing with fresh storm damage, an aging roof, or a commercial property in need of attention, we&#8217;re ready to help. Reach out today for your free estimate from a roofing company that&#8217;s here to stay.',
		),
		'region'       => 'Proudly serving High Ridge and Jefferson County',
		'order'        => $services_first,
	);

	$cities['kirkwood'] = array(
		'city'         => 'Kirkwood',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'kirkwood',
		'h1'           => 'Roofing Company in Kirkwood, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Kirkwood, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Kirkwood with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-kirkwood-mo',
			'keywords'    => 'roofing company Kirkwood MO, commercial roofing Kirkwood, roof repair Kirkwood, roof replacement Kirkwood MO, Kirkwood roofing contractor, historic home roofing Kirkwood, storm damage roofing Kirkwood',
		),
		'intro'        => array(
			'Kirkwood is one of St. Louis County&#8217;s most beloved communities — a historic, walkable city often called the &#8220;Queen of the Suburbs,&#8221; with stately tree-lined avenues, a vibrant downtown, and homes that span well over a century of architecture. From historic residences near the train station to the shops and restaurants of the downtown business district, Kirkwood property owners take real pride in their buildings.',
			'We provide residential and commercial roofing throughout Kirkwood and the surrounding area, bringing the same craftsmanship and accountability to every project — from a century-old home in a historic district to a downtown storefront or commercial building.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Kirkwood Homes and Businesses',
			'paragraphs' => array(
				'Founded in 1853 as the first planned suburb west of the Mississippi, Kirkwood has earned its &#8220;Queen of the Suburbs&#8221; nickname — and is often compared to Bedford Falls for its tree-lined streets, historic homes, and warm community spirit. It&#8217;s home to the 1893 Kirkwood Train Station, a beloved downtown business district on the National Register of Historic Places, the long-running Kirkwood Farmers&#8217; Market, and the award-winning Kirkwood School District, the oldest in St. Louis County.',
			),
			'pull_quote' => 'With so many historic and long-established homes, roofing in Kirkwood often calls for a careful hand — matching the character of an older home while delivering modern protection and durability. 1st Choice Roofing and Construction brings the experience to do exactly that, whether we&#8217;re working on a historic residence, a newer home, or a commercial property downtown.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Kirkwood, MO',
			'intro'      => 'Downtown Kirkwood&#8217;s historic business district — full of restaurants, boutiques, and shops along Kirkwood Road — gives the city a vibrant commercial core, which makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for historic and older homes',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Storm and hail damage repair — residential and commercial',
				'Roof inspections and maintenance plans for property owners and managers',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For the businesses that make downtown Kirkwood a destination, a roof problem can mean lost foot traffic, unhappy tenants, and interrupted business — outcomes no owner wants. We work to prevent that with thorough inspections and maintenance plans, and when a repair or replacement is needed, we schedule around your hours and keep the job site clean and professional from start to finish.',
				'Homeowners receive that same level of care — a clear, honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and its character with the respect they deserve. Quality work, done right.',
			),
		),
		'storm'        => array(
			'heading' => 'Protecting Kirkwood&#8217;s Homes From Storm Damage',
			'intro'   => array(
				'Kirkwood&#8217;s mature tree canopy is one of its defining features — but those towering oaks and maples become a liability when Missouri&#8217;s storms roll through, dropping heavy limbs onto roofs below. Add in hail and high winds, and even a well-built roof can take damage that&#8217;s hard to spot from the ground. On older and historic homes especially, small issues can quietly worsen until water finds its way inside.',
				'After a storm, a professional inspection gives you peace of mind. 1st Choice Roofing and Construction offers free post-storm roof inspections for Kirkwood homeowners and commercial property owners. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later — especially on a home you&#8217;ve worked hard to maintain.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of the Queen of the Suburbs',
			'paragraph' => 'Kirkwood&#8217;s homes and downtown have stood the test of time — and they deserve roofing that does too. Whether you own a historic residence, a newer home, or a commercial property in the heart of downtown, 1st Choice Roofing and Construction brings the care, craftsmanship, and follow-through the job calls for. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Kirkwood and St. Louis County',
		'order'        => $services_first,
	);

	$cities['ladue'] = array(
		'city'         => 'Ladue',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'ladue',
		'h1'           => 'Roofing Company in Ladue',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Ladue | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Ladue with expert residential and commercial roofing — repairs, replacements, and storm damage service for the area\'s finest homes. Free estimates.',
			'slug'        => '/roofing-ladue-mo',
			'keywords'    => 'roofing company Ladue, roof repair Ladue, roof replacement Ladue, Ladue roofing contractor, luxury home roofing Ladue, estate roofing Ladue, storm damage roofing Ladue',
		),
		'intro_heading' => 'An Experienced Roofing Company in Ladue',
		'intro'        => array(
			'One of Missouri\'s most prestigious communities, Ladue is known for its stately estates and expansive wooded lots. With property like this, quality isn&#8217;t optional. Roofing work should protect Ladue homeowner&#8217;s investment and match the caliber of their homes.',
			'We provide residential and commercial roofing throughout Ladue and the surrounding area, bringing meticulous craftsmanship and genuine accountability to every project — from a gorgeous estate to a commercial property.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Ladue Homes',
			'paragraphs' => array(
				'Known across the region as a suburb of comfort and prestige, Ladue is defined by its quiet, tree-lined streets, generous lots, and park-like setting — preserved by zoning that keeps the community green and private. It&#8217;s home to the nationally recognized Ladue School District and some of the most distinguished residences in the state, where homeowners take real pride in every detail of their property.',
			),
			'pull_quote' => 'Estate homes call for a roofer who understands what&#8217;s at stake — the scale, the architecture, and the standard of finish. 1st Choice Roofing and Construction brings the experience, premium materials, and careful workmanship that homes of this caliber demand, with the same accountability on a roof repair as on a full replacement.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Ladue, MO',
			'intro'      => 'Ladue is overwhelmingly residential, and protecting its homes is the heart of our work here — though we also serve the area&#8217;s limited commercial properties. Our full range of services includes:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for estate and luxury homes',
				'Storm and hail damage repair',
				'Roof inspections and free estimates',
				'Commercial roof replacement and repair',
				'Siding replacement',
				'Gutters and downspouts',
			),
			'difference' => array(
				'On a large estate home, a roof is a major investment and one that deserves to be done right. We give you an honest assessment of what your roof actually needs, use premium materials backed by manufacturer warranties, and treat your property and your time with the discretion and respect you expect. From detailed repairs to complete replacements, our work is held to the standard Ladue is known for.',
				'For the area&#8217;s commercial property owners, we bring that same precision to flat and low-slope roofs, with repairs, replacements, and maintenance handled cleanly and professionally.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Ladue&#8217;s Tree-Lined Lots',
			'intro'   => array(
				'Ladue&#8217;s mature trees are part of its beauty — but in a storm, they&#8217;re also a risk, dropping heavy limbs onto the roofs below. Combined with hail and high winds, that can leave damage that&#8217;s hard to spot from the ground, especially on large or complex rooflines.',
				'After a storm, a professional inspection is the smart move. 1st Choice Roofing and Construction offers free post-storm inspections for Ladue homeowners — with photos and documentation ready for your insurance claim and direct coordination with your adjuster. Catching damage early is far cheaper than finding it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of Ladue&#8217;s Finest Homes',
			'paragraph' => 'Your home is one of your most valuable investments and it deserves roofing that reflects it. Whether you need a repair, a full replacement, or a post-storm inspection, 1st Choice Roofing and Construction delivers the craftsmanship and care Ladue expects. Contact us today for your free estimate.',
		),
		'region'       => 'Serving Ladue and St. Louis County',
		'order'        => $services_first,
	);

	$cities['manchester'] = array(
		'city'         => 'Manchester',
		'group'         => 'West St. Louis County',
		'slug'         => 'manchester',
		'h1'           => 'Roofing Company in Manchester, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Manchester, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Manchester with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-manchester-mo',
			'keywords'    => 'roofing company Manchester MO, commercial roofing Manchester, roof repair Manchester, roof replacement Manchester MO, Manchester roofing contractor, storm damage roofing Manchester',
		),
		'intro'        => array(
			'Manchester has been a West County mainstay for over two centuries — a family-friendly city of well-kept neighborhoods anchored by the shops, restaurants, and businesses that line Manchester Road. Homeowners and business owners here value their community and expect quality from anyone they hire.',
			'We handle residential and commercial roofing throughout Manchester and West St. Louis County. Family home or commercial building, every project gets the same craftsmanship and accountability.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Manchester Homes and Businesses',
			'paragraphs' => array(
				'Consistently ranked among the best places to live in Missouri, Manchester is a family-friendly community of around 18,000, with above-average schools, seven city parks, and easy access to everything along Manchester Road.',
			),
			'pull_quote' => '1st Choice Roofing and Construction brings Manchester homeowners and businesses the experience, quality materials, and lasting workmanship every roof deserves — whether it\'s a routine repair or a full replacement.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Manchester, MO',
			'intro'      => 'The Manchester Road corridor gives the city a steady commercial base — shopping centers like Sutton Place, restaurants, and businesses that serve all of West County. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For the businesses along Manchester Road, a roof problem rarely stays just a roof problem — it can interrupt customers, tenants, and daily operations. We keep that disruption to a minimum, scheduling around your hours and communicating clearly from the first inspection to the final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings your business relies on.',
				'And for homeowners, the standard holds steady — a fair estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like it&#8217;s their own. Honest work, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing in Manchester',
			'intro'   => array(
				'Manchester sees the same hail, high winds, and heavy rain that test every roof in West County each storm season. And you never know what kind of damage is on your roof until a professional roofer takes a look at it.',
				'That&#8217;s why a post-storm inspection is worth it. 1st Choice Roofing and Construction offers free inspections for Manchester homeowners and businesses [ COPY INCOMPLETE — the source document ends mid-sentence here. Finish this paragraph before publishing. ]',
			),
		),
		'cta'          => array(
			'heading'   => 'Manchester&#8217;s Roofing Company for Home and Business',
			'paragraph' => 'From its historic Manchester Road corridor to its quiet neighborhoods, this is a community that values quality — and so do we. Whether you&#8217;re facing storm damage, an aging roof, or a commercial property that needs attention, 1st Choice Roofing and Construction is ready to help. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving Manchester and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['maryland-heights'] = array(
		'city'         => 'Maryland Heights',
		'group'         => 'North &amp; Northwest St. Louis County',
		'slug'         => 'maryland-heights',
		'h1'           => 'Roofing Company in Maryland Heights, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Maryland Heights, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Maryland Heights with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-maryland-heights-mo',
			'keywords'    => 'roofing company Maryland Heights MO, commercial roofing Maryland Heights, roof repair Maryland Heights, roof replacement Maryland Heights MO, Maryland Heights roofing contractor, storm damage roofing Maryland Heights',
		),
		'intro'        => array(
			'Maryland Heights sits right in the center of the St. Louis metro — a dynamic community that pairs established residential neighborhoods with one of the region&#8217;s biggest concentrations of business, hospitality, and entertainment. From family homes to corporate campuses, hotels, and the venues that draw millions of visitors each year, this is a city full of roofs that matter.',
			'We provide residential and commercial roofing throughout Maryland Heights and the surrounding area, bringing the same craftsmanship and accountability to every project — from a single-family home to a commercial property near the I-70 and I-270 interchange.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Maryland Heights Homes and Businesses',
			'paragraphs' => array(
				'With a prime location at the crossroads of Interstates 70 and 270, Maryland Heights has grown into a major employment and entertainment hub since its incorporation in 1985. It&#8217;s home to roughly 28,000 residents and more than 1,700 businesses, plus destinations like the Centene Community Ice Center, Saint Louis Music Park, and Hollywood Casino that bring millions of visitors to the city each year. Families here are served by the well-regarded Parkway and Pattonville school districts and enjoy amenities like the Maryland Heights Community Center and Aquaport waterpark.',
			),
			'pull_quote' => 'With such a wide mix of homes and commercial properties, roofing in Maryland Heights takes a company comfortable with both — and that&#8217;s exactly what 1st Choice Roofing and Construction delivers. From a family home to a large commercial building, we bring the experience, materials, and workmanship that hold up for the long haul.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Maryland Heights, MO',
			'intro'      => 'With more than 1,700 businesses — including major corporations like Edward Jones, World Wide Technology, and Charter Communications, plus nearly 4,000 hotel rooms — Maryland Heights has one of the busiest commercial landscapes in the county. That makes commercial roofing a major focus of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial and corporate buildings',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => array(
				'For Maryland Heights&#8217; offices, hotels, and corporate properties, a roof is part of the impression your business makes — and a leak or failing membrane is the last thing any owner or facility manager wants. We handle commercial roofing with the precision that environment calls for: thorough inspections, clean and safe job sites, scheduling that respects your operations, and clear updates from start to finish. From flat commercial systems to ongoing maintenance plans, we keep your property protected and performing.',
				'Homeowners get that same dependable service — an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage on Maryland Heights Roofs',
			'intro'   => array(
				'Sitting in the heart of the metro, Maryland Heights catches the same hail, high winds, and heavy rain that sweep across the region every storm season — and the damage isn&#8217;t always easy to see. A few cracked shingles or a small breach in a flat-roof membrane can hold for weeks before giving way the next time it rains hard.',
				'You can&#8217;t fix what you can&#8217;t see — which is why 1st Choice Roofing and Construction offers free post-storm inspections for Maryland Heights homeowners and commercial property owners. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Maryland Heights&#8217; Roofing Company for Home and Business',
			'paragraph' => 'At the center of it all, Maryland Heights keeps a lot moving — and the roofs over its homes and businesses deserve work that keeps up. Whether you&#8217;re a homeowner, a facility manager, or a business owner facing storm damage, 1st Choice Roofing and Construction has the experience and the local commitment to get it right. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Maryland Heights and St. Louis County',
		'order'        => $services_first,
	);
	$cities['oakville'] = array(
		'city'         => 'Oakville',
		'group'         => 'South St. Louis County',
		'slug'         => 'oakville',
		'h1'           => 'Roofing Company in Oakville, MO',
		'service_area' => 'South St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Oakville, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Oakville, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-oakville-mo',
			'keywords'    => 'roofing company Oakville MO, roof repair Oakville, roof replacement Oakville MO, Oakville roofing contractor, storm damage roofing Oakville, South County roofing',
		),
		'intro'        => array(
			'Oakville is one of South County&#8217;s most established and family-friendly communities — a large, welcoming area of well-kept neighborhoods tucked between the Mississippi and Meramec rivers. Homeowners here take real pride in their properties and expect quality from anyone they hire.',
			'We provide residential and commercial roofing throughout Oakville and South St. Louis County, bringing the same craftsmanship and accountability to every project — from a family home near Cliff Cave Park to a business along Telegraph Road.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Oakville Homes and Businesses',
			'paragraphs' => array(
				'One of the largest communities in South County, Oakville is known for its quiet, established neighborhoods, highly rated Mehlville School District, and beautiful green spaces like Cliff Cave Park and Bee Tree Park overlooking the Mississippi River. It&#8217;s the kind of area where families put down roots and stay for the long haul.',
			),
			'pull_quote' => 'Many Oakville homes were built from the 1970s through the 1990s, which means a lot of roofs in the area are now reaching the age where they need real attention. 1st Choice Roofing and Construction brings the experience and honest guidance to handle whatever your roof needs — a targeted repair or a full replacement built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Oakville, Missouri',
			'intro'      => 'Oakville is primarily residential, but we serve both homeowners and the local businesses along Telegraph Road, Lemay Ferry Road, and throughout the community. Our full range of services includes:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Storm and hail damage repair',
				'Roof inspections and free estimates',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial buildings',
				'Siding replacement',
				'Gutters and downspouts',
			),
			'difference' => array(
				'For Oakville&#8217;s local businesses, a roof problem can interrupt customers and daily operations — so we work efficiently, schedule around your hours, and keep the job site clean and professional. From flat commercial roofs to maintenance plans, we protect the buildings the community depends on.',
				'And for homeowners, we keep it honest and straightforward — a clear estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like it&#8217;s on their own street. Quality work from start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Your Oakville Roof',
			'intro'   => array(
				'Sitting between two rivers in South County, Oakville sees the full force of Missouri&#8217;s storm seasons — hail, high winds, and heavy rain that test every roof in the area. And the damage often hides until it&#8217;s too late: a few bruised shingles or a section of lifted flashing can hold until the next storm pushes water straight through.',
				'A professional inspection is the surest way to know. 1st Choice Roofing and Construction offers free post-storm inspections for Oakville homeowners and businesses — you&#8217;ll know exactly where your roof stands, with photos and documentation ready for your insurance claim. Caught in a recent storm? Let us take a look before a small issue becomes an expensive one.',
			),
		),
		'cta'          => array(
			'heading'   => 'South County&#8217;s Roofing Company — Right Here in Oakville',
			'paragraph' => 'Whether you&#8217;re a longtime Oakville homeowner due for a new roof or a business owner dealing with storm damage, 1st Choice Roofing and Construction is ready to help. We&#8217;re local, experienced, and committed to doing the job right. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving Oakville and South St. Louis County',
		'order'        => $services_first,
	);

	$cities['overland'] = array(
		'city'         => 'Overland',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'overland',
		'h1'           => 'Roofing Company in Overland, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Overland, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Overland, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-overland-mo',
			'keywords'    => 'roofing company Overland MO, roof repair Overland, roof replacement Overland MO, Overland roofing contractor, storm damage roofing Overland, brick home roofing Overland',
		),
		'intro'        => array(
			'Overland is a friendly, close-knit community in mid St. Louis County — known for its walkable streets, well-kept older homes, and a strong sense of neighborly pride. Just minutes from Lambert International Airport, it&#8217;s a city where longtime residents care deeply about their properties.',
			'We provide residential and commercial roofing throughout Overland and mid St. Louis County, bringing the same craftsmanship and accountability to every project — from a classic brick home on a quiet street to a business along Page Avenue or Woodson Road.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Overland Homes and Businesses',
			'paragraphs' => array(
				'Incorporated in 1939 and named for the historic Overland Trail that once ran through the area, Overland is a community with real character. Its tree-lined streets are lined with well-built brick homes from the 1920s through the 1960s — the kind of solid, older housing that neighbors take genuine pride in maintaining, served by the Ritenour School District and a strong network of city parks.',
			),
			'pull_quote' => 'Those older homes have a lot of character — and roofs that often need experienced attention. 1st Choice Roofing and Construction brings the know-how to care for established homes, from a targeted repair to a full replacement, with honest guidance about what your roof actually needs.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Overland, Missouri',
			'intro'      => 'Overland&#8217;s mix of residential streets and businesses along Page Avenue, Woodson Road, and Midland Boulevard keeps commercial roofing part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for established and older homes',
				'Storm and hail damage repair — residential and commercial',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial buildings',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For Overland&#8217;s local businesses, a roof problem can quickly interrupt customers and daily operations. We keep disruption to a minimum — scheduling around your hours and communicating clearly from first inspection to final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings the community relies on.',
				'And for homeowners, the standard holds steady — a fair estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like it&#8217;s their own. Honest work, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Overland&#8217;s Older Roofs',
			'intro'   => array(
				'Overland gets the same hail, high winds, and heavy rain that move across the rest of the region each storm season — and on older homes especially, the damage isn&#8217;t always visible from the ground. Cracked shingles, loosened flashing, or worn spots can sit quietly until water finds its way inside.',
				'That&#8217;s why a professional inspection matters. 1st Choice Roofing and Construction offers free post-storm inspections for Overland homeowners and businesses — you&#8217;ll get a clear picture of your roof&#8217;s condition, with documentation ready for your insurance claim, and we&#8217;ll work directly with your adjuster. If the weather&#8217;s been rough lately, let us take a look before small problems grow.',
			),
		),
		'cta'          => array(
			'heading'   => 'A Roofing Company Overland Can Count On',
			'paragraph' => 'Overland&#8217;s homes and businesses have stood the test of time — and they deserve roofing that does too. Whether you&#8217;re protecting a classic brick home, replacing an aging roof, or caring for a commercial property, 1st Choice Roofing and Construction is ready to help. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Overland and St. Louis County',
		'order'        => $services_first,
	);

	$cities['ofallon-il'] = array(
		'city'         => 'O’Fallon',
		'group'         => 'Metro East, Illinois',
		'slug'         => 'ofallon-il',
		'h1'           => 'Roofing Company in O&#8217;Fallon, IL',
		'state'        => 'IL',
		'pattern_note' => 'Illinois',
		'service_area' => 'the Metro East',
		'seo'          => array(
			'title'       => 'Roofing Company in O&#8217;Fallon, IL | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves O&#8217;Fallon, IL with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-ofallon-il',
			'keywords'    => 'roofing company O&#8217;Fallon IL, commercial roofing O&#8217;Fallon, roof repair O&#8217;Fallon IL, roof replacement O&#8217;Fallon, O&#8217;Fallon roofing contractor, Metro East roofing, storm damage roofing O&#8217;Fallon',
		),
		'intro'        => array(
			'O&#8217;Fallon is the second-largest city in the Metro East and one of the most sought-after communities on the Illinois side of the St. Louis region. Just minutes from Scott Air Force Base and a short drive from downtown St. Louis, it blends a welcoming, family-friendly feel with steady growth and a strong local economy.',
			'We provide residential and commercial roofing throughout O&#8217;Fallon and the Metro East, bringing the same craftsmanship and accountability to every project — from a home near the Downtown District to a business along the city&#8217;s growing commercial corridors.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for O&#8217;Fallon Homes and Businesses',
			'paragraphs' => array(
				'Founded in 1854 and shaped for over a century by its close ties to Scott Air Force Base, O&#8217;Fallon has grown into a thriving community of more than 30,000 residents. It&#8217;s known for its top-rated O&#8217;Fallon Township High School, an excellent network of public parks, a walkable downtown around Vine Street, and community traditions like the O&#8217;Fallon Farmers&#8217; Market and Celebration of Lights.',
			),
			'pull_quote' => 'That pride in community shows in how residents care for their homes — and it&#8217;s a standard 1st Choice Roofing and Construction is glad to meet. Whether it&#8217;s an established home, a newer build, or a commercial property, we bring the experience and lasting workmanship O&#8217;Fallon property owners count on.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in O&#8217;Fallon, Illinois',
			'intro'      => 'With more than 1,000 businesses and a growing commercial base tied to Scott Air Force Base and the region&#8217;s healthcare corridor, O&#8217;Fallon keeps commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For O&#8217;Fallon&#8217;s businesses, a roof issue can disrupt customers, tenants, and daily operations — so we work cleanly, schedule around your hours, and keep you informed from first inspection to final walkthrough. From flat commercial roofs to maintenance plans, we protect what your business relies on.',
				'Homeowners get that same dependable service: an honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like its own.',
			),
		),
		'storm'        => array(
			'heading' => 'Metro East Storms and Your O&#8217;Fallon Roof',
			'intro'   => array(
				'The severe weather that batters the Missouri side of the metro hits the Illinois side just as hard. O&#8217;Fallon sees its share of hail, damaging winds, and heavy rain — and much of the damage hides in plain sight, sitting quietly for weeks before giving way in the next hard rain.',
				'You can&#8217;t fix what you can&#8217;t see, so 1st Choice Roofing and Construction offers free post-storm inspections for O&#8217;Fallon homeowners and businesses. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Your Metro East Roofing Partner in O&#8217;Fallon',
			'paragraph' => 'From O&#8217;Fallon&#8217;s established neighborhoods to its newest developments, the properties here deserve roofing that lasts. Whether you&#8217;re dealing with storm damage, an aging roof, or a commercial building that needs a dependable hand, 1st Choice Roofing and Construction has the experience to get it right. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving O&#8217;Fallon and the Metro East',
		'order'        => $services_first,
	);

	$cities['ofallon-mo'] = array(
		'city'         => 'O’Fallon',
		'group'         => 'St. Charles County',
		'slug'         => 'ofallon-mo',
		'h1'           => 'Roofing Company in O&#8217;Fallon, MO',
		'pattern_note' => 'Missouri',
		'service_area' => 'St. Charles County',
		'seo'          => array(
			'title'       => 'Roofing Company in O&#8217;Fallon, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves O&#8217;Fallon, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-ofallon-mo',
			'keywords'    => 'roofing company O&#8217;Fallon MO, commercial roofing O&#8217;Fallon, roof repair O&#8217;Fallon, roof replacement O&#8217;Fallon MO, O&#8217;Fallon roofing contractor, storm damage roofing O&#8217;Fallon',
		),
		'intro'        => array(
			'O&#8217;Fallon is the largest city in St. Charles County and the biggest suburb in the entire St. Louis area — a fast-growing, family-focused community of new subdivisions, established neighborhoods, and a thriving local economy. With so much growth along the I-64 and I-70 corridors, O&#8217;Fallon is a city full of homes and businesses that depend on quality roofing.',
			'We provide residential and commercial roofing throughout O&#8217;Fallon and St. Charles County, bringing the same craftsmanship and accountability to every project — from a newer home in one of the city&#8217;s growing subdivisions to a business along the Highway K corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for O&#8217;Fallon Homes and Businesses',
			'paragraphs' => array(
				'Once a quiet railroad town founded in the 1850s, O&#8217;Fallon has become one of Missouri&#8217;s largest and fastest-growing cities, with a population that has soared past 90,000. It&#8217;s repeatedly ranked among the best places to live in America, thanks to its strong Fort Zumwalt and Francis Howell school districts, an impressive park system, and family favorites like the holiday display at Fort Zumwalt Park and the Alligator&#8217;s Creek water park.',
			),
			'pull_quote' => 'A community growing this quickly is full of homes — both newer builds and maturing subdivisions — that need dependable roofing. 1st Choice Roofing and Construction brings the experience, quality materials, and lasting workmanship O&#8217;Fallon property owners expect, whether it&#8217;s a home or a commercial building.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in O&#8217;Fallon, Missouri',
			'intro'      => 'O&#8217;Fallon&#8217;s rapid growth has brought a strong commercial base along Highway K, Highway N, and the interstate corridors — retail centers, restaurants, and offices that serve the whole county. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For O&#8217;Fallon&#8217;s businesses, a roof problem can quickly become a business problem — disrupting customers, tenants, and daily operations. We keep that to a minimum, scheduling around your hours and communicating clearly from the first inspection to the final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings your business relies on.',
				'Homeowners get that same care — an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing in O&#8217;Fallon',
			'intro'   => array(
				'Out in St. Charles County, O&#8217;Fallon sees the full range of Missouri&#8217;s severe weather — hail, high winds, and heavy rain that put every roof to the test. The damage often hides in plain sight: cracked shingles or a section of lifted flashing can sit unnoticed for weeks, then give way the next time it rains hard.',
				'That&#8217;s why a post-storm inspection is worth it. 1st Choice Roofing and Construction offers free inspections for O&#8217;Fallon homeowners and businesses — you&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. If the weather&#8217;s been rough lately, let us take a look while the damage is still easy to fix.',
			),
		),
		'cta'          => array(
			'heading'   => 'O&#8217;Fallon&#8217;s Roofing Company for Home and Business',
			'paragraph' => 'As one of the region&#8217;s fastest-growing communities, O&#8217;Fallon depends on roofs that hold up — and 1st Choice Roofing and Construction is ready to deliver. Whether you&#8217;re facing storm damage, an aging roof, or a commercial property that needs attention, we bring the experience and follow-through to get it right. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving O&#8217;Fallon and St. Charles County',
		'order'        => $services_first,
	);

	$cities['richmond-heights'] = array(
		'city'         => 'Richmond Heights',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'richmond-heights',
		'h1'           => 'Roofing Company in Richmond Heights, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Richmond Heights, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Richmond Heights, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-richmond-heights-mo',
			'keywords'    => 'roofing company Richmond Heights MO, commercial roofing Richmond Heights, roof repair Richmond Heights, roof replacement Richmond Heights MO, Richmond Heights roofing contractor, storm damage roofing Richmond Heights',
		),
		'intro'        => array(
			'Richmond Heights sits right in the center of the St. Louis metro — an inner-ring suburb next to Clayton that blends charming residential streets with one of the region&#8217;s premier shopping and commercial districts. From historic homes to the retail and office space around the Galleria and The Boulevard, this is a community full of roofs that matter.',
			'We provide residential and commercial roofing throughout Richmond Heights and the surrounding area, bringing the same craftsmanship and accountability to every project — from a century-old home to a commercial property along Brentwood Boulevard.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Richmond Heights Homes and Businesses',
			'paragraphs' => array(
				'Incorporated in 1913 and once known as a &#8220;city of homes,&#8221; Richmond Heights has grown into one of the most connected and convenient communities in St. Louis County — served by two MetroLink stations, Interstates 64 and 170, and an easy commute to Clayton and downtown. Its neighborhoods blend historic homes, mid-century residences, and modern living, all within walking distance of shopping and dining.',
			),
			'pull_quote' => 'That mix of established homes and a busy commercial core means roofing here calls for real versatility. 1st Choice Roofing and Construction brings the experience to handle both — preserving the character of an older home or delivering the reliable service a commercial property owner expects.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Richmond Heights, Missouri',
			'intro'      => 'With premier destinations like the Saint Louis Galleria and The Boulevard — plus office space and businesses along Brentwood Boulevard and Hanley Road — Richmond Heights has one of the busiest commercial landscapes in the county. That makes commercial roofing a major focus of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For Richmond Heights&#8217; retail centers, offices, and mixed-use properties, a roof is part of the impression your business makes — and a leak or failing membrane is the last thing any owner or facility manager wants. We handle commercial roofing with precision: thorough inspections, clean job sites, scheduling that respects your operations, and clear updates from start to finish. From flat commercial systems to maintenance plans, we keep your property protected and performing.',
				'Homeowners get that same dependable service — an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage on Richmond Heights Roofs',
			'intro'   => array(
				'Sitting in the heart of the metro, Richmond Heights catches the same hail, high winds, and heavy rain that sweep across the region every storm season — and the damage isn&#8217;t always easy to see. A few cracked shingles or a small breach in a flat-roof membrane can hold for weeks before giving way the next time it rains hard.',
				'You can&#8217;t fix what you can&#8217;t see — which is why 1st Choice Roofing and Construction offers free post-storm inspections for Richmond Heights homeowners and commercial property owners. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Richmond Heights&#8217; Roofing Company for Home and Business',
			'paragraph' => 'At the center of it all, Richmond Heights keeps a lot moving — and the roofs over its homes and businesses deserve work that keeps up. Whether you&#8217;re a homeowner, a property manager, or a business owner facing storm damage, 1st Choice Roofing and Construction has the experience to get it right. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving Richmond Heights and St. Louis County',
		'order'        => $services_first,
	);

	$cities['richmond-heights-commercial'] = array(
		'city'         => 'Richmond Heights',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'richmond-heights-commercial',
		'h1'           => 'Commercial &amp; Flat Roofing in Richmond Heights, MO',
		'pattern_note' => 'Commercial focus',
		'gallery_heading' => 'Recent Commercial Work in Richmond Heights &amp; St. Louis County',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Commercial & Flat Roofing in Richmond Heights, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction provides commercial and flat roofing for Richmond Heights businesses — retail centers, offices, and mixed-use buildings. Repairs, replacements, and free inspections.',
			'slug'        => '/commercial-flat-roofing-richmond-heights-mo',
			'keywords'    => 'commercial roofing Richmond Heights MO, flat roofing Richmond Heights, commercial roof repair Richmond Heights, retail roofing Richmond Heights, office building roofing Richmond Heights MO, flat roof replacement Richmond Heights',
		),
		'intro'        => array(
			'Richmond Heights is one of the busiest commercial districts in St. Louis County — home to the Saint Louis Galleria, The Boulevard, and a dense concentration of retail centers, office buildings, and mixed-use properties. Buildings like these share one thing in common: large, flat, low-slope roofs that demand specialized expertise.',
			'We deliver commercial and flat roofing services throughout Richmond Heights and the surrounding area, helping property owners, facility managers, and businesses protect the buildings their operations depend on.',
		),
		'community'    => array(
			'eyebrow'    => 'Why Richmond Heights businesses choose 1st Choice',
			'heading'    => 'Flat and Commercial Roofing Built for Richmond Heights',
			'paragraphs' => array(
				'With premier shopping destinations, corporate office space, and one of the highest concentrations of retail in the region, Richmond Heights is a commercial roofing market like few others in the county. It&#8217;s an environment where a roofing problem carries real consequences — for tenants, customers, and the bottom line.',
			),
			'pull_quote' => 'A failing roof over a retail center or office building isn&#8217;t just a maintenance issue — it puts inventory, operations, and your property&#8217;s reputation at risk. 1st Choice Roofing and Construction understands the stakes, and brings the experience, materials, and project management to handle commercial and flat roofing work with minimal disruption to your business.',
		),
		'services'     => array(
			'eyebrow'    => 'Commercial roofing services',
			'heading'    => 'Commercial &amp; Flat Roofing Services in Richmond Heights, MO',
			'intro'      => 'From retail centers and restaurants to office buildings and mixed-use properties, we handle commercial roofing projects of every size and type across Richmond Heights:',
			'list'       => array(
				'Flat and low-slope commercial roofing systems',
				'Commercial roof replacement and repair',
				'Retail center, office, and mixed-use building roofing',
				'Roof inspections and preventive maintenance plans',
				'Storm, hail, and wind damage repair',
				'Emergency roof repair and temporary protection',
				'Free inspections and estimates for property owners and managers',
			),
			'difference' => array(
				'Flat and low-slope roofs come with their own challenges — ponding water, seam separation, membrane punctures, and drainage issues that can quietly worsen for months before anyone notices. For property managers overseeing retail centers or multiple buildings, staying ahead of these problems is far cheaper than reacting to them. That&#8217;s why we emphasize routine inspections and preventive maintenance plans tailored to commercial roofs.',
				'When a repair or replacement is needed, we work efficiently and on a schedule that respects your operations — coordinating around business hours, keeping the job site clean and safe, and communicating clearly from the first inspection through the final walkthrough. From a single building to an entire property portfolio, we protect the roofs your business runs under.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm and Weather Damage on Richmond Heights Commercial Roofs',
			'intro'   => array(
				'Large flat roofs are especially vulnerable to Missouri&#8217;s severe weather. Hail can bruise and fracture a membrane, high winds can lift flashing and edge metal, and heavy rain exposes every drainage weakness at once. On a sprawling commercial roof, damage in one section can go undetected for a long time — until it shows up as a leak over a store, an office, or critical equipment below.',
				'After any major storm, a professional inspection is the smartest investment a property manager can make. 1st Choice Roofing and Construction provides free post-storm roof inspections for Richmond Heights businesses. We assess the full roof system, document all damage, and coordinate directly with your insurance carrier or adjuster to keep your claim on track. If severe weather recently moved through, let us evaluate your roof before a small problem disrupts your operations.',
			),
		),
		'cta'          => array(
			'heading'   => 'Richmond Heights&#8217; Commercial Roofing Partner',
			'paragraph' => 'In a district built on keeping business moving, 1st Choice Roofing and Construction is the roofing partner that helps you stay up and running. Whether you manage a single retail building or a portfolio of commercial properties, we bring the expertise, responsiveness, and follow-through to keep your roofs performing year-round. Contact us today for a free inspection or estimate.',
		),
		'cta_button'   => 'Request a Free Commercial Roof Inspection',
		'testimonial_cite' => '[Company/Property], Richmond Heights, MO',
		'region'       => 'Serving Richmond Heights and St. Louis County businesses',
		'order'        => $services_first,
	);

	$cities['st-charles'] = array(
		'city'         => 'St. Charles',
		'group'         => 'St. Charles County',
		'slug'         => 'st-charles',
		'h1'           => 'Roofing Company in St. Charles, MO',
		'service_area' => 'St. Charles County',
		'seo'          => array(
			'title'       => 'Roofing Company in St. Charles, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves St. Charles, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-st-charles-mo',
			'keywords'    => 'roofing company St. Charles MO, commercial roofing St. Charles, roof repair St. Charles, roof replacement St. Charles MO, St. Charles roofing contractor, historic home roofing St. Charles, storm damage roofing St. Charles',
		),
		'intro'        => array(
			'St. Charles is one of Missouri&#8217;s most historic and beloved communities — the state&#8217;s first capital, home to a famous cobblestone Main Street, and a thriving modern city all at once. From century-old homes near the riverfront to newer subdivisions and a busy commercial base, St. Charles is a community where roofs work hard and property owners expect quality.',
			'We provide residential and commercial roofing throughout St. Charles and the surrounding area, bringing the same craftsmanship and accountability to every project — from a historic home near Main Street to a business along the I-70 corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for St. Charles Homes and Businesses',
			'paragraphs' => array(
				'Founded in 1769 as the oldest city on the Missouri River, St. Charles carries a remarkable history — it served as Missouri&#8217;s first state capital from 1821 to 1826, launched the Lewis and Clark Expedition in 1804, and preserves one of the finest historic districts in the state along its famous brick Main Street. Today it&#8217;s a growing city of more than 70,000, blending that deep heritage with strong schools, riverfront parks, and a lively commercial scene.',
			),
			'pull_quote' => 'With so many historic and long-established homes, roofing in St. Charles often calls for a careful hand — matching the character of an older home while delivering modern protection. 1st Choice Roofing and Construction brings the experience to do exactly that, whether we&#8217;re working on a historic residence, a newer home, or a commercial property.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in St. Charles, Missouri',
			'intro'      => 'St. Charles has a strong commercial base — from the shops and restaurants of historic Main Street to retail centers and businesses along the I-70 corridor. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Roofing for historic and older homes',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For St. Charles businesses — from Main Street shops to commercial properties along the interstate — a roof problem can interrupt customers, tenants, and daily operations. We keep that disruption to a minimum, scheduling around your hours and communicating clearly from first inspection to final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings your business relies on.',
				'Homeowners receive that same level of care — an honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and its character with respect. Quality work, done right.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing in St. Charles',
			'intro'   => array(
				'St. Charles County sees the full range of Missouri&#8217;s severe weather — hail, high winds, and heavy rain that test every roof in the area. Much of that damage hides in plain sight: cracked shingles, loosened flashing, or a small puncture in a flat roof can sit quietly for weeks, then give way the next time it rains hard.',
				'A professional inspection is the surest way to know. 1st Choice Roofing and Construction offers free post-storm inspections for St. Charles homeowners and businesses — you&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. If the weather&#8217;s been rough lately, let us take a look while the damage is still easy to fix.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of Missouri&#8217;s First Capital',
			'paragraph' => 'From historic Main Street to its newest neighborhoods, St. Charles is a community that values quality — and so do we. Whether you&#8217;re caring for a historic home, a newer build, or a commercial property, 1st Choice Roofing and Construction brings the craftsmanship and follow-through the job deserves. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving St. Charles and St. Charles County',
		'order'        => $services_first,
	);

	$cities['st-peters'] = array(
		'city'         => 'St. Peters',
		'group'         => 'St. Charles County',
		'slug'         => 'st-peters',
		'h1'           => 'Roofing Company in St. Peters, MO',
		'service_area' => 'St. Charles County',
		'seo'          => array(
			'title'       => 'Roofing Company in St. Peters, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves St. Peters, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-st-peters-mo',
			'keywords'    => 'roofing company St. Peters MO, commercial roofing St. Peters, roof repair St. Peters, roof replacement St. Peters MO, St. Peters roofing contractor, storm damage roofing St. Peters',
		),
		'intro'        => array(
			'St. Peters is one of St. Charles County&#8217;s largest and most family-friendly cities — a fast-grown suburb of well-planned neighborhoods, excellent amenities, and a busy commercial base. Repeatedly ranked among the best places to live in America, it&#8217;s a community where homeowners and businesses expect quality.',
			'We provide residential and commercial roofing throughout St. Peters and St. Charles County, bringing the same craftsmanship and accountability to every project — from a family home near Spencer Creek to a business along the Mid Rivers Mall corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for St. Peters Homes and Businesses',
			'paragraphs' => array(
				'Founded by French traders in the late 1700s and a small town of just 486 people as recently as 1970, St. Peters has grown into a city of nearly 60,000 — named to Money Magazine&#8217;s Best Places to Live list six times, including a #1 ranking in Missouri. It&#8217;s known for its strong Fort Zumwalt and Francis Howell schools, the world-class St. Peters Rec-Plex, and a park system spanning more than 1,200 acres.',
			),
			'pull_quote' => 'Much of the city&#8217;s housing was built from the 1970s onward, which means many St. Peters roofs are now at the age where they need real attention. 1st Choice Roofing and Construction brings the experience and honest guidance to handle whatever your roof needs — a targeted repair or a full replacement built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in St. Peters, Missouri',
			'intro'      => 'St. Peters has a strong commercial base — anchored by Mid Rivers Mall, the largest mall in St. Charles County, plus retail corridors and logistics facilities at Premier 370. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For St. Peters&#8217; retailers, offices, and warehouse facilities, a roof problem can put customers, tenants, and operations at risk — and on large flat roofs, trouble often starts small and spreads unseen. We stay ahead of it with thorough inspections and maintenance plans, and schedule repairs and replacements to keep your business moving.',
				'Homeowners get that same dependable service: an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing in St. Peters',
			'intro'   => array(
				'St. Charles County sits squarely in Missouri&#8217;s storm country, and St. Peters sees its share of hail, high winds, and heavy rain each season. The damage often hides in plain sight — a few bruised shingles or a section of lifted flashing can hold until the next storm drives water through and into your home or building.',
				'That&#8217;s why a post-storm inspection is worth it. 1st Choice Roofing and Construction offers free inspections for St. Peters homeowners and businesses — you&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Caught in a recent storm? Let us take a look before a small issue becomes an expensive one.',
			),
		),
		'cta'          => array(
			'heading'   => 'St. Peters&#8217; Roofing Company for Home and Business',
			'paragraph' => 'From its family neighborhoods to the businesses along Mid Rivers, St. Peters runs on properties that need to stay protected year-round. Whether you&#8217;re facing storm damage, an aging roof, or a commercial building that needs attention, 1st Choice Roofing and Construction is ready to help. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving St. Peters and St. Charles County',
		'order'        => $services_first,
	);

	$cities['st-louis'] = array(
		'city'         => 'St. Louis',
		'group'         => 'City of St. Louis',
		'slug'         => 'st-louis',
		'h1'           => 'Roofing Company in St. Louis, MO',
		'gallery_heading' => 'Recent Work in the City of St. Louis',
		'service_area' => 'the City of St. Louis',
		'seo'          => array(
			'title'       => 'Roofing Company in St. Louis, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves the City of St. Louis with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-st-louis-mo',
			'keywords'    => 'roofing company St. Louis MO, commercial roofing St. Louis, roof repair St. Louis, roof replacement St. Louis MO, St. Louis roofing contractor, brick home roofing St. Louis, historic home roofing St. Louis, storm damage roofing St. Louis',
		),
		'intro'        => array(
			'St. Louis is a city of brick — block after block of historic homes, storefronts, and buildings that have defined its neighborhoods for well over a century. From the rowhouses of Soulard and the bungalows of south city to the grand homes near Tower Grove and Forest Park, this is a place where roofs protect real history.',
			'We provide residential and commercial roofing throughout the City of St. Louis, bringing the same craftsmanship and accountability to every project — from a historic brick home to a storefront or commercial building.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for St. Louis Homes and Businesses',
			'paragraphs' => array(
				'St. Louis is famously a brick city — after an 1849 fire, the city built almost exclusively in brick for the next century, leaving behind an unmatched collection of historic neighborhoods, from the Second Empire rowhouses of Lafayette Square to the Foursquares of Tower Grove and the bungalows of south city. With 79 official neighborhoods, 14 local historic districts, and the iconic Gateway Arch on its riverfront, the city&#8217;s architecture is part of its identity.',
			),
			'pull_quote' => 'Older brick homes call for a careful, experienced hand — the flashing, the tie-ins, the details that keep a century-old structure watertight. 1st Choice Roofing and Construction brings the know-how to handle historic and established homes, whether it&#8217;s a targeted repair or a full replacement built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in St. Louis, Missouri',
			'intro'      => 'From neighborhood storefronts and restaurants to office buildings and multi-family properties, the City of St. Louis has a deep and varied commercial base — which makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for historic and brick homes',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Storm and hail damage repair — residential and commercial',
				'Roof inspections and maintenance plans for property owners and managers',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For St. Louis businesses — storefronts, restaurants, offices, and multi-family buildings — a roof problem can mean lost business, unhappy tenants, and interrupted operations. We work to prevent that with thorough inspections and maintenance plans, and when a repair or replacement is needed, we schedule around your hours and keep the job site clean and professional. From flat commercial roofs to maintenance plans, we protect the buildings the city runs on.',
				'Homeowners get that same care — an honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and its character with the respect it deserves. Quality work you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage on St. Louis Roofs',
			'intro'   => array(
				'The City of St. Louis takes the same hail, high winds, and heavy rain that move across the region every storm season — and on older homes and flat roofs especially, the damage isn&#8217;t always visible from the ground. Cracked shingles, loosened flashing, or a small breach in a flat roof can hold for weeks before giving way in the next hard rain.',
				'You can&#8217;t fix what you can&#8217;t see — which is why 1st Choice Roofing and Construction offers free post-storm inspections for St. Louis homeowners and commercial property owners. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing for the Brick City',
			'paragraph' => 'St. Louis homes and businesses carry real history — and they deserve roofing built to protect it. Whether you own a historic brick home, a newer property, or a commercial building, 1st Choice Roofing and Construction brings the experience and care the job calls for. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving the City of St. Louis and the surrounding area',
		'order'        => $services_first,
	);

	$cities['sunset-hills'] = array(
		'city'         => 'Sunset Hills',
		'group'         => 'South St. Louis County',
		'slug'         => 'sunset-hills',
		'h1'           => 'Roofing Company in Sunset Hills, MO',
		'service_area' => 'South St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Sunset Hills, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Sunset Hills, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-sunset-hills-mo',
			'keywords'    => 'roofing company Sunset Hills MO, commercial roofing Sunset Hills, roof repair Sunset Hills, roof replacement Sunset Hills MO, Sunset Hills roofing contractor, storm damage roofing Sunset Hills',
		),
		'intro'        => array(
			'Sunset Hills is one of South County&#8217;s most desirable communities — a well-kept, established city known for its quiet neighborhoods, strong schools, and beautiful green spaces. Homeowners here take real pride in their properties and expect quality from the people they hire.',
			'We provide residential and commercial roofing throughout Sunset Hills and South St. Louis County, bringing the same craftsmanship and accountability to every project — from a family home near Watson Trail Park to a business along the Lindbergh corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Sunset Hills Homes and Businesses',
			'paragraphs' => array(
				'Sitting along the historic Route 66 corridor in South County, Sunset Hills is known for its established neighborhoods, well-regarded Lindbergh and Kirkwood schools, and standout amenities like Laumeier Sculpture Park — a nationally recognized outdoor art museum — and the scenic parks overlooking the Meramec River. It&#8217;s the kind of community where residents settle in for the long haul.',
			),
			'pull_quote' => 'That pride in the community shows in how homeowners care for their properties — and it&#8217;s a standard 1st Choice Roofing and Construction is glad to meet. Whether you&#8217;re maintaining an established home or caring for a commercial property, we bring the experience and lasting workmanship Sunset Hills expects.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Sunset Hills, Missouri',
			'intro'      => 'The Lindbergh and Watson Road corridors give Sunset Hills a steady commercial base — retail centers, restaurants, and businesses that serve South County. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => $commercial_services,
			'difference' => array(
				'For Sunset Hills&#8217; businesses, a roof problem rarely stays just a roof problem — it can interrupt customers, tenants, and daily operations. We keep that disruption to a minimum, scheduling around your hours and communicating clearly from first inspection to final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings your business relies on.',
				'And for homeowners, the standard holds steady — a fair estimate, premium materials backed by manufacturer warranties, and a crew that treats your home like it&#8217;s their own. Honest work, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Your Sunset Hills Roof',
			'intro'   => array(
				'Sunset Hills sees the full range of Missouri&#8217;s severe weather — hail, high winds, and heavy rain that test every roof in South County. The damage often isn&#8217;t obvious right away: bruised shingles or lifted flashing can sit unnoticed until water works its way inside.',
				'That&#8217;s why a post-storm inspection is worth it. 1st Choice Roofing and Construction offers free inspections for Sunset Hills homeowners and businesses — documenting any damage and coordinating directly with your insurance adjuster. If severe weather just rolled through, a quick inspection now can save you a major repair later.',
			),
		),
		'cta'          => array(
			'heading'   => 'A Roofing Company Sunset Hills Can Rely On',
			'paragraph' => 'Sunset Hills takes pride in its homes, its businesses, and its community — and 1st Choice Roofing and Construction takes that same pride in its work. Whether you&#8217;re recovering from a storm, replacing an aging roof, or maintaining a commercial property, we bring the experience and follow-through to get it right. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Sunset Hills and South St. Louis County',
		'order'        => $services_first,
	);

	$cities['town-and-country'] = array(
		'city'         => 'Town and Country',
		'group'         => 'West St. Louis County',
		'slug'         => 'town-and-country',
		'h1'           => 'Roofing Company in Town and Country, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Town and Country, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Town and Country, MO with expert residential roofing for the area&#8217;s finest homes — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-town-and-country-mo',
			'keywords'    => 'roofing company Town and Country MO, roof repair Town and Country, roof replacement Town and Country MO, Town and Country roofing contractor, luxury home roofing Town and Country, estate roofing Town and Country, storm damage roofing Town and Country',
		),
		'intro'        => array(
			'Town and Country is one of Missouri&#8217;s most prestigious communities — known for its sprawling estates, large wooded lots, and some of the finest homes in the St. Louis region. With property like this, quality isn&#8217;t optional. Homeowners here expect roofing work that protects their investment and matches the caliber of their homes.',
			'We provide residential and commercial roofing throughout Town and Country and West St. Louis County, bringing meticulous craftsmanship and genuine accountability to every project — from a wooded estate to a commercial property.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Town and Country Homes',
			'paragraphs' => array(
				'Incorporated in 1950 specifically to preserve its low-density, residential character, Town and Country is defined by its one-acre-and-larger lots, winding tree-lined roads, and estate homes set well back from the street. It&#8217;s the wealthiest municipality in Missouri with a population over 10,000, served by the nationally ranked Parkway School District and home to the historic Bellerive Country Club.',
			),
			'pull_quote' => 'Estate homes call for a roofer who understands what&#8217;s at stake — the scale, the architecture, and the standard of finish. 1st Choice Roofing and Construction brings the experience, premium materials, and careful workmanship that homes of this caliber demand, with the same accountability on a repair as on a full replacement.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Town and Country, Missouri',
			'intro'      => 'Town and Country is almost entirely residential, and protecting its homes is the heart of our work here — though we also serve the limited commercial properties along its edges on Manchester Road and Highway 141. Our full range of services includes:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for estate and luxury homes',
				'Storm and hail damage repair',
				'Roof inspections and free estimates',
				'Commercial roof replacement and repair',
				'Siding replacement',
				'Gutters and downspouts',
			),
			'difference' => array(
				'On a large estate home, a roof is a major investment — and one that deserves to be done right. We give you an honest assessment of what your roof actually needs, use premium materials backed by manufacturer warranties, and treat your property and your time with the discretion and respect you expect. From detailed repairs to complete replacements, our work is held to the standard Town and Country is known for.',
				'For the area&#8217;s commercial property owners, we bring that same precision to flat and low-slope roofs, with repairs, replacements, and maintenance handled cleanly and professionally.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Town and Country&#8217;s Wooded Lots',
			'intro'   => array(
				'Town and Country&#8217;s large wooded lots are part of its beauty — but in a storm, those mature oaks and maples become a risk, dropping heavy limbs onto the roofs below. Combined with hail and high winds, that can leave damage that&#8217;s hard to spot from the ground, especially on large or complex rooflines.',
				'After a storm, a professional inspection is the smart move. 1st Choice Roofing and Construction offers free post-storm inspections for Town and Country homeowners — with photos and documentation ready for your insurance claim and direct coordination with your adjuster. Catching damage early is far cheaper than finding it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of Town and Country&#8217;s Finest Homes',
			'paragraph' => 'Your home is one of your most valuable investments — and it deserves roofing that reflects it. Whether you need a repair, a full replacement, or a post-storm inspection, 1st Choice Roofing and Construction delivers the craftsmanship and care Town and Country expects. Contact us today for your free estimate.',
		),
		'region'       => 'Serving Town and Country and West St. Louis County',
		'order'        => $services_first,
	);

	$cities['university-city'] = array(
		'city'         => 'University City',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'university-city',
		'h1'           => 'Roofing Company in University City, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in University City, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves University City, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-university-city-mo',
			'keywords'    => 'roofing company University City MO, commercial roofing University City, roof repair University City, roof replacement University City MO, U City roofing contractor, historic home roofing University City, storm damage roofing University City',
		),
		'intro'        => array(
			'University City — known to locals as U City — is one of St. Louis&#8217; most vibrant and historic suburbs, home to the famous Delmar Loop, tree-lined streets of Tudor and Colonial homes, and a rich cultural life anchored by nearby Washington University. From century-old residences to the businesses along the Loop, U City is a community that takes pride in its character.',
			'We provide residential and commercial roofing throughout University City and the surrounding area, bringing the same craftsmanship and accountability to every project — from a historic home near the Loop to a commercial property along Delmar or Olive Boulevard.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for University City Homes and Businesses',
			'paragraphs' => array(
				'Founded in 1902 and shaped by the 1904 World&#8217;s Fair, University City is a community of remarkable architecture — its historic homes, many built in the 1920s and 1930s, showcase Tudor, Colonial Revival, and Maritz & Young designs in brick, stone, and stucco. At its heart, the nationally recognized Delmar Loop offers live music, dining, and the St. Louis Walk of Fame, while the presence of Washington University lends the city a cosmopolitan, creative energy.',
			),
			'pull_quote' => 'Older and historic homes call for a careful, experienced hand. 1st Choice Roofing and Construction brings the know-how to care for U City&#8217;s distinctive housing — preserving a home&#8217;s character while delivering modern protection, whether it&#8217;s a targeted repair or a full replacement.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in University City, Missouri',
			'intro'      => 'The Delmar Loop and the Olive Boulevard corridor give University City a lively commercial core — restaurants, shops, galleries, and offices — which makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for historic and older homes',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Storm and hail damage repair — residential and commercial',
				'Roof inspections and maintenance plans for property owners and managers',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For the businesses that make the Delmar Loop a destination, a roof problem can mean lost foot traffic, unhappy tenants, and interrupted business. We work to prevent that with thorough inspections and maintenance plans, and when a repair or replacement is needed, we schedule around your hours and keep the job site clean and professional. From flat commercial roofs to maintenance plans, we protect the buildings that keep U City vibrant.',
				'Homeowners receive that same level of care — an honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and its character with the respect it deserves. Quality work, done right.',
			),
		),
		'storm'        => array(
			'heading' => 'Protecting University City&#8217;s Homes From Storm Damage',
			'intro'   => array(
				'University City&#8217;s mature, tree-lined streets are part of its charm — but those large trees become a liability when Missouri&#8217;s storms roll through, dropping heavy limbs onto roofs below. Add hail and high winds, and even a well-built roof can take damage that&#8217;s hard to spot from the ground, especially on older homes.',
				'After a storm, a professional inspection gives you peace of mind. 1st Choice Roofing and Construction offers free post-storm inspections for University City homeowners and commercial property owners — you&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing That Lives Up to U City',
			'paragraph' => 'University City&#8217;s homes and Loop have real character — and they deserve roofing that protects it. Whether you own a historic home, a newer property, or a commercial building along Delmar, 1st Choice Roofing and Construction brings the care and craftsmanship the job calls for. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving University City and St. Louis County',
		'order'        => $services_first,
	);

	$cities['valley-park'] = array(
		'city'         => 'Valley Park',
		'group'         => 'West St. Louis County',
		'slug'         => 'valley-park',
		'h1'           => 'Roofing Company in Valley Park, MO',
		'service_area' => 'southwest St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Valley Park, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Valley Park, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-valley-park-mo',
			'keywords'    => 'roofing company Valley Park MO, commercial roofing Valley Park, roof repair Valley Park, roof replacement Valley Park MO, Valley Park roofing contractor, storm damage roofing Valley Park',
		),
		'intro'        => array(
			'Valley Park is a close-knit community in southwest St. Louis County — a small city along the Meramec River with deep roots, established neighborhoods, and a growing commercial and industrial presence. Homeowners and businesses here value dependability.',
			'We provide residential and commercial roofing throughout Valley Park and the surrounding area, bringing the same craftsmanship and accountability to every project — from a family home in an established neighborhood to a business or warehouse near the I-44 corridor.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Valley Park Homes and Businesses',
			'paragraphs' => array(
				'Nestled along the Meramec River in southwest St. Louis County, Valley Park is a historic small town that has grown into a community blending established residential neighborhoods with a busy commercial and industrial base near Highway 141 and I-44. It&#8217;s served by the Valley Park and Rockwood school districts and offers the kind of tight-knit, hometown feel that keeps residents rooted here.',
			),
			'pull_quote' => 'Whether it&#8217;s a longtime family home or a commercial building, Valley Park property owners need a roofer they can count on. 1st Choice Roofing and Construction brings the experience and lasting workmanship to handle both, with honest guidance about what your roof actually needs.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Valley Park, Missouri',
			'intro'      => 'Valley Park&#8217;s location near Highway 141 and I-44 supports a strong base of businesses, warehouses, and light industrial buildings — which makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial and industrial buildings',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => array(
				'For Valley Park&#8217;s businesses and warehouses, a roof problem can put inventory, equipment, and operations at risk — and on large flat roofs, trouble often starts small and spreads unseen. We stay ahead of it with thorough inspections and maintenance plans, and schedule repairs and replacements to keep your business moving.',
				'Homeowners receive that same dependable service — an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality work you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'River-Valley Weather and Your Valley Park Roof',
			'intro'   => array(
				'Set along the Meramec River, Valley Park is no stranger to hail, high winds, and driving rain — the kind of weather that finds the weak spot in any roof. And the damage often hides in plain sight: a section of lifted flashing or a small puncture in a flat roof can go unnoticed for weeks before water finally works its way inside.',
				'That&#8217;s why a professional inspection matters after any major storm. 1st Choice Roofing and Construction offers free post-storm inspections for Valley Park homeowners and businesses — you&#8217;ll know exactly where your roof stands, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate with your adjuster. Caught in a recent storm? Let us take a look before a small issue becomes an expensive one.',
			),
		),
		'cta'          => array(
			'heading'   => 'Valley Park&#8217;s Roofing Company for Home and Business',
			'paragraph' => 'Whether you own a home in one of Valley Park&#8217;s established neighborhoods or run a business near the I-44 corridor, 1st Choice Roofing and Construction has the experience to handle it. We&#8217;re local, dependable, and committed to getting the job done right. Reach out today for a free estimate and dependable work that lasts.',
		),
		'region'       => 'Serving Valley Park and southwest St. Louis County',
		'order'        => $services_first,
	);

	$cities['webster-groves'] = array(
		'city'         => 'Webster Groves',
		'group'         => 'Mid &amp; Central St. Louis County',
		'slug'         => 'webster-groves',
		'h1'           => 'Roofing Company in Webster Groves, MO',
		'service_area' => 'St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Webster Groves, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Webster Groves, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-webster-groves-mo',
			'keywords'    => 'roofing company Webster Groves MO, commercial roofing Webster Groves, roof repair Webster Groves, roof replacement Webster Groves MO, Webster Groves roofing contractor, historic home roofing Webster Groves, storm damage roofing Webster Groves',
		),
		'intro'        => array(
			'Webster Groves is one of St. Louis&#8217; most charming and historic suburbs — a walkable, tree-lined community of century-old homes, thriving business districts, and a strong sense of community. From Victorian and Tudor homes to the shops along its historic Main Street districts, Webster Groves is a place where property owners take real pride in their buildings.',
			'We provide residential and commercial roofing throughout Webster Groves and the surrounding area, bringing the same craftsmanship and accountability to every project — from a historic home in Webster Park to a storefront or commercial building downtown.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Webster Groves Homes and Businesses',
			'paragraphs' => array(
				'Established alongside the Pacific Railroad in the 1800s and once marketed as the &#8220;Queen of the Suburbs,&#8221; Webster Groves is a community rich in history — with over a dozen districts and buildings on the National Register of Historic Places, more than 50 city-designated landmarks, and gracious homes ranging from Queen Anne Victorians to Tudors and bungalows. It&#8217;s served by the &#8220;Triple A&#8221;-rated Webster Groves School District and is home to Webster University.',
			),
			'pull_quote' => 'With so many historic and long-established homes, roofing in Webster Groves often calls for a careful hand — matching the character of an older home while delivering modern protection. 1st Choice Roofing and Construction brings the experience to do exactly that, whether we&#8217;re working on a historic residence, a newer home, or a commercial property.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Webster Groves, Missouri',
			'intro'      => 'Webster Groves&#8217; historic business districts — full of restaurants, shops, and local institutions — give the city a vibrant commercial core. That makes commercial roofing an important part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for historic and older homes',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Storm and hail damage repair — residential and commercial',
				'Roof inspections and maintenance plans for property owners and managers',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For the businesses that anchor Webster Groves&#8217; historic districts, a roof problem can mean lost foot traffic, unhappy tenants, and interrupted business. We work to prevent that with thorough inspections and maintenance plans, and when a repair or replacement is needed, we schedule around your hours and keep the job site clean and professional. From flat commercial roofs to maintenance plans, we protect the buildings that give the city its character.',
				'Homeowners receive that same level of care — an honest estimate, premium materials backed by manufacturer warranties, and a crew that treats your home and its character with the respect it deserves. Quality work, done right.',
			),
		),
		'storm'        => array(
			'heading' => 'Protecting Webster Groves&#8217; Homes From Storm Damage',
			'intro'   => array(
				'Webster Groves&#8217; mature tree canopy is one of its defining features — but those towering oaks and maples become a liability when storms roll through, dropping limbs onto roofs below. Add hail and high winds, and even a well-built roof can take damage that&#8217;s hard to spot from the ground, especially on older homes.',
				'After a storm, a professional inspection gives you peace of mind. 1st Choice Roofing and Construction offers free post-storm inspections for Webster Groves homeowners and businesses — you&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. Catching damage now is far cheaper than discovering it later, especially on a home you&#8217;ve worked hard to maintain.',
			),
		),
		'cta'          => array(
			'heading'   => 'Roofing Worthy of Webster Groves',
			'paragraph' => 'Webster Groves&#8217; homes and business districts have stood the test of time — and they deserve roofing that does too. Whether you own a historic residence, a newer home, or a commercial property, 1st Choice Roofing and Construction brings the care and craftsmanship the job calls for. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Webster Groves and St. Louis County',
		'order'        => $services_first,
	);

	$cities['wentzville'] = array(
		'city'         => 'Wentzville',
		'group'         => 'St. Charles County',
		'slug'         => 'wentzville',
		'h1'           => 'Roofing Company in Wentzville, MO',
		'service_area' => 'St. Charles County',
		'seo'          => array(
			'title'       => 'Roofing Company in Wentzville, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Wentzville, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-wentzville-mo',
			'keywords'    => 'roofing company Wentzville MO, commercial roofing Wentzville, roof repair Wentzville, roof replacement Wentzville MO, Wentzville roofing contractor, storm damage roofing Wentzville',
		),
		'intro'        => array(
			'Wentzville is the fastest-growing city in Missouri — a booming St. Charles County community of new subdivisions, expanding businesses, and a major manufacturing base, all at the crossroads of I-70 and Highway 61. With growth like this, Wentzville is full of homes and businesses that need dependable roofing.',
			'We provide residential and commercial roofing throughout Wentzville and St. Charles County, bringing the same craftsmanship and accountability to every project — from a newer home in a growing subdivision to a business or industrial building near the interstate.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Wentzville Homes and Businesses',
			'paragraphs' => array(
				'Founded in 1855 as a railroad town and known as the &#8220;Crossroads of the Nation,&#8221; Wentzville has grown explosively — from under 7,000 residents in 2000 to nearly 50,000 today, making it Missouri&#8217;s fastest-growing city. It&#8217;s anchored by the massive General Motors Wentzville Assembly plant, a strong network of parks, and highly regarded Wentzville School District schools that continue to draw families to the area.',
			),
			'pull_quote' => 'A community growing this fast is full of newer homes and subdivisions that need dependable roofing from the start. 1st Choice Roofing and Construction brings the experience, quality materials, and lasting workmanship Wentzville property owners expect — for homes and commercial buildings alike.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Wentzville, Missouri',
			'intro'      => 'Wentzville&#8217;s rapid growth — anchored by the GM assembly plant and an expanding base of retail, warehouse, and industrial buildings — makes commercial roofing a major part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial and industrial buildings',
				'Roof inspections and maintenance plans for property managers and owners',
				'Residential roof replacement and repair',
				'Storm and hail damage repair — residential and commercial',
				'Siding replacement',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => array(
				'For Wentzville&#8217;s businesses, warehouses, and industrial buildings, a roof problem can put inventory, equipment, and operations at risk — and on large flat roofs, trouble often starts small and spreads unseen. We stay ahead of it with thorough inspections and maintenance plans, and schedule repairs and replacements to keep your business moving.',
				'Homeowners get that same dependable service — an honest estimate, premium materials backed by manufacturer warranties, and a crew that respects your home and your time. Quality you can count on.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage Roofing in Wentzville',
			'intro'   => array(
				'Out on the western edge of the metro, Wentzville sees the full force of Missouri&#8217;s storm seasons — hail, high winds, and heavy rain that test every roof in town. Much of that damage hides in plain sight: cracked shingles or a small puncture in a flat roof can sit quietly for weeks, then give way the next time it rains hard.',
				'You can&#8217;t fix what you can&#8217;t see, so 1st Choice Roofing and Construction offers free post-storm inspections for Wentzville homeowners and businesses. You&#8217;ll get a clear picture of your roof&#8217;s condition, with photos and documentation ready for your insurance claim, and we&#8217;ll coordinate directly with your adjuster. If a storm just rolled through, let us take a look before a small problem grows.',
			),
		),
		'cta'          => array(
			'heading'   => 'Wentzville&#8217;s Roofing Company for Home and Business',
			'paragraph' => 'As Missouri&#8217;s fastest-growing city, Wentzville depends on roofs that hold up — and 1st Choice Roofing and Construction is ready to deliver. Whether you&#8217;re facing storm damage, protecting a newer home, or caring for a commercial building, we bring the experience and follow-through to get it right. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Wentzville and St. Charles County',
		'order'        => $services_first,
	);

	$cities['wildwood'] = array(
		'city'         => 'Wildwood',
		'group'         => 'West St. Louis County',
		'slug'         => 'wildwood',
		'h1'           => 'Roofing Company in Wildwood, MO',
		'service_area' => 'West St. Louis County',
		'seo'          => array(
			'title'       => 'Roofing Company in Wildwood, MO | 1st Choice Roofing and Construction',
			'description' => '1st Choice Roofing and Construction serves Wildwood, MO with expert residential and commercial roofing — repairs, replacements, and storm damage service. Free estimates.',
			'slug'        => '/roofing-wildwood-mo',
			'keywords'    => 'roofing company Wildwood MO, commercial roofing Wildwood, roof repair Wildwood, roof replacement Wildwood MO, Wildwood roofing contractor, storm damage roofing Wildwood',
		),
		'intro'        => array(
			'Wildwood is the largest city by area in St. Louis County — a scenic, semi-rural community on the county&#8217;s western edge, known for its rolling hills, wooded lots, and thoughtfully planned neighborhoods. Homeowners here choose Wildwood for its space and natural beauty, and they expect quality from anyone they hire.',
			'We provide residential and commercial roofing throughout Wildwood and West St. Louis County, bringing the same craftsmanship and accountability to every project — from an estate-style home on a wooded lot to a business in the Town Center.',
		),
		'community'    => array(
			'heading'    => 'Quality Roofing for Wildwood Homes and Businesses',
			'paragraphs' => array(
				'Incorporated in 1995 by residents who wanted a say in how their community would grow, Wildwood covers 68 square miles at the foothills of the Ozarks — the third-largest city by area in all of Missouri. It&#8217;s known for its estate-style lifestyle, 11 square miles of protected parkland and open space, an extensive trail system, and the AAA-rated Rockwood School District, all while keeping a peaceful, rural feel just a short drive from the metro.',
			),
			'pull_quote' => 'Larger homes on wooded lots call for a roofer who understands scale and quality. 1st Choice Roofing and Construction brings the experience, premium materials, and careful workmanship Wildwood homeowners expect — whether it&#8217;s a repair or a full replacement built to last.',
		),
		'services'     => array(
			'heading'    => 'Residential and Commercial Roofing in Wildwood, Missouri',
			'intro'      => 'Wildwood balances its rural character with commercial growth around the Town Center and along Manchester Road and Highway 109 — which keeps commercial roofing part of our work here, handled alongside our full residential services:',
			'list'       => array(
				'Residential roof replacement and repair',
				'Roofing for estate and larger homes',
				'Storm and hail damage repair — residential and commercial',
				'Commercial roof replacement and repair',
				'Flat and low-slope roofing systems for commercial properties',
				'Siding replacement',
				'Gutters, downspouts, and free inspections and estimates',
			),
			'difference' => array(
				'For Wildwood&#8217;s businesses around the Town Center and along the main corridors, a roof problem can interrupt customers and daily operations. We keep disruption to a minimum — scheduling around your hours and communicating clearly from first inspection to final walkthrough. From flat commercial roofs to maintenance plans, we protect the buildings the community relies on.',
				'And for homeowners, we bring roofing they don&#8217;t have to think twice about — an honest estimate, premium materials backed by manufacturer warranties, and expert installation that lasts. Quality work, start to finish.',
			),
		),
		'storm'        => array(
			'heading' => 'Storm Damage and Wildwood&#8217;s Wooded Lots',
			'intro'   => array(
				'Wildwood&#8217;s wooded, rolling landscape is part of its appeal — but in a storm, those mature trees become a risk, dropping heavy limbs onto the roofs below. Combined with hail and high winds, that can leave damage that&#8217;s hard to spot from the ground, especially on large or complex rooflines.',
				'After a storm, a professional inspection is the smart move. 1st Choice Roofing and Construction offers free post-storm inspections for Wildwood homeowners and businesses — with photos and documentation ready for your insurance claim and direct coordination with your adjuster. Catching damage early is far cheaper than finding it later.',
			),
		),
		'cta'          => array(
			'heading'   => 'A Roofing Company as Solid as Wildwood',
			'paragraph' => 'Wildwood is a community that values quality and careful planning — and so do we. Whether you&#8217;re protecting an estate home, replacing an aging roof, or caring for a commercial property, 1st Choice Roofing and Construction brings the experience and follow-through to get it right. Contact us today for your free estimate. We&#8217;ll take it from there.',
		),
		'region'       => 'Serving Wildwood and West St. Louis County',
		'order'        => $services_first,
	);
	return $cities;
}

/**
 * State abbreviation for a city, defaulting to Missouri.
 *
 * Collinsville is across the river in Illinois, so this cannot be hard-coded
 * anywhere it appears.
 */
function firstchoice_location_state( $data ) {
	return ! empty( $data['state'] ) ? $data['state'] : 'MO';
}

/**
 * Register one block pattern per service area.
 *
 * Patterns are only ever used in the block editor, so this is hooked to admin
 * page loads and to rest_api_init rather than every front-end request. It has
 * to be both: the editor's inserter fetches patterns from the REST endpoint,
 * where is_admin() is false, and REST_REQUEST is not yet defined at init —
 * it is defined on parse_request, which runs later. Gating on REST_REQUEST at
 * init silently registers nothing for the editor.
 */
function firstchoice_register_location_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	// Registering twice is harmless but wasteful; this runs on two hooks.
	static $registered = false;

	if ( $registered ) {
		return;
	}

	$registered = true;

	register_block_pattern_category(
		'firstchoice-locations',
		array( 'label' => __( '1st Choice — Location Pages', 'firstchoice' ) )
	);

	register_block_pattern(
		'firstchoice/service-areas',
		array(
			'title'       => __( 'Service Areas — all locations', 'firstchoice' ),
			'description' => __( 'Hub page listing every location page, grouped by region. Suggested URL: /service-areas', 'firstchoice' ),
			'categories'  => array( 'firstchoice-locations' ),
			'content'     => firstchoice_build_service_areas_pattern(),
		)
	);

	foreach ( firstchoice_location_data() as $data ) {
		register_block_pattern(
			'firstchoice/location-' . $data['slug'],
			array(
				'title'       => sprintf(
					/* translators: 1: city name, 2: state abbreviation, 3: optional note */
					__( 'Location Page — %1$s, %2$s%3$s', 'firstchoice' ),
					$data['city'],
					firstchoice_location_state( $data ),
					! empty( $data['pattern_note'] ) ? ' (' . $data['pattern_note'] . ')' : ''
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
/**
 * Admin screens: register on init, but only for admin requests.
 */
function firstchoice_register_location_patterns_admin() {
	if ( is_admin() ) {
		firstchoice_register_location_patterns();
	}
}
add_action( 'init', 'firstchoice_register_location_patterns_admin' );

// The block editor's inserter loads patterns over REST, not from the admin page.
add_action( 'rest_api_init', 'firstchoice_register_location_patterns' );

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
	$state  = firstchoice_location_state( $data );
	$button = ! empty( $data['cta_button'] ) ? $data['cta_button'] : 'Request Your Free Estimate';
	$badge  = ! empty( $data['home_base'] )
		? sprintf( 'Home base — %1$s, %2$s', $data['city'], $state )
		: sprintf( 'Serving %1$s, %2$s', $data['city'], $state );

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
			<div class="wp-block-button btn-primary-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>"><?php echo esc_html( $button ); ?></a></div>
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
			? sprintf( 'Based in %1$s, %2$s', $data['city'], firstchoice_location_state( $data ) )
			: sprintf( 'Serving %1$s, %2$s', $data['city'], firstchoice_location_state( $data ) ),
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
	$button = ! empty( $data['cta_button'] ) ? $data['cta_button'] : 'Request Your Free Estimate';

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
			<div class="wp-block-button btn-primary-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>"><?php echo esc_html( $button ); ?></a></div>
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
	$cite_tail = ! empty( $data['testimonial_cite'] )
		? $data['testimonial_cite']
		: sprintf( '%1$s, %2$s', $data['city'], firstchoice_location_state( $data ) );

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
			<cite>&#8212; [First Name, Last Initial], <?php echo wp_kses_post( $cite_tail ); ?></cite>
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

	$gallery_heading = ! empty( $data['gallery_heading'] )
		? $data['gallery_heading']
		: sprintf( 'Recent Work in %1$s &amp; %2$s', $data['city'], $data['service_area'] );

	ob_start();
	?>
<!-- wp:group {"className":"location-gallery alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-gallery">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo wp_kses_post( $gallery_heading ); ?></h2>
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
 * Order the service area groups run in on the hub page, closest to home first.
 * Anything not listed falls to the end, alphabetically.
 */
function firstchoice_location_group_order() {
	return array(
		'Jefferson County',
		'City of St. Louis',
		'South St. Louis County',
		'West St. Louis County',
		'Mid &amp; Central St. Louis County',
		'North &amp; Northwest St. Louis County',
		'St. Charles County',
		'Metro East, Illinois',
	);
}

/**
 * Cities keyed by group, in the order above, each group's cities alphabetical.
 */
function firstchoice_location_groups() {
	$grouped = array();

	foreach ( firstchoice_location_data() as $data ) {
		$group = ! empty( $data['group'] ) ? $data['group'] : $data['service_area'];
		$grouped[ $group ][] = $data;
	}

	$ordered = array();

	foreach ( firstchoice_location_group_order() as $group ) {
		if ( isset( $grouped[ $group ] ) ) {
			$ordered[ $group ] = $grouped[ $group ];
			unset( $grouped[ $group ] );
		}
	}

	ksort( $grouped );

	foreach ( $grouped as $group => $cities ) {
		$ordered[ $group ] = $cities;
	}

	foreach ( $ordered as $group => $cities ) {
		// Sort on the label shown in the directory, not the H1 — the commercial
		// pages open with "Commercial &amp; Flat Roofing" and would otherwise
		// jump to the front instead of sitting beside their own city.
		usort(
			$cities,
			function ( $a, $b ) {
				return strcmp(
					firstchoice_location_directory_label( $a ),
					firstchoice_location_directory_label( $b )
				);
			}
		);
		$ordered[ $group ] = $cities;
	}

	return $ordered;
}

/**
 * The label a city gets in the directory: its name, plus a short qualifier when
 * the name alone would be ambiguous or the page is a second one for that city.
 */
function firstchoice_location_directory_label( $data ) {
	$label = $data['city'];
	$state = firstchoice_location_state( $data );

	if ( 'MO' !== $state ) {
		$label .= ', ' . $state;
	}

	if ( ! empty( $data['pattern_note'] ) && false === strpos( $data['pattern_note'], 'Missouri' ) && false === strpos( $data['pattern_note'], 'Illinois' ) ) {
		$label .= ' — ' . $data['pattern_note'];
	}

	return $label;
}

/**
 * Roof mark used on the Service Areas cards.
 */
function firstchoice_location_roof_icon() {
	return '<svg viewBox="0 0 48 48" width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">'
		. '<path d="M4 24 24 7l20 17" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>'
		. '<path d="M10 22v18h28V22" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/>'
		. '<path d="M20 40V29h8v11" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/>'
		. '</svg>';
}

/**
 * Service Areas hub — one card per location page, grouped by region.
 *
 * Built from the same data as the location pages, so a new city appears here
 * as soon as it is added, with no separate list to keep in step.
 */
function firstchoice_build_service_areas_pattern() {
	$company = firstchoice_location_company();
	$groups  = firstchoice_location_groups();
	$total   = 0;

	foreach ( $groups as $cities ) {
		$total += count( $cities );
	}

	$trust = array(
		'Based in Arnold, MO',
		'Free storm damage inspections',
		'Insurance claim coordination',
		'Licensed &amp; insured',
		sprintf( '%d service areas', $total ),
	);

	ob_start();
	?>
<!-- wp:group {"className":"location-hero alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-hero">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"className":"location-hero-badge"} -->
		<p class="location-hero-badge">Serving the St. Louis metro</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"location-hero-title"} -->
		<h1 class="wp-block-heading location-hero-title">Service Areas</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"location-hero-intro"} -->
		<p class="location-hero-intro">1st Choice Roofing and Construction serves homeowners and commercial property owners across the St. Louis region — from our home base in Arnold through Jefferson County, St. Louis County and the city, St. Charles County, and across the river into the Metro East. Find your community below.</p>
		<!-- /wp:paragraph -->

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
	</div>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"location-trustbar alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-trustbar">
	<div class="wp-block-group__inner-container">
		<!-- wp:group {"className":"trustbar-items","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group trustbar-items">
			<?php foreach ( $trust as $item ) : ?>
			<!-- wp:paragraph {"className":"trustbar-item"} -->
			<p class="trustbar-item"><?php echo wp_kses_post( $item ); ?></p>
			<!-- /wp:paragraph -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-areas alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull service-areas">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph {"align":"center","className":"section-eyebrow"} -->
		<p class="has-text-align-center section-eyebrow">Where we work</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">Communities We Serve</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","className":"service-areas-intro"} -->
		<p class="has-text-align-center service-areas-intro">Every city below has its own page covering the roofing work we do there. Don&#8217;t see your community? Call us at <a href="tel:<?php echo esc_attr( $company['phone_href'] ); ?>"><?php echo esc_html( $company['phone'] ); ?></a> — we serve the wider St. Louis area too.</p>
		<!-- /wp:paragraph -->

		<?php foreach ( $groups as $group => $cities ) : ?>
		<!-- wp:group {"className":"service-area-group","layout":{"type":"constrained"}} -->
		<div class="wp-block-group service-area-group">
			<!-- wp:heading {"level":3,"className":"service-area-group-title"} -->
			<h3 class="wp-block-heading service-area-group-title"><?php echo wp_kses_post( $group ); ?></h3>
			<!-- /wp:heading -->

			<div class="service-area-grid">
				<?php foreach ( $cities as $city ) : ?>
				<a class="service-area-card" href="<?php echo esc_url( $city['seo']['slug'] ); ?>">
					<span class="service-area-card-icon"><?php echo firstchoice_location_roof_icon(); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
					<span class="service-area-card-name"><?php echo esc_html( firstchoice_location_directory_label( $city ) ); ?></span>
					<span class="service-area-card-cta">Learn more</span>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"location-cta alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-cta">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">Not Sure If We Cover Your Area?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">We work throughout the greater St. Louis region, and the list above is where we work most often. Give us a call and we&#8217;ll tell you straight away whether we can get to you — and book your free inspection while we&#8217;re at it.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"btn-primary-red"} -->
			<div class="wp-block-button btn-primary-red"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>">Request Your Free Estimate</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"align":"center","className":"location-cta-phone"} -->
		<p class="has-text-align-center location-cta-phone">Call us: <a href="tel:<?php echo esc_attr( $company['phone_href'] ); ?>"><?php echo esc_html( $company['phone'] ); ?></a>  |  Serving the greater St. Louis area</p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

<?php
	echo firstchoice_location_badges(); // phpcs:ignore WordPress.Security.EscapeOutput
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
