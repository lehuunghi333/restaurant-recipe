<?php
/*adding sections for feature info options */
$wp_customize->add_section( 'restaurant-recipe-feature-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Info', 'restaurant-recipe' ),
	'panel'          => 'restaurant-recipe-header-panel'
) );

/* basic info number*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-feature-info-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-feature-info-number'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_feature_info_number();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-feature-info-number]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Number Display', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-feature-info',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-feature-info-number]',
	'type'	  	        => 'select',
) );

/*first info*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-first-info-message]',
		array(
			'section'      => 'restaurant-recipe-feature-info',
			'description'  => "<hr /><h2>".esc_html__('First Info','restaurant-recipe')."</h2>",
			'settings'     => 'restaurant_recipe_theme_options[restaurant-recipe-first-info-message]',
			'type'	  	   => 'message',
		)
	)
);
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-first-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-first-info-icon'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Icons_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-first-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'restaurant-recipe' ),
			'section'       => 'restaurant-recipe-feature-info',
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-first-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-first-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-first-info-title'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-first-info-title]', array(
	'label'		            => esc_html__( 'Title', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-first-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-first-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-first-info-desc'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-first-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-first-info-desc]',
	'type'	  	            => 'text'
) );

/*Second Info*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-second-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-second-info-message]',
		array(
			'section'       => 'restaurant-recipe-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Second Info','restaurant-recipe')."</h2>",
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-second-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-second-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-second-info-icon'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Icons_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-second-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'restaurant-recipe' ),
			'section'       => 'restaurant-recipe-feature-info',
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-second-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-second-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-second-info-title'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-second-info-title]', array(
	'label'		            => esc_html__( 'Title', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-second-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-second-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-second-info-desc'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-second-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-second-info-desc]',
	'type'	  	            => 'text'
) );

/*third info*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-third-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-third-info-message]',
		array(
			'section'       => 'restaurant-recipe-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Third Info','restaurant-recipe')."</h2>",
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-third-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-third-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-third-info-icon'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Icons_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-third-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'restaurant-recipe' ),
			'section'       => 'restaurant-recipe-feature-info',
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-third-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-third-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-third-info-title'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-third-info-title]', array(
	'label'		            => esc_html__( 'Title', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-third-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-third-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-third-info-desc'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-third-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-third-info-desc]',
	'type'	  	            => 'text'
) );

/*forth info*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-forth-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-forth-info-message]',
		array(
			'section'       => 'restaurant-recipe-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Forth Info','restaurant-recipe')."</h2>",
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-forth-info-icon'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Icons_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-forth-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'restaurant-recipe' ),
			'section'       => 'restaurant-recipe-feature-info',
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-forth-info-title'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-title]', array(
	'label'		            => esc_html__( 'Title', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-forth-info-desc'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_allowed_html'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-info',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-forth-info-desc]',
	'type'	  	            => 'text'
) );