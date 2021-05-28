<?php

if (!$this->session->userdata('login')) {
	redirect(site_url());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dashboard - SB Admin</title>
	<link href="<?= base_url() ?>/public/css/styles.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/public/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url() ?>/public/assets/bootstrap-icon/bootstrap-icons.css">
	<script src="<?= base_url() ?>/public/js/sweetalert.js"></script>
</head>

<body>