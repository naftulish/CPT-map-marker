var mymap;


jQuery(document).ready(function() {

var $ = jQuery;
if ($('.cptmm_icon_btn').length > 0) {
    if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
        $('.cptmm_icon_btn').on('click', function(e) {
            e.preventDefault();
            var button = $(this);
            var img = button.prev();
            var input_hidden = $('input[name=cptmm_icon_url]');
            wp.media.editor.send.attachment = function(props, attachment) {
                input_hidden.val(attachment.url);
                document.querySelector('#ctpmm_remove_image').style.display = 'block';
                document.querySelector('#cptmm_icon_img_prv').src = attachment.url;

            };
            wp.media.editor.open(button);
            return false;
        });
    }
}

//get the checkbox element
var cptmm_show_on_map = document.querySelector('[name=cptmm_show_on_map]');

//check if exsist
if(cptmm_show_on_map){
    
    //checked and unchecked the checkbox and toggle the inner box
    toggle_cptmm_inner_meta_box(cptmm_show_on_map);

    //add Listener for change
    cptmm_show_on_map.addEventListener('change', (e)=>{
        toggle_cptmm_inner_meta_box(e.target);
    })
}
    
    
function toggle_cptmm_inner_meta_box(elem){  
      
    if (elem.checked == true){
        document.querySelector('.cpt_meta_box_inner').style.display = "block";
        generate_map();
    } else {        
        document.querySelector('.cpt_meta_box_inner').style.display = "none";
    }
}


function generate_map(){

    //addEventListener for link to post checkbox
    document.querySelector('[name=cptmm_link_to_post]').addEventListener('change', (e)=>{        
        document.querySelector('[name=cptmm_text_link_to_post]').disabled = !e.target.checked;
    })

    //addEventListener for click to remove icon
    document.querySelector('#ctpmm_remove_image').addEventListener('click', (e)=>{ 
        e.target.style.display = 'none';      
        document.querySelector('[name=cptmm_icon_url]').value = '';
        document.querySelector('#cptmm_icon_img_prv').src = '';
    })

    var map = document.getElementById('cptmm_map').innerHTML;
    

    //generate map only if not generate yet 
    if(!map){
        mymap = L.map('cptmm_map', {
            center: [51.505, -0.09],
            zoom: 13
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>'
        }).addTo(mymap);

        mymap.on('click' , set_coordinate);

        // create pop up object
        var popup = L.popup();

        //if is edit, get the value from the input
        var cor = document.getElementById('cptmm_coordinate').value;

        //listener for changes if write direct corrdintes in input
        document.getElementById('cptmm_coordinate').addEventListener('input' , ()=>{ 
            var cor = document.getElementById('cptmm_coordinate').value;
            splitValue(cor);
        })

        //if is value, split 2 arr and run function
        if(cor){
            splitValue(cor);

        }

        function splitValue(cor){
            var arr = cor.split(',');
            var e = {latlng: {lat: arr[0], lng: arr[1]}}

            //center the map to popup position
            mymap.panTo(new L.LatLng(e.latlng.lat, e.latlng.lng));

            set_coordinate(e);
        }


        //function to set the input and open pop up
        function set_coordinate(e){        
            popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.lat + ',' + e.latlng.lng)
            .openOn(mymap);

            document.getElementById('cptmm_coordinate').value = e.latlng.lat + ',' + e.latlng.lng;
        }
    }
}

//hendle the post types list
var post_types_list = document.querySelectorAll('.cptmm_post_types_checkbox');

var post_types_list_arr = [];

if(post_types_list){
    post_types_list.forEach(element => {
        element.addEventListener('change', (e)=>{        
            post_types_list.forEach((j=>{
                if(j.checked){
                    post_types_list_arr.push(j.value);  
                }
            }));
            document.querySelector('[name=cptmm_post_types_support]').value = post_types_list_arr.join(',');
            post_types_list_arr = [];
        })
    });
    
}


//hendle the default icon
var cptmm_default_icon = document.querySelectorAll('.cptmm_default_icon');

if(cptmm_default_icon){

    cptmm_default_icon.forEach(element => {
        if(document.querySelector('[name=cptmm_default_icon_url]').value == element.src){
            element.classList.add('cptmm_default_icon_select');
        }
    })

    cptmm_default_icon.forEach(element => {
        element.addEventListener('click', (e)=>{        
            cptmm_default_icon.forEach((j=>{
                j.classList.remove('cptmm_default_icon_select');
            }));
            e.target.classList.add('cptmm_default_icon_select');
            document.querySelector('[name=cptmm_default_icon_url]').value = e.target.src;
        })
    });
    
}

//end jQuery
});


//GeoCodeing search
function cptmm_search_place(){
    
    var input = document.querySelector('#cptmm_search_address');
    var errMsg = document.querySelector('#cptmm_search_address_err_msg');
    var btn = document.querySelector('#cptmm_search_address_btn');
  
    errMsg.innerHTML = "";
    btn.innerHTML = ". . .";
  
    fetch('https://nominatim.openstreetmap.org/search?q='+ input.value +'&format=json')
      .then(response=> response.json())
      .then(json=> responseFromServerGeoCodeing(json, errMsg));
  }
  
  function responseFromServerGeoCodeing(json, elem){

    if(json.length > 0){
          
          //set the coordinates to map
          mymap.setView([json[0].lat, json[0].lon],13);
          //add marker for user position
          var marker = L.marker([json[0].lat, json[0].lon]).addTo(mymap);
          //open popUp for users position
          marker.bindPopup(json[0].display_name).openPopup();
          
          elem.innerHTML = '';
          document.querySelector('#cptmm_search_address_btn').innerHTML = "search";
          
      }else{
        elem.innerHTML = "Sorry, we couldn't find the address, try typing a more accurate address";
        document.querySelector('#cptmm_search_address_btn').innerHTML = "search";
      }
  }

  

