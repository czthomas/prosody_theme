        <footer>
            <div class="scholars_lab_logo">
                <a href="http://scholarslab.org/"><img alt="Scholars' Lab" src="<? echo get_template_directory_uri(); ?>/images/slab.png"/></a>
            </div>
            <div id="dept_container">
                <div class="addr">University of Virginia Department of English</div>
                <div class="addr">219 Bryan Hall, PO Box 400121</div>
                <div class="addr">Charlottesville, VA 22904-4121</div>
                <div class="addr">Fax: 434.924.1478 | TDD: 434.982.HEAR</div>
            </div>
            <div id="author_container">
                <p><em>For Better For Verse</em> is authored by <a href="http://www.engl.virginia.edu/people/ht2t">Herbert Tucker</a>, John C. Coleman Professor of English at the <a href="http://virginia.edu">University of Virginia</a>.</p>
            </div>

            <!-- wp_footer is required for WP to queue scripts in the footer -->
            <?php wp_footer(); ?>
        </footer>
    </div><!-- closes wrapper -->
    </div><!-- closes container-fluid -->

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
