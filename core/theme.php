<?php
    require(ROOT . "/core/templates.php");
	/* Get the theme set through the config */
    $project_theme = $fileBack . "themes/" . $theme;
    Class initVisual
    {
          function loadTheme($themeDir, $projRoot)
          {

                require($themeDir . "/css/style.css.php");
          }
          
          function loadTemplate($templateName) {
		        require(ROOT . "/templates/" . $templateName . ".tpl.php");
	      }
    }
    $init = new initVisual;
?>