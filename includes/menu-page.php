<?php

//register fields to save data for email
function cptmm_admin_settings() {
    register_setting( 'cptmm_options', 'cptmm_post_types_support' );
    register_setting( 'cptmm_options', 'cptmm_default_icon_url' );
    register_setting( 'cptmm_options', 'cptmm_users_location_allowed');
}
add_action( 'admin_init', 'cptmm_admin_settings' );

function cptmm_setup_menu_content(){?>



<div class="wrap ctpmm_wrap">

    <form method='post' action="options.php">

    <h1></h1>

    <?php if( isset($_GET['settings-updated']) ) { ?>
        <div id='message' class='updated'>
            <p><strong><?php _e('Settings saved.') ?></strong></p>
        </div>
    <?php } ?>

        <?php
            settings_fields( 'cptmm_options' );
            do_settings_sections( 'cptmm_options' );
        ?>

    <div class="cptmm_box">
        <img class='ctpmm_logo_img' src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMS45OTkgNTExLjk5OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTExLjk5OSA1MTEuOTk5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojNDRDODY4OyIgZD0iTTUxMS44NzksNDc1LjY4NWwtNDAuMjI0LTIyMS42MTFjLTAuNDAxLTIuMjEyLTEuNzczLTQuMTI4LTMuNzM5LTUuMjIxbC0xMDEuMjQyLTU2LjMxICAgYy0xLjMxNC0wLjczMi0yLjc4Ny0xLjAyMy00LjIzNC0wLjkxMWwxOC40MTksMjM3LjYwOGwtMC42MTcsMC4yNzZsMTIxLjE2NCw1NC4zNTdjMC45ODYsMC40NDEsMi4wMzQsMC42NTksMy4wNzcsMC42NTkgICBjMS42NTEsMCwzLjI4Ny0wLjU0Myw0LjYzMi0xLjU5NkM1MTEuMzEzLDQ4MS4yMiw1MTIuMzc2LDQ3OC40MjgsNTExLjg3OSw0NzUuNjg1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzQ0Qzg2ODsiIGQ9Ik0yNTYsMjQ2LjM3NWwtMTAzLjU0NS01My45MzFjLTEuMjQxLTAuNjQ3LTIuNjE3LTAuOTExLTMuOTcyLTAuODIgICBjMC4zNTktMC4wMjIsMC43Mi0wLjAyLDEuMDc4LDAuMDA4bC0xOC40MTksMjM3LjYwOGwxMjEuNzgxLDU0LjYzNGMwLjk4MywwLjQ0LDIuMDMyLDAuNjU5LDMuMDc3LDAuNjU5bDAsMFYyNDYuMzc1eiIvPgo8L2c+CjxnPgoJPHBhdGggc3R5bGU9ImZpbGw6IzRDRTE2NjsiIGQ9Ik0xNDkuNTYsMTkxLjYzM2MtMS40NDctMC4xMTItMi45MiwwLjE3OS00LjIzNCwwLjkxbC0xMDEuMjQzLDU2LjMxICAgYy0xLjk2NiwxLjA5My0zLjMzOCwzLjAwOC0zLjczOSw1LjIyMUwwLjEyMSw0NzUuNjg1Yy0wLjQ5OCwyLjc0MiwwLjU2Niw1LjUzNCwyLjc2Myw3LjI1MmMxLjM0NywxLjA1MywyLjk4MiwxLjU5Niw0LjYzMiwxLjU5NiAgIGMxLjA0MywwLDIuMDkyLTAuMjE3LDMuMDc3LTAuNjU5bDEyMC41MDQtNTQuMDYxTDE0OS41NiwxOTEuNjMzeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzRDRTE2NjsiIGQ9Ik0zNjIuNDM5LDE5MS42MjhjLTAuOTk2LDAuMDc3LTEuOTgxLDAuMzQyLTIuODk0LDAuODE4TDI1NiwyNDYuMzc2djIzOC4xNThjMCwwLDAsMCwwLjAwMSwwICAgYzEuMDQ1LDAsMi4wOTUtMC4yMTgsMy4wNzctMC42NTlsMTIxLjc4MS01NC42MzRMMzYyLjQzOSwxOTEuNjI4eiIvPgo8L2c+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRkRCNTY7IiBwb2ludHM9IjI4LjE1NCwzMjEuMjMzIDE5Ljk4MywzNjYuMjUyIDE0MC45NzcsMzAyLjM0NiAxNDMuNzg2LDI2Ni4xMDcgMTQ0LjI1MiwyNjAuMDk3ICIvPgo8cGF0aCBzdHlsZT0iZmlsbDojQThFRUZDOyIgZD0iTTE0Mi4wNjYsMjg4LjI5NGwtMS4wODksMTQuMDUyTDE5Ljk4MywzNjYuMjUyTDAuMTIxLDQ3NS42ODVjLTAuNDk4LDIuNzQyLDAuNTY2LDUuNTM0LDIuNzYzLDcuMjUyICBjMS4zNDcsMS4wNTMsMi45ODIsMS41OTYsNC42MzIsMS41OTZjMS4wNDMsMCwyLjA5Mi0wLjIxNywzLjA3Ny0wLjY1OWwxMjAuNTA0LTU0LjA2MUwxNDIuMDY2LDI4OC4yOTRMMTQyLjA2NiwyODguMjk0eiIvPgo8Zz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNGRkJCMjQ7IiBwb2ludHM9IjI1Ni4wMywyNzYuMDggMTQ0LjI1MiwyNjAuMDk3IDE0MC45NzcsMzAyLjM0NiAyNTYsNDc3LjAyNSAyNTYsNDEzLjUwNyAxODcuMzYzLDMwNS40MjkgICAgMjU2LjAzLDMxMy42NDIgICIvPgoJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGQkIyNDsiIHBvaW50cz0iNDU5Ljk0NiwyNDQuNDIxIDQxMS4zMTEsMjE3LjM3IDM2NS4yNjksMjI4LjEyOCAzNjUuODQ1LDIzNS41NjQgMzY4LjExOSwyNjQuODk4ICAiLz4KPC9nPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojRkZEQjU2OyIgcG9pbnRzPSIzNzIuMjAyLDMxNy41NzYgMzY3Ljg0MiwyNjEuMzI3IDM2Ny44NDIsMjYxLjMyNyAzNjUuMjY5LDIyOC4xMjggMjU2LjAzLDI3Ni4wOCAgIDI1Ni4wMywzMTMuNjQyIDMyNy4zODYsMjgyLjYxMiAiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZGQkIyNDsiIGQ9Ik01MTEuODc5LDQ3NS42ODVsLTEwLjEwMy01NS42NjZMMzY4LjExOSwyNjQuODk4bDQuMDg0LDUyLjY3OGwxMzcuMDcsMTY1LjIyMSAgQzUxMS4zNTcsNDgxLjA3LDUxMi4zNjQsNDc4LjM1OCw1MTEuODc5LDQ3NS42ODV6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRjRBNEE7IiBkPSJNMjU2LjQ4MSwyNy40NjVjLTU3Ljk2MywwLTEwNS4xMiw0Ny4xMTgtMTA1LjEyLDEwNS4wMzRjMCwzNS44MjYsMTcuMDA5LDc0LjI5LDUwLjU1NiwxMTQuMzIyICBjMjQuNjM5LDI5LjQwMyw0OC45NDMsNDguMzE0LDQ5Ljk2Niw0OS4xMDVjMS4zNTQsMS4wNDcsMi45NzYsMS41Nyw0LjU5OSwxLjU3YzEuNjIyLDAsMy4yNDUtMC41MjMsNC41OTktMS41NyAgYzEuMDIyLTAuNzkxLDI1LjMyNy0xOS43MDIsNDkuOTY2LTQ5LjEwNWMzMy41NDctNDAuMDMyLDUwLjU1Ni03OC40OTUsNTAuNTU2LTExNC4zMjIgIEMzNjEuNjAxLDc0LjU4MywzMTQuNDQ0LDI3LjQ2NSwyNTYuNDgxLDI3LjQ2NXogTTI5NS40MTEsMTMyLjQ5OGMwLDIxLjQ4Mi0xNy40MywzOC44OTgtMzguOTMsMzguODk4ICBjLTIxLjUsMC0zOC45My0xNy40MTUtMzguOTMtMzguODk4czE3LjQzLTM4Ljg5OCwzOC45My0zOC44OThDMjc3Ljk4MSw5My42LDI5NS40MTEsMTExLjAxNiwyOTUuNDExLDEzMi40OTh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFNzM0M0Y7IiBkPSJNMjU2LjQ4MSwyNy40NjVjLTQuNTk0LDAtOS4xMTksMC4yOTgtMTMuNTU5LDAuODcyYzUxLjU4Myw2LjY2Nyw5MS41NjIsNTAuODM2LDkxLjU2MiwxMDQuMTYyICBjMCwzNS44MjYtMTcuMDA5LDc0LjI5LTUwLjU1NiwxMTQuMzIyYy0xNS44NDUsMTguOTA4LTMxLjU0LDMzLjQ2Ny00MS4wMDUsNDEuNjY5YzUuMjU0LDQuNTUyLDguNTk2LDcuMTU0LDguOTYsNy40MzYgIGMxLjM1NCwxLjA0NywyLjk3NiwxLjU3LDQuNTk5LDEuNTdjMS42MjIsMCwzLjI0NS0wLjUyMyw0LjU5OS0xLjU3YzEuMDIyLTAuNzkxLDI1LjMyNy0xOS43MDIsNDkuOTY2LTQ5LjEwNSAgYzMzLjU0Ny00MC4wMzIsNTAuNTU2LTc4LjQ5NSw1MC41NTYtMTE0LjMyMkMzNjEuNjAxLDc0LjU4MywzMTQuNDQ0LDI3LjQ2NSwyNTYuNDgxLDI3LjQ2NXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZGREI1NjsiIGQ9Ik0yNTkuMDc4LDQ4My44NzRsNDUuMjg1LTIwLjMxNkwyNTYsNDEzLjUwN3Y3MS4wMjZjMCwwLDAsMCwwLjAwMSwwICBDMjU3LjA0Niw0ODQuNTMzLDI1OC4wOTUsNDg0LjMxNiwyNTkuMDc4LDQ4My44NzR6Ii8+CjxnPgoJPHBhdGggc3R5bGU9ImZpbGw6IzFFQTRFOTsiIGQ9Ik00NzEuNjU0LDI1NC4wNzRjLTAuNDAxLTIuMjEyLTEuNzczLTQuMTI4LTMuNzM5LTUuMjIxbC03Ljk3LTQuNDMzbC05MS44MjcsMjAuNDc3bDAsMCAgIGwxMzMuNjU2LDE1NS4xMjFMNDcxLjY1NCwyNTQuMDc0eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzFFQTRFOTsiIGQ9Ik0yNTUuOTk5LDQ4NC41MzNDMjU2LDQ4NC41MzMsMjU2LDQ4NC41MzMsMjU1Ljk5OSw0ODQuNTMzdi03LjUwOEwxNDAuOTc3LDMwMi4zNDZsLTkuODM3LDEyNi44OTUgICBsMTIxLjc4MSw1NC42MzRDMjUzLjkwNCw0ODQuMzE2LDI1NC45NTMsNDg0LjUzMywyNTUuOTk5LDQ4NC41MzN6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
        <div class='cptmm_header'>
            <h1>CPT map marker</h1>
            <span>add your posts & cpt as a marker on the maps</span>
        </div>
        <div class='cptmm_submit_btn'><?=submit_button('Save Settings');?></div>
    </div>


    <div class="cptmm_box_content cptmm_full_width">
        <div class="cptmm_box_content_header">
            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iTGF5ZXJfNSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNjQgNjQiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCA2NCA2NCIgd2lkdGg9IjUxMnB4Ij48cGF0aCBkPSJtNjIgMnY0OGgtMjR2LTgtOC04LTgtOC04eiIgZmlsbD0iI2ZmZWFhNyIvPjxwYXRoIGQ9Im0yNiAxNHY4IDggOCA4IDggOGwxMi0xMnYtOC04LTgtOC04LTh6IiBmaWxsPSIjY2NkMWQ5Ii8+PHBhdGggZD0ibTI2IDU0djhoLTI0di00OGgyNHY4IDggOCA4eiIgZmlsbD0iI2ZmZWFhNyIvPjxwYXRoIGQ9Im04IDIwaDEydjEwaC0xMnoiIGZpbGw9IiNiNGRkN2YiLz48cGF0aCBkPSJtNDQgOGgxMnYxMGgtMTJ6IiBmaWxsPSIjZmY4MjZlIi8+PHBhdGggZD0ibTcgMTl2MTJoMTR2LTEyem0xMiAxMGgtMTB2LThoMTB6Ii8+PHBhdGggZD0ibTcgMzVoNHYyaC00eiIvPjxwYXRoIGQ9Im0xMyAzNWg4djJoLTh6Ii8+PHBhdGggZD0ibTcgNTVoNHYyaC00eiIvPjxwYXRoIGQ9Im0xMyA1NWg4djJoLTh6Ii8+PHBhdGggZD0ibTcgMzloMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTcgNDNoMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTcgNDdoMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTcgNTFoMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTU3IDdoLTE0djEyaDE0em0tMiAxMGgtMTB2LThoMTB6Ii8+PHBhdGggZD0ibTQzIDIzaDR2MmgtNHoiLz48cGF0aCBkPSJtNDkgMjNoOHYyaC04eiIvPjxwYXRoIGQ9Im00MyA0M2g0djJoLTR6Ii8+PHBhdGggZD0ibTQ5IDQzaDh2MmgtOHoiLz48cGF0aCBkPSJtNDMgMjdoMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTQzIDMxaDE0djJoLTE0eiIvPjxwYXRoIGQ9Im00MyAzNWgxNHYyaC0xNHoiLz48cGF0aCBkPSJtNDMgMzloMTR2MmgtMTR6Ii8+PHBhdGggZD0ibTM3LjU4NiAxLTEyIDEyaC0yNC41ODZ2NTBoMjUuNDE0bDEyLTEyaDI0LjU4NnYtNTB6bS0uNTg2IDQwLjU4Ni0xMCAxMHYtNS4xNzJsMTAtMTB6bTAtOC0xMCAxMHYtNS4xNzJsMTAtMTB6bTAtOC0xMCAxMHYtNS4xNzJsMTAtMTB6bTAtOC0xMCAxMHYtNS4xNzJsMTAtMTB6bTAtOC0xMCAxMHYtNS4xNzJsMTAtMTB6bS0xMCA0NC44MjggMTAtMTB2NS4xNzJsLTEwIDEwem0tMjQtMzkuNDE0aDIydjQ2aC0yMnptNTggMzRoLTIydi00NmgyMnoiLz48L3N2Zz4K" />
            <h2>About Us & How To Use</h2>
            <span>customize easily your on map with a shortcode</span>
        </div>
        <div class="cptmm_box_content_section">
            <span>
                <b>About Us</b><br>
                CPT map marker plugin is besed on the Leaflet library <br>
                Leaflet is the leading open-source JavaScript library for mobile-friendly interactive maps. it has all the mapping features most developers ever need.<br>
                Leaflet is besed on <a href="https://www.openstreetmap.org/copyright"> openstreetmap.org </a><br>
                visit <a href="https://leafletjs.com/">https://leafletjs.com/</a> for more information.<br>
                
                <hr>
                <b>How To Use</b><br>
                add the shortcode below to any page or post to embed the map.
                <br><input type="text" value='[cptmm_map]' disabled><br>
                you can add the following arguments to the shortcode for customizing the map<br>
                <b>width & height </b> for the size of the map<br>
                <b>lat & lng </b> for centering the view of the map
                <br><input type="text" value="[cptmm_map width='600px' height='300px' lat='51.505' lng='-0.09']" disabled><br>


                <hr>
                <b>Geo location</b><br>
                Use users location for centering the map accordingly<br>
                <label class='switch'>
                    <input type='checkbox' name='cptmm_users_location_allowed' <?= esc_html(get_option('cptmm_users_location_allowed')) ? 'checked' : ''?>>
                    <span class='slider round'></span><br>
                </label>
                <span>ask permissions for users location</span><br>

            </span>
        </div>
    </div>

    <div class="cptmm_box_content">
        <div class="cptmm_box_content_header">
<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU5IDU5IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1OSA1OTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRDhBMTk7IiBkPSJNNDUuMDcsNTljLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFINDdjMC41NTMsMCwxLjAzNSwwLjQ0NywxLjAzNSwwLjk5OSAgYzAsMC41NTMtMC40MTIsMS0wLjk2NSwxdi0xbC0wLjAyOSwxTDQ1LjA3LDU5eiBNNDEuMDcsNTloLTJjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxICBTNDEuNjIzLDU5LDQxLjA3LDU5eiBNMzUuMDcsNTloLTJjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxUzM1LjYyMyw1OSwzNS4wNyw1OXogTTI5LjA3LDU5aC0yICBjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxUzI5LjYyMyw1OSwyOS4wNyw1OXogTTIzLjA3LDU5aC0yYy0wLjU1MywwLTEtMC40NDctMS0xczAuNDQ3LTEsMS0xaDIgIGMwLjU1MywwLDEsMC40NDcsMSwxUzIzLjYyMyw1OSwyMy4wNyw1OXogTTE3LjA3LDU5aC0yYy0wLjU1MywwLTEtMC40NDctMS0xczAuNDQ3LTEsMS0xaDJjMC41NTMsMCwxLDAuNDQ3LDEsMVMxNy42MjMsNTksMTcuMDcsNTkgIHogTTUwLjUzNyw1Ny4yODJjLTAuMjE2LDAtMC40MzQtMC4wNy0wLjYxNy0wLjIxNGMtMC40MzUtMC4zNDItMC41MDktMC45NzEtMC4xNjgtMS40MDRjMC4zMjUtMC40MTMsMC41NDgtMC44ODIsMC42NjMtMS4zOTIgIGMwLjEyMS0wLjUzOSwwLjY1Ni0wLjg3NywxLjE5NS0wLjc1NnMwLjg3NywwLjY1NiwwLjc1NiwxLjE5NWMtMC4xNzgsMC43OTItMC41MzgsMS41NDktMS4wNDIsMi4xODggIEM1MS4xMjcsNTcuMTUxLDUwLjgzNCw1Ny4yODIsNTAuNTM3LDU3LjI4MnogTTUwLjUzOCw1MS43MTljLTAuMjk3LDAtMC41OS0wLjEzMS0wLjc4Ny0wLjM4MmMtMC4zMi0wLjQwNy0wLjczNC0wLjc0NC0xLjE5Ny0wLjk3NCAgYy0wLjQ5NC0wLjI0Ni0wLjY5Ni0wLjg0Ni0wLjQ1LTEuMzQxYzAuMjQ2LTAuNDk0LDAuODQ0LTAuNjk3LDEuMzQxLTAuNDVjMC43MjcsMC4zNjEsMS4zNzYsMC44OSwxLjg3OSwxLjUyOCAgYzAuMzQxLDAuNDM0LDAuMjY3LDEuMDYzLTAuMTY4LDEuNDA0QzUwLjk3Myw1MS42NDgsNTAuNzU0LDUxLjcxOSw1MC41MzgsNTEuNzE5eiBNNDUuMDcxLDUwaC0yYy0wLjU1MywwLTEtMC40NDctMS0xczAuNDQ3LTEsMS0xICBoMmMwLjU1MywwLDEsMC40NDcsMSwxUzQ1LjYyNCw1MCw0NS4wNzEsNTB6IE0zOS4wNzEsNTBoLTJjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxICBTMzkuNjI0LDUwLDM5LjA3MSw1MHogTTMzLjEyOSw0OS41OTRjLTAuMTM5LDAtMC4yOC0wLjAyOS0wLjQxNS0wLjA5MWMtMC43MzYtMC4zMzYtMS40MDItMC44NDQtMS45MjctMS40NjcgIGMtMC4zNTUtMC40MjMtMC4zMDEtMS4wNTQsMC4xMjItMS40MDlzMS4wNTMtMC4zMDEsMS40MDksMC4xMjJjMC4zMzQsMC4zOTcsMC43NTksMC43MjEsMS4yMjgsMC45MzYgIGMwLjUwMiwwLjIyOSwwLjcyMywwLjgyMiwwLjQ5MywxLjMyNUMzMy44NzEsNDkuMzc3LDMzLjUwOSw0OS41OTQsMzMuMTI5LDQ5LjU5NHogTTMwLjU4LDQ0LjY1Yy0wLjA2MywwLTAuMTI2LTAuMDA2LTAuMTg5LTAuMDE4ICBjLTAuNTQzLTAuMTA0LTAuODk3LTAuNjI5LTAuNzk0LTEuMTcxYzAuMTU1LTAuODA5LDAuNDgzLTEuNTU2LDAuOTczLTIuMjIyYzAuMzI4LTAuNDQ1LDAuOTUzLTAuNTM5LDEuMzk4LTAuMjEzICBjMC40NDUsMC4zMjgsMC41NCwwLjk1NCwwLjIxMywxLjM5OGMtMC4zMTMsMC40MjQtMC41MjEsMC44OTktMC42MTksMS40MTNDMzEuNDY5LDQ0LjMxNywzMS4wNSw0NC42NSwzMC41OCw0NC42NXogTTM0Ljc4NCw0MS4wMDUgIGMtMC41MzMsMC0wLjk3Ny0wLjQyMS0wLjk5OC0wLjk1OWMtMC4wMjItMC41NTIsMC40MDYtMS4wMTgsMC45NTgtMS4wNEMzNC44MjksMzkuMDAyLDM0LjkxNCwzOSwzNSwzOWgxLjc4NWMwLjU1MywwLDEsMC40NDcsMSwxICBzLTAuNDQ3LDEtMSwxbC0xLjk1OSwwLjAwNEMzNC44MTIsNDEuMDA1LDM0Ljc5OCw0MS4wMDUsMzQuNzg0LDQxLjAwNXogTTUzLDQxaC0wLjIxNWMtMC41NTMsMC0xLTAuNDQ3LTEtMXMwLjQ0Ny0xLDEtMUg1MyAgYzAuNDY5LDAsMC45MjMtMC4wOTEsMS4zNTItMC4yNzFjMC41MDUtMC4yMTUsMS4wOTUsMC4wMjUsMS4zMDksMC41MzVjMC4yMTQsMC41MDktMC4wMjUsMS4wOTUtMC41MzUsMS4zMDkgIEM1NC40NTEsNDAuODU2LDUzLjczNiw0MSw1Myw0MXogTTQ4Ljc4NSw0MWgtMmMtMC41NTMsMC0xLTAuNDQ3LTEtMXMwLjQ0Ny0xLDEtMWgyYzAuNTUzLDAsMSwwLjQ0NywxLDFTNDkuMzM4LDQxLDQ4Ljc4NSw0MXogICBNNDIuNzg1LDQxaC0yYy0wLjU1MywwLTEtMC40NDctMS0xczAuNDQ3LTEsMS0xaDJjMC41NTMsMCwxLDAuNDQ3LDEsMVM0My4zMzgsNDEsNDIuNzg1LDQxeiBNNTcuMzE4LDM3Ljc3ICBjLTAuMDkzLDAtMC4xODgtMC4wMTMtMC4yODEtMC4wNGMtMC41My0wLjE1NS0wLjgzNC0wLjcxMS0wLjY3OS0xLjI0MWMwLjA5NC0wLjMyLDAuMTQyLTAuNjUyLDAuMTQyLTAuOTg4ICBjMC4wMDItMC4xOTItMC4wMTQtMC4zNzQtMC4wNDItMC41NTJjLTAuMDg4LTAuNTQ1LDAuMjgzLTEuMDU5LDAuODI5LTEuMTQ2YzAuNTQzLTAuMDksMS4wNTgsMC4yODMsMS4xNDYsMC44MjkgIGMwLjA0NywwLjI5MywwLjA2OSwwLjU4OCwwLjA2NywwLjg3NmMwLDAuNTE5LTAuMDc0LDEuMDQtMC4yMjIsMS41NDNDNTguMTUsMzcuNDg3LDU3Ljc1MSwzNy43Nyw1Ny4zMTgsMzcuNzd6IE01NS4yNSwzMi42MDQgIGMtMC4xNywwLTAuMzQzLTAuMDQzLTAuNTAxLTAuMTM1Yy0wLjQ1My0wLjI2My0wLjk0Ny0wLjQxNy0xLjQ3LTAuNDU4Yy0wLjU1MS0wLjA0My0wLjk2Mi0wLjUyNC0wLjkxOS0xLjA3NSAgYzAuMDQzLTAuNTUyLDAuNTI2LTAuOTU5LDEuMDc1LTAuOTE5YzAuODIzLDAuMDY0LDEuNjA0LDAuMzA4LDIuMzE3LDAuNzIyYzAuNDc4LDAuMjc3LDAuNjQxLDAuODksMC4zNjMsMS4zNjcgIEM1NS45MzEsMzIuNDI1LDU1LjU5NSwzMi42MDQsNTUuMjUsMzIuNjA0eiBNNDkuMzU3LDMyaC0yYy0wLjU1MywwLTEtMC40NDctMS0xczAuNDQ3LTEsMS0xaDJjMC41NTMsMCwxLDAuNDQ3LDEsMSAgUzQ5LjkxLDMyLDQ5LjM1NywzMnogTTQzLjM1NywzMmgtMmMtMC41NTMsMC0xLTAuNDQ3LTEtMXMwLjQ0Ny0xLDEtMWgyYzAuNTUzLDAsMSwwLjQ0NywxLDFTNDMuOTEsMzIsNDMuMzU3LDMyeiBNMzcuMzU3LDMyaC0yICBjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxUzM3LjkxLDMyLDM3LjM1NywzMnogTTMxLjM1NywzMkgzMWMtMC42NzgtMC4wMDEtMS4zMzctMC4xMjMtMS45NjMtMC4zNjEgIGMtMC41MTYtMC4xOTctMC43NzQtMC43NzUtMC41NzgtMS4yOTFjMC4xOTgtMC41MTcsMC43NzktMC43NzMsMS4yOTEtMC41NzhjMC4zOTgsMC4xNTIsMC44MTksMC4yMjksMS4yNTIsMC4yM2gwLjM1NSAgYzAuNTUzLDAsMSwwLjQ0NywxLDFTMzEuOTEsMzIsMzEuMzU3LDMyeiBNMjYuNzI0LDI4LjkwNWMtMC40MiwwLTAuODEyLTAuMjY3LTAuOTUtMC42ODhjLTAuMTgyLTAuNTUyLTAuMjczLTEuMTMtMC4yNzMtMS43MTggIGMwLjAwMS0wLjIzOCwwLjAxNi0wLjQ2OSwwLjA0NC0wLjY5NGMwLjA2OC0wLjU0NiwwLjU1Mi0wLjkzMSwxLjExNy0wLjg2N2MwLjU0OCwwLjA2OCwwLjkzNywwLjU2OSwwLjg2NywxLjExNyAgYy0wLjAxOSwwLjE0Ny0wLjAyNywwLjI5OC0wLjAyOCwwLjQ0OWMwLDAuMzcsMC4wNTksMC43MzcsMC4xNzQsMS4wODhjMC4xNzIsMC41MjQtMC4xMTMsMS4wOS0wLjYzOCwxLjI2MyAgQzI2LjkzMywyOC44OSwyNi44MjcsMjguOTA1LDI2LjcyNCwyOC45MDV6IE0yOC42MjgsMjMuNjc2Yy0wLjMzNCwwLTAuNjYtMC4xNjctMC44NS0wLjQ3MWMtMC4yOTItMC40NjktMC4xNDktMS4wODYsMC4zMTktMS4zNzggIGMwLjctMC40MzcsMS40NzItMC43MDMsMi4yOTQtMC43OTRjMC41NTMtMC4wNTcsMS4wNDMsMC4zMzYsMS4xMDQsMC44ODVzLTAuMzM2LDEuMDQzLTAuODg1LDEuMTA0ICBjLTAuNTIxLDAuMDU4LTEuMDExLDAuMjI3LTEuNDU0LDAuNTAzQzI4Ljk5MSwyMy42MjcsMjguODA5LDIzLjY3NiwyOC42MjgsMjMuNjc2eiBNNDIuNSwyM2gtMmMtMC41NTMsMC0xLTAuNDQ3LTEtMXMwLjQ0Ny0xLDEtMWgyICBjMC41NTMsMCwxLDAuNDQ3LDEsMVM0My4wNTMsMjMsNDIuNSwyM3ogTTM2LjUsMjNoLTJjLTAuNTUzLDAtMS0wLjQ0Ny0xLTFzMC40NDctMSwxLTFoMmMwLjU1MywwLDEsMC40NDcsMSwxUzM3LjA1MywyMywzNi41LDIzeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojMjZCOTlBOyIgZD0iTTUzLjQ3LDIuNjY5TDUzLjQ3LDIuNjY5Yy0zLjE1Ny0zLjU1OS04LjI3Ni0zLjU1OS0xMS40MzMsMHYwYy0zLjE1NywzLjU1OS0zLjE1Nyw5LjMyOCwwLDEyLjg4NyAgTDQ3Ljc1MywyMmw1LjcxNi02LjQ0NEM1Ni42MjcsMTEuOTk4LDU2LjYyNyw2LjIyOCw1My40NywyLjY2OXogTTQ4LDEzYy0yLjQ4NSwwLTQuNS0yLjAxNS00LjUtNC41UzQ1LjUxNSw0LDQ4LDQgIHM0LjUsMi4wMTUsNC41LDQuNVM1MC40ODUsMTMsNDgsMTN6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiMzMDgzQzk7IiBkPSJNMTkuMjc4LDI4LjY0Yy00LjI5Ni00Ljg1My0xMS4yNjEtNC44NTMtMTUuNTU2LDBoMGMtNC4yOTYsNC44NTMtNC4yOTYsMTIuNzIxLDAsMTcuNTczTDExLjUsNTUgIGw3Ljc3OC04Ljc4N0MyMy41NzQsNDEuMzYsMjMuNTc0LDMzLjQ5MiwxOS4yNzgsMjguNjR6IE0xMS41LDQxYy0yLjc2MSwwLTUtMi4yMzktNS01czIuMjM5LTUsNS01czUsMi4yMzksNSw1UzE0LjI2MSw0MSwxMS41LDQxeiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />            <h2>Default Marker</h2>
            <span>chiche your default marker</span>
        </div>
        <div class="cptmm_box_content_section">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/001.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/002.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/003.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/004.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/005.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/006.png'?>" alt="">
            <img class='cptmm_default_icon' src="<?=plugins_url() . '/CPT-map-marker/assets/admin/images/007.png'?>" alt="">

            <?php $cptmm_default_icon_url = esc_html(get_option('cptmm_default_icon_url'))?>
            <input type="hidden" name='cptmm_default_icon_url' value='<?=$cptmm_default_icon_url ? $cptmm_default_icon_url : plugins_url() . '/CPT-map-marker/assets/admin/images/001.png'?>'>
        </div>
    </div>

    <div class="cptmm_box_content">
        <div class="cptmm_box_content_header">
            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU0Ljk4MSA1NC45ODEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDU0Ljk4MSA1NC45ODE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiMzQUJDQTc7IiBkPSJNNDMuOTkyLDUySDguNzJjLTQuNjE5LDAtOC4zNjQtMy43NDUtOC4zNjQtOC4zNjRWOC4zNjRDMC4zNTYsMy43NDUsNC4xMDEsMCw4LjcyLDBoMzUuMjcyICAgIGM0LjYxOSwwLDguMzY0LDMuNzQ1LDguMzY0LDguMzY0djM1LjI3MkM1Mi4zNTYsNDguMjU1LDQ4LjYxMSw1Miw0My45OTIsNTJ6Ii8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik00NC4zNTYsMTRoLTE4Yy0wLjU1MiwwLTEtMC40NDctMS0xczAuNDQ4LTEsMS0xaDE4YzAuNTUyLDAsMSwwLjQ0NywxLDFTNDQuOTA4LDE0LDQ0LjM1NiwxNHoiLz4KCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTQ0LjM1NiwyOGgtMThjLTAuNTUyLDAtMS0wLjQ0Ny0xLTFzMC40NDgtMSwxLTFoMThjMC41NTIsMCwxLDAuNDQ3LDEsMVM0NC45MDgsMjgsNDQuMzU2LDI4eiIvPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDQuMzU2LDQyaC0xOGMtMC41NTIsMC0xLTAuNDQ3LTEtMXMwLjQ0OC0xLDEtMWgxOGMwLjU1MiwwLDEsMC40NDcsMSwxUzQ0LjkwOCw0Miw0NC4zNTYsNDJ6Ii8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0xMi40MjcsMTdjLTAuMjA5LDAtMC40Mi0wLjA2NS0wLjYtMC4ybC00LjU3MS0zLjQyOWMtMC40NDItMC4zMzEtMC41MzEtMC45NTgtMC4yLTEuMzk5ICAgIGMwLjMzMS0wLjQ0MSwwLjk1OC0wLjUzMSwxLjQtMC4ybDMuODIyLDIuODY2bDYuMjQ4LTcuMjg4YzAuMzU5LTAuNDIsMC45OTEtMC40NjgsMS40MS0wLjEwOGMwLjQxOSwwLjM1OSwwLjQ2OCwwLjk5LDAuMTA4LDEuNDA5ICAgIGwtNi44NTcsOEMxMi45ODksMTYuODgxLDEyLjcwOSwxNywxMi40MjcsMTd6Ii8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0xMi40MjcsMzFjLTAuMjA5LDAtMC40Mi0wLjA2NS0wLjYtMC4ybC00LjU3MS0zLjQyOWMtMC40NDItMC4zMzEtMC41MzEtMC45NTgtMC4yLTEuMzk5ICAgIGMwLjMzMS0wLjQ0MSwwLjk1OC0wLjUzMSwxLjQtMC4ybDMuODIyLDIuODY2bDYuMjQ4LTcuMjg4YzAuMzU5LTAuNDIsMC45OTEtMC40NjgsMS40MS0wLjEwOGMwLjQxOSwwLjM1OSwwLjQ2OCwwLjk5LDAuMTA4LDEuNDA5ICAgIGwtNi44NTcsOEMxMi45ODksMzAuODgxLDEyLjcwOSwzMSwxMi40MjcsMzF6Ii8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0xMi40MjcsNDUuOTk5Yy0wLjIwOSwwLTAuNDItMC4wNjUtMC42LTAuMkw3LjI1Niw0Mi4zN2MtMC40NDItMC4zMzEtMC41MzEtMC45NTgtMC4yLTEuMzk5ICAgIGMwLjMzMS0wLjQ0MSwwLjk1OC0wLjUzMSwxLjQtMC4ybDMuODIyLDIuODY2bDYuMjQ4LTcuMjg3YzAuMzU5LTAuNDIxLDAuOTkxLTAuNDY5LDEuNDEtMC4xMDggICAgYzAuNDE5LDAuMzU5LDAuNDY4LDAuOTksMC4xMDgsMS40MDlsLTYuODU3LDcuOTk5QzEyLjk4OSw0NS44OCwxMi43MDksNDUuOTk5LDEyLjQyNyw0NS45OTl6Ii8+Cgk8L2c+Cgk8Zz4KCQk8cG9seWdvbiBzdHlsZT0iZmlsbDojRUREQ0M3OyIgcG9pbnRzPSIzMy4xOTIsNDUuNDg5IDMzLjE4NCw0NS40OTYgMzEuMTk2LDUyLjc4NiAzNS44NDMsNDguMTM5ICAgIi8+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0Q3NUE0QTsiIGQ9Ik01Mi40NDIsMzEuNTRsLTEuMjQ3LTEuMjQ3Yy0wLjc3NS0wLjc3NS0yLjAzMi0wLjc3NS0yLjgwNywwbC0zLjU4MiwzLjU4MmwyLjY1MSwyLjY1MSAgICBMNTIuNDQyLDMxLjU0eiIvPgoJCQoJCQk8cmVjdCB4PSIzOC40NSIgeT0iMzIuNzk1IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEgMC43MDcxIC0wLjcwNzEgMC43MDcxIDQwLjgwNzEgLTE2LjUwMjgpIiBzdHlsZT0iZmlsbDojRjI5QzIxOyIgd2lkdGg9IjMuNzQ5IiBoZWlnaHQ9IjE2LjQyNCIvPgoJCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNENkM0QjE7IiBwb2ludHM9IjM4Ljg0MSw1MS4xNTMgMzguODQ5LDUxLjE0NSAzNS44NDMsNDguMTM5IDMxLjE5Niw1Mi43ODYgMzEuMDYzLDUzLjI3NCAgICIvPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNBMzQ3NDA7IiBkPSJNNTAuNDYyLDM5LjUzMmwzLjU4Mi0zLjU4MmMwLjc3NS0wLjc3NSwwLjc3NS0yLjAzMiwwLTIuODA3bC0xLjYwMi0xLjYwMmwtNC45ODUsNC45ODUgICAgTDUwLjQ2MiwzOS41MzJ6Ii8+CgkJCgkJCTxyZWN0IHg9IjQxLjAyNyIgeT0iMzUuNjIzIiB0cmFuc2Zvcm09Im1hdHJpeCgtMC43MDcxIC0wLjcwNzEgMC43MDcxIC0wLjcwNzEgNDIuNjY5MSAxMDUuMzQ1MykiIHN0eWxlPSJmaWxsOiNFMThDMjU7IiB3aWR0aD0iNC4yNTEiIGhlaWdodD0iMTYuNDI0Ii8+CgkJPHBhdGggc3R5bGU9ImZpbGw6IzVFNUU1RTsiIGQ9Ik0zMC4zNTYsNTQuOTgxYy0wLjI1NiwwLTAuNTEyLTAuMDk4LTAuNzA3LTAuMjkzYy0wLjM5MS0wLjM5MS0wLjM5MS0xLjAyMywwLTEuNDE0bDIuMjA3LTIuMjA3ICAgIGMwLjM5MS0wLjM5MSwxLjAyMy0wLjM5MSwxLjQxNCwwczAuMzkxLDEuMDIzLDAsMS40MTRsLTIuMjA3LDIuMjA3QzMwLjg2OCw1NC44ODQsMzAuNjEyLDU0Ljk4MSwzMC4zNTYsNTQuOTgxeiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
            <h2>Post Types</h2>
            <span>chiche which post type to support the map options</span>
        </div>
        <div class="cptmm_box_content_section">
            <?php 
            $cptmm_post_types_arr =  explode(',', esc_html(get_option('cptmm_post_types_support')));
            $cptmm_post_types = get_post_types( array( 'public' => true ), 'names' );
                foreach($cptmm_post_types as $key => $post_type) {
                    if($post_type == 'attachment'){
                        continue;
                    }
                    ?>

                <label class='switch'>
                    <input type='checkbox' class='cptmm_post_types_checkbox'<?=in_array($post_type, $cptmm_post_types_arr)?'checked':''?> value='<?=$post_type?>'>
                    <span class='slider round'></span><br>
                </label>
                <span class='cptmm_post_types_title'><?=$post_type?></span><br>
                <?php 
                }
            ?>
            <input type="hidden" name='cptmm_post_types_support' value='<?=esc_html(get_option('cptmm_post_types_support'))?>'>
        </div>
    </div>


</div>
</form>

<div>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
<?php
}
