<?php
include 'admin/db_connect.php';

?>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<div class="container-fluid">
	<div class="col-lg-12">
		<div id="msg"></div>
		<form action="" id="manage-appointment">
			<input type="hidden" name="therapists_id" value="<?php echo $_GET['id'] ?>">
			<div class="form-group">
				<label for="" class="control-label">Date</label>
				<input type="date" value="" name="date" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Time</label>
				<input type="time" value="" name="time" class="form-control" required>
			</div>
			<div class="form-group">
    <label for="" class="control-label">Address</label>
    <textarea name="address" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="" class="control-label">Contact Number</label>
    <input type="text" name="contact_number" class="form-control" required pattern="^\d{10,15}$" title="Enter a valid contact number">
</div>

<div class="container">
        <h2>Notes for the Online Reservation System</h2>
        <div class="rules">
            <h3>Rules and Guidelines</h3>
            <ol>
                <li>
                    <strong>Reservation Fee Rules</strong>
                    <ul>
                        <li>A reservation fee is required to confirm your booking.</li>
                        <li>The reservation fee is non-refundable and will be deducted from your total payment.</li>
                    </ul>
                </li>
                <li>
                    <strong>Payment Policy</strong>
                    <ul>
                        <li>The total payment for the service is to be handed directly to the therapist after the service is completed.</li>
                    </ul>
                </li>
                <li>
                    <strong>No Refund Policy</strong>
                    <ul>
                        <li>All payments, including the reservation fee, are final and non-refundable.</li>
                        <li>Refunds will not be issued for cancellations or no-shows.</li>
                    </ul>
                </li>
                <li>
                    <strong>Cancellation Policy</strong>
                    <ul>
                        <li>Cancellations can only be made within 30 minutes of placing the reservation.</li>
                        <li>Cancellations made after the 30-minute window will not be accepted, and the reservation fee will be forfeited.</li>
                        <li>Clients must notify the owner directly via text message for cancellations. For cancellations, text 09168386366.</li>
                    </ul>
                </li>
            </ol>
            <form action="/action_page.php">
                Please send a screenshot as proof of payment for the reservation fee:
                <input type="file" id="myFile" name="filename">
              </form>
        </div>
        <div class="confirm-box">
            <form action="process_reservation.php" method="POST">
                <label>
                    <input type="checkbox" name="confirm" required>
                    I confirm that I have read and agree to the terms and conditions listed above.
                </label>
                <br><br>
            </form>
        </div>

			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4">Request</button>
				<button class="btn btn-secondary btn-sm col-md-4  " type="button" data-dismiss="modal" id="">Close</button>
			</div>
		</form>
	</div>
</div>

<script>
	
	$("#manage-appointment").submit(function(e){
    e.preventDefault();
    start_load();
    $.ajax({
        url: 'admin/ajax.php?action=set_appointment',
        method: 'POST',
        data: $(this).serialize(),
        success: function(resp){
            resp = JSON.parse(resp);
            if(resp.status == 1){
                alert_toast("Request submitted successfully");
                end_load();
                $('.modal').modal("hide");
            } else {
                $('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>');
                end_load();
            }
        }
    });
});

</script>

