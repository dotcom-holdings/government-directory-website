<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
class Backup extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }
 
	function index()  
	{
		set_time_limit(0);
		//backup local database and compress
		//system("mysqldump -u root -psqladmin deptcapture | gzip > /var/www/html/deptcapture.sql.gz");
		 
		//make connection with remote server using ssh 
		$connection = ssh2_connect('yellow.adslive.com', 22);

		ssh2_auth_password($connection, "yellofvfmh", "JXVUkLOs2FO1s1GB");
		
		//send backup database to remote server
		//ssh2_scp_send($connection, '/var/www/html/deptcapture.sql.gz', '/usr/www/users/yellofvfmh/yellow.sql.gz', 0644);
		
		//delete local db dump gz file
		//system("rm -f /var/www/html/deptcapture.sql.gz");
		
		//uncompress and restore backup on remote server
		//ssh2_exec($connection, 'gunzip /usr/www/users/yellofvfmh/yellow.sql.gz');
		ssh2_exec($connection, 'mysql -uyellofvfmh_1 -pP6TsTYyCch8 -hdedi11.cpt2.host-h.net yellofvfmh_db1 < /usr/www/users/yellofvfmh/old.sql');
		//ssh2_exec($connection, "rm -f /usr/www/users/yellofvfmh/yellow.sql");
		//ssh2_exec($connection, 'exit'); 
		
		/*$stdout_stream = ssh2_exec($connection, "/bin/ls -l");
		sleep(1);
		$stderr_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
		
		echo "Erros encontrados!\n------------\n";
		while($line = fgets($stderr_stream)) { flush(); echo $line."\n"; }
		echo "------------\n";
		
		while($line = fgets($stdout_stream)) { flush(); echo $line."\n";}
		
		fclose($stdout_stream);*/
		
		ssh2_exec($connection, 'exit');
 
		echo "<br>done!";exit;
	}
	
  
}
?>