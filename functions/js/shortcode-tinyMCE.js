

// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.quote', {
    
    createControl: function(n, cm) {
                switch (n) {
                        case 'quote':
                                var c = cm.createMenuButton('quote', {
                                        title : 'Shortcodes',
                                        image : 'http://cdn2.iconfinder.com/data/icons/fugue/icon/plus_circle.png',
                                        icons : false
                                });

                                c.onRenderMenu.add(function(c, m) {
                                        var sub;
                                        
                                        
                                        
                                        
                                        
                                        sub = m.addMenu({title : 'Alert Boxes'});

                                        sub.add({title : 'Framed Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[frame_box] Content [/frame_box] ');
                                        }});
                                        
                                        sub.add({title : 'Succes Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[succes] Content [/succes] ');
                                        }});
                                        
                                        sub.add({title : 'Info Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[info] Content [/info] ');
                                        }});
                                        
                                        sub.add({title : 'Error Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[error] Content [/error] ');
                                        }});
                                        
                                        sub.add({title : 'Notice Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[notice] Content [/notice] ');
                                        }});
                                        
                                        sub.add({title : 'Note Box', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[note_box] Content [/note_box] ');
                                        }});
                                        
                                        
                                        
                                        
                                        
                                        
                                        sub = m.addMenu({title : 'HTML'});

                                        sub.add({title : 'Button Big', onclick : function() {
                                            
                                            tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[bigbutton  url=http:// ] Button Text [/bigbutton] ');
                                            
                                        }});
                                        
                                        sub.add({title : 'Button Small', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[smallbutton  url=http:// ] Button Text [/smallbutton] ');
                                        }});
                                        
                                        sub.add({title : 'Line', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[line] ');
                                        }});
                                        
                                        sub.add({title : 'Line Padding', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[line_padding padding=15] ');
                                        }});
                                        
                                        sub.add({title : 'Line Top', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[top] ');
                                        }});
                                        
                                        sub.add({title : 'Dropcaps', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[dropcaps] Content [/dropcaps] ');
                                        }});
                                        
                                        sub.add({title : 'Icon', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[icon url="http://" ]');
                                        }});
                                        
                                        sub.add({title : 'Icon Link', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[icon_link url=http:// color=black type=icon_ticked] Link Text [/icon_link] ');
                                        }});
                                        
                                        sub.add({title : 'Icon Text', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[icon_text color=black type=icon_ticked] Icon Text [/icon_text] ');
                                        }});
                                        
                                        sub.add({title : 'Icon List', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[list_icon color=black type=icon_ticked] <ul> <li>Your Text 1</li> <li>Your Text 2</li> <li>Your Text 3</li> </ul> [/list_icon] ');
                                        }});
                                        
                                        sub.add({title : 'Blockquote', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[blockquote] Content [/blockquote] ');
                                        }});
                                        
                                        sub.add({title : 'Blockquote Left', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[blockquote align="left"] Content [/blockquote] ');
                                        }});
                                        
                                        sub.add({title : 'Blockquote Right', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[blockquote align="right"] Content [/blockquote] ');
                                        }});

    





                                        sub = m.addMenu({title : 'Layout Columns'});

                                        sub.add({title : 'One Half', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_half] Content [/one_half] [one_half_last] Content [/one_half_last] ');
                                        }});

                                        sub.add({title : 'One Third', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_third] Content [/one_third] [one_third] Content [/one_third] [one_third_last] Content [/one_third_last] ');
                                        }});
                                        
                                        sub.add({title : 'One Fourth', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_fourth] Content [/one_fourth] [one_fourth] Content [/one_fourth] [one_fourth] Content [/one_fourth] [one_fourth_last] Content [/one_fourth_last] ' );
                                        }});
                                        
                                        sub.add({title : 'One Fifth', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_fifth] Content [/one_fifth] [one_fifth] Content [/one_fifth] [one_fifth] Content [/one_fifth] [one_fifth] Content [/one_fifth] [one_fifth_last] Content [/one_fifth_last] ');
                                        }});
                                        
                                        sub.add({title : 'Two Third & One Third', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[two_third] Content [/two_third] [one_third_last] Content [/one_third_last] ');
                                        }});
                                        
                                        sub.add({title : 'One Third & Two Third', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_third] Content [/one_third] [two_third_last] Content [/two_third_last] ');
                                        }});
                                        
                                        sub.add({title : 'Three Fourth & One Fourth', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[three_fourth] Content [/three_fourth] [one_fourth_last] Content [/one_fourth_last] ');
                                        }});
                                        
                                        sub.add({title : 'One Fourth & Three Fourth', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[one_fourth] Content [/one_fourth] [three_fourth_last] Content [/three_fourth_last] ');
                                        }});
                                        
                                         sub.add({title : 'Clear Row', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[clear] ');
                                        }});
                                        
                                        sub = m.addMenu({title : 'Plugins'});

                                        sub.add({title : 'Twitter', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[twitter user="envato" rows="5" title="Twitter"] ');
                                        }});
                                        
                                        sub.add({title : 'Flickr', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 
                                                '[flickr id="Your Flickr user ID" images="5" title="Flickr Widget Shortcode"] ');
                                        }});
                                });
                                
                                c.onRenderMenu.add(function(c, m) {
                                    
                                    m.add({title : 'Price Table', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[pricetable] ');
                                        }});
                                    
                                });    
                                    
                                // Return the new menu button instance
                                return c;
                }

                return null;
        }
});
    
    
// Register plugin with a short name
tinymce.PluginManager.add('quote', tinymce.plugins.quote);