whoami -> <?php echo shell_exec('whoami'); ?>
<br>
./test.sh --> <?php echo shell_exec('./test.sh'); ?> 
<?php 
$stream=popen('/usr/bin/nmap -sn -r -v 128.200.166.0/24 -oX result.xml', 'w');
pclose($stream);
?>
<br>
