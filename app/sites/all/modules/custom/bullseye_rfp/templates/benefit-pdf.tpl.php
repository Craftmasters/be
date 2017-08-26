<!DOCTYPE html>
<html>
	<head>
		<title><?php print $benefit_name; ?></title>
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
			  padding: 50px 0px;
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
			  font-size: 30px;
			  color: #7b7b7b;
			  display: block;
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
		</style>
	</head>
	<body>
		<div class="pdf-dummy-preview">
	    <div class="pdf-header">
	      <img src="<?php print $pdf_logo; ?>">
	    </div>
	    <div class="pdf-body">
	      <div class="pdf-body-header">
	        <h1><?php print t('Request for Proposal'); ?></h1>
	        <table class="table-border">
	        	<tr><td></td><td class="td-border"></td><td></td></tr>
	        </table>
	        <h2 class="pdf-company-name"><?php print $company; ?></h2>
	      </div>
	      
	      <table>
	      	<tbody>
	      		<tr>
	      			<td class="td-col td-col-left">
	      				<h3><?php print t('Group Information'); ?></h3>
	      				<table class="table-fields">
	      					<tbody>
	      						<tr>
	      							<td><?php print t('Company Name'); ?></td>
	      							<td><?php print $company; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Primary Email Address'); ?></td>
	      							<td><?php print $email; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Phone Number'); ?></td>
	      							<td><?php print $phone; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Corporate Address'); ?></td>
	      							<td><?php print $address; ?></td>
	      						</tr>
	      					</tbody>
	      				</table>
	      			</td>
	      			<td class="td-col td-col-right">
	      				<h3><?php print t('Plan Specification'); ?></h3>
	      				<table class="table-fields">
	      					<tbody>
	      						<tr>
	      							<td><?php print t('Quote Request For'); ?></td>
	      							<td><?php print $benefit_name; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Fringe Rate\'s'); ?></td>
	      							<td><?php print $fringe_rates; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Proposed Effective Date'); ?></td>
	      							<td><?php print $proposed_effective_date; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Other Work Locations and Zip Codes'); ?></td>
	      							<td><?php print $other_work_locations; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Number of Employees'); ?></td>
	      							<td><?php print $number_of_employees; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Number of Dependents'); ?></td>
	      							<td><?php print $number_of_dependents; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Nature of Business/SIC'); ?></td>
	      							<td><?php print $nature_of_business; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Years in Business'); ?></td>
	      							<td><?php print $years_in_business; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Tax ID'); ?></td>
	      							<td><?php print $tax_id; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Renewal Date'); ?></td>
	      							<td><?php print $renewal_date; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Current Carrier'); ?></td>
	      							<td><?php print $current_carrier; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Plan Year to Quote'); ?></td>
	      							<td><?php print $plan_year_to_quote; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Renewal'); ?></td>
	      							<td><?php print $renewal; ?></td>
	      						</tr>
	      						<tr>
	      							<td><?php print t('Waiting Period'); ?></td>
	      							<td><?php print $waiting_period; ?></td>
	      						</tr>
	      					</tbody>
	      				</table>
	      			</td>
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