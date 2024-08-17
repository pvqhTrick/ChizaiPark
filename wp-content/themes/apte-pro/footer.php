<p id="copyright">© 2024 Phan Van Quoc Hung.</p>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {  
        $('#loading-screen').fadeOut(2000);
    });
    
    $(document).ready(function() {
        $('.listVoice a.active').on('click', function(e) {
            e.preventDefault();
            const audioUrl = $(this).data('audio-url');
            if (audioUrl) {
                window.open(audioUrl, 'Audio Player', 'width=300,height=200');
            }
        });
    });
</script>
</body>
</html>
<?php wp_footer(); ?>
