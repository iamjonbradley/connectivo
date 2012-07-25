<h1 class="tit">Add Note</h1>
<h2>Client - <?php echo $this->Html->link($this->request->data['Lead']['name'],'/leads/view/'. $this->request->data['Lead']['id']); ?></h2>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

    <?php echo $this->Form->create('Note', array('url' => '/notes/add/'. $this->request->data['Lead']['id']));?>
      <?php echo $this->Form->input('Note.id', array('type' => 'hidden')); ?>
      <?php echo $this->Form->input('Note.lead_id', array('type' => 'hidden' ,'value' => $this->request->data['Lead']['id'])); ?>
      <?php echo $this->Form->input('Note.user_id', array('type' => 'hidden' ,'value' => $this->Session->read('Auth.User.id'))); ?>
      <fieldset>
        <table class="nostyle">
          <tbody>
          <tr>
            <td class="va-top">Note Type:</td>
            <td><?php echo $this->Form->input('Note.type_id', array('label' => '', 'options' => array(0 => 'Reminder', 1 => 'Note'), 'type' => 'select', 'class' => 'input-text'));?></td>
          </tr>
          <tr>
            <td class="va-top">Note:</td>
            <td><?php echo $this->Form->input('Note.note', array('type' => 'textarea', 'label' => '', 'rows' => '7', 'cols' => '75', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="va-top">Date of Reminder:</td>
            <td><?php echo $this->Form->input('Note.date', array('type' => 'date', 'label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
          </tr>
        </tbody>        
      </table>
      </fieldset>
    <?php echo $this->Form->end();?>