<?php

function cptmm_add_custom_box(){
    $screens =  explode(',', esc_html(get_option('cptmm_post_types_support')));
    foreach ($screens as $screen) {
        add_meta_box(
            'cptmm_meta_box',
            'CPT Map Marker',
            'cptmm_custom_box_html',
            $screen 
        );
    }
}
add_action('add_meta_boxes', 'cptmm_add_custom_box');

function cptmm_custom_box_html($post){?>

    <div class='cpt_meta_box_wraper'>

        <span class='label_title'>Show On Map</span>
        <input type="checkbox" name="cptmm_show_on_map" <?=esc_html(get_post_meta($post->ID, 'cptmm_show_on_map', true)) ? 'checked' : '' ?>>
        <label for="cptmm_show_on_map">show on map</label>

        <div class='cpt_meta_box_inner'>

            <hr>
            
            <span class='label_title'>Coordinate</span>
            <label for="cptmm_coordinate">Add The Coordinate GPS, For Example 47.111125 , 13.45126</label><br>
            <small>or click on the map for better experience</small>
            <input class='' type="text" id="cptmm_coordinate" name="cptmm_coordinate" value='<?=esc_html(get_post_meta($post->ID, 'cptmm_coordinate', true))?>' placeholder=''>
            
            <span class='label_title'>search for address</span>
            <input class='' type="text" id="cptmm_search_address" name="cptmm_search_address"><button type='button' id='cptmm_search_address_btn' onclick='cptmm_search_place()'>search</button>
            <small id='cptmm_search_address_err_msg'></small>

            <div>
                <div id='cptmm_map'></div>
            </div>
            <hr>
            <?php $url = esc_html(get_post_meta($post->ID, 'cptmm_icon_url', true)); ?>

            <span class='label_title'>Icon</span>
            <label for="cptmm_icon">Add A Icon To Show On Map, leave empty for default icon</label><br>
            <small><b>recommended:</b> size - 90/80, type - png</b></small>

            <img id='cptmm_icon_img_prv' src='<?= $url ? $url :''?>' width='100px'>
            <a id='ctpmm_remove_image' style='display: <?= $url ? 'block' :'none'?>'>remove image</a><br>

            <button class="cptmm_icon_btn button">Image Gallery</button>
            <input class='' type="hidden" name="cptmm_icon_url" value='<?=esc_html(get_post_meta($post->ID, 'cptmm_icon_url', true))?>'>
            <hr>
            
            <span class='label_title'>Popup Text</span>
            <label for="cptmm_popup_text">Add popup message when marker clicked</label><br>
            <textarea class='' name="cptmm_popup_text"><?=get_post_meta($post->ID, 'cptmm_popup_text', true)?></textarea>
            <small>you can easily design the text with the class - <b>cptmm_popup_text</b></small>

            <hr>

            <?php $cptmm_link_to_post = esc_html(get_post_meta($post->ID, 'cptmm_link_to_post', true))?>
            <span class='label_title'>Link To Post</span>
            <input type='checkbox' class='' name="cptmm_link_to_post"<?= $cptmm_link_to_post ? 'checked' : '' ?>>
            <label for="cptmm_link_to_post">Add link to post in popup</label><br>

            <br>

            <?php $cptmm_text_link_to_post = esc_html(get_post_meta($post->ID, 'cptmm_text_link_to_post', true))?>
            <label for="cptmm_text_link_to_post">Text to display on link to post</label>
            <input class='' type="text" name="cptmm_text_link_to_post" value='<?=$cptmm_text_link_to_post ? $cptmm_text_link_to_post :'Read More' ?>' <?= $cptmm_link_to_post ? '' : 'disabled' ?>>
            <small>you can easily design the link with the class - <b>ctpmm_link_to_post</b></small>
        </div>
    </div>

<?php



}

function cptmm_save_metadata($ID = false, $post = false){

    if(isset($_POST['cptmm_show_on_map'])){//check if send in post

        update_post_meta($ID, 'cptmm_show_on_map', $_POST['cptmm_show_on_map']);
        update_post_meta($ID, 'cptmm_coordinate', $_POST['cptmm_coordinate']);
        update_post_meta($ID, 'cptmm_icon_url', $_POST['cptmm_icon_url']);
        update_post_meta($ID, 'cptmm_popup_text', $_POST['cptmm_popup_text']);
        update_post_meta($ID, 'cptmm_link_to_post', $_POST['cptmm_link_to_post']);
        update_post_meta($ID, 'cptmm_text_link_to_post', $_POST['cptmm_text_link_to_post']);

    }else if(get_post_meta($ID, 'cptmm_show_on_map')){//if not check if is change now
        update_post_meta($ID, 'cptmm_show_on_map', '');
    }
}
add_action('save_post', 'cptmm_save_metadata');
