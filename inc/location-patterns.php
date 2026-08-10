<?php
/**
 * Location / service area page block patterns.
 *
 * Each city is a data array; the pattern markup is generated from it, so adding
 * a new service area page means adding one entry to firstchoice_location_data().
 *
 * Content source: Afflecto Media Marketing location page template v2.
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
			'term'  => __( '10 Years', 'firstchoice' ),
			'label' => __( 'On roof replacements', 'firstchoice' ),
		),
		array(
			'term'  => __( '3 Years', 'firstchoice' ),
			'label' => __( 'On siding', 'firstchoice' ),
		),
		array(
			'term'  => __( '1 Year', 'firstchoice' ),
			'label' => __( 'On gutters and repairs', 'firstchoice' ),
		),
	);
}

/**
 * Per-city page content.
 *
 * Keys used by the builder:
 *   city      - display name
 *   slug      - pattern slug fragment
 *   h1        - page H1 / WordPress page title
 *   seo       - title, description, slug, keywords (for Yoast, not output in markup)
 *   intro     - array of paragraphs under the H1
 *   community - heading + array of paragraphs
 *   storm     - optional: heading + intro paragraphs + list + closing paragraph
 *   services  - heading + intro + list + difference paragraph
 *   cta       - heading + paragraph
 *   region    - text appended after the phone number in the CTA
 */
function firstchoice_location_data() {
	$cities = array();

	$cities['arnold'] = array(
		'city'  => 'Arnold',
		'slug'  => 'arnold',
		'h1'    => 'Roofing Company in Arnold, MO',
		'seo'   => array(
			'title'       => 'Roofing Company in Arnold, MO | 1st Choice Roofing and Construction',
			'description' => "1st Choice Roofing and Construction is Arnold's local roofing company — storm damage repair, roof replacement, and free inspections for Jefferson County homeowners. Call today.",
			'slug'        => '/roofing-arnold-mo',
			'keywords'    => 'roofing company Arnold MO, storm damage roofing Arnold, roof repair Arnold MO, Arnold MO roofing contractor, hail damage roof Arnold, Jefferson County roofing',
		),
		'intro' => array(
			'Arnold homeowners and commercial property owners know better than most what Missouri storms can do to a roof. Jefferson County sits in the path of some of the most severe weather in the St. Louis region — and when those storms hit, the damage is real and the need for a reliable, local roofing company is immediate. 1st Choice Roofing and Construction is based right here in Arnold, and we&#8217;ve been protecting Jefferson County homes and businesses with quality craftsmanship and honest service.',
			'When the storm clears, we&#8217;re already in your neighborhood. Not driving in from somewhere else.',
		),
		'community' => array(
			'heading'    => 'Arnold&#8217;s Hometown Roofing Company',
			'paragraphs' => array(
				'Arnold is Jefferson County&#8217;s largest city — a family-friendly community where well-kept neighborhoods, top-rated Fox C-6 schools, and easy access to I-55 make it one of the best places to live in the St. Louis area. Residents here own their homes, invest in their properties, and expect the same high standards from the contractors they hire.',
				'They also know the weather. Arnold sits in a corridor that takes a direct hit from Missouri&#8217;s worst storms season after season. In March 2025 alone, an EF-2 tornado tracked from Hillsboro directly through Jefferson County into Arnold. It tore roofs off homes, snapped trees, and left hundreds of structures damaged in a single night. The destruction was severe enough that Governor Kehoe personally toured the area to assess the damage. And that was just one storm in a long history of severe weather events that have tested this community&#8217;s homes year after year.',
				'This is exactly why having a roofing company that&#8217;s already here matters. When Arnold gets hit, 1st Choice is on the ground fast — inspecting damage, documenting it for insurance, and getting to work before the next round of rain comes through.',
			),
		),
		'storm' => array(
			'heading' => 'Arnold&#8217;s Storm Damage Roofing Specialists',
			'intro'   => array(
				'Storm damage doesn&#8217;t always look like a missing roof. Often it&#8217;s subtler — cracked or bruised shingles from hail, lifted flashing from high winds, damaged decking that won&#8217;t show up as a leak until the next heavy rain. If you experienced a storm and haven&#8217;t had your roof inspected, you may be sitting on damage you don&#8217;t know about yet.',
				'1st Choice Roofing and Construction provides free post-storm roof inspections for Arnold and Jefferson County homeowners. We document everything, walk you through what we find, and work directly with your insurance adjuster to make the claims process as smooth as possible.',
			),
			'list'    => array(
				'Free storm damage inspections',
				'Hail and wind damage assessment and repair',
				'Emergency tarping and temporary protection',
				'Full roof replacement for storm-totaled roofs',
				'Insurance claim documentation and adjuster coordination',
				'Residential and commercial storm damage repair',
			),
			'closing' => 'We&#8217;ve helped Arnold homeowners and property owners navigate storm damage claims and get back under a solid roof. If your home or business was in the path of a recent storm, don&#8217;t wait — call us for a free inspection before filing your claim.',
		),
		'services' => array(
			'heading'    => 'Complete Roofing Services for Arnold, MO',
			'intro'      => 'Beyond storm response, we offer a full range of roofing services to keep Arnold properties protected year-round:',
			'list'       => array(
				'Residential roof replacement',
				'Roof repair — leaks, missing shingles, damaged flashing',
				'Commercial roofing',
				'Flat roofing systems',
				'Gutters and downspouts',
				'Free inspections and estimates',
			),
			'difference' => 'Every job comes with transparent estimates, premium materials backed by manufacturer warranties, and a crew that stands behind their work. No surprises on your invoice. No shortcuts on your roof.',
		),
		'cta' => array(
			'heading'   => 'Arnold&#8217;s Roofing Company — Right Here When You Need Us',
			'paragraph' => 'Whether you&#8217;re dealing with fresh storm damage or your roof has simply reached the end of its lifespan, 1st Choice Roofing and Construction is ready to help. We&#8217;re local, we&#8217;re experienced, and we&#8217;re committed to doing the job right the first time — every time.',
		),
		'region' => 'Proudly serving Arnold and Jefferson County',
	);

	$cities['affton'] = array(
		'city'  => 'Affton',
		'slug'  => 'affton',
		'h1'    => 'Roofing Company in Affton, MO',
		'seo'   => array(
			'title'       => 'Roofing Company in Affton, MO | 1st Choice Roofing and Construction',
			'description' => 'Looking for a trusted roofing company in Affton, MO? 1st Choice Roofing and Construction delivers expert repairs, replacements, and storm damage service to Affton homeowners. Free estimates.',
			'slug'        => '/roofing-affton-mo',
			'keywords'    => 'roofing company Affton MO, roof repair Affton, roof replacement Affton MO, Affton roofing contractor, storm damage roofing Affton',
		),
		'intro' => array(
			'Missouri weather doesn&#8217;t take it easy on a roof — hail, high winds, ice, and long stretches of summer heat add up fast. When it&#8217;s time for a repair or a full residential or commercial roof replacement, Affton homeowners need a roofing company they can count on. 1st Choice Roofing and Construction brings experienced crews, premium materials, and the kind of craftsmanship that holds up long after the job is done.',
		),
		'community' => array(
			'heading'    => 'Proud to Serve Affton for Residential and Commercial Roof Repair and Replacement',
			'paragraphs' => array(
				'Affton has always been one of those south St. Louis County communities that people don&#8217;t leave — and for good reason. It&#8217;s a neighborhood where families put down roots, homeowners take pride in their properties, and the community feel is something you don&#8217;t easily find closer to the city. From well-kept ranches and brick homes built in the mid-century to newer builds near Grant&#8217;s Farm, Affton&#8217;s housing stock reflects the kind of community that invests in where they live.',
				'That&#8217;s exactly the kind of neighborhood 1st Choice Roofing and Construction is proud to serve. Whether you&#8217;re dealing with storm damage, an aging roof that&#8217;s past its prime, or just want a straight answer about what your roof actually needs — our team is ready to help Affton homeowners protect what they&#8217;ve worked hard for.',
			),
		),
		'services' => array(
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
		'cta' => array(
			'heading'   => 'Serving Affton and the Greater St. Louis Area',
			'paragraph' => 'Don&#8217;t wait on roofing problems — they only get worse. Contact 1st Choice Roofing and Construction today for your free estimate and experience the difference of working with a crew that does the job right the first time.',
		),
		'region' => 'Proudly serving Affton and south St. Louis County',
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
 * The page H1 is rendered by the theme from the WordPress page title, so the
 * pattern opens with the intro copy rather than repeating the heading.
 *
 * @param array $data One entry from firstchoice_location_data().
 * @return string Block markup.
 */
function firstchoice_build_location_pattern( $data ) {
	$company = firstchoice_location_company();

	$out  = firstchoice_location_intro( $data );
	$out .= firstchoice_location_community( $data );

	if ( ! empty( $data['storm'] ) ) {
		$out .= firstchoice_location_storm( $data );
	}

	$out .= firstchoice_location_services( $data );
	$out .= firstchoice_location_warranty( $company );
	$out .= firstchoice_location_cta( $data, $company );
	$out .= firstchoice_location_testimonial( $data );

	return $out;
}

/**
 * Section 1 — lead intro copy.
 */
function firstchoice_location_intro( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-intro","layout":{"type":"constrained"}} -->
<div class="wp-block-group location-intro">
	<?php foreach ( $data['intro'] as $i => $paragraph ) : ?>
	<!-- wp:paragraph {"className":"<?php echo 0 === $i ? 'location-lead' : ''; ?>"} -->
	<p class="<?php echo 0 === $i ? 'location-lead' : ''; ?>"><?php echo wp_kses_post( $paragraph ); ?></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Section 2 — community / local paragraph. Light band, the page's SEO heart.
 */
function firstchoice_location_community( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-community alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-community">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php echo wp_kses_post( $data['community']['heading'] ); ?></h2>
		<!-- /wp:heading -->
		<?php foreach ( $data['community']['paragraphs'] as $paragraph ) : ?>
		<!-- wp:paragraph -->
		<p><?php echo wp_kses_post( $paragraph ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Storm damage section — only used by cities that supply storm copy.
 */
function firstchoice_location_storm( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-storm","layout":{"type":"constrained"}} -->
<div class="wp-block-group location-storm">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php echo wp_kses_post( $data['storm']['heading'] ); ?></h2>
	<!-- /wp:heading -->
	<?php foreach ( $data['storm']['intro'] as $paragraph ) : ?>
	<!-- wp:paragraph -->
	<p><?php echo wp_kses_post( $paragraph ); ?></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>

	<!-- wp:list {"className":"location-checklist"} -->
	<ul class="wp-block-list location-checklist">
		<?php foreach ( $data['storm']['list'] as $item ) : ?>
		<!-- wp:list-item -->
		<li><?php echo wp_kses_post( $item ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->

	<!-- wp:paragraph -->
	<p><?php echo wp_kses_post( $data['storm']['closing'] ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Services list plus the "what sets us apart" dark callout.
 */
function firstchoice_location_services( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-services","layout":{"type":"constrained"}} -->
<div class="wp-block-group location-services">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php echo wp_kses_post( $data['services']['heading'] ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php echo wp_kses_post( $data['services']['intro'] ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:list {"className":"location-checklist is-two-column"} -->
	<ul class="wp-block-list location-checklist is-two-column">
		<?php foreach ( $data['services']['list'] as $item ) : ?>
		<!-- wp:list-item -->
		<li><?php echo wp_kses_post( $item ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"location-difference alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-difference">
	<div class="wp-block-group__inner-container">
		<!-- wp:paragraph -->
		<p><?php echo wp_kses_post( $data['services']['difference'] ); ?></p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Warranty design block — light band, three-column terms.
 */
function firstchoice_location_warranty( $company ) {
	$terms = firstchoice_location_warranty_terms();

	ob_start();
	?>
<!-- wp:group {"className":"location-warranty alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull location-warranty">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">We Stand Behind Our Work</h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"warranty-terms","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group warranty-terms">
			<?php foreach ( $terms as $term ) : ?>
			<!-- wp:group {"className":"warranty-term","layout":{"type":"constrained"}} -->
			<div class="wp-block-group warranty-term">
				<!-- wp:paragraph {"className":"warranty-term-value"} -->
				<p class="warranty-term-value"><?php echo esc_html( $term['term'] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"warranty-term-label"} -->
				<p class="warranty-term-label"><?php echo esc_html( $term['label'] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","className":"warranty-note"} -->
		<p class="has-text-align-center warranty-note">We stand behind every job — because we&#8217;re not going anywhere. <a href="<?php echo esc_url( $company['warranty'] ); ?>">View our full warranty details &rarr;</a></p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:group -->

	<?php
	return ob_get_clean();
}

/**
 * Closing CTA — red band, reusing the theme's big red box treatment.
 */
function firstchoice_location_cta( $data, $company ) {
	ob_start();
	?>
<!-- wp:group {"className":"location-cta big-red-box alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull big-red-box location-cta">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo wp_kses_post( $data['cta']['heading'] ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo wp_kses_post( $data['cta']['paragraph'] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"location-cta-btn"} -->
			<div class="wp-block-button location-cta-btn"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $company['estimate'] ); ?>">Request Your Free Estimate</a></div>
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
 * Testimonial placeholder — swap in a real Google review before publishing.
 */
function firstchoice_location_testimonial( $data ) {
	ob_start();
	?>
<!-- wp:group {"className":"testimonials-section location-testimonial alignfull","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull testimonials-section location-testimonial">
	<div class="wp-block-group__inner-container">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">What Our Customers Say</h2>
		<!-- /wp:heading -->

		<!-- wp:quote -->
		<blockquote class="wp-block-quote">
			<!-- wp:paragraph -->
			<p>[ Replace with a real Google review from a <?php echo esc_html( $data['city'] ); ?> customer before publishing. ]</p>
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
