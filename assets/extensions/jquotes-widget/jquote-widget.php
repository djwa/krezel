<?php
/*
 * Plugin Name: jQuote Widget
 * Version: 1.3
 * Plugin URI: none
 * Description: Multilingual Text Widget For Wordpress 2.8.x 
 * Author: Guram Kajaia, Kevin Filteau, Jeremi Walewicz
 * Modified: Jeremi Walewicz
 * 	Note: This plugins works only with qTranslate plugin (http://www.qianqin.de/qtranslate/)
 * 	License: 
  Copyright 2009  Guram Kajaia  (email : guram.kajaia@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 2,
  as published by the Free Software Foundation.

  You may NOT assume that you can use any other version of the GPL.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  The license for this software can likely be found here:
  http://www.gnu.org/licenses/gpl-2.0.html
 */

class jQuoteWidget extends WP_Widget {

	public $jquote_enabled_langs_num; # enabled languages number
	public $jquote_enabled_langs; # enabled languages @array

	function jQuoteWidget() {
		if ( function_exists( 'qtrans_init' ) ) {
			$widget_ops = array( 'classname' => 'jQuoteWidget', 'description' => __( "jQuote Widget" ) );
			$control_ops = array( 'width' => 'auto', 'height' => 'auto' );
			$this->WP_Widget( 'jquotetext', __( 'jQuote Widget' ), $widget_ops, $control_ops );
			$this->jquote_enabled_langs = qtrans_getSortedLanguages(); // get enabled languages
			$this->jquote_enabled_langs_num = count( $this->jquote_enabled_langs ); // get enabled languages number
		}
	}

	/**
	 * 	Adds qTranslate's language delimiters to text
	 */
	function jquote_lang_ini( $jquote_lang, $jquote_lang_content ) {
		return "<!--:$jquote_lang-->$jquote_lang_content<!--:-->";
	}

	function widget( $args, $instance ) {
		extract( $args );
		$text = empty( $instance['text'] ) ? '' : $instance['text'];
		$link1 = ( empty( $instance['link1'] ) ) ? 0 : $instance['link1'];
		echo $before_widget;
		if ( !( $link1 ) ) {
			echo "Please configure this widget.";
		} else {
			if ( $link1 ) {
				echo '<div class="col-md-2"><img src="' . $link1 . '" alt="" border="0"></div>';
			}
		}
		$tekst = $instance['lang_text'];
		echo '<div class="col-md-10"><blackquete>"' . shorten( $tekst, 200 ) . '"</blackquete>';
		echo '<p>' . $instance['lang_title'] . '</p></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['lang_title'] = ""; # Clear Old Title
		$instance['lang_text'] = ""; # Clear Old Text
		$instance['link1'] = $new_instance['link1'];
		foreach ( $this->jquote_enabled_langs as $lng ) {
			$instance['lang_title'] .= self::jquote_lang_ini( $lng, $new_instance[$lng] );
		}
		foreach ( $this->jquote_enabled_langs as $lng ) {
			$instance['lang_text'] .= self::jquote_lang_ini( $lng, $new_instance['text_' . $lng] );
		}
		foreach ( $this->jquote_enabled_langs as $lng ) {
			$instance['lang_link'] .= self::jquote_lang_ini( $lng, $new_instance['link_' . $lng] );
		}
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'link1' => '' ) );
		$title = $instance['title'];
		$text = $instance['text'];
		$link1 = $instance['link1'];
		$jquote_parsed_title = qtrans_split( $instance['lang_title'] ); # parse qTranslate's lang delimiters from title
		$jquote_parsed_text = qtrans_split( $instance['lang_text'] ); # parse qTranslate's lang delimiters from text
		$jquote_parsed_link = qtrans_split( $instance['lang_link'] ); # parse qTranslate's lang delimiters from text
		echo '<div style="margin: 10px 0;">';
		_e( "<!--:en-->Choose image: <!--:--><!--:de-->Wählen Sie ein Bild: <!--:--><!--:pl-->Wybierz obrazek: <!--:-->" );
		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		$images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'posts_per_page' => -1 ) );
		if ( $images->have_posts() ) {
			$options = array();
			for ( $i = 0; $i < 2; $i++ ) {
				$options[$i] = '';
				while ( $images->have_posts() ) {
					$images->the_post();
					$img_src = wp_get_attachment_image_src( get_the_ID(), 'full' );
					$the_link = ( $i == 0 ) ? $link1 : $link2;
					$options[$i] .= '<option value="' . $img_src[0] . '" ' . selected( $the_link, $img_src[0], false ) . '>' . get_the_title() . '</option>';
				}
			}
			?>
			<select name="<?php echo $this->get_field_name( 'link1' ); ?>"><?php echo $options[0]; ?></select>
			<?php
		} else {
			echo 'There are no images in the media library. Click <a href="' . admin_url( '/media-new.php' ) . '" title="Add Images">here</a> to add some images';
		}
		echo '</div>';


		foreach ( $this->jquote_enabled_langs as $jquote_lang ) {
			echo '<div style="padding: 5px; margin:5px 5px 20px 5px; border: 1px solid #ccc; border-radius: 4px; background: #FAFAFA">';
			echo '<h2 style="text-transform: uppercase;">' . $jquote_lang . '</h2>';
			echo '<p><label for="' . $this->get_field_name( $jquote_lang ) . '">' . __( 'Autor[' . $jquote_lang . ']' ) . '</label><br /><input style="width:90%;margin-left:10px;" id="' . $this->get_field_id( $jquote_lang ) . '" name="' . $this->get_field_name( $jquote_lang ) . '" type="text" value="' . $jquote_parsed_title[$jquote_lang] . '" /></p>';
			echo '<p><label for="' . $this->get_field_name( "text_" . $jquote_lang ) . '">' . __( 'Quote[' . $jquote_lang . ']' ) . '</label><br /><textarea style="width:90%;height:300px;margin-left:10px;" id="' . $this->get_field_id( "text_" . $jquote_lang ) . '" name="' . $this->get_field_name( "text_" . $jquote_lang ) . '">' . $jquote_parsed_text[$jquote_lang] . '</textarea></p>';
			echo '</div>';
		}
	}

}

function jQuoteInit() {
	register_widget( 'jQuoteWidget' );
}

add_action( 'widgets_init', 'jQuoteInit' );
?>
