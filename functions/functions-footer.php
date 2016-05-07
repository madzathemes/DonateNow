<?php

/* --------------------------------------------------------------------------------------- Footer Widget Colummn Function */

function function_footer_widget_areas(){ 
 ?> <div class="container">
 	<div class="row"><?php
				if (ot_get_option('footer_column') == '1_1') {  ?>
                    
						<div class="span12">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                        
                        </div>
                    
                <?php 
                
                } 
                
                elseif (ot_get_option('footer_column') == "1_2") { ?>
                
                        <div class="span6">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                        
                        </div>
                        
                        <div class="span6">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                    
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '1_3') { ?>
                    
                        <div class="span4">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                        
                        </div>
                        
                        <div class="span4">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                        
                        <div class="span4">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                    
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '1_4') { ?>
                    
                        <div class="span3">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                            
                        </div>
                        
                        <div class="span3">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                        
                        <div class="span3">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                        
                        <div class="span3">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-4' ); ?>
                            
                        </div>
                        
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '1_5') { ?>
                    
                        <div class="one_fifth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                            
                        </div>
                        
                        <div class="one_fifth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                        
                        <div class="one_fifth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                        
                        <div class="one_fifth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-4' ); ?>
                            
                        </div>
                        
                        <div class="one_fifth last">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-5' ); ?>
                            
                        </div>
                        
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '1_6') { ?>
                
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-4' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-5' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-6' ); ?>
                            
                        </div>
                        
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '4_2') { ?>
                    
                        <div class="one_fourth">
                            
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                    
                        </div>
                        
                        <div class="one_fourth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                                  
                        </div>
                        
                        <div class="one_half last">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                    
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column_layout_midle') == '2_6_6_6') { ?>
                    
                        <div class="one_half">
                        
                             <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>    
                        
                        </div>
                        
                        <div class="one_sixth">
                
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                    
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth last">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-4' ); ?>
                            
                        </div>
                   
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '2_4') { ?>
                    
                        <div class="one_half">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                        
                        </div>
                        
                        <div class="one_fourth">
                    
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                    
                        </div>
                        
                        <div class="one_fourth last">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>
                       
                <?php 
                
                }
                
                elseif (ot_get_option('footer_column') == '6_6_6_2') { ?>
                    
                        <div class="one_sixth">
                
                            <?php dynamic_sidebar( 'footer-midle-column-1' ); ?>
                    
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-2' ); ?>
                            
                        </div>
                        
                        <div class="one_sixth">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-3' ); ?>
                            
                        </div>        
                         
                        <div class="one_half last">
                        
                            <?php dynamic_sidebar( 'footer-midle-column-4' ); ?>    
                            
                        </div>
                    
                <?php 
                
                }
                
                ?></div></div><?php

}

add_action('function_footer_widget_areas', 'function_footer_widget_areas'); 

?>