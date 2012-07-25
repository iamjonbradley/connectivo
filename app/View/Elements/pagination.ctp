<table class="pagination">
  <tr>
    <td class="align-left">Showing Page <?php echo $this->Paginator->counter()?></td>
    <td class="align-right">
      <?php
        echo $this->Paginator->prev().'&nbsp;';
        echo $this->Paginator->numbers().'&nbsp;';
        echo $this->Paginator->next();
      ?>
    </td>    
  </tr>
</table>