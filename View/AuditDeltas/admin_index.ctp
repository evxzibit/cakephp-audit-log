<?php $this->extend('/Layouts/Partials/admin_index'); ?>

<?php $this->start('title'); ?>
	<h2><i class="icon-align-justify"></i><span class="break"></span>Audit log</h2>
<?php $this->end(); ?>

<?php $this->start('main'); ?>
	<table class="table table-striped bootstrap-datatable datatable">
		<thead>
		<tr>
			<th>Resource</th>
			<th><?= $this->Paginator->sort('property_name');?></th>
			<th><?= $this->Paginator->sort('old_value');?></th>
			<th><?= $this->Paginator->sort('new_value');?></th>
			<th><?= $this->Paginator->sort('id');?></th>
		</tr>
		</thead>
		<tbody>
	<?php foreach ($items as $item): ?>
		<tr>
			<td class='center'><?= $this->Html->link($item['Audit']['model'] . ' # ' . $item['Audit']['entity_id'], ['controller' => 'audits', 'action' => 'index', '?' => ['model' => $item['Audit']['model'], 'entity_id' => $item['Audit']['entity_id']]]); ?>&nbsp;</td>
			<td class='center'><?= h($item['AuditDelta']['property_name']); ?>&nbsp;</td>
			<td class='center'><?= h($this->Text->truncate($item['AuditDelta']['old_value'], 50)); ?>&nbsp;</td>
			<td class='center'><?= h($this->Text->truncate($item['AuditDelta']['new_value'], 50)); ?>&nbsp;</td>
			<td class='center'><?= $this->Html->link($item['Audit']['id'], ['controller' => 'audits', 'action' => 'view', $item['Audit']['id']]); ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
	</table>
	<div class="row-fluid">
		<div class="span12">
			<?= $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:start} to {:end} out of {:count}')));?>
		</div>
	</div>
	<?php echo $this->Paginator->pagination(); ?>
<?php $this->end(); ?>