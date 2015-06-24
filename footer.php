        <footer>
            <div id="meter-select">
                <form action="" title="Checking the meter" name="meterform" id="meterform">
                    <label for="foot-select">Please identify the meter of the line</label><br/>
                    <select id="foot-select" name="foot" title="Name of foot">
                        <option value="--+">anapestic</option>
                                    <option value="+--">dactylic</option>
                                    <option value="-+">iambic</option>
                                    <option value="--">pyrrhic</option>
                                    <option value="++">spondaic</option>
                      <option value="+-">trochaic</option>
                    </select><br/><br/>
                    <label for="number-select">Please describe the number of feet</label><br/>
                    <select id="number-select" name="number" title="Number of feet">
                        <option value="1">monometer</option>
                        <option value="2">dimeter</option>
                        <option value="3">trimeter</option>
                        <option value="4">tetrameter</option>
                        <option value="5">pentameter</option>
                        <option value="6">hexameter</option>
                    </select><br/><br/>
                    <input type="hidden" name="answer" id="answer" title="The answer"/>
                </form>
                <button id="check-answer" title="Check answer" />
                <label for="check-answer">Submit</label>
            </div>
        <div class="container">
        <div class="row">
            <div id="author_container" class="col-lg-6 col-md-6 col-sm-4">
                <p><em>For Better For Verse</em> is authored by <a href="http://www.engl.virginia.edu/people/ht2t">Herbert Tucker</a>, John C. Coleman Professor of English at the <a href="http://virginia.edu">University of Virginia</a>.</p>
            </div>
            <div id="dept_container" class="col-lg-4 col-md-4 col-sm-4">
                <div class="addr">University of Virginia Department of English</div>
                <div class="addr">219 Bryan Hall, PO Box 400121</div>
                <div class="addr">Charlottesville, VA 22904-4121</div>
                <div class="addr">Fax: 434.924.1478 | TDD: 434.982.HEAR</div>
            </div>
            <div class="scholars_lab_logo" class="col-lg-2 col-md-2 col-sm-4">
                <a href="http://scholarslab.org/"><img alt="Scholars' Lab" src="<? echo get_template_directory_uri(); ?>/images/slab.png"/></a>
            </div>
            </div><!-- ends .row -->
            </div><!-- ends container -->
            <!-- wp_footer is required for WP to queue scripts in the footer -->
            <?php wp_footer(); ?>
        </footer>

    <!-- Scripts for accordion and tabs submenu-->
    <script>
        $( '#accordion' ).accordion({
            icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus"}
        });

        $( '#tabs' ).tabs();

        $('#meter-select').dialog({ autoOpen: false });

    </script>

    <!-- Script to highlight 'poem' in the nav menu when on single poem page -->

    <?php if ( is_single() ) : ?>

        <script>
            $('.menu li').first().addClass( 'current-menu-item');
        </script>

    <?php endif; ?>


    <!-- Google analytics - Need to check if this is still a valid account or if it needs updating -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-19425148-1']);
      _gaq.push(['_setDomainName', '.lib.virginia.edu']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</body>
</html>
