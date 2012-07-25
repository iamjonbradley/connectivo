<h1 class="tit">Add Upload</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

    <?php echo $this->Form->create('Upload', array('action' => 'add', 'type' => 'file'));?>
      <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
      <?php echo $this->Form->input('lead_id', array('type' => 'hidden')); ?>
      <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); ?>
      <fieldset>
        <table class="nostyle">
          <tbody><tr>
            <td style="width: 90px;">Description:</td>
            <td><?php echo $this->Form->input('description', array('label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td>Select File:</td>
            <td><?php echo $this->Form->file('File', array('label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
          </tr>
        </tbody></table>
      </fieldset>
    <?php echo $this->Form->end();?>