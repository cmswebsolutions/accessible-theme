(function() {

    tinymce.create('tinymce.plugins.Details', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */


/*
        setup : function(ed) {
            ed.onKeyPress.add(function(ed, e) {
                var enter = 1;
                $('.details-content').keypress(function(e){
                    var key = (window.event) ? e.keyCode : e.which;
                    if ( key == 13 ) {
                        enter++;
                        //tinymce.execCommand('mceFocus',false,'id_of_textarea');
                        if( enter = 2 ){
                            enter = 1;
                        }
                    }
                })
            });
        }
*/

        init : function(ed, url) {

            ed.addButton('details', {
                title : 'Create Accordion',
                cmd : 'details',
                image : url + '/details.jpg'
            });

            ed.addButton('summary', {
                title : 'Accordion Heading',
                cmd : 'summary',
                image : url + '/summary.jpg'
            });

            ed.addButton('content', {
                title : 'Accordion Content',
                cmd : 'content',
                image : url + '/content.jpg'
            });

            ed.addCommand('details', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<details class="editor" open><summary>My Heading</summary><div class="details-content">' + selected_text + '</div></details>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('summary', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<summary>' + selected_text + '</summary>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addCommand('content', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<div class="details-content">Insert content here</div>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Details Button',
                author : 'Mark',
                version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'details', tinymce.plugins.Details );
})();