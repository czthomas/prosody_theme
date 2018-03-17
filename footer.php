        <footer>
            <div id="meter-select">
                <form action="" title="Checking the meter" name="meterform" id="meterform">
                    <label for="foot-select">Please identify the meter of the line</label><br/>
                    <select id="foot-select" name="foot" title="Name of foot">
                        <option value="--+">anapestic</option>
                        <option value="+--">dactylic</option>
                        <option value="-+">iambic</option>
                        <option value="+-">trochaic</option>
                        <option value="-+-">amphebraic</option>
                        <option value="+++">three-foot dolnik</option>
                        <option value="++++">four-foot dolnik</option>
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
                </div><!-- ends .row -->
            </div><!-- ends container -->
            <!-- wp_footer is required for WP to queue scripts in the footer -->
            <?php wp_footer(); ?>
        </footer>

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
