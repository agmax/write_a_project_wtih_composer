<?php
require "../vendor/autoload.php";

use Recca0120\LaravelTracy\Tracy;
use Faker\Factory as Faker;
use Carbon\Carbon;

$faker = Faker::create("zh_TW");

// before outout
$tracy = Tracy::instance();

function sql($sql)
{
	$tracy = Tracy::instance();
	$databasePanel = $tracy->getPanel('database');
	$databasePanel->logQuery($sql);
}

$dotenv = new Dotenv\Dotenv(__DIR__."/../");
$dotenv->load();

$db_host = getenv('DB_HOST','none');
$db_post = getenv('DB_POST','none');
$db_user = getenv('DB_USER','none');
$db_pass = getenv('DB_PASS','none');

$sql = "SELECT * FROM dual;";
sql($sql);

$data[] = [
	'title'   => $faker->realText(10),
	'content' => $faker->realText(30),
	'created_at' => Carbon::now()
	              ->subDays(-1),
	'udpated_at' => Carbon::now()
	              ->addHours(rand(1,24))
 ];
?>

<html>
  <head>
  	<title>Composer Test</title>
  	</head>
  <body>
  	<h1>Hello World!</h1>
  	<p>This is Composer Test Project</p>
  	<p><?="$db_host:$db_post"?></p>
  	<pre>
  		<?php print_r($data) ?>
  	</pre>
  </body>
</html>