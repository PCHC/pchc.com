<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">

  <!-- Google Chrome Frame for IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="refresh" content="10;URL=http://www.mainehealthequity.org">

  <!-- W3TC-include-css -->

  <title>Eastern Maine AIDS Network</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <!-- wordpress head functions -->
  <?php wp_head(); ?>
  <!-- end of wordpress head -->

</head>

<body <?php body_class(); ?>>

  <div class="wrap"><div class="container">
    <header>
      <a href="http://www.mainehealthequity.org">
        <img src="<?php echo get_template_directory_uri(); ?>/img/eman-logo.png" alt="Eastern Maine AIDS Network">
        <h1><strong>EMAN</strong> is now part of <strong>Down&nbsp;East AIDS&nbsp;Network.</strong></h1>
        <h2>Click here to be redirected to <strong>mainehealthequity.org</strong>.</h2>
      </a>
    </header>
    <footer>
      <a href="http://pchc.com">
        <img src="<?php echo get_template_directory_uri(); ?>/img/pchc-logo.png" alt="Penobscot Community Health Care">
      </a>
    </footer>
  </div></div>

  <?php wp_footer(); ?>
</body>

</html>