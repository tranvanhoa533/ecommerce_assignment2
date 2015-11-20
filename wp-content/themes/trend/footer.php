<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Trend
 */
?>
<?php

global $trend_redux;

?>

    <footer>
        <?php if ( $trend_redux['trend-enable-footer-widgets'] ) { ?>

        <div class="vc_container footer-top">
            <div class="vc_row <?php echo esc_attr($trend_redux['trend_number_of_footer_columns']); ?>">

                <?php
                $columns    = 12/intval($trend_redux['trend_number_of_footer_columns']);
                $nr         = array("1", "2", "3", "4", "6");

                if (in_array($trend_redux['trend_number_of_footer_columns'], $nr)) {
                    $class = 'vc_col-md-'.$columns;
                    for ( $i=1; $i <= intval( $trend_redux['trend_number_of_footer_columns'] ) ; $i++ ) { 

                        echo '<div class="'.$class.' widget widget_text">';
                            dynamic_sidebar( 'footer_column_'.$i );
                        echo '</div>';

                    }
                }elseif($trend_redux['trend_number_of_footer_columns'] == 5){
                    #First
                    if ( is_active_sidebar( 'footer_column_1' ) ) {
                        echo '<div class="vc_col-md-3 widget widget_text">';
                            dynamic_sidebar( 'footer_column_1' );
                        echo '</div>';
                    }
                    #Second
                    if ( is_active_sidebar( 'footer_column_2' ) ) {
                        echo '<div class="vc_col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_2' );
                        echo '</div>';
                    }
                    #Third
                    if ( is_active_sidebar( 'footer_column_3' ) ) {
                        echo '<div class="vc_col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_3' );
                        echo '</div>';
                    }
                    #Fourth
                    if ( is_active_sidebar( 'footer_column_4' ) ) {
                        echo '<div class="vc_col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_4' );
                        echo '</div>';
                    }
                    #Fifth
                    if ( is_active_sidebar( 'footer_column_5' ) ) {
                        echo '<div class="vc_col-md-3 widget widget_text">';
                            dynamic_sidebar( 'footer_column_5' );
                        echo '</div>';
                    }
                }
                ?>

            </div>
        </div>

        <?php } ?>
        <div class="footer">
            <div class="vc_container">
                <div class="vc_row">
                    <div class="vc_col-md-6">
                        <p class="copyright"><?php echo  $trend_redux['trend_footer_text']; ?></p>
                    </div>
                    <div class="vc_col-md-6 payment-methods">
                        <img src="<?php echo esc_attr($trend_redux['trend_card_icons']['url']); ?>" alt="" class="pull-right" />              
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php $trend_seo_analytics = $trend_redux['trend_seo_analytics']; ?>
<!-- Begin: Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo esc_attr($trend_seo_analytics); ?>', 'auto');
    ga('send', 'pageview');
</script>
<!-- End: Google Analytics -->


<!-- Begin: Custom Javascript Code - From Theme Options -->
<script type="text/javascript">
<?php echo esc_attr( $trend_redux['php-code'] ); ?>
</script>
<!-- End: Custom Javascript Code - From Theme Options -->

<?php wp_footer(); ?>
</body>
</html>
