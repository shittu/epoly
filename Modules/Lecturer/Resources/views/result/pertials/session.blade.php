<select class="form-control" name="session">
	<option value="">Session</option>
	<option value="{{currentSession()->id}}">
		{{currentSession()->name}}
	</option>
	<option value="{{lastSession()->id}}">
		{{lastSession()->name}}
	</option>
</select>	

