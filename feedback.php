<?PHP
	// This is just a *very* simple sample script that inserts user feedback
	// into a MySQL database.

	$db = mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('database_name', $db) or die(mysql_error());

	foreach($_POST as $key => $val)
		$_POST[$key] = mysql_real_escape_string($val, $db);

	$dt = date('Y-m-d H:i:s');

	$query = "INSERT INTO feedback (appname, appversion, systemversion, email, reply, `type`, message, importance, critical, dt, ip) VALUES
                  ('{$_POST['appname']}',
                   '{$_POST['appversion']}',
                   '{$_POST['systemversion']}',
                   '{$_POST['email']}',
                   '{$_POST['reply']}',
                   '{$_POST['type']}',
                   '{$_POST['message']}',
                   '{$_POST['importance']}',
                   '{$_POST['critical']}',
                   '$dt',
                   '{$_SERVER['REMOTE_ADDR']}')";
	mysql_query($query, $db) or die('error');

	echo "ok";
