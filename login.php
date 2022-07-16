<?php
require 'koneksi.php';
if(isset($_SESSION['login'])){
	header("Location: index.php");
}

if(isset($_POST['login'])) {
    $username = $koneksi->escape_string($_POST['username']);
    $password = $koneksi->escape_string($_POST['password']);

    if(empty($username)) {
        echo '<script>';
        echo 'alert("Username harus diisi")';
        echo '</script>';
    } else if(empty($password)) {
        echo '<script>';
        echo 'alert("Password harus diisi")';
        echo '</script>';
    } else {
        $cari = $koneksi->query("SELECT * FROM login WHERE username = '$username'");
        $data = $cari->fetch_assoc();

        if($cari->num_rows == false) {
            echo '<script>';
            echo 'alert("username tidak ditemukan")';
            echo '</script>';
        } else {

			if(password_verify($password, $data['password']) == true){
				$_SESSION['login'] = $data;
				header("Location: index.php");
			} else {
				echo '<script>';
				echo 'alert("password anda salah")';
				echo '</script>';
			}
		}

    }
}
?>
<form method="post">
    <table border="1">
	<tr>
		<th colspan="2">Login</th>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" maxlength="16" size="9" value="<?= $_SERVER['REMOTE_ADDR'] == '5.189.147.47' ? 'fadlan' : '' ?>"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" maxlength="16" size="9" value="<?= $_SERVER['REMOTE_ADDR'] == '5.189.147.47' ? 'fadlan123' : '' ?>"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="login" value="Login"><a href=""></a></td>
	</tr>
</table>
</form>