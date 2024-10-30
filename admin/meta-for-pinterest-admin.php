<?php

if ( !class_exists( 'MetaForPinterest_Plugin' ) )
{
    class MetaForPinterest_Plugin
    {
        public static function init()
        {

            add_action( 'admin_enqueue_scripts', 'wppinterestmeta_custom_image_view');
            function wppinterestmeta_custom_image_view($hook){
                if($hook == 'post.php'){
                    wp_enqueue_script( 'custom_image_view', plugin_dir_url( __FILE__ ) . 'js/customView.js', array( 'media-views' ));
                }
            }

            add_action( 'wp_enqueue_media', function () {
                remove_action( 'admin_footer', 'wp_print_media_templates' );
                add_action( 'admin_footer', $func = function () {
                    ob_start();
                    wp_print_media_templates();
                    $tpl = ob_get_clean();
                    // To future-proof a bit, search first for the template and then for the section.
                    if ( ( $idx = strpos( $tpl, 'tmpl-image-details' ) ) !== false
                            && ( $before_idx = strpos( $tpl, '<div class="advanced-section">', $idx ) ) !== false ) {
                        ob_start();
                        ?>
                <div class="pinterestmeta-section">
                    <h2><?php _e( 'Pinterest Meta' ); ?></h2>
                    <div class="data_pin_description">
                        <label class="setting data_pin_description" title="<?php _e('Enter the description that will be used when generating the pin')?>">
                            <span><?php _e( 'Pin Description' ); ?></span>
                            <input type="text" data-setting="data_pin_description" value="{{ data.model.data_pin_description }}" />
                        </label>
                    </div>
                    <div class="data_pin_url">
                        <label class="setting data_pin_url" title="<?php _e('Enter the URL that the pin will link to')?>">
                            <span><?php _e( 'Pin URL' ); ?></span>
                            <input type="text" data-setting="data_pin_url" value="{{ data.model.data_pin_url }}" />
                        </label>
                    </div>
                    <div class="data_pin_media">
                        <div>
                            <label class="setting data_pin_media" title="<?php _e('Enter an alternate URL for an image that will be pinned')?>">
                                <span><?php _e( 'Pinned Image' ); ?></span>
                                <input id="m4pin_media_preview_input" type="text" data-setting="data_pin_media" value="{{ data.model.data_pin_media }}" onchange="metaforpinterest_update_preview_image()"/>
                            </label>
                        </div>
                        <div align="center" text-align="center">
                            <img id="m4pin_media_preview" src="{{ data.model.data_pin_media }}" style="max-width: 256px; max-height: 256px;" />
                        </div>
                        <br style="clear: left;" />
                    </div>
                    <div class="data_pin_id">
                        <label class="setting data_pin_id" title="<?php _e('Set the unique ID for this image pin')?>">
                            <span><?php _e( 'Pin ID' ); ?></span>
                            <input type="text" data-setting="data_pin_id" value="{{ data.model.data_pin_id }}" />
                        </label>
                    </div>
                    <div class="data_pin_nopin">
                        <label class="setting data_pin_nopin" title="<?php _e('Prevent a user from being able to pin this image')?>">
                            <span><?php _e( 'Prevent pinning' ); ?></span>
                            <input type="checkbox" data-setting="data_pin_nopin" value="{{ data.model.data_pin_nopin }}" style="margin: 8px 1% 0;"/>
                        </label>
                    </div>
                </div>
                        <?php
                        $pinterest_meta_section = ob_get_clean();
                        $tpl = substr_replace( $tpl, $pinterest_meta_section, $before_idx, 0 );
                    }
                    echo $tpl;
                } );
            } );
        }
    }
    MetaForPinterest_Plugin::init();
}

