<h1 class="tit">Add Group</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

    <?php echo $this->Form->create('Group');?>
      <fieldset>
        <table class="nostyle">
          <tbody>
          <tr>
            <td class="va-top">Name:</td>
            <td><?php echo $this->Form->input('Group.name', array('label' => '', 'class' => 'input-text')); ?></td>
          </tr>
          <tr>
            <td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
          </tr>
        </tbody></table>
      </fieldset>
    <?php echo $this->Form->end();?>