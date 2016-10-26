
<div class="footer-green">
	<?php 
		$contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
		$contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
		$contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
		$contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
		$contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
		
		$facebook =  $this->db->get_where('social_links',array('type' => 'facebook'))->row()->value;
		$googleplus =  $this->db->get_where('social_links',array('type' => 'google-plus'))->row()->value;
		$twitter =  $this->db->get_where('social_links',array('type' => 'twitter'))->row()->value;
		$skype =  $this->db->get_where('social_links',array('type' => 'skype'))->row()->value;
		$youtube =  $this->db->get_where('social_links',array('type' => 'youtube'))->row()->value;
		$pinterest =  $this->db->get_where('social_links',array('type' => 'pinterest'))->row()->value;
		
        $footer_text =  $this->db->get_where('general_settings',array('type' => 'footer_text'))->row()->value;
        $footer_category =  json_decode($this->db->get_where('general_settings',array('type' => 'footer_category'))->row()->value);
    ?>
    <!-- Modal -->
    <div class="modal fade" id="v_registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajvlup'></div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlin'></div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlup'></div> 
    </div>
    <!-- End Modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="quick_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:70%;">
    	<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" id="v_close_logup_modal" class="close" type="button">×</button>
                    <br>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn-u btn-u-default" type="button" id="v_clsreg" ><?php echo translate('close');?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <a data-toggle="modal" data-target="#login" id="loginss" ></a>
    <a data-toggle="modal" data-target="#registration" id="regiss" ></a>
    <a data-toggle="modal" data-target="#v_registration" id="v_regiss" ></a>
  

</div><!--/wrapper-->