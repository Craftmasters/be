<!DOCTYPE html>
<html>
	<head>
		<title>INVOICE</title>
		<link rel="stylesheet" type="text/css" href="<?php print $bootstrap_css; ?>">
		<style>
			div, td, h1, h2, h3, span, p {
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
			  padding: 0px 0px 40px;
			}
			.row {
			  margin-left: -10px;
			  margin-right: -10px;
			}
			h1, h2 {
			  text-align: center;
			  width: 100%;
			}
			h1 {
			  font-size: 25px;
			  color: #7b7b7b;
			  display: block;
			  text-transform: uppercase;
			  text-align: left;
			}
			span {
		    display: inline;
		    border-bottom: 2px solid #F58A3E;
		  	padding-bottom: 10px;
		  }
			h2 {
			  font-size: 24px;
			  color: #000;
			  padding-top: 40px;
			}
			h3 {
			  text-transform: uppercase;
			  font-size: 13px;
			  margin-bottom: 20px;
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
			.table-fields {
				width: 100%;
			}
			.table-fields td {
				vertical-align: top;
				width: 50%;
				padding: 5px 0px;
				font-size: 12px;
				padding-right: 15px
			}
			.td-col {
				vertical-align: top;
				width: 50%;
			}
			.td-col-left {
				padding-right: 10px;
			}
			.td-col-right {
				padding-left: 10px;
			}
			.table-border {
				width: 100%;
			}
			.table-border td {
				width: 33.33%;
			}
			.td-border {
				border-bottom: 2px solid #F58A3E;
			}
			.td-center {
				text-align: center;
			}
			table {
				width: 100%;
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
	        <h1><?php print t('Invoice'); ?></h1>
	      </div>
	      
	      <table>
  				<thead>
  					<tr>
  						<th><?php print t('Item Description'); ?></th>
  						<th class="td-center"><?php print t('Quantity'); ?></th>
  						<th class="td-center"><?php print t('Amount'); ?></th>
  					</tr>
  				</thead>
  				<tbody>
  					<tr><td></td><td></td><td></td></tr>
  					<tr>
  						<td>Item 1</td>
  						<td class="td-center">1</td>
  						<td class="td-center">$100.00</td>
  					</tr>
  					<tr>
  						<td>Item 2</td>
  						<td class="td-center">10</td>
  						<td class="td-center">$200.00</td>
  					</tr>
  					<tr>
  						<td class="invoice-notes">
  							<h2>Notes</h2>
  							<p>Thank you for your business.</p>
  						</td>
  						<td class="td-center">Total</td>
  						<td class="td-center">$300.00</td>
  					</tr>
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