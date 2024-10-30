// When Image is Edited
wp.media.events.on('editor:image-edit', function(data) {
    data.metadata.data_pin_description = data.editor.dom.getAttrib( data.image, 'data-pin-description' );
    data.metadata.data_pin_url = data.editor.dom.getAttrib( data.image, 'data-pin-url' );
    data.metadata.data_pin_media = data.editor.dom.getAttrib( data.image, 'data-pin-media' );
    data.metadata.data_pin_id = data.editor.dom.getAttrib( data.image, 'data-pin-id' );
    data.metadata.data_pin_nopin = data.editor.dom.getAttrib( data.image, 'data-pin-nopin' );
});

// When Image is Updated
wp.media.events.on('editor:image-update', function(data) {
    data.editor.dom.setAttrib( data.image, 'data-pin-description', data.metadata.data_pin_description );
    data.editor.dom.setAttrib( data.image, 'data-pin-url', data.metadata.data_pin_url );
    data.editor.dom.setAttrib( data.image, 'data-pin-media', data.metadata.data_pin_media );
    data.editor.dom.setAttrib( data.image, 'data-pin-id', data.metadata.data_pin_id );
    data.editor.dom.setAttrib( data.image, 'data-pin-nopin', (data.metadata.data_pin_nopin ? 'true' : null) );
});

function metaforpinterest_update_preview_image() {
    img = document.getElementById("m4pin_media_preview");
    src = document.getElementById("m4pin_media_preview_input");
    if (img && src) {
        img.src = src.value
    }
}
