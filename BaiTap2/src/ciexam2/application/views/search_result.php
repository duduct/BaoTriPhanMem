<!DOCTYPE html>
    <html>
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title></title>
            <link rel="stylesheet" href="<?php echo base_url();?>template/style/member.css">
            <style type="text/css">
            </style>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript">

            $(document).ready(function() {
                $('a.parent_menu').click(function() {
                    $('#metro').remove();
                    $('#menu ul li').removeClass('active');
                    $(this).parent().addClass('active');
                    $('#menu ul li a').removeClass('selected');
                    $(this).addClass('selected');
                    $('#menu ul li .sub_menu').css({
                        display: 'none'
                    });
                    $('.active .sub_menu').css({
                        display: 'block'
                    });
                    $('#menu ul li .sub_menu li:first-child a').addClass('sub_select');
                });
                $('ul.sub_menu li a').click(function(){
                    $('.sub_menu li a').removeClass('sub_select');
                    $(this).addClass('sub_select');
                });
            });
            </script>
    </head>
 <body>
   <?php $this->load->view('layout/header.php'); ?>
   <article>
    <?php $this->load->view('layout/left.php'); ?>
   </article>
    <div id="content-search">
    <?php $this->load->helper('form'); ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open($this->uri->uri_string); ?>
    <?php echo form_label('Search:', 'search-box'); ?>
    <?php echo form_input(array('name' => 'q', 'id' => 'search-box', 'value' => $search_terms)); ?>
    <?php echo form_submit('search', 'Search'); ?>
    <?php echo form_close(); ?>
     
    <?php if ( ! is_null($results)): ?>
        <?php if (!$results): ?>
           <p>No result!</p>
        <?php else: ?>
                <table border=1>
                    <tr>
                    <th>SO_NO</th>
                    <th>MA_DV</th>
                    <th>MA_LOAI</th>
                    <th>TEN_MBA</th>
                    <th>NAM_SX</th>
                    </tr>
                    <?php foreach ($results as $result): ?>
                    <tr>
                    <td><?php echo $result->SONO ?></td>
                    <td><?php echo $result->MA_DV ?></td>
                    <td><?php echo $result->MA_LOAI ?></td>
                    <td><?php echo $result->TEN_MBA ?></td>
                    <td><?php echo $result->NAM_SX ?></td>
                    </tr>
            	<?php endforeach ?>
                </table>
        <?php endif ?>
    <?php endif ?>
    </div>
</body>
</html>