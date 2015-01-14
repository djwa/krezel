<?php
/*
 * Plugin Name: Front page boxes - gText Widget
 * Version: 1.3
 * Plugin URI: none
 * Description: Multilingual Text Widget For Wordpress 2.8.x 
 * Author: Guram Kajaia, Kevin Filteau
 * Author URI: kevinfilteau.com
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

class GTextWidget extends WP_Widget {

	public $gtext_enabled_langs_num; # enabled languages number
	public $gtext_enabled_langs; # enabled languages @array

	function GTextWidget() {
		if ( function_exists( 'qtrans_init' ) ) {
			$widget_ops = array( 'classname' => 'GTextWidget', 'description' => __( "gText Widget" ) );
			$control_ops = array( 'width' => 'auto', 'height' => 'auto' );
			$this->WP_Widget( 'gtexttext', __( 'gText Widget' ), $widget_ops, $control_ops );
			$this->gtext_enabled_langs = qtrans_getSortedLanguages(); // get enabled languages
			$this->gtext_enabled_langs_num = count( $this->gtext_enabled_langs ); // get enabled languages number
		}
	}

	/**
	 * 	Adds qTranslate's language delimiters to text
	 */
	function gtext_lang_ini( $gtext_lang, $gtext_lang_content ) {
		return "<!--:$gtext_lang-->$gtext_lang_content<!--:-->";
	}

	function widget( $args, $instance ) {
		extract( $args );
		$text = empty( $instance['text'] ) ? '' : $instance['text'];
		$link1 = ( empty( $instance['link1'] ) ) ? 0 : $instance['link1'];
		echo $before_widget;
		echo '<h1>' . $instance['lang_title'] . '</h1>';
		if ( !( $link1 ) ) {
			echo "Please configure this widget.";
		} else {
			if ( $link1 ) {
				echo '<div class="clearfix box-img"><a href="' . get_permalink( $instance['link_target'] ) . '" title=""><img src="' . $link1 . '" alt="" border="0"></a></div>';
			}
		}
		$tekst = $instance['lang_text'];
		echo '<div class="clearfix"><p>' . shorten( $tekst, 130 ) . "</p></div>";
		echo '<a href="' . get_permalink( $instance['link_target'] ) . '" title="">' . $instance['lang_link'] . "</a>";



		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['lang_title'] = ""; # Clear Old Title
		$instance['lang_text'] = ""; # Clear Old Text
		$instance['lang_link'] = ""; # Clear Old Text
		$instance['link_target'] = strip_tags( $new_instance['link_target'] );
		$instance['link1'] = $new_instance['link1'];
		foreach ( $this->gtext_enabled_langs as $lng ) {
			$instance['lang_title'] .= self::gtext_lang_ini( $lng, $new_instance[$lng] );
		}
		foreach ( $this->gtext_enabled_langs as $lng ) {
			$instance['lang_text'] .= self::gtext_lang_ini( $lng, $new_instance['text_' . $lng] );
		}
		foreach ( $this->gtext_enabled_langs as $lng ) {
			$instance['lang_link'] .= self::gtext_lang_ini( $lng, $new_instance['link_' . $lng] );
		}
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'link' => '', 'link1' => '' ) );
		$title = $instance['title'];
		$text = $instance['text'];
		$link = $instance['link'];
		$link1 = $instance['link1'];
		$gtext_parsed_title = qtrans_split( $instance['lang_title'] ); # parse qTranslate's lang delimiters from title
		$gtext_parsed_text = qtrans_split( $instance['lang_text'] ); # parse qTranslate's lang delimiters from text
		$gtext_parsed_link = qtrans_split( $instance['lang_link'] ); # parse qTranslate's lang delimiters from text
		echo '<div style="margin: 10px 0;">';
		_e( "<!--:en-->Choose the page: <!--:--><!--:de-->Wählen Sie die Seite: <!--:--><!--:pl-->Wybierz stronę: <!--:-->" );
		echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		wp_dropdown_pages( array(
			'id' => $this->get_field_id( 'link_target' ),
			'name' => $this->get_field_name( 'link_target' ),
			'selected' => $instance['link_target'],
		) );
		echo '</div>';
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


		foreach ( $this->gtext_enabled_langs as $gtext_lang ) {
			echo '<div style="padding: 5px; margin:5px 5px 20px 5px; border: 1px solid #ccc; border-radius: 4px; background: #FAFAFA">';
			echo '<h2 style="text-transform: uppercase;">' . $gtext_lang . '</h2>';
			echo '<p><label for="' . $this->get_field_name( $gtext_lang ) . '">' . __( 'Title[' . $gtext_lang . ']' ) . '</label><br /><input style="width:90%;margin-left:10px;" id="' . $this->get_field_id( $gtext_lang ) . '" name="' . $this->get_field_name( $gtext_lang ) . '" type="text" value="' . $gtext_parsed_title[$gtext_lang] . '" /></p>';
			echo '<p><label for="' . $this->get_field_name( "text_" . $gtext_lang ) . '">' . __( 'Text[' . $gtext_lang . ']' ) . '</label><br /><textarea style="width:90%;height:300px;margin-left:10px;" id="' . $this->get_field_id( "text_" . $gtext_lang ) . '" name="' . $this->get_field_name( "text_" . $gtext_lang ) . '">' . $gtext_parsed_text[$gtext_lang] . '</textarea></p>';
			echo '<p><label for="' . $this->get_field_name( "link_" . $gtext_lang ) . '">' . __( 'Link[' . $gtext_lang . ']' ) . '</label><br /><input style="width:90%;margin-left:10px;" id="' . $this->get_field_id( "link_" . $gtext_lang ) . '" name="' . $this->get_field_name( "link_" . $gtext_lang ) . '" type="text" value="' . $gtext_parsed_link[$gtext_lang] . '" /></p>';
			echo '</div>';
		}
	}

}

function GTextInit() {
	register_widget( 'GTextWidget' );
}

add_action( 'widgets_init', 'GTextInit' );
?>
