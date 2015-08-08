<?php
class OverrideWidgets {
	static function pranon_get_search_form($echo = true) {
		$format = current_theme_supports ( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
		$format = apply_filters ( 'search_form_format', $format );
		
		if ('html5' == $format) {
			$form = ' <div class="widget-search"><form role="search" method="get" class="searchForm light" action="' . esc_url ( home_url ( '/' ) ) . '">
			 <div class="input-group">
			<input type="search" class="form-control search-input" placeholder="' . esc_attr_x ( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query () . '" name="s" title="' . esc_attr_x ( 'Search for:', 'label' ) . '" />
			 <input type="submit" class="submitSearch" value="Ok">
			</div>
			</form></div>';
		} else {
			$form = ' <div class="widget-search"><form role="search" method="get" id="searchform" class="searchForm light" action="' . esc_url ( home_url ( '/' ) ) . '">
			 <div class="input-group">
			<input type="text" class="form-control search-input" placeholder="' . esc_attr_x ( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query () . '" name="s" id="s" />
			 <input type="submit" class="submitSearch" value="Ok">
			</div>
			</form></div>';
		}
		
		return $form;
	}
}