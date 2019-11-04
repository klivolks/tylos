<div class="col m8 l10 s12 content-body">
	<div class="row">
		<div class="col l4 s12 push-l4">
			<h5>Quick Update </h5>
		</div>
	</div>
	<div class="row">
		<div class="col l6 s12 push-l3">
			<form method="post" action="/admin/add/quick-date/">
				<div class="col s12 input-field">
					<label>Starting date</label>
					<input type="text" class="datepicker" name="start_date" required>
					<input type="hidden" name="court" value="<?php echo $sub_page; ?>">
				</div>
				<div class="col s12 input-field">
					<label>Ending date</label>
					<input type="text" class="datepicker" name="end_date" required>
				</div>
				<div class="col s12 input-field">
					<label>Slot Price</label>
					<input type="text" class="validate" name="price" required>
				</div>
				<div class="col s12 input-field">
					<h5>Time Slots</h5>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="00:00:00" id="time_0">
					<label for="time_0">12:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="00:30:00" id="time_05">
					<label for="time_05">12:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="01:00:00" id="time_1">
					<label for="time_1">1:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="01:30:00" id="time_015">
					<label for="time_015">:301 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="02:00:00" id="time_2">
					<label for="time_2">2:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="02:30:00" id="time_25">
					<label for="time_25">2:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="03:00:00" id="time_3">
					<label for="time_3">3:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="03:30:00" id="time_35">
					<label for="time_35">3:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="04:00:00" id="time_4">
					<label for="time_4">4:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="04:30:00" id="time_45">
					<label for="time_45">4:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="05:00:00" id="time_5">
					<label for="time_5">5:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="05:30:00" id="time_55">
					<label for="time_55">5:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="06:00:00" id="time_6">
					<label for="time_6">6:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="06:30:00" id="time_65">
					<label for="time_65">6:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="07:00:00" id="time_7">
					<label for="time_7">7:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="07:30:00" id="time_75">
					<label for="time_75">7:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="08:00:00" id="time_8">
					<label for="time_8">8:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="08:30:00" id="time_85">
					<label for="time_85">8:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="09:00:00" id="time_9">
					<label for="time_9">9:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="09:30:00" id="time_95">
					<label for="time_95">9:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="10:00:00" id="time_10">
					<label for="time_10">10:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="10:30:00" id="time_105">
					<label for="time_105">10:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="11:00:00" id="time_11">
					<label for="time_11">11:00 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="11:30:00" id="time_115">
					<label for="time_115">11:30 AM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="12:00:00" id="time_12">
					<label for="time_12">12:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="12:30:00" id="time_125">
					<label for="time_125">12:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="13:00:00" id="time_13">
					<label for="time_13">1:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="13:30:00" id="time_135">
					<label for="time_135">1:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="14:00:00" id="time_14">
					<label for="time_14">2:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="14:30:00" id="time_145">
					<label for="time_145">2:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="15:00:00" id="time_15">
					<label for="time_15">3:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="15:30:00" id="time_155">
					<label for="time_155">3:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="16:00:00" id="time_16">
					<label for="time_16">4:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="16:30:00" id="time_165">
					<label for="time_165">4:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="17:00:00" id="time_17">
					<label for="time_17">5:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="17:30:00" id="time_175">
					<label for="time_175">5:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="18:00:00" id="time_18">
					<label for="time_18">6:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="18:30:00" id="time_185">
					<label for="time_185">6:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="19:00:00" id="time_19">
					<label for="time_19">7:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="19:30:00" id="time_195">
					<label for="time_195">7:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="20:00:00" id="time_20">
					<label for="time_20">8:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="20:30:00" id="time_205">
					<label for="time_205">8:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="21:00:00" id="time_21">
					<label for="time_21">9:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="21:30:00" id="time_215">
					<label for="time_215">9:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="22:00:00" id="time_22">
					<label for="time_22">10:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="22:30:00" id="time_225">
					<label for="time_225">10:30 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="23:00:00" id="time_23">
					<label for="time_23">11:00 PM</label>
				</div>
				<div class="col s4">
					<input type="checkbox" name="timeslot[]" value="23:30:00" id="time_235">
					<label for="time_235">11:30 PM</label>
				</div>
				<div class="col s12 input-field">
					<button type="submit" class="btn btn-flat waves-effect green">
						SUBMIT
					</button>
				</div>
			</form>
		</div>
	</div>
</div>