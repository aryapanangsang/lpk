<?php
include('../../koneksi.php');
$data= mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_GET[id]'");
$ambil = mysqli_fetch_assoc($data);
?>
<html>
<head>
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		@media (max-width:720px) {
			.desktop_hide table.icons-inner {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.row-content {
				width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}

			.row-5 .column-1 .block-1.paragraph_block td.pad>div {
				text-align: center !important;
			}

			.row-2 .column-1 {
				padding: 5px 25px 20px !important;
			}

			.row-4 .column-1 {
				padding: 20px 10px !important;
			}

			.row-5 .column-1 {
				padding: 5px 30px 20px 25px !important;
			}
		}
	</style>
</head>

<body style='background-color: #f7f7f7; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
	<table class='nl-container' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f7f7f7;'>
		<tbody>
			<tr>
				<td>
					<table class='row row-1' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000000; width: 700px;' width='700'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<div class='spacer_block' style='height:15px;line-height:15px;font-size:1px;'>&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-2' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-size: auto;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-image: url(https://d1oco4z2z1fhwp.cloudfront.net/templates/default/7546/Header-bg.png); background-repeat: no-repeat; background-size: cover; border-radius: 0; color: #000000; background-color: #4f5aba; width: 700px;' width='700'>
										<tbody>
											<tr>
												<td class='column column-1' width='25%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; padding-right: 30px; vertical-align: middle; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='image_block block-2' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;'>
																<div class='alignment' align='center' style='line-height:10px'><img src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/889360_873587/Logi_PBI.png' style='display: block; height: auto; border: 0; width: 60px; max-width: 100%;' width='60'></div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column column-2' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: middle; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='heading_block block-2' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='text-align:center;width:100%;padding-top:5px;'>
																<h3 style='margin: 0; color: #ffffff; direction: ltr; font-family: Inter, sans-serif; font-size: 15px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>LEMBAGA PELATIHAN KERJA</span></h3>
															</td>
														</tr>
													</table>
													<table class='heading_block block-3' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='text-align:center;width:100%;padding-bottom:5px;'>
																<h3 style='margin: 0; color: #ffffff; direction: ltr; font-family: Inter, sans-serif; font-size: 15px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>PRIMA BUANA INDONESIA</span></h3>
															</td>
														</tr>
													</table>
												</td>												
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-3' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #efeef4; border-bottom: 0 solid #EFEEF4; border-left: 0 solid #EFEEF4; border-right: 0px solid #EFEEF4; border-top: 0 solid #EFEEF4; color: #000000; width: 700px;' width='700'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; padding-right: 25px; vertical-align: top; padding-top: 35px; padding-bottom: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='heading_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='padding-bottom:10px;padding-top:10px;text-align:center;width:100%;'>
																<h1 style='margin: 0; color: #4f5aba; direction: ltr; font-family: Noto Serif, Georgia, serif; font-size: 12px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>UNDANGAN TES KESEHATAN (MCU)</span></h1>
															</td>
														</tr>
													</table>
													<table class='heading_block block-2' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='padding-bottom:15px;padding-top:10px;text-align:center;width:100%;'>
																<h2 style='margin: 0; color: #201f42; direction: ltr; font-family: Noto Serif, Georgia, serif; font-size: 12px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;'><span class='tinyMce-placeholder'>Selamat <?= $ambil['nama_pelamar']?> Anda Dinyatakan Lulus Pada Tahap Tes Tulis. Selanjutnya Kami Menundang Anda Untuk Tes Kesehatan (MCU)</span></h2>
															</td>
														</tr>
													</table>
													<table class='paragraph_block block-3' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td class='pad' style='padding-left:10px;padding-right:10px;'>
																<div style='color:#201f42;direction:ltr;font-family:Inter, sans-serif;font-size:10px;font-weight:400;letter-spacing:0px;line-height:180%;text-align:center;mso-line-height-alt:28.8px;'>
																	<p style='margin: 0;'>Cek Disini Untuk Melihat Jadwal Pelaksanaan Tesnya</p>
																</div>
															</td>
														</tr>
													</table> 
													<table class='button_block block-4' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td class='pad' style='padding-bottom:15px;padding-top:20px;text-align:center;'>
																<div class='alignment' align='center'>
																	<!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='https://www.example.com' style='height:44px;width:159px;v-text-anchor:middle;' arcsize='0%' strokeweight='0.75pt' strokecolor='#201F42' fillcolor='#201f42'><w:anchorlock/><v:textbox inset='0px,0px,0px,0px'><center style='color:#ffffff; font-family:Georgia, serif; font-size:16px'><![endif]--><a href='https://lpkprimabuanaindonesia.com/daftar-pbi.com/masuk.php' target='_blank' style='text-decoration:none;display:inline-block;color:#ffffff;background-color:#201f42;border-radius:0px;width:auto;border-top:1px solid #201F42;font-weight:400;border-right:1px solid #201F42;border-bottom:1px solid #201F42;border-left:1px solid #201F42;padding-top:5px;padding-bottom:5px;font-family:Noto Serif, Georgia, serif;text-align:center;mso-border-alt:none;word-break:keep-all;'><span style='padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;letter-spacing:normal;'><span dir='ltr' style='word-break: break-word; line-height: 32px;'>Lihat Progres</span></span></a>
																	<!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-4' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-image: url(https://d1oco4z2z1fhwp.cloudfront.net/templates/default/7546/Header-bg.png); background-repeat: no-repeat; background-size: cover; border-radius: 0; color: #000000; background-color: #ffffff; width: 700px;' width='700'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 30px; padding-right: 10px; vertical-align: middle; padding-top: 30px; padding-bottom: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<div class='spacer_block' style='height:60px;line-height:60px;font-size:1px;'>&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-5' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-size: auto;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000000; background-color: #201f42; background-size: auto; width: 700px;' width='700'>
										<tbody>
											<tr>
												<td class='column column-1' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; padding-right: 30px; vertical-align: middle; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='paragraph_block block-1' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td class='pad'>
																<div style='color:#ffffff;direction:ltr;font-family:Inter, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;'>
																	<p style='margin: 0;'>Copyright © 2022 Prima Buana Indonesia&nbsp;</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>					
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>