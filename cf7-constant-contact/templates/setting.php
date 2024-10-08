<?php
  if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }
 $self_dir=admin_url().'?'.$this->id.'_tab_action=get_token';
  ?><div class="crm_fields_table">
    <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_name"><?php esc_html_e("Account Name",'contact-form-ccontact-crm'); ?></label>
  </div>
  <div class="crm_field_cell2">
  <input type="text" name="crm[name]" value="<?php echo !empty($name) ? esc_html($name) : 'Account #'.esc_html($id); ?>" id="vx_name" class="crm_text">

  </div>
  <div class="clear"></div>
  </div>

<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_id"><?php esc_html_e("API Key",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
     <div class="vx_tr">
  <div class="vx_td">
  <input type="password" id="app_id" name="crm[app_id]" class="crm_text" placeholder="<?php esc_html_e("API Key",'contact-form-ccontact-crm'); ?>" value="<?php echo esc_html($this->post('app_id',$info)); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php esc_html_e('Toggle Consumer Key','contact-form-ccontact-crm'); ?>"><?php esc_html_e('Show Key','contact-form-ccontact-crm') ?></a>
  
  </div></div> 
  <div class="howto">
  <ol>
  <li><?php echo sprintf(esc_html__('Create New Application %shere%s','contact-form-ccontact-crm'),'<a href="https://app.constantcontact.com/pages/dma/portal/" target="_blank">','</a>'); ?></li>
  <li><?php esc_html_e('Enter Application Name(eg. My App)','contact-form-ccontact-crm'); ?></li>
  <li><?php echo sprintf(esc_html__('Enter %s in Redirect URI','contact-form-ccontact-crm'),'<code>'.esc_url($self_dir).'</code>'); ?>
  </li>
<li><?php esc_html_e('Save Application','contact-form-ccontact-crm'); ?></li>
<li><?php echo esc_html__('Generate secret and copy it','contact-form-ccontact-crm'); ?></li>
   </ol>
   

  </div>
</div>
  <div class="clear"></div>
  </div>
<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_secret"><?php esc_html_e("Secret",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
       <div class="vx_tr" >
  <div class="vx_td">
 <input type="password" id="app_secret" name="crm[app_secret]" class="crm_text"  placeholder="<?php esc_html_e("Secret",'contact-form-ccontact-crm'); ?>" value="<?php echo $this->post('app_secret',$info); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php esc_html_e('Toggle Consumer Secret','contact-form-ccontact-crm'); ?>"><?php esc_html_e('Show Key','contact-form-ccontact-crm') ?></a>
  
  </div></div>
  </div>
  <div class="clear"></div>
  </div>
<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_url"><?php esc_html_e("Redirect URI",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2"><input type="text" id="app_url" name="crm[app_url]" class="crm_text" placeholder="<?php esc_html_e("Redirect URI",'contact-form-ccontact-crm'); ?>" value="<?php echo $this->post('app_url',$info); ?>"> 

  </div>
  <div class="clear"></div>
  </div>
 <?php
 if(!empty($client['client_id'])){                   
                ?>               
  <div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e('Constant Contact Access','contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
  <?php if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
  <div style="padding-bottom: 8px;" class="vx_green"><i class="fa fa-check"></i> <?php
  echo sprintf(esc_html__("Authorized Connection to %s on %s",'contact-form-ccontact-crm'),'<code>Constant Contact</code>',date('F d, Y h:i:s A',$info['_time']));
        ?></div>
  <?php
  }else{
  ?>
  <a class="button button-default button-hero sf_login" data-id="<?php echo esc_html($client['client_id']) ?>" href="https://authz.constantcontact.com/oauth2/default/v1/authorize?scope=contact_data+offline_access&response_type=code&state=<?php echo esc_attr($id); ?>&client_id=<?php echo esc_html($client['client_id']) ?>&redirect_uri=<?php echo urlencode(esc_url($client['call_back'])) ?>"  title="<?php esc_html_e("Login with Constant Contact",'contact-form-ccontact-crm'); ?>" > <i class="fa fa-lock"></i> <?php esc_html_e("Login with Constant Contact",'contact-form-ccontact-crm'); ?></a>
  <?php
  }
  ?></div>
  <div class="clear"></div>
  </div>                  
    <?php if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
    <div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e("Revoke Access",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">  <a class="button button-secondary" id="vx_revoke" href="<?php echo esc_url($link."&".$this->id."_tab_action=get_token&vx_nonce=".$nonce.'&id='.$id)?>"><i class="fa fa-unlock"></i> <?php esc_html_e("Revoke Access",'contact-form-ccontact-crm'); ?></a>
  </div>
  <div class="clear"></div>
  </div> 
<div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e("Test Connection",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">      <button type="submit" class="button button-secondary" name="vx_test_connection"><i class="fa fa-refresh"></i> <?php esc_html_e("Test Connection",'contact-form-ccontact-crm'); ?></button>
  </div>
  <div class="clear"></div>
  </div>
<?php
    }
 }   
?> 
         
  <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_error_email"><?php esc_html_e("Notify by Email on Errors",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2"><textarea name="crm[error_email]" id="vx_error_email" placeholder="<?php esc_html_e("Enter comma separated email addresses",'contact-form-ccontact-crm'); ?>" class="crm_text" style="height: 70px"><?php echo isset($info['error_email']) ? esc_html($info['error_email']) : ""; ?></textarea>
  <span class="howto"><?php esc_html_e("Enter comma separated email addresses. An email will be sent to these email addresses if an order is not properly added to Constant Contact. Leave blank to disable.",'contact-form-ccontact-crm'); ?></span>
  </div>
  <div class="clear"></div>
  </div>  
   
 
  <button type="submit" value="save" class="button-primary" title="<?php esc_html_e('Save Changes','contact-form-ccontact-crm'); ?>" name="save"><?php esc_html_e('Save Changes','contact-form-ccontact-crm'); ?></button>  
  </div>  