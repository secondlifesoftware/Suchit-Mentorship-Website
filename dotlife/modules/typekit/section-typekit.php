<?php

/**
 * Typekit
 */

$priority = 0;

Kirki::add_field( 'themegoods_customize', array(
    'type' => 'title',
    'settings'  => 'tg_typekit_title',
    'label'    => esc_html__('Typekit Settings', 'dotlife' ),
    'section'  => 'general_fonts',
	'priority' => 0,
) );


Kirki::add_field( 'themegoods_customize', array(
    'type' => 'switch',
    'settings' => 'tg_enable_typekit',
    'label' => esc_html__( 'Enable Typekit', 'dotlife' ) ,
    'section' => 'general_fonts',
    'default' => 0,
    'priority' => $priority,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__( 'Enable', 'dotlife' ),
        'off' => esc_html__( 'Disable', 'dotlife' )
    )
) );

Kirki::add_field( 'themegoods_customize', array(
    'type' => 'text',
    'settings' => 'tg_typekit_id',
    'label' => esc_html__( 'Typekit ID', 'dotlife' ) ,
    'section' => 'general_fonts',
    'default' => '',
    'priority' => $priority,
    'transport' => 'auto',
    'required' => array(
        array(
            'setting' => 'tg_enable_typekit',
            'operator' => '==',
            'value' => '1',
        )
    ) ,
) );

Kirki::add_field( 'themegoods_customize', array(
    'type' => 'repeater',
    'label' => esc_html__( 'Typekit Fonts', 'dotlife' ) ,
    'description' => esc_html__( 'Here you can add typekit fonts', 'dotlife' ) ,
    'settings' => 'tg_typekit_fonts',
    'priority' => $priority,
    'transport' => 'auto',
    'section' => 'general_fonts',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__( 'Typekit Font', 'dotlife' ) ,
    ),
    'default' => array(
        array(
            'font_name' => 'Europa',
            'font_css_name' => 'europa-web',
            'font_variants' => array( 'regular', 'italic', '700', '700italic' ),
            'font_fallback' => 'sans-serif',
            'font_subsets' => 'latin'
        )
    ),
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'Name', 'dotlife' ) ,
        ) ,
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'CSS Name', 'dotlife' ) ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__( 'Variants', 'dotlife' ) ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__( '100', 'dotlife' ) ,
                '100italic' => esc_html__( '100italic', 'dotlife' ) ,
                '200' => esc_html__( '200', 'dotlife' ) ,
                '200italic' => esc_html__( '200italic', 'dotlife' ) ,
                '300' => esc_html__( '300', 'dotlife' ) ,
                '300italic' => esc_html__( '300italic', 'dotlife' ) ,
                'regular' => esc_html__( 'regular', 'dotlife' ) ,
                'italic' => esc_html__( 'italic', 'dotlife' ) ,
                '500' => esc_html__( '500', 'dotlife' ) ,
                '500italic' => esc_html__( '500italic', 'dotlife' ) ,
                '600' => esc_html__( '600', 'dotlife' ) ,
                '600italic' => esc_html__( '600italic', 'dotlife' ) ,
                '700' => esc_html__( '700', 'dotlife' ) ,
                '700italic' => esc_html__( '700italic', 'dotlife' ) ,
                '800' => esc_html__( '800', 'dotlife' ) ,
                '800italic' => esc_html__( '800italic', 'dotlife' ) ,
                '900' => esc_html__( '900', 'dotlife' ) ,
                '900italic' => esc_html__( '900italic', 'dotlife' ) ,
            )
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__( 'Fallback', 'dotlife' ) ,
            'choices' => array(
                'sans-serif' => esc_html__( 'Helvetica, Arial, sans-serif', 'dotlife' ) ,
                'serif' => esc_html__( 'Georgia, serif', 'dotlife' ) ,
                'display' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'dotlife' ) ,
                'handwriting' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'dotlife' ) ,
                'monospace' => esc_html__( '"Lucida Console", Monaco, monospace', 'dotlife' ) ,
            )
        ) ,
        'font_subsets' => array(
            'type' => 'select',
            'label' => esc_html__( 'Subsets', 'dotlife' ) ,
            'multiple' => 7,
            'choices' => array(
                'cyrillic' => esc_html__( 'Cyrillic', 'dotlife' ) ,
                'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'dotlife' ) ,
                'devanagari' => esc_html__( 'Devanagari', 'dotlife' ) ,
                'greek' => esc_html__( 'Greek', 'dotlife' ) ,
                'greek-ext' => esc_html__( 'Greek Extended', 'dotlife' ) ,
                'khmer' => esc_html__( 'Khmer', 'dotlife' ) ,
                'latin' => esc_html__( 'Latin', 'dotlife' ) ,
            )
        ) ,
    ) ,
    'active_callback' => array(
        array(
            'setting' => 'tg_enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
) );