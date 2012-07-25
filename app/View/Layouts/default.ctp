<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    Connectivo | <?php echo $title_for_layout; ?>
  </title>
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(array('reset','main','2col','reset','style','mystyle'));
  ?>    
  <script type="text/javascript" charset="utf-8" src="/js/jquery.js"> </script>
  <script type="text/javascript" charset="utf-8" src="/js/switcher.js"> </script>
  <script type="text/javascript" charset="utf-8" src="/js/toggle.js"> </script>
  <script type="text/javascript" charset="utf-8" src="/js/ui.core.js"> </script>
  <script type="text/javascript" charset="utf-8" src="/js/ui.tabs.js"> </script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $(".tabs > ul").tabs();
      });
       
    </script>
</head>  

<body>

<div id="main">

  <? if ($this->Session->read('Auth.User')): ?>
  <div id="tray" class="box">
    <p class="f-right">User: <strong><?php echo $this->Session->read('Auth.User.name');?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="/users/logout" id="logout">Log out</a></strong></p>
  </div> 
  <? endif; ?>
  <hr class="noscreen" />

  

  <hr class="noscreen" />

  <!-- Columns -->
  <div id="cols" class="box">

    <!-- Aside (Left Column) -->
    <div id="aside" class="box">

      <div class="padding box">

        <!-- Logo (Max. width = 200px) -->
        <div id="logo"><?php echo $this->Html->link($this->Html->image('logo.gif'), '/', array('escape' => false), null, false);?></div>
        <? if ($this->Session->read('Auth.User')): ?>
        <form action="/search" method="post" id="search">
          <fieldset>
            <legend>Search</legend>
            <select name="data[model]" id="data[model]" class="input-text">
              <option value="Lead"> Leads</option>
              <option value="Contact"> Contacts</option>
              <option value="Note"> Notes</option>
            </select>&nbsp;  
            <input type="text" size="17" name="data[keyword]" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />

          </fieldset>
        </form>
        <? endif; ?>
      </div> <!-- /aside -->
        <? 
        if ($this->Session->read('Auth.User')):
          echo $this->element('left-nav');
          echo '<hr class="noscreen" />';
          if (!empty($task)) echo $this->element('reminders', $task);
        endif; 
        ?>
    </div> <!-- /aside -->

    <hr class="noscreen" />

    <!-- Content (Right Column) -->
    <div id="content" class="box">
      <?php
        echo $content_for_layout; 
      ?>
    </div> <!-- /content -->

  </div> <!-- /cols -->

  <hr class="noscreen" />

  <!-- Footer -->
  <div id="footer" class="box">

    <p class="f-right"><?php echo $this->Html->link($this->Html->image('afzetinc.png'), 'http://afzetinc.com', array('escape' => false, 'target' => 'new'))?></p>

  </div> <!-- /footer -->

</div> <!-- /main -->

  <?php echo $this->element('sql_dump'); ?>
</body>
</html>