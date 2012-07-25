<h1 class="tit">Add Contact</h1>
<h2>Client - <?php echo $this->Html->link($this->request->data['Lead']['name'],'/leads/view/'. $this->request->data['Lead']['id']); ?></h2>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

    <?php echo $this->Form->create('Contact', array('url' => '/contacts/edit/'. $this->request->data['Contact']['id']));?>
      <?php echo $this->Form->input('Contact.id', array('type' => 'hidden')); ?>
      <?php echo $this->Form->input('Contact.lead_id', array('type' => 'hidden' ,'value' => $this->request->data['Lead']['id'])); ?>
      <fieldset>
        <table class="nostyle">
          <tbody>
          <tr>
            <td class="va-top">Contact Type:</td>
            <td><?php echo $this->Form->input('Contact.contact_type_id', array('label' => '', 'options' => $types, 'type' => 'select', 'class' => 'input-text'));?></td>
          </tr>
          <tr>
            <td class="va-top">Name:</td>
            <td><?php echo $this->Form->input('Contact.name', array('label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="va-top">Details:</td>
            <td><?php echo $this->Form->input('Contact.value', array('label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
          </tr>
        </tbody>        
      </table>
      </fieldset>
    <?php echo $this->Form->end();?>