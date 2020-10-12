<?php $theme_option = flagship_sub_get_global_options();
      $analytics_id = $theme_option['flagship_sub_google_analytics']; ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-40512757-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-40512757-1');
	gtag('config', '<?php echo $analytics_id; ?>');
</script>
<!-- End Google Analytics -->