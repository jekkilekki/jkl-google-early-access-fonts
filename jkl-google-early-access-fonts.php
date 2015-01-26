<?php

/* 
 * Plugin Name: Google Early Access Fonts
 * Plugin URI: http://www.jekkilekki.com
 * Description: Enable Google Early Access fonts to use in your Theme in a variety of languages via the Theme Customizer.
 * Version: 0.1
 * Author: Aaron Snowberger
 * Author URI: http://www.jekkilekki.com
 * Text-Domain: jkl-gea-fonts/languages
 * License: GPL2 
 */

/*  Copyright 2014  Aaron Snowberger
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/** 
 * Enable Theme Customizer
 * 
 * @link: http://codex.wordpress.org/Theme_Customization_API
 */
add_action( 'customize_register', 'jkl_gea_fonts' );
function jkl_gea_fonts( $wp_customize ) {
    
    // SPECIFY LANGUAGE
    $languages = array( jkl_gea_get_languages() );
    asort( $languages );
    
    $wp_customize->add_setting( 'gea_language' );
    $wp_customize->add_control( 'gea_language',
            array(
                'label'         => __( 'Select Language', 'jkl-gea-fonts' ),
                'section'       => 'jkl-gea-fonts',
                'type'          => 'select',
                'choices'       => $languages,
            )
    );
    
    // SPECIFY TYPE OF FONT
    $fonts = array();
    $fonts[] = array(
        'slug'      => 'title_fonts',
        'default'   => '',
        'label'     => __( 'Title Fonts', 'jkl-gea-fonts' ),
    );
    $fonts[] = array(
        'slug'      => 'content_fonts',
        'default'   => '',
        'label'     => __( 'Content Font', 'jkl-gea-fonts' ),
    );
    
    foreach( $fonts as $font ) {
        
        // SETTINGS
        $wp_customize->add_setting(
                $font[ 'slug' ], 
                array(
                    'default'       => $font[ 'default' ],
                    'type'          => 'theme_mod',
                    'capability'    => 'edit_theme_options',
                )
        );
        
        // CONTROLS
        $wp_customize->add_control(
                $font[ 'slug' ],
                array(
                    'label'         => $fonts[ 'label' ],
                    'section'       => 'jkl-gea-fonts',
                    'type'          => 'select',
                    'choices'       => $typography,
                )
        );
        
        // SECTION
        $wp_customize->add_section( 'jkl-gea-fonts',
                array(
                    'title'         => __( 'Google Early Access Fonts', 'jkl-gea-fonts' ),
                    'priority'      => 30,
                )
        );  
    }
}

/* -----------------------------------------------------------------------------
 * Helper functions
 * ----------------------------------------------------------------------------- */
function jkl_gea_get_languages() {
    
    $gea_languages = array(
        'hebrew'            => 'Hebrew',
        'arabic'            => 'Arabic',
        'telugu'            => 'Telugu',
        'lao'               => 'Lao',
        'ethiopic'          => 'Ethiopic',
        'tamil'             => 'Tamil',
        'thai'              => 'Thai',
        'korean'            => 'Korean',
        'bengali'           => 'Bengali',
        'hindi'             => 'Hindi',
        'myanmar'           => 'Myanmar',
        'armenian'          => 'Armenian',
        'cherokee'          => 'Cherokee',
        'georgian'          => 'Georgian',
        'gujarati'          => 'Gujarati',
        'gurmukhi'          => 'Gurmukhi',
        'japanese'          => 'Japanese',
        'kannada'           => 'Kannada',
        'khmer'             => 'Khmer',
        'malayalam'         => 'Malayalam',
        'osmanya'           => 'Osmanya',
        'sinhala'           => 'Sinhala',
        'chinese'           => 'Chinese Traditional',
        'all'               => 'All Languages',
    );
    
    return $gea_languages;
}

function get_hebrew_fonts() {
    
    $hebrew_fonts = array(
        '"Alef Hebrew", serif'                  => 'Alef Hebrew',
        '"Noto Sans Hebrew", sans-serif'        => 'Noto Sans Hebrew',
        '"Open Sans Hebrew", sans-serif'        => 'Open Sans Hebrew',
        '"Open Sans Hebrew Condensed", sans-serif'=> 'Open Sans Hebrew Condensed',
    );
    
    return $hebrew_fonts;
}
function get_arabic_fonts() {
    
    $arabic_fonts = array(
        'Amiri, serif'                          => 'Amiri',
        '"Droid Arabic Kufi", serif'            => 'Droid Arabic Kufi',
        '"Droid Arabic Naskh", serif'           => 'Droid Arabic Naskh',
        'Lateef, serif'                         => 'Lateef',
        '"Noto Kufi Arabic", serif'             => 'Noto Kufi Arabic',
        '"Noto Naskh Arabic", serif'            => 'Noto Naskh Arabic',
        '"Noto Nastaliq Urdu Draft", serif'     => 'Noto Nastaliq Urdu Draft',
        '"Noto Sans Kufi Arabic", sans-serif'   => 'Noto Sans Kufi Arabic',
        'Scheherazade, serif'                   => 'Scheherazade',
        'Thabit, serif'                         => 'Thabit',
    );
    
    return $arabic_fonts;
}
function get_telugu_fonts() {
    
    $telugu_fonts = array(
        'Dhurjati, serif'                       => 'Dhurjati',
        'Gidugu, serif'                         => 'Gidugu',
        'Gurajada, serif'                       => 'Gurajada',
        '"Lakki Reddy", serif'                  => 'Lakki Reddy',
        'Mallanna, serif'                       => 'Mallanna',
        'Mandali, serif'                        => 'Mandali',
        'NATS, serif'                           => 'NATS',
        'NTR, serif'                            => 'NTR',
        '"Noto Sans Telugu", sans-serif'        => 'Noto Sans Telugu',
        'Peddana, serif'                        => 'Peddana',
        'Ponnala, serif'                        => 'Ponnala',
        'Ramabhadra, serif'                     => 'Ramabhadra',
        '"Ravi Prakash", serif'                 => 'Ravi Prakash',
        '"Sree Krushnadevaraya", serif'         => 'Sree Krushnadevaraya',
        'Suranna, serif'                        => 'Suranna',
        'Suravaram, serif'                      => 'Suravaram',
        '"Tenali Ramakrishna", serif'           => 'Tenali Ramakrishna',     
    );
    
    return $telugu_fonts;
}
function get_lao_fonts() {
    
    $lao_fonts = array(
        'Dhyana, serif'                         => 'Dhyana',
        '"Lao Muang Don", serif'                => 'Lao Muang Don',
        '"Lao Muang Khong", serif'              => 'Lao Muang Khong',
        '"Lao Sans Pro", sans-serif'            => 'Lao Sans Pro',
        '"Noto Sans Lao", sans-serif'           => 'Noto Sans Lao',
        '"Noto Sans Lao UI", sans-serif'        => 'Noto Sans Lao UI',
        '"Noto Serif Lao", serif'               => 'Noto Serif Lao',
        'Phetsarath, serif'                     => 'Phetsarath',
        'Souliyo, serif'                        => 'Souliyo',
    );
    
    return $lao_fonts;
}
function get_ethiopic_fonts() {
    
    $ethiopic_fonts = array(
        '"Droid Sans Ethiopic", serif'          => 'Droid Sans Ethiopic',
        '"Noto Sans Ethiopic", sans-serif'      => 'Noto Sans Ethiopic',
    );
    
    return $ethiopic_fonts;
}
function get_tamil_fonts() {
    
    $tamil_fonts = array(
        '"Droid Sans Tamil", serif'             => 'Droid Sans Tamil',
        '"Karla Tamil Inclined", serif'         => 'Karla Tamil Inclined',
        '"Karla Tamil Upright", serif'          => 'Karla Tamil Upright',
        '"Lohit Tamil", serif'                  => 'Lohit Tamil',
        '"Noto Sans Tamil", sans-serif'         => 'Noto Sans Tamil',
        '"Noto Sans Tamil UI", sans-serif'      => 'Noto Sans Tamil UI',
    );
    
    return $tamil_fonts;
}
function get_thai_fonts() {
    
    $thai_fonts = array(
        '"Droid Sans Thai", sans-serif'         => 'Droid Sans Thai',
        '"Droid Serif Thai", serif'             => 'Droid Serif Thai',
        '"Noto Sans Thai", sans-serif'          => 'Noto Sans Thai',
        '"Noto Sans Thai UI", sans-serif'       => 'Noto Sans Thai UI',
        '"Noto Serif Thai", serif'              => 'Noto Serif Thai',
    );
    
    return $thai_fonts;
}
function get_korean_fonts() {
    
    $korean_fonts = array(
        'Hanna, sans-serif'                     => 'Hanna [KO]',
        '"Jeju Gothic", sans-serif'             => 'Jeju Gothic [KO]',
        '"Jeju Hallasan", cursive'              => 'Jeju Hallasan [KO]',
        '"Jeju Myeongjo", serif'                => 'Jeju Myeongjo [KO]',
        '"KoPub Batang", serif'                 => 'KoPub Batang [KO]',
        '"Nanum Brush Script", cursive'         => 'Nanum Brush Script [KO]',
        '"Nanum Gothic", sans-serif'            => 'Nanum Gothic [KO]',
        '"Nanum Gothic Coding", monospace'      => 'Nanum Gothic Coding [KO]',
        '"Nanum Myeongjo", serif'               => 'Nanum Myeongjo [KO]',
        '"Nanum Pen Script", cursive'           => 'Nanum Pen Script [KO]',
    );
    return $korean_fonts;
}
function get_bengali_fonts() {
    
    $bengali_fonts = array(
        '"Lohit Bengali", serif'                => 'Lohit Bengali',
        '"Noto Sans Bengali", sans-serif'       => 'Noto Sans Bengali',
    );
    
    return $bengali_fonts;
}
function get_hindi_fonts() {
    
    $hindi_fonts = array(
        '"Lohit Devanagari", serif'             => 'Lohit Devanagari',
        '"Noto Sans Devanagari", sans-serif'    => 'Noto Sans Devanagari',
        '"Noto Sans Devanagari UI", sans-serif' => 'Noto Sans Devanagari UI',
    );
    
    return $hindi_fonts;
}
function get_myanmar_fonts() {
    
    $myanmar_fonts = array(
        'Tharlon, serif'                        => 'Tharlon',
        '"Myanmar Sans Pro", sans-serif'        => 'Myanmar Sans Pro',
        '"Noto Sans Myanmar", sans-serif'       => 'Noto Sans Myanmar',
        'Padauk, serif'                         => 'Padauk',
    );
    
    return $myanmar_fonts;
}
function get_armenian_fonts() {
    
    $armenian_fonts = array(
        '"Noto Sans Armenian", sans-serif'      => 'Noto Sans Armenian',
        '"Noto Serif Armenian", serif'          => 'Noto Serif Armenian',
    );
    
    return $armenian_fonts;
}
function get_cherokee_fonts() {
    
    $cherokee_fonts = array(
        '"Noto Sans Cherokee", sans-serif'      => 'Noto Sans Cherokee',
    );
    
    return $cherokee_fonts;
}
function get_georgian_fonts() {
    
    $georgian_fonts = array(
        '"Noto Sans Georgian", sans-serif'      => 'Noto Sans Georgian',
        '"Noto Serif Georgian", serif'          => 'Noto Serif Georgian',
    );
    
    return $georgian_fonts;
}
function get_gujarati_fonts() {
    
    $gujarati_fonts = array(
        '"Noto Sans Gujarati", sans-serif'      => 'Noto Sans Gujuarati',
    );
    
    return $gujarati_fonts;
    
}
function get_gurmukhi_fonts() {
    
    $gurmukhi_fonts = array(
        '"Noto Sans Gurmukhi", sans-serif'      => 'Noto Sans Gurmukhi',
    );
    
    return $gurmukhi_fonts;
}
function get_japanese_fonts() {
    
    $japanese_fonts = array(
        '"Noto Sans Japanese", sans-serif'      => 'Noto Sans Japanese',
    );
    
    return $japanese_fonts;
}
function get_kannada_fonts() {
    
    $kannada_fonts = array(
        '"Noto Sans Kannada", sans-serif'       => 'Noto Sans Kannada',
    );
    
    return $kannada_fonts;
}
function get_khmer_fonts() {
    
    $khmer_fonts = array(
        '"Noto Sans Khmer", sans-serif'         => 'Noto Sans Khmer',
        '"Noto Serif Khmer", serif'             => 'Noto Serif Khmer',
    );
    
    return $khmer_fonts;
}
function get_malayalam_fonts() {
    
    $malayalam_fonts = array(
        '"Noto Sans Malayalam", sans-serif'     => 'Noto Sans Malayalam',
    );
    
    return $malayalam_fonts;
}
function get_osmanya_fonts() {
    
    $osmanya_fonts = array(
        '"Noto Sans Osmanya", sans-serif'       => 'Noto Sans Osmanya',
    );
    
    return $osmanya_fonts;
}
function get_sinhala_fonts() {
    
    $sinhala_fonts = array(
        '"Noto Sans Sinhala", sans-serif'       => 'Noto Sans Sinhala',
    );
    
    return $sinhala_fonts;
}
function get_chinese_fonts() {
    
    $chinese_fonts = array(
        'cwTeXFangSong, serif'                  => 'cwTeXFangSong (仿宋體)',
        'cwTeXHei, serif'                       => 'cwTeXHei (黑體)',
        'cwTeXKai, serif'                       => 'cwTeXKai (楷體)',
        'cwTeXMing, serif'                      => 'cwTeXMing (明體)',
        'cwTeXYen, serif'                       => 'cwTeXYen (圓體)',     
    );
    
    return $chinese_fonts;
}