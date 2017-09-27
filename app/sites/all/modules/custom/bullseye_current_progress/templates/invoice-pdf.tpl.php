<!DOCTYPE html>
<html>
	<head>
		<title>INVOICE</title>
		<link rel="stylesheet" type="text/css" href="<?php print $bootstrap_css; ?>">
		<style>
			div, td, h1, h2, h3, h4, span, p {
				font-family: 'Helvetica';
			}
			.pdf-header {
			  text-align: right;
			  border-bottom: 3px solid #7b7b7b;
			  padding-bottom: 10px;
			}
			.pdf-header img {
			  width: 220px;
			}
			.pdf-body {
			  margin-top: 2px;
			  border-top: 1px solid #F58A3E;
			  padding: 20px 0px 50px;
			}
			.pdf-body-header {
			  padding: 0px 0px 0px;
			}
			h1 {
			  font-size: 25px;
			  color: #7b7b7b;
			  display: block;
			  text-transform: uppercase;
			  text-align: left;
			}
			div[class*="col-xs-"] {
			  font-size: 11px;
			  margin-bottom: 10px;
			  display: inline-block;
			  margin-right: -4px;
			  vertical-align: top;
			  width: 50%;
			  float: none;
			  clear: both;
			}
			.pdf-footer {
			  border-top: 3px solid #F58A3E;
			  text-align: center;
			  padding: 15px 0px 20px;
			  position: fixed;
			  bottom: 50px;
			  width: 100%;
			}
			.pdf-footer p {
			  font-size: 11px;
			  color: #7b7b7b;
			  margin: 0px;
			}
			table {
				width: 100%;
			}
			.invoice-title {
				border-bottom: 1px solid #a0a0a0;
				padding-bottom: 5px;
				margin-bottom: 20px;
			}
			.top-left {
				width: 59%;
			}
			.top-right {
				width: 39%;
			}
			.top-right-label {
				color: #f58a3e;
				text-transform: uppercase;
				width: 110px;
			}
			.top-right-value {
				text-align: right;
			}
			.top-right-colon {
				width: 2%;
			}
			.td-center {
				text-align: center;
			}
			.td-right {
				text-align: right;
			}
			.sfi-items-th th {
				border-bottom: 2px solid #f58a3e;
				text-transform: uppercase;
				padding: 10px;
			}
			.padding-10px {
				padding: 10px;
			}
			.color-gray-bg {
				background-color: #f5f5f5;
			}
			.td-none {
				height: 10px;
			}
			.color-orange-bg {
				background-color: #f58a3e;
				color: #fff;
			}
			.h4-invoice {
				padding: 0px;
				margin: 0px;
				color: #f58a3e;
				font-size: 13px;
			}
			p {
				margin: 0px;
				padding: 0px;
				font-size: 13px;
			}
		</style>
	</head>
	<body>
		<div class="pdf-dummy-preview">
	    <div class="pdf-header">
	      <img src="<?php print $pdf_logo; ?>">
	    </div>
	    <div class="pdf-body">
	      <div class="pdf-body-header">
	        <h1 class="invoice-title"><?php print t('Invoice'); ?></h1>
	      </div>

	      <table>
	      	<tbody>
	      		<tr>
	      			<td class="top-left">
	      				<?php $contact = Bullseye::getAccountPrimaryContact($nid); ?>
          			<div class="person-name">
          				<?php print $contact['field_firstname_value'] . ' ' . $contact['field_lastname_value']; ?>
          			</div>
          			<div class="title"><?php print $contact['field_position_value']; ?></div>
          			<div class="company-name"><?php print Bullseye::getCompanyNameByNid($nid); ?></div>
          			<div class="company-street"><?php print Bullseye::getStreetAddressByNid($nid); ?></div>
          			<div class="company-add">
            			<?php print Bullseye::getCityByNid($nid); ?>, <?php print Bullseye::getStateByNid($nid); ?>, <?php print Bullseye::getZipCodeByNid($nid); ?>
            		</div>
	      			</td>
	      			<td class="top-right">
	      				<table>
	      					<tbody>
	      						<tr>
	      							<td class="top-right-label">Invoice no</td>
	      							<td class="top-right-colon">:</td>
	      							<td class="top-right-value"><?php print $invoice_number; ?></td>
	      						</tr>
	      						<tr>
	      							<td class="top-right-label">Due Date</td>
	      							<td class="top-right-colon">:</td>
	      							<td class="top-right-value"><?php print date('m/d/Y', strtotime(Bullseye::getContractDateByNid($nid))); ?></td>
	      						</tr>
	      						<tr>
	      							<td class="top-right-label">Account no</td>
	      							<td class="top-right-colon">:</td>
	      							<td class="top-right-value"><?php print $nid; ?></td>
	      						</tr>
	      					</tbody>
	      				</table>
	      			</td>
	      		</tr>
	      	</tbody>
	      </table>
	      
	      <table style="margin-top: 50px;">
  				<thead>
  					<tr class="sfi-items-th">
  						<th><?php print t('Item Description'); ?></th>
  						<th class="td-center"><?php print t('Quantity'); ?></th>
  						<th class="td-right"><?php print t('Amount'); ?></th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php print $output; ?>
  				</tbody>
  			</table>

	    </div>
	    <div class="pdf-footer">
	      <p>100 Commons Rd, Ste 7377, Dripping Springs, TX 78620</p>
	      <p>(888) 745-0754 | support@archerjordan.com</p>
	    </div>
	  </div>
	</body>
</html>