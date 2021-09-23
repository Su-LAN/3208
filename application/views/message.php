<style>
#sms{
    margin-top: 300px;

}
</style>

<form id = "sms" method="post" action="<?php echo base_url()?>sms/send_message" >
    <input class ="form-control input-lg" type="text" name="message" placeholder="Entery your question">
    <input type="submit" value="Send SMS">
</form>
