


<?php
session_start();
 
//For testing the AD server is work or not
	$ldaphost="yourhost";
	$ldapconn=ldap_connect($ldaphost);
	if($ldapconn)
	echo "Connect success<br>";
	else
	echo "Connect Failure";
//For simplification,you can write $ldapconn = ldap_connect($ldaphost)or die("Could not connect to ".$ldaphost);
	
//rdn:relative distinguished name
	$User= $_POST["username"];
	//$ldaprdn=$User."@".$ldaphost;
	$ldaprdn=$User;
	$ldappass= $_POST["password"];

	//echo $ldaprdn."<br>";
	//echo $ldappass."<br>";
	
	//ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
	//ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
	
	if ($ldapconn) {
		// binding to ldap server
		//$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
		$ldapbind = ldap_bind(ldap_connect("yourhost"), "cn=".$_POST["username"].",dc=yourdc,dc=yourdc", $_POST["password"]);

		// verify binding
		if ($ldapbind)
			{echo "<br>LDAP bind successful..."."<br>";}
		else 
			{echo "<br>LDAP bind failed..."."<br>";}
	}
	
	ldap_close($ldapconn);

// using ldap bind
$ldaprdn  = "cn=".$_POST["username"].",dc=yourdc,dc=yourdc";     // ldap rdn or dn
$ldappass = $_POST["password"];  // associated password

// connect to ldap server
$ldapconn = ldap_connect("ldap://yourhost") or die("Could not connect to LDAP server.");

if ($ldapconn) {

	// binding to ldap server
	//$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
	$ldapbind = ldap_bind(ldap_connect("yourhost"), $ldaprdn, $ldappass);


	// verify binding and create SESSION
	if ($ldapbind)
		{
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['status'] = "login";
		header("location:home.php");
		}
	else
		{
			header("location:index.php?message=failed");
		}

}

	ldap_close($ldapconn);

?>



