<?php

// After all requests have reached index, start the corresponding server through psf

$dsf = SWOOLEBASEPATH . "/../dsf/dsf.php"; //加载psf的内容

// TestAutoLoad::addRoot(PSFBASEPATH);
// Load user's config Some non-standardized configuration files need to be loaded here. Actually, you don't need to just substitute the path
// Business config
$config=dirname(__FILE__).'/config/UserConfig.php';


// Load environment variables Load different configuration files via $_SERVER['NEWAPI_ENV'] require_once dirname(__FILE__).'/Config/envcnf/'. $_SERVER['SERV_ENV'] .'/ENVConst.php';
require_once dirname(__FILE__) . '/config/envcnf/ol/ENVConst.php';

require_once($dsf);

// Execute the xxx method ---- prerequest

// Go to run afterwards (run for route analysis)

return Tii::createHttpApplication($config);
