<tr class="tr-none">
	<td class="td-none"></td>
	<td class="td-none"></td>
	<td class="td-none"></td>
</tr>
<?php $sfi_total = 0; ?>
<?php foreach($items as $key => $value) : ?>
	<tr>
		<td class="padding-10px color-gray-bg"><?php print $value->field_item_description_value; ?></td>
		<td class="td-center padding-10px color-gray-bg"><?php print number_format($value->field_item_quantity_value); ?></td>
		<td class="td-right padding-10px color-gray-bg">$<?php print number_format($value->field_item_amount_value, 2); ?></td>
		<?php $sfi_total = $sfi_total + (int) $value->field_item_amount_value; ?>
	</tr>
<?php endforeach; ?>

<tr>
	<td class="invoice-notes padding-10px">
		<h4 class="h4-invoice">Notes</h4>
		<p><?php print $invoice_notes; ?></p>
	</td>
	<td class="sfi-total-label td-center padding-10px color-orange-bg">Total</td>
	<td class="sfi-total-value td-right padding-10px color-orange-bg">$<?php print number_format($sfi_total, 2); ?></td>
</tr>